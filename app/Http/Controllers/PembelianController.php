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
        $pembelian = Pembelian::with('supplier')->where('status', 'ok')->orderBy('updated_at', 'desc')->get();;
        if($request->ajax()){
            $data = DataTables::of($pembelian)
            ->addIndexColumn()
            ->addColumn('updated_at', function($item) {
                return $item->updated_at->translatedFormat('d F Y');
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
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                        <div class="dropdown-menu dropdown-menu-right">
                        <button onclick="cetakInvoice(`'. url('transaksi-penjualan/invoice/'. $item->id) .'`)" class="dropdown-item" href="#"><i class="fas fa-barcode"></i> &nbsp;Cetak</button>
                        <a class="dropdown-item" href="'. route('transaksi-penjualan.pelunasan', $item->id).'"><i class="fas fa-check"></i> &nbsp;Pelunasan</a>
                        <a class="dropdown-item" href="'. route('transaksi-penjualan.edit', $item->id) .'"><i class="fas fa-pencil-alt"></i> &nbsp;Edit</a>
                        </div>
                    </div>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $data;
        }
        return view('pages.pembelian.index', compact('pembelian'));
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
        $detail = new PembelianDetail;
        $detail->id_pembelian = $request->id_pembelian;
        $detail->id_akun = $request->id_akun;
        $detail->nama_barang = $request->nama_barang;
        $detail->jumlah = $request->jumlah;
        $detail->satuan = $request->satuan;
        $detail->harga = $request->harga;
        $detail->sub_total = $request->jumlah * $request->harga;
        $detail->save();

        // $bkk = new KasKeluar;
        // $bkk->id_pembelian = $request->id_pembelian;
        // $bkk->kredit       = $request->sub_total;
        // $bkk->save();

        return response()->json('Data berhasil disimpan', 200);
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
        $kembali    = $diterima - $bayar;
        $data       = [
            'subtotal'    => format_uang($total),  //set value subtotal dengan format IDR
            'tot_tagih'   => format_uang($bayar),  //set value pembayaran dengan format IDR
            'sisa'        => format_uang($kembali),//set value sisa pembayaran dengan format IDR
            'bayar_tagih' => $bayar,              //Set value pembayaran
            'kembalirp'   => $kembali,
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
        $pembelian = Pembelian::findOrFail($request->id_pembelian);
        $pembelian->id_supplier   = $request->id_supplier;
        $pembelian->no_nota   = $request->no_nota;
        $pembelian->sub_total = $request->sub_total;

        if ($request->bayar >= $request->sub_total) {
            $pembelian->bayar = $request->sub_total;
            $pembelian->hutang = 0;

        }else {
            $pembelian->hutang = $request->bayar - $request->sub_total;
        }

        $pembelian->status = "ok";
        $pembelian->update();

        $pemDetail = PembelianDetail::where(['status'=>'pend'])->update(['status'=>'ok']);
        $bkk = KasKeluar::where(['status'=>'pend'])->update(['status'=>'ok']);

        return response()->json('Transaksi Berhasil', 200);
    }

    // Pembelian Detail
    public function detailPembelian($id){
        $detail = PembelianDetail::with('pembelian')->where('id_pembelian', $id)->get();
        $data   = array();
        foreach ($detail as $item) {
            $row = array();
            $row['id_akun']     = $item['id_akun'] ;
            $row['nama_barang'] = $item['nama_barang'];
            $row['jumlah']      = $item['jumlah'] .' '. $item['satuan'];
            $row['harga']       = 'Rp. '.  format_uang($item->harga);
            $row['sub_total']   = 'Rp. '.  format_uang($item->sub_total);
            $data[] = $row;
        }

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['id_akun','nama_barang', 'jumlah', 'harga', 'sub_total'])
            ->make(true);
    }
}
