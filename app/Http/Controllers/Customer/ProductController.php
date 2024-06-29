<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $categoryCurrent = '';
        $categories = Category::whereNull('category_id')->get();
        return view('customer.product.list', compact('categoryCurrent', 'categories'));
    }

    public function categoryProducts($slug)
    {
        $categoryCurrent = Category::where('slug', $slug)->firstOrFail();
        $categories = $categoryCurrent->childrenCategories;
        return view('customer.product.list', compact('categoryCurrent', 'categories'));
    }

    public function product_detail($slug)
    {
        $product = Product::where('slug', $slug)->where('status', 1)->firstOrFail();
        if ($product->categories->count() > 0) {
            $related = Category::find($product->categories->first()->id)->products->where('status', 1)->except($product->id)->take(12);
        } else {
            $related = Product::where('status', 1)->where('id', '!=', $product->id)->take(12)->get();
        }

        return view('customer.product.detail', compact('product', 'related'));
    }
}
