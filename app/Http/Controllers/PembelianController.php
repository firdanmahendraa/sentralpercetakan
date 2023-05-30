<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\Supplier;
use App\Models\KodeAkun;
use App\Models\TransactionCart;
use App\Models\KasKeluar;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class PembelianController extends Controller{
    // Pembelian Index
    public function index(Request $request){
        $pembelian = Pembelian::with('supplier')->where('status', 'ok')->orderBy('created_at', 'desc')->get();;
        if($request->ajax()){
            $data = DataTables::of($pembelian)
            ->addIndexColumn()
            ->addColumn('created_at', function($item) {
                return $item->created_at->translatedFormat('d F Y');
            })
            ->addColumn('nama_supplier', function($item) {
                return $item->supplier['nama_supplier'];
            })
            ->addColumn('sub_total', function($item) {
                return 'Rp. '. format_uang($item->sub_total);
            })
            ->addColumn('bayar', function($item) {
                return 'Rp. '. format_uang($item->bayar);
            })
            ->addColumn('hutang', function($item) {
                return 'Rp. '. format_uang($item->hutang);
            })
            ->addColumn('action', function($item){
                return '
                    <div class="btn-group">
                        <button data-id="'.$item->id.'" onclick="detailPembelian('.$item->id.')" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> &nbsp; Detail</button>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $data;
        }
        $sub_total = Pembelian  ::sum('sub_total');
        $bayar    = Pembelian   ::sum('bayar');
        $hutang    = Pembelian  ::sum('hutang');
        return view('pages.pembelian.index', compact('pembelian', 'sub_total', 'bayar', 'hutang'));
    }

    public function getSupplier(){
        $supplier = Supplier::get();
        return response()->json($supplier);
    }

    // Pemnbelian Form
    public function generatePembelianForm(Request $request){
        $supplier = Supplier::find($request->id_supplier);
        if ($request->id_supplier == null) {
            $supplier = new Supplier;
            $supplier->nama_supplier = $request->nama_supplier;
            $supplier->alamat_supplier = $request->alamat_supplier;
            $supplier->telepon_supplier = $request->telepon_supplier;
            $supplier->save();

            $request->id_supplier = $supplier->id;
        }
        $id = base64_encode($request->id_supplier);

        // delete pembelian dengan status pending
        $delPend = Pembelian::where('status', 'pend')->delete();
        $delPendDet = PembelianDetail::where('status', 'pend')->delete();

        // Generate id_pembelian dengan status pending
        $pembelian = new Pembelian();
        $pembelian->save();

        return redirect()->route('transaksi_pembelian.inputpembelianform', ['id' => $id]);
    }

    public function inputPembelianForm($id){
        $id_pembelian = Pembelian::latest()->first();
        $supplier = Supplier::find(base64_decode($id));
            if (!$supplier) return abort(404);
        $kode_akun = KodeAkun::get();
        
        return view('pages.pembelian.form', compact('id_pembelian', 'supplier', 'kode_akun'));
    }

    public function getAkun(){
        $kode_akun = KodeAkun::get();
        return response()->json($supplier);
    }

    public function addProduct(Request $request){
        DB::beginTransaction();
        try {
            $detail = new PembelianDetail;
            $detail->id_pembelian = $request->id_pembelian;
            $detail->id_akun = $request->id_akun;
            $detail->uraian = $request->uraian;
            $detail->jumlah = $request->jumlah;
            $detail->satuan = $request->satuan;
            $detail->harga = $request->harga;
            $detail->sub_total = $request->jumlah * $request->harga;
            $detail->save();

            DB::commit(); 
            return response()->json('Barang berhasil disimpan!', 200); 
        } catch (Exception $e) {
            DB::rollback();
            $response =array(
                'success' => false,
                'message' => $e->getMessage()
            );
            return response()->json($response); 
        }
    }

    public function transactionCart(Request $request){
        if($request->ajax()){
            $detail = PembelianDetail::where('status', 'pend')->get();
            return DataTables::of($detail)
                ->addIndexColumn()
                ->addColumn('harga', function($item) {
                    return 'Rp. ' . format_uang($item->harga);
                })
                ->addColumn('jumlah', function($item) {
                    return $item->jumlah. ' ' .$item->satuan;
                })
                ->addColumn('sub_total', function($item) {
                    return 'Rp. ' . format_uang($item->sub_total);
                })
                ->addColumn('action', function($item){
                    return '<button class="btn btn-sm btn-success mr-2 editData" data-id="'.$item->id.'" title="Edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="deleteData(`'. route('transaksi_pembelian.destroy', $item->id) .'`)" title="Hapus"><i class="fas fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function loadForm($total, $diterima){
        $total      = PembelianDetail::where('status', 'pend')->sum('sub_total');
        $bayar      = $total;
        $hutang    = $diterima - $bayar;
        $data       = [
            'subtotal'    => format_uang($total),  //set value subtotal dengan format IDR
            'sisa'        => format_uang($hutang),//set value sisa pembayaran dengan format IDR
            'bayar_tagih' => $bayar,              //Set value pembayaran
            'hutang'   => $hutang,
        ];

        return response()->json($data);
    }

    public function show($id) {
        $detail = PembelianDetail::find($id);
        return response()->json($detail);
    }

    public function update(Request $request, $id){
        $detail = PembelianDetail::find($id);
        $detail->id_pembelian = $request->id_pembelian;
        $detail->id_akun = $request->id_akun;
        $detail->nama_barang = $request->nama_barang;
        $detail->jumlah = $request->jumlah;
        $detail->satuan = $request->satuan;
        $detail->harga = $request->harga;
        $detail->sub_total = $request->jumlah * $request->harga;
        $detail->update();

        // $bkk = new KasKeluar;
        // $bkk->id_pembelian = $request->id_pembelian;
        // $bkk->kredit       = $request->sub_total;
        // $bkk->save();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
       $detail = PembelianDetail::find($id);
       $detail->delete();

       return response(null, 204);
    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $pembelian = Pembelian::findOrFail($request->id_pembelian);
            $pembelian->id_supplier   = $request->id_supplier;
            $pembelian->no_nota   = $request->no_nota;
            $pembelian->sub_total = $request->sub_total;
    
            if ($request->bayar == null) {
                $pembelian->bayar = 0;
                $pembelian->hutang = 0 - $request->sub_total;
                $pembelian->keterangan  = "Hutang";
            }else {
                $pembelian->bayar   = $request->bayar;
                $pembelian->hutang = $request->bayar - $request->sub_total;
                $pembelian->keterangan  = "Lunas";
            }
            $pembelian->status = "ok";
            $pembelian->update();
            
            $update_transaksi = Pembelian::latest()->first();
            if ($update_transaksi->keterangan == "Lunas") {
                PembelianDetail::where(['status'=>'pend','keterangan'=>'hutang'])->update(['keterangan'=>'lunas']);
                
                // Tambah data => table kas keluar jika pembelian telah dibayar
                PembelianDetail::where(['status'=>'pend'])->get([ 'id_pembelian', 'id_akun', 'uraian', 'sub_total' ])->each(function ($cart = [ 'id_pembelian', 'id_akun', 'uraian', 'sub_total' ]){
                    $trans_det = $cart->replicate();
                    $trans_det->setTable('tb_bkk');
                    $trans_det->save();
                });
            }
            
            PembelianDetail::where(['status'=>'pend'])->update(['status'=>'ok']);

            DB::commit(); 
            return response()->json('Transaksi Berhasil', 200); 
        } catch (Exception $e) {
            DB::rollback();
            $response =array(
                'success' => false,
                'message' => $e->getMessage()
            );
            return view('pages.pembelian.detail', compact('response'));
        }
    }

    public function transactionProcess(Request $request){
        $this->store($request);

        return redirect()->route('transaksi_pembelian.index')->with(['success' => 'Transaksi berhasil disimpan']);
    }

    // Pembelian Detail
    public function detailPembelian($id){
        $detail = PembelianDetail::with('pembelian')->where('id_pembelian', $id)->get();
        $data   = array();
        foreach ($detail as $item) {
            $row = array();
            $row['id_akun']   = $item['id_akun'] ;
            $row['uraian']    = $item['uraian'];
            $row['jumlah']    = $item['jumlah'] .' '. $item['satuan'];
            $row['harga']     = 'Rp. '.  format_uang($item->harga);
            $row['sub_total'] = 'Rp. '.  format_uang($item->sub_total);
            $data[] = $row;
        }

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['id_akun','uraian', 'jumlah', 'harga', 'sub_total'])
            ->make(true);
    }
}
