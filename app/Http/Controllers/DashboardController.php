<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\KasMasuk;
use App\Models\KasKeluar;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller{
   public function __construct(){
      $this->middleware('auth');
   }

   public function index(Request $request){
      $now        = Carbon::now()->translatedFormat('l, d F Y');
      $bkm        = KasMasuk::whereDate('created_at', Carbon::now())->sum('debet');
      $bkm_month  = KasMasuk::whereMonth('created_at', Carbon::now()->month)->sum('debet');
      $bkk        = KasKeluar::whereDate('created_at', Carbon::now())->sum('sub_total');
      $bkk_month  = KasKeluar::whereMonth('created_at', Carbon::now()->month)->sum('sub_total');
      $income       = $bkm - $bkk;
      $income_month = $bkm_month - $bkk_month;
      $countHutang = abs(Pembelian::sum('hutang'));
      $countPiutang = abs(Penjualan::sum('piutang'));


      return view('dashboard', compact('now', 'bkm', 'bkm_month', 'bkk', 'bkk_month', 'income', 'income_month', 'countPiutang', 'countHutang'));
   }

   public function LoadSales(Request $request) {
      // Merubah string to array
      $date = explode('-', $request->date);
      $penjualan = KasMasuk::orderBy('created_at', 'asc');
      if (count($date) == 2) {
          if ($date[0] != '') {
              $penjualan = $penjualan->whereDate('created_at', '>=', date('Y-m-d', strtotime($date[0])));
          }
          if ($date[1] != '') {
              $penjualan = $penjualan->whereDate('created_at', '<=', date('Y-m-d', strtotime($date[1])));
          }
      }
      $penjualan = $penjualan->sum('debet');

      $pembelian = KasKeluar::orderBy('created_at', 'asc');
      if (count($date) == 2) {
          if ($date[0] != '') {
              $pembelian = $pembelian->whereDate('created_at', '>=', date('Y-m-d', strtotime($date[0])));
          }
          if ($date[1] != '') {
              $pembelian = $pembelian->whereDate('created_at', '<=', date('Y-m-d', strtotime($date[1])));
          }
      }
      $pembelian = $pembelian->sum('sub_total');
      
      $income = $penjualan - $pembelian;

      return response()->json([$penjualan,$pembelian,$income]);
   }

}
