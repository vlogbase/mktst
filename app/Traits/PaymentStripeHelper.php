<?php

namespace App\Traits;

use App\Models\PaymentCard;
use App\Models\User;
use Carbon\Carbon;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;

trait PaymentStripeHelper{
    use StripeHelper;

    public function addNewMethodSession(User $user){
        $stripe_id = $this->getOrCreateCustomerStripeId($user);

        $session = Session::create([
            'customer' => $stripe_id,
            'payment_method_types' => ['card'],
            'mode' => 'setup',
            'success_url' => config('app.url').'/stripe-callback?session_id={CHECKOUT_SESSION_ID}&result=success&type=setup&redirect_url='.route('user.payments'),
            'cancel_url' => config('app.url').'/stripe-callback?result=cancel$type=setup&redirect_url='.route('user.payments'),
        ]);

        return $session->url;
    }

    public function savePaymentMethodDb(User $user,$session,$type){
        
        if($type === 'setup'){
            $intent = $this->retrieveSetupIntentFromSession($session);
        }else{
            $intent = $this->retrievePaymentIntentFromSession($session);
        }
        
        $paymentMethod = $this->retrievePaymentMethodFromIntent($intent);

        if(PaymentCard::where('user_id',$user->id)->where('stripe_id', $paymentMethod->id)->exists())
        {
            return $user->paymentCards()->where('stripe_id', $paymentMethod->id)->first();
        }

        $model = PaymentCard::create([
            'user_id' => $user->id,
            'stripe_id' => $paymentMethod->id,
            'is_default' => false,
            'type' => $paymentMethod->type,
            'brand' => $paymentMethod->card->brand,
            'expires_at' => Carbon::createFromDate(
                $paymentMethod->card->exp_year,
                $paymentMethod->card->exp_month,
                1
            )->setTime(0, 0, 0),
            'last4' => $paymentMethod->card->last4,
        ]);

        $this->setDefaultPaymentMethod($model);

        return $model;
    }

    public function setDefaultPaymentMethod(PaymentCard $paymentCard){
        $paymentCard->is_default = 1;
        $paymentCard->save();

        $this->setDefaultStripePaymentMethod($paymentCard->user, $paymentCard->stripe_id);

        PaymentCard::where('id', '!=', $paymentCard->id)
            ->where('user_id', $paymentCard->user_id)
            ->update(['is_default' => 0]);
    }

    public function deletePaymentMethod(PaymentCard $paymentCard){

        try {
            $this->deletePaymentMethodFromStripe($paymentCard->stripe_id);
        } catch (ApiErrorException $e) {
            // We don't care if the payment method doesn't exist on Stripe's side
        }

        if ($paymentCard->is_default) {
            $nextPaymentMethod = PaymentCard::query()
                ->where('id', '!=', $paymentCard->id)
                ->where('user_id', $paymentCard->user->id)
                ->where('is_default', false)
                ->first();

            if ($nextPaymentMethod) {
                $this->setDefaultPaymentMethod($nextPaymentMethod);
            }
        }

        $paymentCard->delete();

       
    }
}