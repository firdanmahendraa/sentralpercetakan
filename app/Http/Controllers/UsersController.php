<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UsersController extends Controller
{

    public function index(Request $request){
        $users = User::get();
        if ($request->ajax()) {
            $allData = DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $btn= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.
                $row->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm deleteUser">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.users.index',compact('users'));
    }

    public function create(){
        //
    }

    public function store(Request $request) {
        User::updateOrCreate(
            ['id' =>$request->id],
            ['name'=>$request->name,
             'username'=>$request->username,
             'password'=>$request->password,
             'levels'=>$request->levels]
        );
        return response()->json(['success' => 'User Berhasil Disimpan']);
    }


    public function show($id) {
        //
    }


    public function edit($id){
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id){
        //  
    }


    public function destroy($id){
        User::find($id)->delete();
        return response()->json(['success'=>'User berhasil dihapus!']);
    }
}
