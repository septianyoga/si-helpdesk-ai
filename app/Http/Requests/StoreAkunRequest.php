<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAkunRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:akuns,email'],
            'nip'   => ['required'],
            'no_whatsapp'   => ['nullable', 'numeric'],
            'role'   => ['required'],
            'password'   => ['required'],
            // 'tim_id'   => ['required'],
            // 'jabatan_id'   => ['required'],
            // 'divisi_id'   => ['required'],
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
            'no_whatsapp.numeric' => 'No Whatsapp harus berupa angka!',
            'role.required' => 'Role wajib diisi!',
            'password.required' => 'Password wajib diisi!',
            // 'tim_id.required' => 'Tim wajib diisi!',
            // 'jabatan_id.required' => 'Tim wajib diisi!',
            // 'divisi_id.required' => 'Tim wajib diisi!',
        ];
    }
}
