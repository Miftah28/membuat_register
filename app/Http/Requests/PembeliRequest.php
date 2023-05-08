<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembeliRequest extends FormRequest
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
            $username = 'required|unique:pembelis,username,' . $id;
            $phone = 'required|unique:pembelis,phone,' . $id;
            $alamat = 'required|unique:pembelis,alamat,';
            
        } else {
            $username = 'required|unique:pembelis,username,NULL';
            $phone = 'required|unique:pembelis,phone,NULL';
            $alamat = 'required|unique:pembelis,alamat,NULL';
        }
        return [
            'username' => $username,
            'phone' => $phone,
            'alamat' => $alamat,
        ];
    }
}
