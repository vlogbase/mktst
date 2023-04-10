<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Other\AppSliderResource;
use App\Http\Resources\Shop\ProductResource;
use App\Models\AppSlider;
use App\Models\OrderRule;
use App\Models\Product;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends ApiController
{
    public function sliders()
    {
        $items = AppSliderResource::collection(AppSlider::latest()->get());
        return $this->successResponse($items);
    }

    public function home_products()
    {

        $featured = ProductResource::collection(Product::whereHas('productdetail', function ($q) {
            $q->where('featured', '=', '1')->where('status', 1);
        })->get());
        $best_seller =  ProductResource::collection(Product::whereHas('productdetail', function ($q) {
            $q->where('best_seller', '=', '1')->where('status', 1);
        })->get());
        $new_arrival =  ProductResource::collection(Product::whereHas('productdetail', function ($q) {
            $q->where('new_arrival', '=', '1')->where('status', 1);
        })->get());
        $special_offer =  ProductResource::collection(Product::whereHas('productdetail', function ($q) {
            $q->where('special_offer', '=', '1')->where('status', 1);
        })->get());

        $data =
            [
                'featured' => $featured,
                'best_seller' => $best_seller,
                'new_arrival' => $new_arrival,
                'special_offer' => $special_offer,
            ];
        return $this->successResponse($data);
    }

    public function api_info()
    {
        $status = Setting::where('name', 'maintenance')->first()->status;
        $order_rule = OrderRule::where('name', 'min_order_cost')->first();
        if ($order_rule->status) {
            $order_min_cart_cost = $order_rule->price;
        } else {
            $order_min_cart_cost = 0;
        }
        $data =
            [
                'version' => '1.0.0',
                'time' => Carbon::now()->format('Y-m-d H:i:s'),
                'time-zone' => 'Europe/London',
                'status' =>  $status ? 'Maintenance' : 'Active',
                'min_order_cart' => $order_min_cart_cost
            ];
        return $this->successResponse($data);
    }
}
