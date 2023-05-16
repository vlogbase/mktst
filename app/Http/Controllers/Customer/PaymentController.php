<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Traits\PaymentHelper;
use App\Traits\PaymentStripeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    use PaymentHelper;
    use PaymentStripeHelper;
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

    public function stripe_callback(Request $request)
    {
        
        if($request->result === 'cancel'){
            return redirect($request->redirect_url);
        }

        $session_id = $request->session_id;
        $type = $request->type;
        
        if($type === 'setup'){
            $this->savePaymentMethodDb(Auth::user(),$session_id);
        }

        return redirect($request->redirect_url);
    }
}
