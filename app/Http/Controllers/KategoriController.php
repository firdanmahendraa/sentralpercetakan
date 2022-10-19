<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use DataTables;

class KategoriController extends Controller
{
    public function index(Request $request){
        $category = Category::get();
        if($request->ajax()){
            $allData = DataTables::of($category)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                $row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm mr-2 editCategory">Edit</a>';
                $btn.= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                $row->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm deleteCategory">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.kategori.index',compact('category'));
    }


    public function create() {
        //
    }


    public function store(Request $request) {
        Category::updateOrCreate(
            ['id' =>$request->id],
            ['kode_kategori'=>$request->kode_kategori,
             'nama_kategori'=>$request->nama_kategori]
        );
        return response()->json(['success' => 'Kategori Berhasil Disimpan']);
    }


    public function show($id) {
        //
    }


    public function edit($id){
        $category = Category::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id){
        //  
    }


    public function destroy($id){
        Category::find($id)->delete();
        return response()->json(['success'=>'Kategori berhasil dihapus!']);
    }

    public function trash(){
        $category = Category::onlyTrashed()->get();
        return view('pages.kategori.trash', compact('category'));
    }

    public function restore($id = null){
        if($id != null){
            $category = Category::onlyTrashed()
                ->where('id', $id)
                ->restore();
        }else{
            $category = Category::onlyTrashed()->restore();
        }
        return redirect('data-kategori/trash');
    }

    public function delete($id = null){
        if($id != null){
            $category = Category::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        }else{
            $category = Category::onlyTrashed()->forceDelete();
        }
        return redirect('data-kategori/trash');
    }
}
