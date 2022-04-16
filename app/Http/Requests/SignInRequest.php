<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [

            'email' => [
                'bail',
                'required',
                'email',

            ],
            'password' => [
                'bail',
                'required',

            ]


        ];
    }
    public function messages()
    {
        return [

            'required' => ' Vui long nhap :attribute',

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
