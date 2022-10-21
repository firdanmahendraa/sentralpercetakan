<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class ProdukController extends Controller{

    public function index(Request $request){
        $produk = Produk::get();
        if($request->ajax()){
            $allData = DataTables::of($produk)
            ->addIndexColumn()
            ->addColumn('kode_produk', function($produk) {
                return '<span class="badge badge-success">'. $produk->kode_produk .'</span>';
            })
            ->addColumn('harga_produk', function($produk) {
                return format_uang($produk->harga_produk);
            })
            ->addColumn('action', function($row){
                return '
                    <button class="btn btn-success btn-sm" onclick="editForm(`'. route('data-produk.update', $row->id_produk) .'`)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-produk.destroy', $row->id_produk) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action', 'kode_produk'])
            ->make(true);
            return $allData;
        }
        return view('pages.produk.index',compact('produk'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $produk = Produk::latest()->first();
        $request['kode_produk'] = 'P'. tambah_nol_didepan((int)$produk->id_produk+1, 4);
        $produk = Produk::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id) {
        $produk = Produk::find($id);
        return response()->json($produk);
    }


    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $produk = Produk::find($id);
        $produk->delete();
        return response(null, 204);
    }
}