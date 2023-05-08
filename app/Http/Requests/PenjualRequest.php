<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenjualRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->get('id');
        if ($this->method() == 'PUT') {
            $username = 'required|unique:penjuals,username,' . $id;
            $phone = 'required|unique:penjuals,phone,' . $id;
            $alamat = 'required|unique:penjuals,alamat,';
            
        } else {
            $username = 'required|unique:penjuals,username,NULL';
            $phone = 'required|unique:penjuals,phone,NULL';
            $alamat = 'required|unique:penjuals,alamat,NULL';
        }
        return [
            'username' => $username,
            'phone' => $phone,
            'alamat' => $alamat,
            'nama_toko' => 'required|string',
        ];
    }
}
