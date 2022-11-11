<?php

namespace App\Http\Controllers;

use App\Models\PiutangKaryawan;
use App\Models\PiutangKaryawanDetail;
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
            ->addColumn('jml_pengajuan', function($row) {
                return 'Rp. '.  format_uang($row->jml_pengajuan);
            })
            ->addColumn('action', function($row){
                if ($row->status == 'pending') {
                    return '
                    <button class="btn btn-success btn-sm">Terima</button>
                    <button class="btn btn-danger btn-sm">Tolak</button>
                ';
                }elseif($row->status == 'diterima'){
                    return '
                    <a class="btn btn-success btn-sm" href="'. route('piutang-karyawan.detail', $row->id_piutang_karyawan) .'">Detail</a>
                ';
                }
            })
            ->rawColumns(['action','status', 'jml_pengajuan'])
            ->make(true);
            return $allData;
        }
        $pengajuan['id_karyawan'] = DataKaryawan::all();
        return view('pages.piutang-karyawan.index',compact('pengajuan'));
    }
    
    public function store(Request $request) {
        $pengajuan = PiutangKaryawan::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function detail(Request $request){
        $data = PiutangKaryawanDetail::get();   
        // $data = PiutangKaryawanDetail::join('piutang_karyawan','piutang_karyawan.id_piutang_karyawan','piutang_karyawan_detail.id_piutang_karyawan')->get();   
        if($request->ajax()){
            $allData = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('debit', function($row) {
                return 'Rp. '.  format_uang($row->debit);
            })
            ->addColumn('kredit', function($row) {
                return 'Rp. '.  format_uang($row->kredit);
            })
            ->addColumn('total_piutang', function($row) {
                return 'Rp. '.  format_uang($row->total_piutang);
            })
            ->addColumn('sisa_saldo', function($row) {
                return 'Rp. '.  format_uang($row->sisa_saldo);
            })
            ->rawColumns(['debit','kredit','total_piutang','sisa_saldo'])
            ->make(true);
            return $allData;
        }
        // $data['id_piutang_karyawan'] = PiutangKaryawan::all();
        // $data['id_karyawan'] = DataKaryawan::all();
        return view('pages.piutang-karyawan.detail',compact('data'));
    }

    public function update(Request $request, $id){
        // 
    }

    public function destroy($id){
        // 
    }
}
