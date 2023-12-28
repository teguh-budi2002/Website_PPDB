<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        $validation  = $request->validate([ 
            "nisn" => "required|digits_between:10,10|numeric",
            "password" => "required",
        ], [
            "nisn" => [
                'required' => "Masukkan NISN Yang Sudah Terdaftar Untuk Login",
                'digits_between' => "Format NISN Salah, Silahkan Cek Lagi.",
                'numeric' => "NISN Harus Berupa Angka."
            ],
            "password.required" => "Masukkan Password Yang Sudah Terdaftar Untuk Login",
        ]);

        $remember_me = $request->remember_me ? true : false;

        if (Auth::attempt($validation, $remember_me)) {
            $request->session()->regenerate();
 
            return redirect()->intended('portal');
        }

        toastr()->error('Pengguna Tidak Ditemukan', 'Login Failed');
        return redirect()->back();
    }
}
