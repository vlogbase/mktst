<?php

namespace App\Traits;

use App\Models\Coupon;
use App\Models\PointSystem;
use App\Models\Shipping;
use Illuminate\Support\Facades\DB;

trait CartHelper
{

    protected function pointCalculation($price)
    {
        $pointSys = PointSystem::find(1);
        if ($pointSys->status) {
            $point = $pointSys->earn_coefficient * $price;
        } else {
            $point = 0;
        }

        return $point;
    }

    protected function applyCoupon($price, $code)
    {

        $data = [
            'price' => $price,
            'result' => true
        ];

        return $data;
    }

    protected function shipmentCalculation($price)
    {

        $shippingSys = Shipping::find(1);
        if ($shippingSys->campaign && $shippingSys->campaign_price <= $price) {
            $price = 0;
        } else {
            $price = $shippingSys->price;
        }

        return $price;
    }

    protected function checkCouponCode($code, $userId)
    {
        $coupon = Coupon::where('code', $code)->where('status', 1)->first();
        if ($coupon) {
            $condition2 =  DB::table('user_coupons')->where('user_id', $userId)->where('coupon_id', $coupon->id)->first();
            if ($condition2) {
                $result = false;
            } else {
                $result = true;
            }
        } else {
            $result = false;
        }
        return $result;
    }

    protected function couponDiscountCalc($code, $price)
    {
        $coupon = Coupon::where('code', $code)->first();

        if ($coupon->type == 'percentage') {
            $result = ($price * $coupon->discount) / 100;
        } else {
            $result = $coupon->discount;
        }

        return $result;
    }
}
