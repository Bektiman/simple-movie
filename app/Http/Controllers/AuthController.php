<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return redirect()->route('auth.loginPage')->with('success', 'Registration Successfully');
    }

    public function showLoginPage()
    {
        return view('auth.login');
    }

    public function login(AuthLoginRequest $request)
    {

        $request->validated();
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            # code...
            return redirect()->route('movie.index')->with('success', 'Login successfull');
        }

        return back()->with('error', 'Invalid Credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.loginPage')->with('success', 'Logout successful');
    }
}
