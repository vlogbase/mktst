<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

    public function payments()
    {
        return view('customer.user.payments');
    }

    public function orders_detail($id)
    {
        $order = Order::findOrFail($id);
        if ($order->user_id == Auth::id()) {
            return view('customer.user.order-detail', compact('order'));
        } else {
            return redirect()->back();
        }
    }

    public function favorites()
    {
        return view('customer.user.favorites');
    }
}
