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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait OrderHelper
{

    protected function orderCreate($ordercode, $prices, $items, $user, $officeid, $payid)
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
            'cart_price' => $prices['cart_cost'],
            'vat_price' => $prices['vat_cost'],
            'shipment_price' => $prices['delivery_cost'],
            'discount_price' => $prices['discount_cost'],
            'total_price' => $prices['final_cost'],
            'status' => $orderStatus,
            'pay_status' => $paymentStatus,
            'pay_type' => $paymentSelected->name,
            'user_id' => $user->id,

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

        foreach ($items as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'sold_price' => Product::find($item['id'])->showPrice(),
            ]);
        }

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
            'user_id' => $coupon->id,
            'coupon_id' => $userid
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

    protected function createPayment($ordercode, $user, $price)
    {
        // $request =  'https://demo.vivapayments.com/api/orders';    // demo environment URL

        // Your merchant ID and API Key can be found in the 'Security' settings on your profile.
        // $merchant_id = '46b71c1d-b4d3-4dc5-920c-0d75783948ee';
        // $api_key = 'eNt3JB';

        $redirection = 'red';

        return $redirection;
    }
}
