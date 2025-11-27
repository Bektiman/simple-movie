<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRegistrationRequest;
use App\Models\User;

class AuthController extends Controller
{
    //

    public function showRegisterPage()
    {

        return view('auth.register');

    }

    public function register(AuthRegistrationRequest $request)
    {

        $request->validated();

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('auth.loginPage')->with('success','Registration Successfully');

    }

    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function login() {}
}
