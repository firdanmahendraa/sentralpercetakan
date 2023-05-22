<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class LapPiutangController extends Controller{
    public function index(Request $request){
        $penjualan = Penjualan::with('customer')->where(['keterangan'=>'piutang'])->orderBy('created_at', 'desc')->get();
        if($request->ajax()){
            $data = DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('created_at', function($item) {
                return $item->created_at->translatedFormat('d F Y');
            })
            ->addColumn('nama_pelanggan', function($item) {
                return $item->customer['nama_pelanggan'];
            })
            ->addColumn('total_harga', function($item) {
                return 'Rp. '. format_uang($item->total_harga);
            })
            ->addColumn('diterima', function($item) {
                return 'Rp. '. format_uang($item->diterima);
            })
            ->addColumn('diskon', function($item) {
                return 'Rp. '. format_uang($item->diskon);
            })
            ->addColumn('piutang', function($item) {
                return 'Rp. '. format_uang($item->piutang);
            })
            ->addColumn('action', function($item){
                return '<div class="btn-group">
                            <a href="'.url('transaksi-penjualan/detail/'. $item->id_penjualan, $item->no_nota).'" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> &nbsp; Detail</a>
                        </div>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $data;
        }

        $harga_akhir = Penjualan::sum('harga_akhir');
        $diterima    = Penjualan::sum('diterima');
        $diskon    = Penjualan::sum('diskon');
        $piutang    = Penjualan::sum('piutang');
        return view('pages.lap_piutang.index', compact('harga_akhir', 'diterima', 'diskon', 'piutang'));
    }
}
