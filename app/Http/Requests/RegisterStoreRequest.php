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
            'nik'   => 'required|max:16|unique:users,nik',
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
            'fullname.required' => 'Nama Lengkap Harus Di Isi',
            'nik'=> [
                'required' => 'NIK Harus Di Isi',
                'max' => 'Format NIK Tidak Valid',
                'unique' => 'NIK Sudah Terdaftar'
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
