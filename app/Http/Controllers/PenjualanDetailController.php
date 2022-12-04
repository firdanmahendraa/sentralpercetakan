<?php

namespace App\Http\Controllers;

use App\Models\PenjualanDetail;
use App\Models\Produk;
use App\Models\DataKaryawan;
use App\Models\Member;
use Illuminate\Http\Request;

class PenjualanDetailController extends Controller
{
    public function index(){
        $id_penjualan = session('id_penjualan');
        $produk     = Produk::orderBy('nama_produk')->get();

        if ($id_penjualan = session('id_penjualan')) {
            return view('pages.penjualan_detail.index', compact('id_penjualan', 'produk'));
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
            $row['kode_produk']     = $item->produk['kode_produk'];
            $row['nama_produk']     = $item->produk['nama_produk'];
            $row['harga']           = 'Rp. '.  format_uang($item->harga);
            $row['jumlah']          = '<input type="number" class="form-control form-control-sm jumlah" data-id="'. $item->id_penjualan_detail .'" value="'.$item->jumlah.'">';
            $row['satuan_produk']   = $item->produk['satuan_produk'];
            $row['sub_total']       = 'Rp. '.  format_uang($item->sub_total);
            $row['action']          = '<button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('transaksi-detail.destroy', $item->id_penjualan_detail) .'`)">Hapus </button>';
            $data[] = $row;

            $total      += $item->harga * $item->jumlah;
            $total_item += $item->jumlah;
        }
        $data[] = [
            'kode_produk'   => '<div class="total d-none">'. $total .'</div> <div class="total_item d-none">'. $total_item .'</div>',
            'nama_produk'   => '',
            'harga'         => '',
            'jumlah'        => '',
            'satuan_produk' => '',
            'sub_total'     => '',
            'action'        => '', 
           
        ];

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['action','kode_produk', 'jumlah', 'satuan'])
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
        $detail->jumlah       = 1;
        $detail->satuan       = $produk->satuan_produk;
        $detail->harga        = $produk->harga_produk;
        $detail->sub_total    = $produk->harga_produk;
        $detail->save();
        
        return response()->json('Data berhasil disimpan', 200);
    }

    public function update(Request $request, $id){
        $detail = PenjualanDetail::find($id);
        $detail->jumlah = $request->jumlah;
        $detail->sub_total = $detail->harga * $request->jumlah;
        $detail->update();
    }

    public function destroy($id){
       $detail = PenjualanDetail::find($id);
       $detail->delete();

       return response(null, 204);
    }

    public function loadForm($diskon = 0, $total, $diterima){
        $bayar      = $total - ($diskon / 100 * $total);
        $kembali    = ($diterima != 0) ? $diterima - $bayar : 0;
        $data       = [
            'totalrp'   => format_uang($total),
            'bayar'     => $bayar,
            'bayarrp'   => format_uang($bayar),
            'kembalirp' => $kembali,
            'sisa'      => format_uang($kembali)
        ];

        return response()->json($data);
    }
    
}
