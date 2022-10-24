<?php

namespace App\Http\Controllers;

use App\Models\DataKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class DataKaryawanController extends Controller
{
    public function index(Request $request){
        $karyawan = DataKaryawan::get();
        if($request->ajax()){
            $allData = DataTables::of($karyawan)
            ->addIndexColumn()
            ->addColumn('selectAll', function($karyawan){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $karyawan->id .'">
                ';
            })
            ->addColumn('kode_karyawan', function($karyawan) {
                return '<span class="badge badge-success">'. $karyawan->kode_karyawan .'</span>';
            })
            ->addColumn('action', function($row){
                return '
                    <button class="btn btn-success btn-sm" onclick="editForm(`'. route('data-karyawan.update', $row->id) .'`)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-karyawan.destroy', $row->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['selectAll', 'kode_karyawan', 'action'])
            ->make(true);
            return $allData;
        }
        return view('pages.data-karyawan.index',compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
