<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use DataTables;

class PenjualanController extends Controller
{
    public function index(Request $request){
        // $data = PiutangKaryawan::join('mst_data_karyawan','mst_data_karyawan.id','piutang_karyawan.id_karyawan')->get();   
        $data = Penjualan::get();
        if($request->ajax()){
            $allData = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('total_harga', function($row) {
                return 'Rp. '.  format_uang($row->total_harga);
            })
            ->addColumn('action', function($row){
                return '
                    <button class="btn btn-success btn-sm">Terima</button>
                    <button class="btn btn-danger btn-sm">Tolak</button>
                ';
            })
            ->rawColumns(['action', 'total_harga'])
            ->make(true);
            return $allData;
        }
        // $data['id_karyawan'] = DataKaryawan::all();
        return view('pages.penjualan.index');
    }
    public function create()
    {
        $penjualan = new Penjualan();
        $penjualan->nama_pemesan = 1;
        $penjualan->alamat_pemesan = 1;
        $penjualan->telepon_pemesan = 1;
        $penjualan->acc_desain = 1;
        $penjualan->total_item = 0;
        $penjualan->total_harga = 0;
        $penjualan->diskon = 0;
        $penjualan->bayar = 0;
        $penjualan->diterima = 0;
        $penjualan->id_user = auth()->id();
        $penjualan->save();

        session(['id_penjualan' => $penjualan->id_penjualan]);
        return redirect()->route('transaksi-detail.index');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
