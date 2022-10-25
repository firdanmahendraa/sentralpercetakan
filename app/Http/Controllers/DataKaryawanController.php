<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class DataKaryawanController extends Controller{
    public function index(Request $request){
        $karyawan = DataKaryawan::get();
        if($request->ajax()){
            $allData = DataTables::of($karyawan)
            ->addIndexColumn()
            ->addColumn('selectAll', function($karyawan){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $karyawan->id .'">
                ';
            })
            ->addColumn('kode_karyawan', function($karyawan) {
                return '<span class="badge badge-success">'. $karyawan->kode_karyawan .'</span>';
            })
            ->addColumn('action', function($row){
                return '
                    <button class="btn btn-success btn-sm" onclick="editForm(`'. route('data-karyawan.update', $row->id) .'`)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-karyawan.destroy', $row->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['selectAll', 'kode_karyawan', 'action'])
            ->make(true);
            return $allData;
        }
        return view('pages.data-karyawan.index',compact('karyawan'));
    }

    public function create(){
        // 
    }

    public function store(Request $request) {
        $karyawan = DataKaryawan::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $karyawan = DataKaryawan::find($id);
        return response()->json($karyawan);
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id){
        $karyawan = DataKaryawan::find($id);
        $karyawan->nik = $request->nik;
        $karyawan->nama = $request->nama;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->tanggal_lahir = $request->tanggal_lahir;
        $karyawan->alamat = $request->alamat;
        $karyawan->telepon = $request->telepon;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $karyawan = DataKaryawan::find($id);
        $karyawan->delete();
        return response(null, 204);
    }

    public function trash(Request $request){
        $karyawan = DataKaryawan::onlyTrashed()->get();
        if ($request->ajax()) {
            $allData = DataTables::of($karyawan)
            ->addIndexColumn()
            ->addColumn('selectAll', function($karyawan){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $karyawan->id .'">
                ';
            })
            ->addColumn('action', function($karyawan){
                return '
                    <a href="'. url('data-karyawan/restore/'.$karyawan->id) .'" class="btn btn-info btn-sm btn_restore">Restore Permanently</a>
                    <a href="'. url('data-karyawan/delete/'.$karyawan->id) .'" class="btn btn-danger btn-sm btn_delete">Delete Permanantly</a>
                ';
            })
            ->rawColumns(['action', 'selectAll'])
            ->make(true);
            return $allData;
        }
        return view('pages.data-karyawan.trash');
    }
}
