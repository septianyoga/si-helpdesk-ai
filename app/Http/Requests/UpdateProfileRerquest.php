<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRerquest extends FormRequest
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
            'nama_akun' => ['required'],
            'email' => ['required', 'email', 'unique:akuns,email,' . Auth::user()->id],
            'nip'   => ['required'],
            'no_whatsapp'   => ['nullable', 'numeric'],
            'jabatan'   => ['required'],
            'divisi'    => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'nama_akun.required' => 'Nama akun wajib diisi!',
            'email.required' => 'Email wajib diisi!',
            'email.email'   => 'Harus menggunakan email valid. Contoh: contoh@gmail.com',
            'email.unique'  => 'Email sudah digunakan. Silahkan gunakan email yang lain.',
            'nip.required' => 'NIP akun wajib diisi!',
            'no_whatsapp.numeric' => 'No Whatsapp wajib diisi!',
            'jabatan.required'  => 'Jabatan wajib diisi!',
            'divisi.required'  => 'Divisi wajib diisi!',
        ];
    }
}
