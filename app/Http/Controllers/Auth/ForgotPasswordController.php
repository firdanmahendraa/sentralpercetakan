<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller{
    function showLinkRequestForm() {
        return view('pages.auth.email_identify');
    }

    function sendResetLinkEmail(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Sentral Percetakan');
        });

        return back()->with('message', 'Link reset password telah dikirim melalui email anda!');
    }
}
