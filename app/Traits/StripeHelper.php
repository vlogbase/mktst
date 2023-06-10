<?php

namespace App\Traits;

use App\Models\Order;
use App\Models\PaymentCard;
use App\Models\PaymentMethod as ModelsPaymentMethod;
use App\Models\User;
use Exception;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use Stripe\SetupIntent;

trait StripeHelper{

    public function getOrCreateCustomerStripeId($user)
    {
        // Create User for Stripe ID from Stripe
        if (is_null($user->stripe_id)) {
            $customer = Customer::create([
                'email' => $user->email,
                'name' => $user->name,
            ]);

            // Update User Stripe ID to DB
            $user->stripe_id = $customer->id;
            $user->save();
        }

        return $user->stripe_id;
    }

    public function retrieveCheckoutSession($session_id)
    {
        return Session::retrieve($session_id);
    }

    public function retrieveSetupIntentFromSession(Session $session)
    {
        return SetupIntent::retrieve($session->setup_intent);
    }

    public function retrievePaymentIntentFromSession($session)
    {
        return PaymentIntent::retrieve($session->payment_intent);
    }

    public function retrievePaymentMethodFromIntent(SetupIntent|PaymentIntent $intent)
    {
        return PaymentMethod::retrieve($intent->payment_method);
    }

    public function deletePaymentMethodFromStripe($payment_method_id)
    {
        $paymentMethod = PaymentMethod::retrieve($payment_method_id);
        $paymentMethod->detach();
    }

    public function setDefaultStripePaymentMethod(User $user, $paymentMethodId)
    {
        $stripe_id = $this->getOrCreateCustomerStripeId($user);

        Customer::update($stripe_id, [
            'invoice_settings' => [
                'default_payment_method' => $paymentMethodId,
            ],
        ]);
    }

    public function paymentIntentWithSession(User $user,Order $order)
    {
        $stripe_id = $this->getOrCreateCustomerStripeId($user);
        $session = Session::create([
            'customer' => $stripe_id,
            'line_items' => [[
                'price_data' => [
                    'currency' => 'gbp',
                    'product_data' => [
                        'name' => 'ORD Num: '.$order->ordercode,
                    ],
                    'unit_amount' => intval(100 * $order->total_price),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'success_url' => config('app.url').'/stripe-callback?session_id={CHECKOUT_SESSION_ID}&result=success&type=payment&redirect_url='.route('user.payments'),
            'cancel_url' => config('app.url').'/stripe-callback?result=cancel&type=payment&redirect_url='.route('checkout'),
            'payment_intent_data' => [
                'capture_method' => 'automatic',
                'setup_future_usage' => 'off_session',
                'description' => 'Payment for '.$order->ordercode,
                'metadata' => [
                    'order_id' => $order->id,
                ],
            ],
        ]);

        return $session->url;
    }


    public function paymentIntentWithSavedCard(User $user,Order $order,PaymentCard $paymentMethod){
        $stripe_id = $this->getOrCreateCustomerStripeId($user);
        $paymentIntent = PaymentIntent::create([
            "amount" => intval(100 * $order->total_price),
            "currency" => 'gbp',
            "customer" => $stripe_id,
            "payment_method" => $paymentMethod->stripe_id,
            'confirm' => false,
            "use_stripe_sdk" => true,
            'capture_method' => 'automatic',
            'metadata' => [
                'order_id' => $order->id,
            ],
            'description' => 'Payment for '.$order->ordercode,
        ]);

        try {
            $paymentIntent->confirm([
                'return_url' => config('app.url')
                    . '/3ds-callback?reference=' . $paymentIntent->id,
            ]);


            if ($paymentIntent->status === 'succeeded') {
                return [
                    'status' => 'success',
                    'redirect_url' => null
                ];
            }

            if ($paymentIntent->status === 'requires_action' && $paymentIntent->next_action->redirect_to_url) {
                return [
                    'status' => 'redirect',
                    'redirect_url' => $paymentIntent->next_action->redirect_to_url->url
                ];
            }

            return [
                'status' => 'error',
                'redirect_url' => null
            ];
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'redirect_url' => null
            ];
        }
    }
}