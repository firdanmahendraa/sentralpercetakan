<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class MemberController extends Controller
{

    public function index(Request $request){
        $member = Member::get();
        if($request->ajax()){
            $allData = DataTables::of($member)
            ->addIndexColumn()
            ->addColumn('selectAll', function($member){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $member->id .'">
                ';
            })
            ->addColumn('kode_member', function($member) {
                return '<span class="badge badge-success">'. $member->kode_member .'</span>';
            })
            ->addColumn('action', function($row){
                return '
                    <button class="btn btn-success btn-sm" onclick="editForm(`'. route('data-member.update', $row->id) .'`)">Edit</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteData(`'. route('data-member.destroy', $row->id) .'`)">Hapus </button>
                ';
            })
            ->rawColumns(['selectAll', 'kode_member', 'action'])
            ->make(true);
            return $allData;
        }
        return view('pages.member.index',compact('member'));
    }

    public function create(){
        //
    }

    public function store(Request $request) {
        $member = Member::latest()->first();
        $request['kode_member'] = 'M'. tambah_nol_didepan((int)$member->id+1, 4);
        $member = Member::create($request->all());

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function show($id){
        $member = Member::find($id);
        return response()->json($member);
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id){
        $member = Member::find($id);
        $member->nama_member = $request->nama_member;
        $member->alamat_member = $request->alamat_member;
        $member->telepon_member = $request->telepon_member;
        $member->update();

        return response()->json('Data berhasil Disimpan', 200);
    }

    public function destroy($id){
        $member = Member::find($id);
        $member->delete();
        return response(null, 204);
    }

    public function trash(Request $request){
        $member = Member::onlyTrashed()->get();
        if ($request->ajax()) {
            $allData = DataTables::of($member)
            ->addIndexColumn()
            ->addColumn('selectAll', function($member){
                return '
                    <input type="checkbox" name="id[]" id="selectOne" value="'. $member->id .'">
                ';
            })
            ->addColumn('action', function($member){
                return '
                    <a href="'. url('data-member/restore/'.$member->id) .'" class="btn btn-info btn-sm btn_restore">Restore Permanently</a>
                    <a href="'. url('data-member/delete/'.$member->id) .'" class="btn btn-danger btn-sm btn_delete">Delete Permanantly</a>
                ';
            })
            ->rawColumns(['action', 'selectAll'])
            ->make(true);
            return $allData;
        }
        return view('pages.member.trash');
    }
}
