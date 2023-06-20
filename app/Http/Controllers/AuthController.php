<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function signin()
    {
        return view('auth.signin');
    }
    
    public function signup()
    {
        return view('auth.signup');
    }
    
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
    
    public function resetPassword()
    {
        return view('auth.reset-password');
    }
}

