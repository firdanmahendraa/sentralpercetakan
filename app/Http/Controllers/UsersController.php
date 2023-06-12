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
                if ($row->levels == "Admin") {
                    return '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm deleteUser">Delete</a>
                    ';
                }else{
                    return '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="delete btn btn-danger btn-sm deleteUser disabled">Delete</a>
                    ';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
            return $allData;
        }
        return view('pages.users.index',compact('users'));
    }

    public function store(Request $request) {
        User::create(
            ['name'=>$request->name,
             'username'=>$request->username,
             'email'=>$request->email,
             'password'=>bcrypt($request->password)]
        );
        return response()->json(['success' => 'User Berhasil Disimpan']);
    }

    public function destroy($id){
        User::find($id)->delete();
        return response()->json(['success'=>'User berhasil dihapus!']);
    }
}
