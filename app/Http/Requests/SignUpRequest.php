<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => [
                'bail',
                'required',
                'max:120'
            ],
            'email' => [
                'bail',
                'required',
                'email',
                'unique:App\Models\User,email',
            ],
            'password' => [
                'bail',
                'required',
                'min:4'
            ]


        ];
    }

    public function messages()
    {
        return [

            'required' => ' Vui long nhap :attribute',
            'unique' => 'Email da bi trung'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password'
        ];
    }
}
