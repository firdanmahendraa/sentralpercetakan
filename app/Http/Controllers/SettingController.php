<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index(){
        return view('pages.setting.index');
    }

    public function show(){
        return Setting::first();
    }

    public function update(Request $request){
        $setting = Setting::first();
        $setting->nama_perusahaan = $request->nama_perusahaan;
        $setting->alamat = $request->alamat;
        $setting->telepon = $request->telepon;

        if($request->hasFile('logo_aplikasi')){
            $file = $request->file('logo_aplikasi');
            $nama = 'brand-icon' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $nama);

            $setting->logo_aplikasi = "assets/img/$nama";
        }

        if($request->hasFile('logo_login')){
            $file = $request->file('logo_login');
            $nama = 'logo' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $nama);

            $setting->logo_login = "assets/img/$nama";
        }

        if($request->hasFile('bg_login')){
            $file = $request->file('bg_login');
            $nama = 'bg_login' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $nama);

            $setting->bg_login = "assets/img/$nama";
        }

        if($request->hasFile('logo_nota')){
            $file = $request->file('logo_nota');
            $nama = 'nota-logo' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $nama);

            $setting->logo_nota = "assets/img/$nama";
        }
        
        $setting->update();
        return response()->json('Data berhasil disimpan', 200);
    }
}
