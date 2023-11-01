<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $validation  = $request->validate([ 
            "nik" => "required|max:16",
            "password" => "required",
        ], [
            "nik.required" => "Masukkan NIK Yang Sudah Terdaftar Untuk Login",
            "password.required" => "Masukkan Password Yang Sudah Terdaftar Untuk Login",
        ]);

        $remember_me = $request->remember_me ? true : false;

        if (Auth::attempt($validation, $remember_me)) {
            $request->session()->regenerate();
 
            return redirect()->intended('portal');
        }

        toastr()->error('User Not Found', 'Login Failed');
        return redirect()->back();
    }
}
