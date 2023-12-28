<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function loginDashboard(Request $request) {
        $validation  = $request->validate([ 
            "email" => "required|email",
            "password" => "required",
        ], [
            "email" => [
                'required' => "Masukkan Email Yang Sudah Terdaftar Untuk Login",
                'email' => "Format Email Salah, Silahkan Cek Lagi.",
            ],
            "password.required" => "Masukkan Password Yang Sudah Terdaftar Untuk Login",
        ]);

        $remember_me = $request->remember_me ? true : false;

        if (Auth::attempt($validation, $remember_me)) {
            $checkWhoUserLogin = User::where('email', $request->email)->first();
            if ($checkWhoUserLogin->role_id !== 1) {
                toastr()->error('Hanya Admin Yang Boleh Mengakses Dashboard', 'Login Dashboard Failed');
                return redirect()->back();
            }

            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }

        toastr()->error('Pengguna Tidak Ditemukan', 'Login Failed');
        return redirect()->back();
    }
}
