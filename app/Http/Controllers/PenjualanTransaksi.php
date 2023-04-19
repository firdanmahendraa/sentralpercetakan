<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanTransaction;
use App\Models\Produk;
use App\Models\Customer;
use App\Models\OpsiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables, Carbon\Carbon;

class PenjualanTransaksi extends Controller{
    public function index(){
        $produk       = Produk::get();
        $customer     = Customer::get();
        $opsi_bayar   = OpsiPembayaran::get();

        //Generate nomor nota
        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $yearNow = substr($year, 2);
        $data = Penjualan::count();        
        if ($data == null) {
            $numb = '0001';
            $transcation_code = 'NT' . $yearNow . $month . $numb;
        }else {
            $last = Penjualan::orderBy('id_penjualan', 'desc')->first();
            $lastNumb = substr($last->no_nota, 6);
            $transcation_code = 'NT' . $yearNow . $month . str_pad($lastNumb + 1, 4, 0, STR_PAD_LEFT);

            if ($last->created_at->format('m') != $month) {
                $numb = '0001';
                $transcation_code = 'NT' . $yearNow . $month . $numb;
            }
            
        }

        return view('pages.penjualan_detail.index', compact('produk', 'customer', 'opsi_bayar', 'transcation_code'));
    }

    public function store(Request $request){
        $produk = Produk::where('id_produk', $request->id_produk)->first();
        if(! $produk){
            return response()->json('Data gagal disimpan', 400);
        }

        $detail = new PenjualanTransaction();
        // $detail->id_penjualan = $request->id_penjualan;
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

    public function transactionCart(Request $request){
        if($request->ajax()){
            $detail = PenjualanTransaction::with('produk')->get();
            return DataTables::of($detail)
                ->addIndexColumn()
                ->addColumn('nama_pesanan', function($item) {
                    if ($item->finishing_plong_qty == null & $item->det_pesanan == null) {
                        return $item->nama_pesanan .'<br><small class="text-muted">'.
                               $item->produk['nama_produk'];
                    }elseif ($item->finishing_plong_qty == null) {
                        return $item->nama_pesanan .'<br><small class="text-muted">'.
                               $item->produk['nama_produk']. ' / ' . $item->det_pesanan;
                    }elseif ($item->det_pesanan == null) {
                        return $item->nama_pesanan .'<br><small class="text-muted">'.
                               $item->produk['nama_produk'];
                    }else {
                        return $item->nama_pesanan .'<br><small class="text-muted">'.
                               $item->produk['nama_produk']. ' / ' . $item->det_pesanan. ' / ' .$item->finishing_plong_qty;
                    }
                })
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
                    return '<button class="btn btn-sm btn-success mr-2 mt-2 editData" data-id="'.$item->id.'" title="Edit"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger mt-2" onclick="deleteData(`'. route('transaksi-baru.destroy', $item->id) .'`)" title="Hapus"><i class="fas fa-trash"></i></button>
                    ';
                })
                ->rawColumns(['nama_pesanan', 'action'])
                ->make(true);
        }
    }

    public function show($id) {
        $detail = PenjualanTransaction::find($id);
        return response()->json($detail);
    }

    public function update(Request $request, $id){
        $produk = Produk::where('id_produk', $request->id_produk)->first();
        
        $detail = PenjualanTransaction::find($id);
        // $detail->id_penjualan = $request->id_penjualan;
        // $detail->id_produk    = $produk->id_produk;
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
       $detail = PenjualanTransaction::find($id);
       $detail->delete();

       return response(null, 204);
    }

    public function getCustomer(){
        $customer = Customer::get();
        return response()->json($customer);
    }

    public function loadForm($diskon = 0, $total, $diterima){
        $total    = PenjualanTransaction::sum('sub_total');
        $total_item    = PenjualanTransaction::sum('jumlah');
        $bayar      = $total - $diskon;
        $kembali    = ($diterima != 0) ? $diterima - $bayar : 0;
        $data       = [
            'subtotal'      => format_uang($total), //Get value subtotal
            'tot_tagih'     => format_uang($bayar), //get value pembayaran dengan format IDR
            'bayar_tagih'   => $bayar,              //Set value pembayaran
            'kembalirp'     => $kembali,
            'sisa'          => format_uang($kembali),
            'tot_item'    => $total_item
        ];

        return response()->json($data);
    }

}