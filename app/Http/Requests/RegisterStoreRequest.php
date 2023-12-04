<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname'  => 'required',
            'nisn'   => 'required|digits_between:10,10|unique:users,nisn|numeric',
            'birth_place' => 'required',
            'birth_day' => 'required',
            'phone_number' => 'required|digits_between:10,13',
            'email' => 'required|email:dns',
            'password' => 'required',
            'g-recaptcha-response' => 'required',
        ];
    }

    public function messages(): array {
        return [ 
            'fullname.required' => 'Nama Lengkap Wajib Di Isi',
            'nisn'=> [
                'required' => "NISN Wajib Di Isi",
                'digits_between' => " Format NISN Salah, Silahkan Cek Lagi.",
                'unique' => 'NISN Sudah Terdaftar',
                'numeric' => "NISN Harus Berupa Angka."
            ],
            'birth_place.required' => 'Tempat Lahir Wajib Di Isi',
            'birth_day.required' => 'Tanggal Lahir Wajib Di Isi',
            'phone_number' => [
                'required' => 'Nomer Whatsapp Wajib Di Isi',
                'digits_between' => 'Format Nomer HP Tidak Valid'
            ],
            'email' => [
                'required'=> 'Alamat Email Wajib Di Isi',
                'email' => 'Alamat Email Tidak Valid'
            ],
            'password.required' => 'Password Wajib Di Isi',
            'g-recaptcha-response.required' => 'reCaptcha Belum Di Validasi',
        ];
    }
}
