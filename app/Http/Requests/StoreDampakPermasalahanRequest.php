<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDampakPermasalahanRequest extends FormRequest
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
            'nama_dampak' => ['required'],
            'prioritas' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_dampak.required' => 'Nama Dampak Permasalahan wajib diisi!',
            'prioritas.required' => 'Prioritas wajib diisi!',
        ];
    }
}
