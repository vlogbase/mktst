<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\WebSlider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = WebSlider::latest()->get();
        $featured = Product::whereHas('productdetail', function ($q) {
            $q->where('featured', '=', '1');
        })->get();
        $best_seller = Product::whereHas('productdetail', function ($q) {
            $q->where('best_seller', '=', '1');
        })->get();
        $new_arrival = Product::whereHas('productdetail', function ($q) {
            $q->where('new_arrival', '=', '1');
        })->get();
        $special_offer = Product::whereHas('productdetail', function ($q) {
            $q->where('special_offer', '=', '1');
        })->get();

        $news = News::orderBy('created_at')->take(3)->get();
        return view('customer.welcome', compact('sliders', 'featured', 'best_seller', 'special_offer', 'new_arrival', 'news'));
    }
}
