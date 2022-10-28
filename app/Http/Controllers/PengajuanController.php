<?php

namespace App\Http\Controllers;

use App\Models\PiutangKaryawan;
use App\Models\DataKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class PengajuanController extends Controller{
    public function index(Request $request){
        $pengajuan = PiutangKaryawan::join('mst_data_karyawan','mst_data_karyawan.id','piutang_karyawan.id_karyawan')->get();   
        // $pengajuan = PiutangKaryawan::get();
        if($request->ajax()){
            $allData = DataTables::of($pengajuan)
            ->addIndexColumn()
            ->addColumn('status', function($row){
                if ($row->status == 'diterima') {
                    return '<span class="badge badge-success">'. $row->status .'</span>';
                }elseif ($row->status == 'ditolak'){
                    return '<span class="badge badge-danger">'. $row->status .'</span>';
                }else{
                    return '<span class="badge badge-secondary">'. $row->status .'</span>';
                }
            })
            ->addColumn('saldo', function($produk) {
                return format_uang($produk->saldo);
            })
            ->addColumn('action', function($row){
                if ($row->status == 'pending') {
                    return '
                    <button class="btn btn-success btn-sm">Terima</button>
                    <button class="btn btn-danger btn-sm">Tolak</button>
                ';
                }
            })
            ->rawColumns(['action','status', 'saldo'])
            ->make(true);
            return $allData;
        }
        $pengajuan['id_karyawan'] = DataKaryawan::all();
        return view('pages.pengajuan-piutang.index',compact('pengajuan'));
    }
    
    public function store(Request $request) {
        $pengajuan = PiutangKaryawan::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $pengajuan = PiutangKaryawan::find($id);
        return response()->json($pengajuan);
    }

    public function update(Request $request, $id){
        $pengajuan = PiutangKaryawan::find($id);
        $pengajuan->nama_pengajuan = $request->nama_pengajuan;
        $pengajuan->alamat_pengajuan = $request->alamat_pengajuan;
        $pengajuan->telepon_pengajuan = $request->telepon_pengajuan;
        $pengajuan->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $pengajuan = PiutangKaryawan::find($id);
        $pengajuan->delete();
        return response(null, 204);
    }
}
