<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthSellerController extends Controller
{
    public function login()
    {
        return view('seller.auth.login');
    }

    public function forget()
    {
        return view('seller.auth.forget');
    }

    public function reset($email, $token)
    {
        return view('seller.auth.reset', compact('email', 'token'));
    }

    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('seller.login');
    }
}
