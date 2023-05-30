<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ProdukController extends Controller{

    public function index(Request $request){
        $produk = Produk::orderBy('nama_produk', 'asc')->get();
        if($request->ajax()){
            $allData = DataTables::of($produk)
            ->addIndexColumn()
            ->addColumn('kode_produk', function($data) {
                return '<span class="badge badge-success">'. $data->kode_produk .'</span>';
            })
            ->addColumn('harga_produk', function($data) {
                return 'Rp. ' . format_uang($data->harga_produk);
            })
            ->addColumn('action', function($data){
                return '
                    <button class="btn btn-success btn-sm editData" data-id="'.$data->id_produk.'">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-produk.destroy', $data->id_produk) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action', 'kode_produk'])
            ->make(true);
            return $allData;
        }
        return view('pages.produk.index',compact('produk'));
    }

    public function store(Request $request) {
        $produk = Produk::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id) {
        $produk = Produk::find($id);
        return response()->json($produk);
    }

    public function update(Request $request, $id){
        $produk = Produk::find($id);
        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->ukuran_produk = $request->ukuran_produk;
        $produk->type_produk = $request->type_produk;
        $produk->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $produk = Produk::find($id);
        $produk->delete();
        return response(null, 204);
    }
}