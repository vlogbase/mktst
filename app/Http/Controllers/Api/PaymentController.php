<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Traits\PaymentHelper;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends ApiController
{
    use PaymentHelper;
    public function success_payment(Request $request)
    {
        $transaction_id = $request->t;
        $result = $this->findPaymentResult($transaction_id);

        if ($result != NULL) {
            $data = $this->successfulUpdate($result);
            return $this->successResponse($data);
        } else {
            return $this->errorResponse('Payment Error', 403);
        }
    }

    public function failure_payment(Request $request)
    {
        return $this->errorResponse('Payment Error', 403);
    }
}
