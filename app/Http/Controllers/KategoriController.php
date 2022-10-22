<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class KategoriController extends Controller{

    public function index(Request $request){
        $kategori = Kategori::get();
        if ($request->ajax()) {
            $allData = DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('action', function($kategori){
                return '
                    <button class="btn btn-success btn-sm" onclick="editForm(`'. route('data-kategori.update', $kategori->id) .'`)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-kategori.destroy', $kategori->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.kategori.index', compact('kategori'));
    }

    public function create(){
        // 
    }

    public function store(Request $request) {
        $kategori = Kategori::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $kategori = Kategori::find($id);
        return response()->json($kategori);
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id){
        $kategori = Kategori::find($id);
        $kategori->kode_kategori = $request->kode_kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $kategori = Kategori::find($id);
        $kategori->delete();
        return response(null, 204);
    }

    public function trash(Request $request){
        $kategori = Kategori::onlyTrashed()->get();
        if ($request->ajax()) {
            $allData = DataTables::of($kategori)
            ->addIndexColumn()
            ->addColumn('selectAll', function($kategori){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $kategori->id .'">
                ';
            })
            ->addColumn('action', function($kategori){
                return '
                    <a href="'. url('data-kategori/restore/'.$kategori->id) .'" class="btn btn-info btn-sm btn_restore">Restore Permanently</a>
                    <a href="'. url('data-kategori/delete/'.$kategori->id) .'" class="btn btn-danger btn-sm btn_delete">Delete Permanantly</a>
                ';
            })
            ->rawColumns(['action', 'selectAll'])
            ->make(true);
            return $allData;
        }
        return view('pages.kategori.trash');
    }

    public function restore($id = null){
        if($id != null){
            $kategori = Kategori::onlyTrashed()
                ->where('id', $id)
                ->restore();
        }else{
            $kategori = Kategori::onlyTrashed()->restore();
        }
        return redirect('data-kategori/trash');
    }

    public function delete($id = null){
        if($id != null){
            $kategori = Kategori::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        }else{
            $kategori = Kategori::onlyTrashed()->forceDelete();
        }
        return redirect('data-kategori/trash');
    }
}
