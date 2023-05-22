<?php

namespace App\Http\Controllers;


use App\Models\KasKeluar;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class LapPembelianController extends Controller{
    public function index(){
        $bkk        = KasKeluar::sum('sub_total');
        return view('pages.lap_pembelian.index', compact('bkk'));
      }
      
      public function data(Request $request){
        // Merubah string to array
        $date = explode('-', $request->date);
        
        $pembelian = KasKeluar::orderBy('created_at', 'asc');
        if (count($date) == 2) {
            if ($date[0] != '') {
                $pembelian = $pembelian->whereDate('created_at', '>=', date('Y-m-d', strtotime($date[0])));
            }
            if ($date[1] != '') {
                $pembelian = $pembelian->whereDate('created_at', '<=', date('Y-m-d', strtotime($date[1])));
            }
        }
        $pembelian = $pembelian->get();

        $data   = array();
        $total_harga    = 0;
        $total_diterima = 0;
        $total_diskon   = 0;
        $total_piutang  = 0;
        foreach ($pembelian as $item) {
          $row = array();
          $row['created_at']      = $item['created_at']->translatedFormat('d F Y');
          $row['id_akun']         = $item['id_akun'];
          $row['uraian']          = $item['uraian'];
          $row['sub_total']       = 'Rp. '.format_uang($item->sub_total);
          $data[] = $row;
        }
  
        return datatables()
          ->of($data)
          ->addIndexColumn()
          ->rawColumns(['created_at', 'id_akun','uraian', 'sub_total'])
          ->make(true);
      }
}
