<?php

namespace App\Http\Controllers;

use App\Models\PenjualanDetail;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\OpsiPembayaran;
use Illuminate\Http\Request;
use DataTables;

class PenjualanDetailController extends Controller
{
    public function index(){
        $id_penjualan = session('id_penjualan');
        $produk       = Produk::get();
        $opsi_bayar   = OpsiPembayaran::get();
        $penjualan    = Penjualan::where('status_penjualan', 2)->orderBy('no_nota', 'desc')->first();

        if ($id_penjualan = session('id_penjualan')) {
            return view('pages.penjualan_detail.index', compact('id_penjualan', 'produk', 'penjualan', 'opsi_bayar'));
        }
    }


    public function data($id) {
        $detail = PenjualanDetail::with('produk')
            ->where('id_penjualan', $id)
            ->get();
        
        $data   = array();
        $total  = 0;
        $total_item = 0;

        foreach ($detail as $item) {
            $row = array();
            $row['nama_pesanan']    = $item['nama_pesanan'].'<br><small class="text-muted">'.
                                      $item->produk['nama_produk']. ' / ' .$item['det_pesanan']. ' - ' .$item['finishing_plong_qty']  ;
            $row['ukuran']          = $item['ukuran'];
            $row['harga']           = 'Rp. '.  format_uang($item->harga);
            $row['jumlah']          = $item['jumlah'].' '.$item['satuan'];
            $row['sub_total']       = 'Rp. '.  format_uang($item->sub_total);
            $row['action']          = '<button class="btn btn-sm btn-success mr-2 mt-2" onclick="editData(`'. route('transaksi-baru.update', $item->id_penjualan_detail) .'`)" title="Edit"><i class="fa fa-edit"></i></button>
                                       <button class="btn btn-sm btn-danger mt-2" onclick="deleteData(`'. route('transaksi-baru.destroy', $item->id_penjualan_detail) .'`)" title="Hapus"><i class="fas fa-trash"></i></button>
                                       ';
            $data[] = $row;

            $total      += $item->sub_total;
            $total_item += $item->jumlah;
        }
        $data[] = [
            'nama_pesanan'   => '<div class="total d-none">'. $total .'</div> <div class="total_item d-none">'. $total_item .'</div>',
            'ukuran'   => '',
            'harga'         => '',
            'jumlah'        => '',
            'sub_total'     => '',
            'action'        => '', 
           
        ];

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['action','nama_pesanan', 'ukuran', 'kode_produk', 'jumlah', 'satuan'])
            ->make(true);
    }

    public function store(Request $request){
        $produk = Produk::where('id_produk', $request->id_produk)->first();
        if(! $produk){
            return response()->json('Data gagal disimpan', 400);
        }

        $detail = new PenjualanDetail();
        $detail->id_penjualan = $request->id_penjualan;
        $detail->id_produk    = $produk->id_produk;
        $detail->nama_pesanan = $request->nama_pesanan;
        $detail->jumlah       = $request->jumlah;
        $detail->satuan       = $request->satuan;
        if ($request->ukuran_p && $request->ukuran_l != 0) {
            $detail->ukuran   = $request->ukuran_p.'m x '.$request->ukuran_l.'m';
        }else{
            $detail->ukuran   = $request->ukuran;
        }
        $detail->ukuran_p     = $request->ukuran_p;
        $detail->ukuran_l     = $request->ukuran_l;
        $detail->is_plong     = $request->is_plong;
        $detail->finishing_plong_qty     = $request->finishing_plong_qty;
        $detail->finishing_plong_harga   = $request->finishing_plong_harga;
        $detail->det_pesanan  = $request->det_pesanan;
        $detail->harga        = $request->harga;
        
        //PERHITUNGAN SUB_TOTAL
        if ($request->ukuran_p && $request->ukuran_l != 0) {
            $detail->sub_total = $request->jumlah * ($request->ukuran_p * $request->ukuran_l * $request->harga + $request->finishing_plong_qty * $request->finishing_plong_harga);
        }else{
            $detail->sub_total = $request->jumlah * $request->harga;
        }
        $detail->save();
        
        return response()->json('Data berhasil disimpan', 200);
    }

    public function show($id) {
        $detail = PenjualanDetail::find($id);
        return response()->json($detail);
    }

    public function update(Request $request, $id){
        $produk = Produk::where('id_produk', $request->id_produk)->first();

        $detail = PenjualanDetail::find($id);
        $detail->id_penjualan = $request->id_penjualan;
        $detail->id_produk    = $produk->id_produk;
        $detail->nama_pesanan = $request->nama_pesanan;
        $detail->jumlah       = $request->jumlah;
        $detail->satuan       = $request->satuan;
        if ($request->ukuran_p && $request->ukuran_l != 0) {
            $detail->ukuran   = $request->ukuran_p.'m x '.$request->ukuran_l.'m';
        }else{
            $detail->ukuran   = $request->ukuran;
        }
        $detail->ukuran_p     = $request->ukuran_p;
        $detail->ukuran_l     = $request->ukuran_l;
        $detail->is_plong     = $request->is_plong;
        $detail->finishing_plong_qty     = $request->finishing_plong_qty;
        $detail->finishing_plong_harga   = $request->finishing_plong_harga;
        $detail->det_pesanan  = $request->det_pesanan;
        $detail->harga        = $request->harga;
        
        //PERHITUNGAN SUB_TOTAL
        if ($request->ukuran_p && $request->ukuran_l != 0) {
            $detail->sub_total = $request->jumlah * ($request->ukuran_p * $request->ukuran_l * $request->harga + $request->finishing_plong_qty * $request->finishing_plong_harga);
        }else{
            $detail->sub_total = $request->jumlah * $request->harga;
        }
        $detail->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
       $detail = PenjualanDetail::find($id);
       $detail->delete();

       return response(null, 204);
    }

    public function loadForm($diskon = 0, $total, $diterima){
        $bayar      = $total - $diskon;
        $kembali    = ($diterima != 0) ? $diterima - $bayar : 0;
        $data       = [
            'subtotal'      => format_uang($total), //Get value subtotal
            'tot_tagih'     => format_uang($bayar), //get value pembayaran dengan format IDR
            'bayar_tagih'   => $bayar,              //Set value pembayaran
            'kembalirp'     => $kembali,
            'sisa'          => format_uang($kembali)
        ];

        return response()->json($data);
    }
    
}
