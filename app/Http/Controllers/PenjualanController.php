<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\KasMasuk;
use App\Models\User;
use App\Models\Produk;
use App\Models\OpsiPembayaran;
use App\Models\Customer;
use App\Models\Setting;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class PenjualanController extends Controller{
    public function index(){
        return view('pages.penjualan.index');
    }

    public function data(Request $request){
        $date = explode('-', $request->date);
        $penjualan = Penjualan::with('customer','det_pembayaran')
          ->where('status_penjualan', '>', 0)->orderBy('created_at', 'desc')->get();
  
        $data   = array();
        $total_harga    = 0;
        $total_diterima = 0;
        $total_diskon   = 0;
        $total_piutang  = 0;
        foreach ($penjualan as $item) {
          $row = array();
          $row['created_at']      = $item['created_at']->translatedFormat('d F Y');
          $row['no_nota']         = 'NT-'.$item['no_nota'];
          $row['nama_pelanggan']  = $item->customer['nama_pelanggan'];
          $row['total_harga']     = 'Rp. '.format_uang($item->total_harga);
          $row['diterima']        = 'Rp. '.format_uang($item->diterima);
          $row['diskon']          = 'Rp. '.format_uang($item->diskon);
          $row['piutang']         = 'Rp. '.format_uang($item->piutang);
          $row['opsi_pembayaran'] = $item->det_pembayaran['opsi_pembayaran'];
          if ($item->kembali < 0) {
            $row['action']        = '
              <div class="btn-group">
                <a href="'.route('transaksi-penjualan.show', $item->id_penjualan).'" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> &nbsp; Detail</a>
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <button onclick="cetakInvoice(`'. route('transaksi-penjualan.invoice', $item->id_penjualan) .'`)" class="dropdown-item" href="#"><i class="fas fa-barcode"></i> &nbsp;Cetak</button>
                    <a class="dropdown-item" href="'. route('transaksi-penjualan.pelunasan', $item->id_penjualan).'"><i class="fas fa-check"></i> &nbsp;Pelunasan</a>
                    <a class="dropdown-item" href="'. route('transaksi-penjualan.edit', $item->id_penjualan) .'"><i class="fas fa-pencil-alt"></i> &nbsp;Edit</a>
                  </div>
                </div>
              </div>
              <a class="btn btn-sm btn-success" href=""><i class="fab fa-whatsapp text-white"></i></a>
            ';
          }else {
            $row['action']        = '
              <div class="btn-group">
                <a href="'.route('transaksi-penjualan.show', $item->id_penjualan).'" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> &nbsp; Detail</a>
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown"></button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <button onclick="cetakInvoice(`'. route('transaksi-penjualan.invoice', $item->id_penjualan) .'`)" class="dropdown-item" href="#"><i class="fas fa-barcode"></i> &nbsp;Cetak</button>
                    <a class="dropdown-item" href="'. route('transaksi-penjualan.edit', $item->id_penjualan) .'"><i class="fas fa-pencil-alt"></i> &nbsp;Edit</a>
                  </div>
                </div>
              </div>
              <a class="btn btn-sm btn-success" href=""><i class="fab fa-whatsapp text-white"></i></a>
            ';
          }
          $data[] = $row;
  
          $total_harga    += $item->total_harga;
          $total_diterima += $item->diterima;
          $total_diskon   += $item->diskon;
          $total_piutang  += $item->piutang;
        }
        $data[] = [
          'created_at'       => '',
          'no_nota'          => '',
          'nama_pelanggan'   => '<div class="text-right"><b>Total</b></div>',
          'total_harga'      => '<b>Rp. '.format_uang($total_harga) .'</b>',
          'diterima'         => '<b>Rp. '.format_uang($total_diterima) .'</b>',
          'diskon'           => '<b>Rp. '.format_uang($total_diskon) .'</b>', 
          'piutang'          => '<b>Rp. '.format_uang($total_piutang) .'</b>',
          'opsi_pembayaran'  => '', 
          'action'           => '', 
        ];
  
        return datatables()
          ->of($data)
          ->addIndexColumn()
          ->rawColumns(['created_at', 'no_nota','nama_pelanggan', 'total_harga', 'diterima', 'diskon', 'piutang', 'opsi_pembayaran', 'action'])
          ->make(true);
    }

    public function create(){

    }

    public function store(Request $request){
        DB::beginTransaction();
        try {
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
            $penjualan->total_item  = $request->total_item;
            $penjualan->total_harga = $request->total_harga;
            $penjualan->diskon      = $request->diskon;

            if ($request->diterima >= $request->total_harga) {
                $penjualan->diterima = $request->total_harga;
            }else {
                $penjualan->diterima = $request->diterima;
            }

            $penjualan->kembali     = $request->diterima - $request->total_harga;

            if ($request->kembali  >= 0) {
                $penjualan->piutang = 0;
            }else {
                $penjualan->piutang = $penjualan->kembali;
            }

            $penjualan->id_user = auth()->id();
            $penjualan->id_akun = $request->id_akun;
            
            if ($request->id_bkm == NULL) {
              $history = new KasMasuk;
              
              $last = Penjualan::latest()->first();
              $history->id_penjualan = $last->id_penjualan ;
              if ($request->debet >= $request->total_harga) {
                  $history->debet = $request->total_harga;
              }else {
                  $history->debet = $request->diterima;
              }
              $history->opsi_pembayaran = $request->opsi_pembayaran;
              $history->save();

              $penjualan->id_bkm = $insertedId = $history->id;
            }

            $penjualan->save();
            DB::commit(); 
            // dd($penjualan);
            // $id = $insertedId = $penjualan->id_penjualan;
            // $detail = Penjualan::with('users')->find($id);
            // $total  = PenjualanDetail::where('id_penjualan' , $id)->sum('sub_total');
            // $det_history      = PenjualanHistori::with(['history'])->where('id_penjualan' , $id)->get();
            // $penjualan_detail = PenjualanDetail::with(['produk','penjualan'])->where('id_penjualan' , $id)->get();
            // $response   = json_encode([
            //     'success' => true
            // ]);
            // return $penjualan;
            // return view('pages.penjualan.detail', compact('response'));
            return response()->json('Data berhasil Disimpan', 200);
        } catch (Exception $e) {
            DB::rollback();
            $response =array(
                'success' => false,
                'message' => $e->getMessage()
            );
            return view('pages.penjualan.detail', compact('response'));
        }
        
    }

    public function show($id){
        $detail = Penjualan::with('users')->find($id);
        $total  = PenjualanDetail::where('id_penjualan' , $id)->sum('sub_total');
        $det_history      = PenjualanHistori::with(['history'])->where('id_penjualan' , $id)->get();
        $penjualan_detail = PenjualanDetail::with(['produk','penjualan'])->where('id_penjualan' , $id)->get();
        
        return view('pages.penjualan.detail', compact('penjualan_detail','total','det_history'))->with('detail', $detail);
    }

    public function cetakInvoice($id){
        $setting   = Setting::first();
        $penjualan = Penjualan::with('users')->find($id);
        $total  = PenjualanDetail::where('id_penjualan' , $id)->sum('sub_total');
        $det_penjualan = PenjualanDetail::with(['produk','penjualan'])->where('id_penjualan' , $id)->get();
        return view('pages.penjualan.invoice', compact('setting', 'det_penjualan', 'total'))->with('penjualan', $penjualan);
    }

    public function edit(Request $request, $id){
        $id_penjualan = Penjualan::with('users')->find($id);
        $produk       = Produk::get();
        $customer     = Customer::get();
        $opsi_bayar   = OpsiPembayaran::get();
        if($request->ajax()){
            return response()->json($id_penjualan);
        }
        return view('pages.penjualan_detail.index',compact('produk', 'customer', 'opsi_bayar', 'id_penjualan'));
    }

    public function pelunasan($id){
        $pelunasan = Penjualan::with('customer')->find($id);
        $opsi_bayar   = OpsiPembayaran::get();
        return view('pages.penjualan.pelunasan',compact('opsi_bayar','pelunasan'));
    }

    
}
