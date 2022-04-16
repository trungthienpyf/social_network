<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function postSignUp(SignUpRequest $request)
    {
        $email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);
        $user = new User();

        $user->email = $email;
        $user->name = $name;
        $user->password = $password;
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function postSignIn(SignInRequest $request)
    {
        if(Auth::attempt(
            ['email'=>$request['email'],

                'password'=>$request['password'],
            ])){
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
