<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login()
    {
        // Check is logged in
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login.login');
    }

    public function signup()
    {
        return view('auth.signup.signup');
    }
}
