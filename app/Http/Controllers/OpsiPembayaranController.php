<?php

namespace App\Http\Controllers;

use App\Models\OpsiPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class OpsiPembayaranController extends Controller{

    public function index(Request $request){
        $opsi_bayar = OpsiPembayaran::get();
        if($request->ajax()){
            $allData = DataTables::of($opsi_bayar)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '
                    <button class="btn btn-success btn-sm" onclick="editForm(`'. route('opsi-pembayaran.update', $row->id) .'`)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('opsi-pembayaran.destroy', $row->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.opsi-pembayaran.index',compact('opsi_bayar'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $opsi_bayar = OpsiPembayaran::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id) {
        $opsi_bayar = OpsiPembayaran::find($id);
        return response()->json($opsi_bayar);
    }


    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        $opsi_bayar = OpsiPembayaran::find($id);
        $opsi_bayar->opsi_pembayaran = $request->opsi_pembayaran;
        $opsi_bayar->nomor_rekening  = $request->nomor_rekening;
        $opsi_bayar->atas_nama       = $request->atas_nama;
        $opsi_bayar->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $opsi_bayar = OpsiPembayaran::find($id);
        $opsi_bayar->delete();
        return response(null, 204);
    }

    public function trash(Request $request){
        $opsi_bayar = OpsiPembayaran::onlyTrashed()->get();
        if ($request->ajax()) {
            $allData = DataTables::of($opsi_bayar)
            ->addIndexColumn()
            ->addColumn('selectAll', function($opsi_bayar){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $opsi_bayar->id .'">
                ';
            })
            ->addColumn('action', function($opsi_bayar){
                return '
                    <a href="'. url('opsi-pembayaran/restore/'.$opsi_bayar->id) .'" class="btn btn-info btn-sm btn_restore">Restore Permanently</a>
                    <a href="'. url('opsi-pembayaran/delete/'.$opsi_bayar->id) .'" class="btn btn-danger btn-sm btn_delete">Delete Permanantly</a>
                ';
            })
            ->rawColumns(['action', 'selectAll'])
            ->make(true);
            return $allData;
        }
        return view('pages.opsi-pembayaran.trash');
    }
}