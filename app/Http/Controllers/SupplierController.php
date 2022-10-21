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
            ->addColumn('action', function($supplier){
                return '
                    <button class="btn btn-success btn-sm" onclick="editForm(`'. route('data-supplier.update', $supplier->id) .'`)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-supplier.destroy', $supplier->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.supplier.index', compact('supplier'));
    }

    public function create(){
        // 
    }

    public function store(Request $request) {
        $supplier = Supplier::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    public function edit($id) {
        //
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
}
