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
use Illuminate\Support\Facades\Auth;
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

        if ($request->offset) {
            $offset = $request->offset;
        } else {
            $offset = 0;
        }

        $user = $request->user();
        $orders_raw = Order::where('status', '!=', 'Waiting')->where('user_id', $user->id)->where(function ($query) use ($request) {
            if ($request->status_type) {
                $query->where('status', '=', $request->status_type);
            }
        })
            ->latest()
            ->offset($offset)
            ->limit(20)
            ->get();

        $orders  = OrderResource::collection($orders_raw);
        return $this->successResponse($orders);
    }

    public function orders_detail(Request $request, $id)
    {

        $order = new OrderOrderResource(Order::findOrFail($id));
        if ($request->user()->id == $order->user_id) {
            return $this->successResponse($order);
        } else {
            return $this->errorResponse('Forbidden for you', 403);
        }
    }

    public function favorites(Request $request)
    {
        if ($request->offset) {
            $offset = $request->offset;
        } else {
            $offset = 0;
        }
        $user = $request->user();
        $favorites_raw = DB::table('product_user')->where('user_id', $user->id)->latest()
            ->offset($offset)
            ->limit(20)
            ->get();
        $favorites  = $favorites_raw->map(function ($item, $key) {
            return new ShopProductResource(Product::find($item->product_id));
        });

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

    public function user_delete(Request $request)
    {
        $request->user()->tokens()->delete();
        $request->user()->delete();
        
        return $this->successResponse(null, 'User Deleted');
    }
}
