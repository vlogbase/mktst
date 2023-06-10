<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Traits\PaymentHelper;
use App\Traits\PaymentStripeHelper;
use App\Traits\StripeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    use PaymentHelper;
    use PaymentStripeHelper;
    use StripeHelper;

    public function stripe_callback(Request $request)
    {
        if ($request->result !== 'cancel') {
            $session_id = $request->session_id;
            $session = $this->retrieveCheckoutSession($session_id);

            $this->savePaymentMethodDb(Auth::user(), $session,$request->type);

            if ($request->type === 'payment') {
                $paymentIntent = $this->retrievePaymentIntentFromSession($session);
                if ($paymentIntent->status === 'succeeded') {
                    return $this->successfullReturn($paymentIntent->metadata->order_id);
                }
                
            }
        }

        return redirect($request->redirect_url);
    }

    public function there_d_callback(Request $request)
    {
        $paymentIntent = PaymentIntent::retrieve($request->reference);

        if ($paymentIntent->status === 'succeeded') {
           return $this->successfullReturn($paymentIntent->metadata->order_id);
        }

        $request->session()->flash('payment_error', 'Payment Failed! Please Try Again...');
        return redirect()->route('checkout');
    }

    public function successfullReturn($orderId)
    {
        $data = $this->successfulUpdate($orderId);
        session()->forget('couponcode');
        \Cart::clear();
        return redirect()->route('order_complete', $data['ordernum']);
    }
}
