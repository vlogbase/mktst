<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource as OrderOrderResource;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\Shop\ProductResource as ShopProductResource;
use App\Http\Resources\User\OrderResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function toggle_favorites(Request $request, $id)
    {
        $user = $request->user();
        $product = Product::findOrFail($id);

        $toggle = DB::table('product_user')->where('product_id', $id)->where('user_id', $user->id)->first();

        if ($toggle) {
            $message = 'Removed';
            $user->products()->detach($id);
        } else {
            $message = 'Added';
            $user->products()->attach($id);
        }

        return $this->successResponse(null, $message);
    }
}
