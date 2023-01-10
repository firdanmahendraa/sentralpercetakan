<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use DataTables, DB;

class PenjualanController extends Controller
{
    public function index(Request $request){
        $data = Penjualan::where('status_penjualan', ! 0)->orderBy('created_at', 'desc')->get();
        if($request->ajax()){
            $allData = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('total_harga', function($row) {
                return 'Rp. '.  format_uang($row->total_harga);
            })
            ->addColumn('action', function($row){
                return '
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-success" title="Lihat"><i class="fas fa-eye"></i></button>
                    <button type="button" class="btn btn-sm btn-warning" style="color:#fff" title="Edit"><i class="fas fa-pencil-alt"></i></button>
                    <button type="button" class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-default" title="Cetak"><i class="fas fa-file"></i></button>
                </div>
                ';
            })
            ->rawColumns(['action', 'total_harga'])
            ->make(true);
            return $allData;
        }
        return view('pages.penjualan.index');
    }

    public function create(){
        $penjualan = Penjualan::where('status_penjualan', 0)->delete();
        if (!empty($penjualan)) {
            $penjualan = Penjualan::where('status_penjualan', !0)->orderBy('no_nota', 'desc')->first();
        }

        $penjualan = new Penjualan;
        $penjualan['no_nota'] = tambah_nol_didepan(1, 5);
        $penjualan->id_akun = 1;
        $penjualan->id_pelanggan = 1;
        $penjualan->acc_desain = 1;
        $penjualan->total_item = 0;
        $penjualan->total_harga = 0;
        $penjualan->diskon = 0;
        $penjualan->diterima = 0;
        $penjualan->kembali = 0;
        $penjualan->opsi_pembayaran = 1;
        $penjualan->id_user = auth()->id();
        $penjualan->status_penjualan = 0;
        $penjualan->save();

        session(['id_penjualan' => $penjualan->id_penjualan]);
        return redirect()->route('transaksi-baru.index');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
