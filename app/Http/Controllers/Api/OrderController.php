<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Shop\ProductResource as ShopProductResource;
use App\Http\Resources\User\UserOfficeResource;
use App\Models\OrderRule;
use App\Models\PaymentCard;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Traits\CartHelper;
use App\Traits\OrderHelper;
use App\Traits\StripeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends ApiController
{
    use CartHelper;
    use OrderHelper;
    use StripeHelper;

    public function coupon_apply(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'coupon_code' => 'required|exists:coupons,code',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }

        if ($this->checkCouponCode($request->coupon_code, $request->user()->id)) {
            return $this->successResponse(true, 'Coupon Applied');
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
                        $fine_products->push($product);
                        $updated = true;
                        $item_new = [
                            'id' => $product->id,
                            'quantity' => $product->calcStock(),
                        ];
                        $new_items->push($item_new);
                        $need_update_products->push($product->id);
                    }
                } else {
                    //Delete_products
                    $updated = true;
                    $need_delete_products->push($product->id);
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
        $user = $request->user();
        //Cart Control
        if (!isset($request->items) || count($request->items) <= 0) {
            return $this->errorResponse('Cart can not be empty', 405);
        }

        //Stock Control
        $products = $this->stockControl($request);
        $prices = $this->calcCheckoutData($request);

        $paymentMethods = PaymentMethod::where('status', 1)->get();

        $paymentMethods->each(function ($item) use ($user) {
            if ($item->id === 1) {
                $item->cards = PaymentCard::where('user_id', $user->id)->get();
            }
        });

        $data = [
            'products' => $products,
            'prices' => $prices,
            'address' => UserOfficeResource::collection($request->user()->useroffices),
            'payments' =>  $paymentMethods,
        ];

        return $this->successResponse($data);
    }

    public function order_request(Request $request)
    {
        //Item Control
        if (count($request->items) <= 0) {
            return $this->errorResponse('Cart can not be empty', 405);
        }
        //Stock Control
        $products = $this->stockControl($request);
        if ($products['action'] == 'update_cart') {
            return $this->errorResponse('Stock Not Enough', 405);
        }

        $couponcode = '';
        if ($request->has('coupon_code') && $request->coupon_code != '') {
            if (!$this->checkCouponCode($request->coupon_code, $request->user()->id)) {
                return $this->errorResponse('Coupon not valid', 405);
            } else {
                $couponcode = $request->coupon_code;
            }
        }

        //Validation Control -Address -Payment
        $validator = Validator::make($request->all(), [
            'adres_id' => 'required|exists:user_offices,id',
            'payment_id' => 'required|exists:payment_methods,id',
            'card_id' => 'required_if:payment_id,1',
        ]);

        if ($request->payment_id === 1 && $request->card_id !== null) {
            $paymentCard = PaymentCard::where('user_id', $request->user()->id)->where('id', $request->card_id)->first();
            if ($paymentCard === null) {
                return $this->errorResponse('Card not found', 405);
            }
        }

        if ($validator->fails()) {
            return $this->errorResponse('Validation Error', 403, $validator->errors());
        }

        //Payment Or Record Order
        $prices = $this->calcCheckoutData($request);


        $min_order_cost = OrderRule::where('name', 'min_order_cost')->first();
        if ($min_order_cost->status && $min_order_cost->price > $prices['cart_cost']) {
            return $this->errorResponse('Cart Minimum Price Error', 405);
        }

        $items = $request->items;
        $user = $request->user();
        $process = '';
        $message = '';
        $ordernum = 'SOA-' . strtoupper(Str::random(12));
        $paymentid = '';

        //Start Order Record
        //Order Creating
        $order = $this->orderCreate($ordernum, $prices, $items, $user, $request->adres_id, $request->payment_id, $couponcode, 'app');

        if ($request->payment_id == 1) {
            //Online Payment Process
            $process = 'redirection';
            $message = 'Redirected';

            $paymentMethod = PaymentCard::find($request->card_id);

            $user = auth()->user();
            if ($paymentMethod->user_id !== $user->id) {
                return $this->errorResponse('You are not authorized to use this.', 403);
            }

            $resultSavedCard = $this->paymentIntentWithSavedCard($user, $order, $paymentMethod);

            if ($resultSavedCard['status'] == 'success') {
                $order->update([
                    'pay_status' => 'paid',
                    'status' => 'New Order',
                ]);


                $this->updateStock($items); //Stock reduce

                if ($request->has('coupon_code') && $request->coupon_code != '') {
                    $this->couponApplied($request->coupon_code, $request->user()->id); //Coupon Applied
                }

                if ($request->payment_id != 6) {
                    //Earn Point From Buying
                    $this->earnPoint($prices['earn_point'], $user);
                }

                $this->sendNotification($user, $ordernum);
            } else if ($resultSavedCard['status'] == 'redirect') {
                $paymentId = $resultSavedCard['redirect_url'];
            } else {
                return $this->emit('errorAlert', 'Payment Failed');
            }
        } else if ($request->payment_id == 6) {
            //Point Payment Process
            //Check Customer Point Available
            if (!$this->pointControl($prices['final_cost'], $user)) {
                return $this->errorResponse('Points Not Enough', 403);
            }
            $this->spentPoint($prices['final_cost'], $user);
            $process = 'ordercomplete';
            $message = 'Order Completed';
        } else {
            $process = 'ordercomplete';
            $message = 'Order Completed';
        }




        if ($request->payment_id != 1) {
            //After Order
            $this->updateStock($items); //Stock reduce

            if ($request->has('coupon_code') && $request->coupon_code != '') {
                $this->couponApplied($request->coupon_code, $request->user()->id); //Coupon Applied
            }

            if ($request->payment_id != 6) {
                //Earn Point From Buying
                $this->earnPoint($prices['earn_point'], $user);
            }

            $this->sendNotification($user, $ordernum);
        }


        $data = [
            'paymentid' => $paymentid,
            'ordernum' => $ordernum,
            'process' => $process,
            "ordercost" => $prices['final_cost'],
            "earnpoint" => $prices['earn_point']
        ];

        return $this->successResponse($data, $message);
    }
}
