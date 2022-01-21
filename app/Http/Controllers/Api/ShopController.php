<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;

use App\Http\Resources\Detail\ProductResource;
use App\Http\Resources\Shop\CategoryResource;
use App\Http\Resources\Shop\ProductResource as ShopProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Traits\CartHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends ApiController
{
    use CartHelper;

    public function product_detail($id)
    {
        $item = new ProductResource(Product::findOrFail($id));
        return $this->successResponse($item);
    }

    public function categories($parent_id)
    {
        if ($parent_id == 0) {
            $items = CategoryResource::collection(Category::where('category_id', '=', NULL)->get());
        } else {
            $items = CategoryResource::collection(Category::where('category_id', '=', $parent_id)->get());
        }

        return $this->successResponse($items);
    }

    public function category_product_get(Request $request, $order, $type, $offset)
    {

        $category = Category::where('id', $request->category_id)->first();
        $products = $category->products()->where('status', 1)
            ->where(function ($query) use ($request, $order) {
                if ($request->search_text) {
                    $query->where('name', 'LIKE', '%' . $request->search_text . '%')
                        ->orWhere('sku', 'LIKE', '%' . $request->search_text . '%');
                }
                if ($request->min_cost) {
                    $query->where('unit_price', '>=', $request->min_cost);
                }
                if ($request->max_cost) {
                    $query->where('unit_price', '<=', $request->max_cost);
                }
            })
            ->orderBy($order, $type)
            ->offset($offset)
            ->limit(20)
            ->get();

        return $products;
    }

    public function search_product_get(Request $request, $order, $type, $offset)
    {
        $products = Product::where('status', 1)
            ->where(function ($query) use ($request) {
                if ($request->search_text) {
                    $query->where('name', 'LIKE', '%' . $request->search_text . '%')
                        ->orWhere('sku', 'LIKE', '%' . $request->search_text . '%');
                }
                if ($request->min_cost) {
                    $query->where('unit_price', '>=', $request->min_cost);
                }
                if ($request->max_cost) {
                    $query->where('unit_price', '<=', $request->max_cost);
                }
            })
            ->orderBy($order, $type)
            ->offset($offset)
            ->limit(20)
            ->get();

        return $products;
    }

    public function products_list(Request $request)
    {
        if ($request->order == 'latest') {
            $query_order = 'created_at';
            $query_order_direct = 'desc';
        } else if ($request->order == 'cheapest') {
            $query_order = 'unit_price';
            $query_order_direct = 'asc';
        } else if ($request->order == 'expensive') {
            $query_order = 'unit_price';
            $query_order_direct = 'desc';
        } else {
            $query_order = 'created_at';
            $query_order_direct = 'desc';
        }

        if ($request->offset) {
            $offset = $request->offset;
        } else {
            $offset = 0;
        }

        if ($request->search_text) {
            $products = $this->search_product_get($request, $query_order, $query_order_direct, $offset);
        } else {
            if ($request->category_id) {
                $products = $this->category_product_get($request, $query_order, $query_order_direct, $offset);
            } else {
                $products = $this->search_product_get($request, $query_order, $query_order_direct, $offset);
            }
        }

        $products = $products->$products = ShopProductResource::collection($products);
        return $this->successResponse($products);
    }

    public function product_is_favorited(Request $request, $id)
    {
        $user = $request->user();
        $product = Product::findOrFail($id);

        $toggle = DB::table('product_user')->where('product_id', $id)->where('user_id', $user->id)->first();

        if ($toggle) {
            $message = 'Favorited';
            $is_favorited = true;
        } else {
            $message = 'Not Favorited';
            $is_favorited = false;
        }
        $data = [
            'is_favorited' => $is_favorited
        ];
        return $this->successResponse($data, $message);
    }

    public function cart_price(Request $request)
    {
        $items = $request->items;
        $cartFinalCost = 0;
        $cartBeforeDiscount = 0;
        $products = collect([]);
        if (count($items) > 0) {
            foreach ($items as $item) {
                $product = Product::find($item['id']);
                $cartFinalCost += $product->showPrice() * $item['quantity'];
                $cartBeforeDiscount += $product->unit_price * $item['quantity'];
                $products->push($product);
            }
        }

        $data = [
            'prices' => [
                'cartFinalCost' => $cartFinalCost,
                'cartBeforeDiscount' => $cartBeforeDiscount,
                'earn_point' => $this->pointCalculation($cartFinalCost),
            ],
            'item_details' => ShopProductResource::collection($products)
        ];
        return $this->successResponse($data);
    }
}
