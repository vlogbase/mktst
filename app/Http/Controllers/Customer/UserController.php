<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function profile()
    {
        $user = Auth::user();
        return view('customer.user.profile', compact('user'));
    }

    public function detail()
    {
        return view('customer.user.detail');
    }

    public function addresses()
    {
        return view('customer.user.addresses');
    }

    public function orders()
    {
        return view('customer.user.orders');
    }

    public function favorites()
    {
        return view('customer.user.favorites');
    }
}
