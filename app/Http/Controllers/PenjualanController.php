<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\PenjualanTransaction;
use App\Models\KasMasuk;
use App\Models\User;
use App\Models\Produk;
use App\Models\OpsiPembayaran;
use App\Models\Customer;
use App\Models\Setting;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class PenjualanController extends Controller{
    public function index(Request $request){
        $date = explode('-', $request->date);
      
        $penjualan = Penjualan::with('customer')->orderBy('created_at', 'desc');
        if (count($date) == 2) {
            if ($date[0] != '') {
                $penjualan = $penjualan->whereDate('created_at', '>=', date('Y-m-d', strtotime($date[0])));
            }
            if ($date[1] != '') {
                $penjualan = $penjualan->whereDate('created_at', '<=', date('Y-m-d', strtotime($date[1])));
            }
        }
        $penjualan = $penjualan->get();
        
        if($request->ajax()){
            $data = DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('created_at', function($item) {
                return $item->created_at->translatedFormat('d F Y');
            })
            ->addColumn('nama_pelanggan', function($item) {
                return $item->customer['nama_pelanggan'];
            })
            ->addColumn('total_harga', function($item) {
                return $item->total_harga;
            })
            ->addColumn('diterima', function($item) {
                return $item->diterima;
            })
            ->addColumn('diskon', function($item) {
                return $item->diskon;
            })
            ->addColumn('piutang', function($item) {
                return $item->piutang;
            })
            ->addColumn('action', function($item){
                return '<div class="btn-group">
                            <a href="'.url('transaksi-penjualan/detail/'. $item->id_penjualan, $item->no_nota).'" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> &nbsp; Detail</a>
                        </div>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $data;
        }
        return view('pages.penjualan.index');
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            // Proses simpan transaksi
            $penjualan = new Penjualan;
            $penjualan->no_nota = $request->no_nota;
            if ($request->id_pelanggan == null) {
            $customer = new Customer;
                $customer->nama_pelanggan    = $request->nama_pelanggan;
                $customer->alamat_pelanggan  = $request->alamat_pelanggan;
                $customer->telepon_pelanggan = $request->telepon_pelanggan;
                $customer->save();

                $penjualan->id_pelanggan = $insertedId = $customer->id;
            }else{
                $penjualan->id_pelanggan = $request->id_pelanggan;
            }
            $penjualan->acc_desain  = $request->acc_desain;
            $penjualan->total_harga = $request->total_harga + $request->diskon;
            $penjualan->diskon      = $request->diskon;
            $penjualan->harga_akhir = $request->total_harga;

            if ($request->diterima >= $request->total_harga) {
                $penjualan->diterima = $request->total_harga;
                $penjualan->piutang = 0;
                $penjualan->keterangan   = "Lunas";
            } elseif ($request->diterima == 0) {
                $penjualan->diterima = $request->diterima;
                $penjualan->piutang  = $request->diterima - $request->total_harga;
                $penjualan->keterangan   = "Piutang";
            } else {
                $penjualan->diterima = $request->diterima;
                $penjualan->piutang  = $request->diterima - $request->total_harga;
                $penjualan->keterangan   = "Piutang";
            }
            $penjualan->kembali  = $request->diterima - $request->total_harga;
            $penjualan->id_user = auth()->id();

            // jika customer membayar = input ke tb_bkm
            if ($request->diterima > 0) {
                $history = new KasMasuk;
                $history->id_penjualan = 0;
                if ($request->uraian == null) {
                    $history->uraian   = $request->nama_pelanggan;
                }else {
                    $history->uraian   = $request->uraian;                    
                }
                // set value id_akun
                if ($request->diterima >= $request->total_harga) {
                    $history->id_akun = 250;
                    $history->debet   = $request->total_harga;
                }else {
                    $history->id_akun = 401;
                    $history->debet = $request->diterima;
                }
                $history->opsi_pembayaran = $request->opsi_pembayaran;
                $history->save();
            }
            $penjualan->save();

            // update id_penjualan field on tb_bkm
            $last_transaction = Penjualan::latest()->first();
            if($last_transaction->diterima > 0){
                $history = KasMasuk::find($insertedId = $history->id);
                $last = Penjualan::latest()->first();
                $history->id_penjualan = $last->id_penjualan;
                $history->update();
            }
            
            // Move data on transaction_cart to transaksi_detail table
            PenjualanTransaction::get()->each(function ($cart){
                $trans_det = $cart->replicate();
                $trans_det->setTable('penjualan_detail');
                $trans_det->save();

                $cart->delete();
            });

            DB::commit(); 
            return response()->json('Transaksi Berhasil', 200); 
        } catch (Exception $e) {
            DB::rollback();
            $response =array(
                'success' => false,
                'message' => $e->getMessage()
            );
            return view('pages.penjualan.detail', compact('response'));
        }
    }

    public function transactionProcess(Request $request){
        $this->store($request);
        $last_trans = Penjualan::latest()->first();
        $id      = $last_trans->id_penjualan;
        $no_nota = $last_trans->no_nota;
        
        return redirect()->route('transaksi-penjualan.show', array('id' => $id, 'no_nota' => $no_nota))->with(['success' => 'Transaksi berhasil']);
    }

    public function show($id, $no_nota){
        $penjualan = Penjualan::with('users')->find($id);
        $penjualan_detail = PenjualanDetail::with(['produk','penjualan'])->where('no_nota' , $no_nota)->get();
        $det_pembayaran   = KasMasuk::where('id_penjualan' , $id)->get();
        $total_bayar      = $det_pembayaran->sum('debet');
        $bayar_awal       = KasMasuk::orderBy('id','asc')->where('id_penjualan' , $id)->pluck('debet')->first();
        return view('pages.penjualan.detail', compact('penjualan_detail','det_pembayaran','total_bayar','bayar_awal'))->with('penjualan', $penjualan);
    }

    public function cetakInvoice($id, $no_nota){
        $setting   = Setting::first();
        $penjualan = Penjualan::with('users')->find($id);
        $total     = PenjualanDetail::where('no_nota' , $no_nota)->sum('sub_total');
        $bayar_awal    = KasMasuk::orderBy('id','asc')->where('id_penjualan' , $id)->pluck('debet')->first();
        $det_penjualan = PenjualanDetail::with(['produk','penjualan'])->where('no_nota' , $no_nota)->get();
        return view('pages.penjualan.invoice', compact('setting', 'det_penjualan', 'total', 'bayar_awal'))->with('penjualan', $penjualan);
    }

    public function cetakKwitansi($id, $no_nota){
        $setting      = Setting::first();
        $penjualan    = Penjualan::with('users')->find($id);
        $det_angsuran = KasMasuk::where('id_penjualan',  $id)->get();
        $total_bayar  = $det_angsuran->sum('debet');
        // dd($total);
        return view('pages.penjualan.kwitansi', compact('setting','det_angsuran', 'total_bayar'))->with('penjualan', $penjualan);
    } 

    public function pelunasan($id, $no_nota){
        $pelunasan  = Penjualan::with('customer')->find($id);
        // Jika Piutang = 0, Kembali ke halaman index
        if($pelunasan->piutang == 0){
            return redirect()->route('transaksi-penjualan.index');
        }
        $penjualan_detail = PenjualanDetail::with(['produk','penjualan'])->where('no_nota' , $no_nota)->get();
        $sisa_tagihan = abs($pelunasan->piutang);
        $opsi_bayar = OpsiPembayaran::get();
        return view('pages.penjualan.pelunasan',compact('penjualan_detail', 'opsi_bayar','pelunasan','sisa_tagihan'));
    }

    public function repayment(Request $request){
        DB::beginTransaction();
        try {
            $piutang = new KasMasuk;
            $piutang->id_penjualan = $request->id_penjualan;
            $piutang->id_akun = 122;
            $piutang->uraian = $request->uraian;
            $piutang->debet = $request->debet;
            $piutang->opsi_pembayaran = $request->opsi_pembayaran;
            $piutang->save();

            
            $updateTrans = Penjualan::find($request->id_penjualan);
            $now = Carbon::now()->format('d/m/Y');
            $updateTrans->piutang = $updateTrans->piutang + $request->debet;
            $updateTrans->keterangan = "Lunas (". $now .")" ;
            $updateTrans->update();

            DB::commit(); 
            return response()->json('Transaksi Berhasil', 200);
        } catch (Exception $e) {
            DB::rollback();
            $response =array(
                'success' => false,
                'message' => $e->getMessage()
            );
            return view('pages.penjualan.detail', compact('response'));
        }
    }

    public function processRepayment(Request $request){
        $this->repayment($request);
        
        return redirect()->route('transaksi-penjualan.index')->with(['success' => 'Transaksi LUNAS']);
    }

    
}
