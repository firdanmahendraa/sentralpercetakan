<?php

namespace App\Http\Controllers;

use App\Models\KasMasuk;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller{
   public function __construct(){
      $this->middleware('auth');
   }

   public function index(){
      $now        = Carbon::now()->translatedFormat('l, d F Y');
      $bkm        = KasMasuk::whereDate('created_at', Carbon::now())->sum('debet');
      $bkm_month  = KasMasuk::whereMonth('created_at', Carbon::now()->month)->sum('debet');
      $bkk        = Pembelian::whereDate('updated_at', Carbon::now())->sum('bayar');
      $bkk_month  = Pembelian::whereMonth('updated_at', Carbon::now()->month)->sum('bayar');
      $bkk_tot        = Pembelian::whereDate('updated_at', Carbon::now())->sum('sub_total');
      $bkk_month_tot  = Pembelian::whereMonth('updated_at', Carbon::now()->month)->sum('sub_total');
      // dd($kasmasuk);
      return view('dashboard', compact('now', 'bkm', 'bkm_month', 'bkk', 'bkk_month', 'bkk_tot', 'bkk_month_tot'));
   }

}
