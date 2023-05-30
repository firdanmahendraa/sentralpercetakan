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

}
