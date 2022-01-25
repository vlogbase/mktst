<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        if (count(\Cart::getContent()) > 0) {
            return view('customer.order.checkout');
        } else {
            return redirect()->route('cart');
        }
    }

    public function order_complete($ordercode)
    {
        return view('customer.order.order-complete');
    }

    public function cart()
    {
        return view('customer.order.cart');
    }
}
