<?php

namespace App\Traits;

use App\Models\AdminAlert;
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
use App\Notifications\NewOrderNotification;
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
            $paymentStatus = 'WAIT';
        } else if ($payid == 6) {
            $orderStatus = 'New Order';
            $paymentStatus = 'PAID';
        } else {
            $orderStatus = 'New Order';
            $paymentStatus = 'WAIT';
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

        return $order;
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

        $adminAlerts = AdminAlert::where('order_alert', 1)->get();
        foreach ($adminAlerts as $adminalert) {
            $admin = $adminalert->admin;
            $registeredUser = [
                'userName' => $admin->name,
                'orderCode' => $ordercode,
                'orderOwner' => $user->name,
            ];

            $admin->notify(new NewOrderNotification($registeredUser));
        }
    }

    protected function createPayment($ordercode, $user, $price, $type)
    {
        


        
    }
}
