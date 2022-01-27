<?php

namespace App\Traits;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderProduct;
use App\Models\OrderShipping;
use App\Models\PaymentMethod;
use App\Models\PointSystem;
use App\Models\Product;
use App\Models\User;
use App\Models\UserOffice;
use App\Notifications\OrderReceived;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait OrderHelper
{

    protected function orderCreate($ordercode, $prices, $items, $user, $officeid, $payid, $couponcode, $type)
    {

        $paymentSelected = PaymentMethod::find($payid);
        $officeSelected = UserOffice::find($officeid);

        if ($payid == 1) {
            $orderStatus = 'Waiting';
            $paymentStatus = 'Wait';
        } else if ($payid == 6) {
            $orderStatus = 'New Order';
            $paymentStatus = 'Paid';
        } else {
            $orderStatus = 'New Order';
            $paymentStatus = 'Not Paid';
        }

        $order = Order::create([
            'ordercode' => $ordercode,
            'earn_point' => $prices['earn_point'],
            'cart_price' => $prices['cart_cost'],
            'vat_price' => $prices['vat_cost'],
            'shipment_price' => $prices['delivery_cost'],
            'discount_price' => $prices['discount_cost'],
            'total_price' => $prices['final_cost'],
            'status' => $orderStatus,
            'pay_status' => $paymentStatus,
            'pay_type' => $paymentSelected->name,
            'user_id' => $user->id,
            'couponcode' => $couponcode,
            'platform' => $type

        ]);

        OrderShipping::create([
            'order_id' =>  $order->id,
            'address_id' => $officeSelected->address->id,
            'name' => $officeSelected->name,
            'surname' => $officeSelected->surname,
            'email' => $officeSelected->email,
            'phone' => $officeSelected->phone,
            'mobile' => $officeSelected->mobile,
        ]);

        OrderBilling::create([
            'order_id' =>  $order->id,
            'address_id' => $user->userdetail->address->id,
            'company_name' => $user->name,
            'vat' => $user->vat,
            'registeration' => $user->registeration,
        ]);

        $weight = 0;
        foreach ($items as $item) {
            $product = Product::find($item['id']);
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'sold_price' => $product->showPrice(),
            ]);
            $weight +=  $product->productdetail->unit_weight * $item['quantity'];
        }

        $order->update([
            'weight' => $weight
        ]);

        return $ordercode;
    }

    protected function pointControl($price, $user)
    {
        $userSpendablePoint = (PointSystem::first()->spend_coefficient) * $user->point;

        return $userSpendablePoint >= floatVal($price);
    }

    protected function spentPoint($price, $user)
    {
        $userSpendablePoint = ($price / PointSystem::first()->spend_coefficient);
        $user->update([
            'point' => $user->point - $userSpendablePoint,
        ]);
        return true;
    }

    protected function updateStock($items)
    {
        foreach ($items as $item) {
            $product =  Product::find($item['id']);
            $product->update([
                'stock' => $product->stock - ($item['quantity'] * $product->per_unit),
            ]);
        }
    }

    protected function couponApplied($code, $userid)
    {
        $coupon = Coupon::where('code', $code)->first();
        DB::table('user_coupons')->insert([
            'user_id' => $userid,
            'coupon_id' =>  $coupon->id,
        ]);
    }

    protected function earnPoint($point, $user)
    {

        $user->update([
            'point' => $user->point + $point,
        ]);
        return true;
    }

    protected function sendNotification($user, $ordercode)
    {
        $registeredUser = [
            'userName' => $user->name,
            'orderCode' => $ordercode
        ];

        $user->notify(new OrderReceived($registeredUser));
    }

    protected function createPayment($ordercode, $user, $price, $type)
    {
        $request =  config('app.wiva_wallet_url') . 'api/orders';

        $merchant_id = config('app.wiva_wallet_mercant_id');
        $api_key = config('app.wiva_wallet_api_key');

        if ($type == 'app') {
            $source = config('app.wiva_wallet_app_source');
        } else {
            $source = config('app.wiva_wallet_web_source');
        }


        $amount = intval(100 * $price);    // Amount in cents
        $customerTrns = "Pay for " . $ordercode . " ORDER";
        $merchantTrns = $ordercode;
        $paymentTimeOut = 300;

        //Set some optional parameters (Full list available here: https://developer.vivawallet.com/api-reference-guide/payment-api/#tag/Payments/paths/~1orders/post)
        $allow_recurring = 'true'; // If set to true, this flag will prompt the customer to accept recurring payments in the future.
        $request_lang = 'en-US'; //This will display the payment page in English (default language is Greek)
        $maxInstallments = 9;

        $postargs = 'Amount=' . urlencode($amount) . '&customerTrns=' . $customerTrns . '&merchantTrns=' . $merchantTrns . '&paymentTimeOut=' . $paymentTimeOut .
            '&email=' . $user->email . '&phone=' . $user->userdetail->mobile . '&maxInstallments=' . $maxInstallments . '&AllowRecurring=' . $allow_recurring . '&RequestLang=' . $request_lang . '&SourceCode=' . $source;

        // Get the curl session object
        $session = curl_init($request);

        // Set the POST options.
        curl_setopt($session, CURLOPT_POST, true);
        curl_setopt($session, CURLOPT_POSTFIELDS, $postargs);
        curl_setopt($session, CURLOPT_HEADER, true);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($session, CURLOPT_USERPWD, $merchant_id . ':' . $api_key);
        curl_setopt($session, CURLOPT_SSL_CIPHER_LIST, 'TLSv1.2');

        //FOR DEVELOPMENT
        if (config('app.wiva_wallet_development')) {
            curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);
        }

        // Do the POST and then close the session
        $response = curl_exec($session);

        // Separate Header from Body
        $header_len = curl_getinfo($session, CURLINFO_HEADER_SIZE);
        $res_header = substr($response, 0, $header_len);
        $res_body =  substr($response, $header_len);

        try {
            if (is_object(json_decode($res_body))) {
                $result_obj = json_decode($res_body);
            } else {
                $redirection = 'ERROR';
            }
        } catch (Exception $e) {
            $redirection = 'ERROR';
        }

        if ($result_obj->ErrorCode == 0) {    //success when ErrorCode = 0
            $redirection = config('app.wiva_wallet_url') . "web/checkout?ref=" . $result_obj->OrderCode;
        } else {
            $redirection = 'ERROR';
        }

        curl_close($session);


        return $redirection;
    }
}
