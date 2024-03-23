<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCekTiketRequest extends FormRequest
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
            'tiket_id'  => ['required', 'numeric']
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email wajib diisi!',
            'email.email'   => 'Harus menggunakan email valid. Contoh: contoh@gmail.com',
            'tiket_id.required' => 'Nomor tiket wajib diisi!',
            'tiket_id.numeric' => 'Nomor tiket wajib berupa angka!',
        ];
    }
}
