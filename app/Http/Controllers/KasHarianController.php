<?php

namespace App\Http\Controllers;

use App\Models\KasMasuk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KasHarianController extends Controller{
    public function index(){
        $bkm        = KasMasuk::whereDate('created_at', Carbon::now())->sum('debet');
        $kasmasuk   = KasMasuk::whereDate('created_at', Carbon::now())->with('penjualan','customer')->get();
        
        return view('pages.kas_masuk.index', compact('kasmasuk', 'bkm'));
    }
}
