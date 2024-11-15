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
            ->addColumn('action', function($data){
                return '
                    <button class="btn btn-success btn-sm editData" data-id="'.$data->id.'">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-pelanggan.destroy', $data->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.customer.index', compact('customer'));
    }

    public function store(Request $request) {
        $customer = Customer::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $customer = Customer::find($id);
        return response()->json($customer);
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
}
