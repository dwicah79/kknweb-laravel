<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
