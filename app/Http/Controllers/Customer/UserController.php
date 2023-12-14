<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\PaymentStripeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use PaymentStripeHelper;
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

    public function payments_add()
    {
        $user = Auth::user();
        return redirect($this->addNewMethodSession($user));
    }

    public function orders_detail($id)
    {
        $order = Order::findOrFail($id);
        if ($order->user_id == Auth::id()) {
            //Find Next Order
            $nextOrder = Order::where('id', '>', $order->id)->where('user_id', Auth::id())->orderBy('id', 'asc')->first();
            //Find Previous Order
            $previousOrder = Order::where('id', '<', $order->id)->where('user_id', Auth::id())->orderBy('id', 'desc')->first();

            return view('customer.user.order-detail', compact('order', 'nextOrder', 'previousOrder'));
        } else {
            return redirect()->back();
        }
    }

    public function favorites()
    {
        return view('customer.user.favorites');
    }
}
