<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriPermasalahanRequest extends FormRequest
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
            'nama_topik' => ['required'],
            'tim_id'    =>  ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'nama_topik.required' => 'Nama topik wajib diisi!',
            'tim_id.required' => 'Tim wajib diisi!',
        ];
    }
}
