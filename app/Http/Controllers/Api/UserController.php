<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource as OrderOrderResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Shop\ProductResource as ShopProductResource;
use App\Http\Resources\User\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function profile(Request $request)
    {
        $user = new UserResource($request->user());
        return $this->successResponse($user);
    }

    public function orders(Request $request)
    {
        $user = $request->user();
        $orders  = OrderResource::collection($user->userorders);
        return $this->successResponse($orders);
    }

    public function orders_detail(Request $request, $id)
    {
        $order = new OrderOrderResource(Order::findOrFail($id));
        return $this->successResponse($order);
    }

    public function favorites(Request $request)
    {
        $user = $request->user();
        $favorites  = ShopProductResource::collection($user->userfavorites);
        return $this->successResponse($favorites);
    }
}
