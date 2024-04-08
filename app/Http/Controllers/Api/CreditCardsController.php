<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\PaymentCard;
use App\Models\Ticket;
use App\Models\TicketMessage;
use App\Traits\PaymentStripeHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreditCardsController extends ApiController
{
    use PaymentStripeHelper;

    public function index()
    {
        $tickets = PaymentCard::where('user_id', auth()->id())->get();
        return $this->successResponse($tickets);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $data = [
            'url' => $this->addNewMethodSession($user),
        ];

        return $this->successResponse($data, 'Redirection url created successfully.');
    }

   
    public function delete(PaymentCard $paymentMethod)
    {
        return $paymentMethod->user_id;
        if ($paymentMethod->user_id != auth()->user()->id) {
            return $this->errorResponse('You are not authorized to view this payment card.', 403);
        }

        $this->deletePaymentMethod($paymentMethod);
        
        return $this->successResponse('Deleted your card successfully.');
    }

    
    public function update(PaymentCard $paymentMethod)
    {
        if ($paymentMethod->user_id != auth()->id()) {
            return $this->errorResponse('You are not authorized to view this payment card.', 403);
        }
        
        $this->setDefaultPaymentMethod($paymentMethod);
        
        return $this->successResponse('Set Default your card successfully.');
    }
}