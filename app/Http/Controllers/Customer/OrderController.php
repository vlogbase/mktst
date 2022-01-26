<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\OrderRule;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        $min_order_cost = OrderRule::where('name', 'min_order_cost')->first();
        if (count(\Cart::getContent()) > 0) {
            if ($min_order_cost->price > \Cart::getSubTotal() && $min_order_cost->status) {
                return redirect()->route('cart');
            } else {
                return view('customer.order.checkout');
            }
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
