<?php

namespace App\Traits;

use App\Models\User;
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
}