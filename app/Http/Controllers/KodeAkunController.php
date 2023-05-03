<?php

namespace App\Http\Controllers;

use App\Models\KodeAkun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables, Carbon\Carbon;

class KodeAkunController extends Controller{

    public function index(Request $request){
        $kategori = KodeAkun::orderByRaw('CONVERT(id, SIGNED) asc')->get();
        if ($request->ajax()) {
            $allData = DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('action', function($kategori){
                return '
                    <button class="btn btn-success btn-sm editData" data-id="'.$kategori->id.'">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-akun.destroy', $kategori->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.kode-akun.index', compact('kategori'));
    }


    public function store(Request $request) {
        $kodeAkun = KodeAkun::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $kategori = KodeAkun::find($id);
        return response()->json($kategori);
    }


    public function update(Request $request, $id){
        $kodeAkun = KodeAkun::find($id);
        $kodeAkun->id = $request->id;
        $kodeAkun->nama_akun = $request->nama_akun;
        $kodeAkun->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $kodeAkun = KodeAkun::find($id);
        $kodeAkun->delete();
        return response(null, 204);
    }

    public function trash(Request $request){
        $akun = KodeAkun::onlyTrashed()->get();
        if ($request->ajax()) {
            $allData = DataTables::of($akun)
            ->addIndexColumn()
            ->addColumn('selectAll', function($data){
                return '
                    <input type="checkbox" name="ids" class="selectOne" id="checkbox_ids'. $data->id .'" value="'. $data->id .'">
                ';
            })
            ->addColumn('deleted_at', function($data){
                return '
                    Dihapus pada '. $data->deleted_at->translatedFormat('d F Y') .'
                ';
            })
            ->rawColumns(['deleted_at', 'selectAll'])
            ->make(true);
            return $allData;
        }
        return view('pages.kode-akun.trash');
    }

    public function restore(Request $request){
        $ids = $request->ids;
        KodeAkun::onlyTrashed()->whereIn('id', $ids)->restore();
        
        return response()->json(["success" => "Data berhasil di restore!"]);
    }

    public function delete(Request $request){
        $ids = $request->ids;
        KodeAkun::onlyTrashed()->whereIn('id', $ids)->forceDelete();
        
        return response()->json(["success" => "Data berhasil di hapus!"]);
    }
}
