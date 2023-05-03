<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class SupplierController extends Controller{

    public function index(Request $request){
        $supplier = Supplier::get();
        if ($request->ajax()) {
            $allData = DataTables::of($supplier)
            ->addIndexColumn()
            ->addColumn('action', function($data){
                return '
                    <button class="btn btn-success btn-sm editData" data-id="'.$data->id.'">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-supplier.destroy', $data->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.supplier.index', compact('supplier'));
    }

    public function store(Request $request) {
        $supplier = Supplier::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    public function update(Request $request, $id){
        $supplier = Supplier::find($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->telepon_supplier = $request->telepon_supplier;
        $supplier->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return response(null, 204);
    }

    public function trash(Request $request){
        $supplier = Supplier::onlyTrashed()->get();
        if ($request->ajax()) {
            $allData = DataTables::of($supplier)
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
            ->rawColumns(['action', 'selectAll'])
            ->make(true);
            return $allData;
        }
        return view('pages.supplier.trash');
    }

    public function restore(Request $request){
        $ids = $request->ids;
        Supplier::onlyTrashed()->whereIn('id', $ids)->restore();
        
        return response()->json(["success" => "Data berhasil di restore!"]);
    }

    public function delete(Request $request){
        $ids = $request->ids;
        Supplier::onlyTrashed()->whereIn('id', $ids)->forceDelete();
        
        return response()->json(["success" => "Data berhasil di hapus!"]);
    }
}
