<?php

namespace App\Http\Controllers;


use App\Models\KasMasuk;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class LapPendapatanController extends Controller{
    public function index(){
      return view('pages.lap_pendapatan.index');
    }
    
    public function data(Request $request){
      // Merubah string to array
      $date = explode('-', $request->date);
      
      $pendapatan = KasMasuk::with('det_bayar')->orderBy('created_at', 'asc');
      if (count($date) == 2) {
          if ($date[0] != '') {
              $pendapatan = $pendapatan->whereDate('created_at', '>=', date('Y-m-d', strtotime($date[0])));
          }
          if ($date[1] != '') {
              $pendapatan = $pendapatan->whereDate('created_at', '<=', date('Y-m-d', strtotime($date[1])));
          }
      }
      $pendapatan = $pendapatan->get();

      $data   = array();
      foreach ($pendapatan as $item) {
        $row = array();
        $row['created_at']   = $item['created_at']->translatedFormat('d F Y');
        $row['id_akun']      = $item['id_akun'];
        $row['uraian']       = $item['uraian'];
        $row['no_nota']      = $item->det_bayar['no_nota'];
        $row['debet']        = $item->debet;
        $data[] = $row;

      }

      return datatables()
        ->of($data)
        ->addIndexColumn()
        ->rawColumns(['created_at', 'id_akun','uraian', 'no_nota', 'debet'])
        ->make(true);
    }
}
