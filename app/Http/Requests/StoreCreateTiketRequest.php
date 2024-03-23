<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateTiketRequest extends FormRequest
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
            //
            'email' => ['required', 'email'],
            'nip' => ['required'],
            'kategori_permasalahan_id' => ['required'],
            'dampak_permasalahan_id' => ['required'],
            'ringkasan_masalah' => ['required'],
            'tipe' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email wajib diisi!',
            'email.email'   => 'Harus menggunakan email valid. Contoh: contoh@gmail.com',
            'nip.required' => 'NIP akun wajib diisi!',
            'kategori_permasalahan_id.required' => 'Kategori Permasalahan wajib diisi!',
            'dampak_permasalahan_id.required' => 'Dampak Permasalahan wajib diisi!',
            'ringkasan_masalah.required' => 'Ringkasan Masalah wajib diisi!',
            'tipe.required' => 'Tipe wajib diisi!',
        ];
    }
}
