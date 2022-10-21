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

    public function trash(Request $request){
        $supplier = Supplier::onlyTrashed()->get();
        if ($request->ajax()) {
            $allData = DataTables::of($supplier)
            ->addIndexColumn()
            ->addColumn('selectAll', function($supplier){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $supplier->id .'">
                ';
            })
            ->addColumn('action', function($supplier){
                return '
                    <a href="'. url('data-supplier/restore/'.$supplier->id) .'" class="btn btn-info btn-sm btn_restore">Restore Permanently</a>
                    <a href="'. url('data-supplier/delete/'.$supplier->id) .'" class="btn btn-danger btn-sm btn_delete">Delete Permanantly</a>
                ';
            })
            ->rawColumns(['action', 'selectAll'])
            ->make(true);
            return $allData;
        }
        return view('pages.supplier.trash');
    }

    public function restore($id = null){
        if($id != null){
            $supplier = Supplier::onlyTrashed()
                ->where('id', $id)
                ->restore();
        }else{
            $supplier = Supplier::onlyTrashed()->restore();
        }
        return redirect('data-supplier/trash');
    }

    public function delete($id = null){
        if($id != null){
            $supplier = Supplier::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        }else{
            $supplier = Supplier::onlyTrashed()->forceDelete();
        }
        return redirect('data-supplier/trash');
    }
}
