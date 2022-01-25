<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Traits\PaymentHelper;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use PaymentHelper;
    public function success_payment(Request $request)
    {
        $transaction_id = $request->t;
        $result = $this->findPaymentResult($transaction_id);

        if ($result != NULL) {
            $data = $this->successfulUpdate($result);
            session()->forget('couponcode');
            \Cart::clear();
            return redirect()->route('order_complete', $data['ordernum']);
        } else {
            $request->session()->flash('payment_error', 'Payment Failed! Please Try Again...');
            return redirect()->route('checkout');
        }
    }

    public function failure_payment(Request $request)
    {
        $request->session()->flash('payment_error', 'Payment Failed! Please Try Again...');
        return redirect()->route('checkout');
    }
}
