<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login()
    {
        return view('customer.auth.login');
    }

    public function register()
    {
        return view('customer.auth.register');
    }

    public function forget_password()
    {
        return view('customer.auth.forget-password');
    }

    public function reset_password($token)
    {
        return view('customer.auth.reset-password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function verify_email($email, $token)
    {
        return $email . ' ' . $token;
    }
}
