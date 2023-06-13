<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\KasMasuk;
use App\Models\OpsiPembayaran;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class LapPiutangController extends Controller{
    public function index(Request $request){
        $penjualan = Penjualan::with('customer')->where(['keterangan'=>'piutang'])->orderBy('created_at', 'desc')->get();
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
                return 'Rp. '. format_uang($item->total_harga);
            })
            ->addColumn('diterima', function($item) {
                return 'Rp. '. format_uang($item->diterima);
            })
            ->addColumn('diskon', function($item) {
                return 'Rp. '. format_uang($item->diskon);
            })
            ->addColumn('piutang', function($item) {
                return 'Rp. '. format_uang($item->piutang);
            })
            ->addColumn('action', function($item){
                return '
                <div class="btn-group">
                    <a href="'.url('transaksi-penjualan/detail/'. $item->id_penjualan, $item->no_nota).'" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> &nbsp; Detail</a>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle  dropdown-icon" data-toggle="dropdown">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="'.url('laporan-piutang/bayar/'. $item->id_penjualan, $item->no_nota).'">Bayar</a>
                        </div>
                    </div>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $data;
        }

        return view('pages.lap_piutang.index');
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
        return view('pages.lap_piutang.pelunasan',compact('penjualan_detail', 'opsi_bayar','pelunasan','sisa_tagihan'));
    }

    public function repayment(Request $request){
        DB::beginTransaction();
        try {
            $piutang = new KasMasuk;
            $piutang->id_penjualan = $request->id_penjualan;
            $piutang->id_akun = 122;
            $piutang->uraian = $request->uraian;
            if ($request->sisa >= 0) {
                $piutang->debet = abs($request->tot_sisa);
            }
            else {
                $piutang->debet = $request->debet;
            }
            $piutang->opsi_pembayaran = $request->opsi_pembayaran;
            $piutang->save();


            $updateTrans = Penjualan::find($request->id_penjualan);
            $now = Carbon::now()->format('d/m/Y');
            if ($request->sisa >= 0) {
                $updateTrans->piutang = $updateTrans->piutang + abs($request->tot_sisa);
                $updateTrans->keterangan = "Lunas (". $now .")" ;
            }
            else {
                $updateTrans->piutang = $request->sisa;
            }
            $updateTrans->update();

            DB::commit();
            return response()->json('Transaksi Berhasil', 200);
        } catch (Exception $e) {
            DB::rollback();
            $response =array(
                'success' => false,
                'message' => $e->getMessage()
            );
            return view('pages.penjualan.pelunasan', compact('response'));
        }
    }

    public function processRepayment(Request $request){
        $this->repayment($request);
        $trans = Penjualan::find($request->id_penjualan);
        $id      = $trans->id_penjualan;
        $no_nota = $trans->no_nota;

        return redirect()->route('transaksi-penjualan.show', array('id' => $id, 'no_nota' => $no_nota))->with(['success' => 'Transaksi LUNAS']);
    }
}
