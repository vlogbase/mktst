<?php

namespace App\Traits;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Exception;

trait PaymentHelper
{
    use OrderHelper;

    protected function findPaymentResult($transaction_id)
    {

        $data = NULL;
        $request =  config('app.wiva_wallet_url') . 'api/transactions/';
        $merchant_id = config('app.wiva_wallet_mercant_id');
        $api_key = config('app.wiva_wallet_api_key');
        $getargs = '' . urlencode($transaction_id);
        $session = curl_init($request);

        // Set the GET options.
        curl_setopt($session, CURLOPT_HTTPGET, true);
        curl_setopt($session, CURLOPT_URL, $request . $getargs);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_USERPWD, $merchant_id . ':' . $api_key);
        curl_setopt($session, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');

        // Do the GET and then close the session
        $response = curl_exec($session);

        curl_close($session);

        // Parse the JSON response
        try {
            // echo $response . '<br /><br />'; // you can see all properties with their values in a json string here.

            if (is_object(json_decode($response))) {
                $resultObj = json_decode($response);
            }
        } catch (Exception $e) {
            //FAILURE
        }
        if ($resultObj->ErrorCode == 0) {    //success when ErrorCode = 0
            if (sizeof($resultObj->Transactions) > 0) {
                foreach ($resultObj->Transactions as $t) { // an order might have more than one transactions, or no transactions yet.

                    $ordered_status = $t->StatusId;
                    $ordered_number =  $t->MerchantTrns;

                    // check https://developer.vivawallet.com/web-api-integration/transaction-parameters/ for status result ids
                    // "F" = The transaction has been completed successfully
                    // "E" = The transaction was not completed because of an error
                }
            } else {
            }
        } else {
            //FAILURE
        }


        if ($ordered_status == "F") {
            $data = $ordered_number;
        } else {
            //FAILURE
        }

        return $data;
    }

    protected function updateOrderStatus($order)
    {
        $order->update([
            'status' => 'New Order',
            'pay_status' => 'Paid',
        ]);

        foreach ($order->orderproducts as $item) {
            $product =  Product::find($item->product_id);
            $product->update([
                'stock' => $product->stock - ($item->quantity * $product->per_unit),
            ]);
        }

        return $order;
    }

    protected function successfulUpdate($ordercode)
    {
        $order = Order::where('ordercode', $ordercode)->first();
        $user = User::find($order->user_id);

        if ($order->status == 'Waiting') {
            //Order Done
            $this->updateOrderStatus($order);
            $this->earnPoint($order->earn_point, $user);

            if ($order->couponcode != '') {
                $this->couponApplied($order->couponcode, $order->user_id);
            }

            $this->sendNotification($user, $ordercode);
        }


        $data = [
            'paymentid' => '',
            'ordernum' => $ordercode,
            'process' => 'ordercomplete',
            "ordercost" => $order->total_price,
            "earnpoint" => $order->earn_point
        ];

        return $data;
    }
}
