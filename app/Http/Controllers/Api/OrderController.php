<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\ProductResource as ShopProductResource;
use App\Http\Resources\User\UserOfficeResource;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Traits\CartHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends ApiController
{
    use CartHelper;

    public function coupon_apply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon_code' => 'required|exists:coupons,code',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }

        if ($this->checkCouponCode($request->coupon_code, $request->user()->id)) {
            return $this->successResponse(true);
        } else {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }
    }


    public function calcCheckoutData($request)
    {
        $items = $request->items;
        $cartFinalCost = 0;
        $tax_cost = 0;
        $products = collect([]);
        if (count($items) > 0) {
            foreach ($items as $item) {
                $product = Product::find($item['id']);
                $cartFinalCost += $product->showPrice() * $item['quantity'];
                $tax_cost += ($product->showPrice() * $item['quantity'] * $product->taxrate) / 100;
            }
        }

        $discount_cost = 0;
        $delivery_cost = $this->shipmentCalculation($cartFinalCost);

        if ($request->has('coupon_code') && $this->checkCouponCode($request->coupon_code, $request->user()->id)) {
            $discount_cost = $this->couponDiscountCalc($request->coupon_code, $cartFinalCost);
        }
        $final_cost_order = $cartFinalCost + $tax_cost +  $delivery_cost - $discount_cost;

        $prices = [

            "cart_cost" => $cartFinalCost,
            "vat_cost" => $tax_cost,
            "delivery_cost" => $delivery_cost,
            "discount_cost" => $discount_cost,
            "final_cost" =>  $final_cost_order,
            "earn_point" => $this->pointCalculation($cartFinalCost),
        ];
        return $prices;
    }

    public function stockControl($request)
    {
        $items = $request->items;
        $fine_products = collect([]);
        $need_update_products = collect([]);
        $need_delete_products = collect([]);
        $updated = false;
        $new_items = collect([]);
        if (count($items) > 0) {
            foreach ($items as $item) {
                $product = Product::find($item['id']);
                if ($product->calcStock() > 0) {
                    if ($product->calcStock() >= $item['quantity']) {
                        //Fine_products
                        $fine_products->push($product);
                        $item_new = [
                            'id' => $product->id,
                            'quantity' => $item['quantity'],
                        ];
                        $new_items->push($item_new);
                    } else {
                        //Updated_products
                        $updated = true;
                        $item_new = [
                            'id' => $product->id,
                            'quantity' => $product->calcStock(),
                        ];
                        $new_items->push($item_new);
                        $need_update_products->push($product->name . '-' . $product->sku);
                    }
                } else {
                    //Delete_products
                    $updated = true;
                    $need_delete_products->push($product->name . '-' . $product->sku);
                }
            }
        }

        $products = [
            "action" =>  $updated ? "update_cart" : "no_action",
            "items" => $new_items,
            "item_details" => ShopProductResource::collection($fine_products),
            "updated_products" => $need_update_products,
            "delete_products" => $need_delete_products,
        ];

        return $products;
    }

    public function checkout(Request $request)
    {
        //Cart Control
        if (count($request->items) <= 0) {
            return $this->errorResponse('Cart can not be empty', 405);
        }

        //Stock Control
        $products = $this->stockControl($request);
        $prices = $this->calcCheckoutData($request);


        $data = [
            'products' => $products,
            'prices' => $prices,
            'address' => UserOfficeResource::collection($request->user()->useroffices),
            'payments' => PaymentMethod::where('status', 1)->get(),
        ];

        return $this->successResponse($data, 'Every');
    }
}
