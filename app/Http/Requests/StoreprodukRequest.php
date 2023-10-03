<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreprodukRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_produk' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_produk.required' => 'Data nama produk belum diisi!'
        ];
    }
}
