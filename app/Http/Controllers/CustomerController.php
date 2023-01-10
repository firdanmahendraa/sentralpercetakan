<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class CustomerController extends Controller{

    public function index(Request $request){
        $customer = Customer::get();
        if ($request->ajax()) {
            $allData = DataTables::of($customer)
            ->addIndexColumn()
            ->addColumn('action', function($customer){
                return '
                    <button class="btn btn-success btn-sm" onclick="editForm(`'. route('data-pelanggan.update', $customer->id) .'`)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-pelanggan.destroy', $customer->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.customer.index', compact('customer'));
    }

    public function create(){
        // 
    }

    public function store(Request $request) {
        $customer = Customer::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id){
        $customer = Customer::find($id);
        $customer->nama_pelanggan = $request->nama_pelanggan;
        $customer->alamat_pelanggan = $request->alamat_pelanggan;
        $customer->telepon_pelanggan = $request->telepon_pelanggan;
        $customer->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $customer = Customer::find($id);
        $customer->delete();
        return response(null, 204);
    }

    public function trash(Request $request){
        $customer = Customer::onlyTrashed()->get();
        if ($request->ajax()) {
            $allData = DataTables::of($customer)
            ->addIndexColumn()
            ->addColumn('selectAll', function($customer){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $customer->id .'">
                ';
            })
            ->addColumn('action', function($customer){
                return '
                    <a href="'. url('data-pelanggan/restore/'.$customer->id) .'" class="btn btn-info btn-sm btn_restore">Restore Data</a>
                    <a href="'. url('data-pelanggan/delete/'.$customer->id) .'" class="btn btn-danger btn-sm btn_delete">Delete Permanantly</a>
                ';
            })
            ->rawColumns(['action', 'selectAll'])
            ->make(true);
            return $allData;
        }
        return view('pages.customer.trash');
    }

    public function restore($id = null){
        if($id != null){
            $customer = Customer::onlyTrashed()
                ->where('id', $id)
                ->restore();
        }else{
            $customer = Customer::onlyTrashed()->restore();
        }
        return redirect('data-pelanggan/trash');
    }

    public function delete($id = null){
        if($id != null){
            $customer = Customer::onlyTrashed()
                ->where('id', $id)
                ->forceDelete();
        }else{
            $customer = Customer::onlyTrashed()->forceDelete();
        }
        return redirect('data-customer/trash');
    }
}
