<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
