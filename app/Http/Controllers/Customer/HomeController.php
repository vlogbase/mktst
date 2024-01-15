<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\AppSlider;
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

        $adverts = Advert::where('start_live_date', '<=', date('Y-m-d'))->where('end_live_date', '>=', date('Y-m-d'))->get();
        $sliders = WebSlider::latest()->get();
        $sliders_2 = AppSlider::latest()->get();
        $featured = Product::where('status', 1)->whereHas('productdetail', function ($q) {
            $q->where('featured', '=', '1');
        })->get();
        $best_seller = Product::where('status', 1)->whereHas('productdetail', function ($q) {
            $q->where('best_seller', '=', '1');
        })->get();
        $new_arrival = Product::where('status', 1)->whereHas('productdetail', function ($q) {
            $q->where('new_arrival', '=', '1');
        })->get();
        $special_offer = Product::where('status', 1)->whereHas('productdetail', function ($q) {
            $q->where('special_offer', '=', '1');
        })->get();

        $news = News::orderBy('created_at')->take(3)->get();
        return view('customer.welcome', compact('sliders', 'featured', 'best_seller', 'special_offer', 'new_arrival', 'news','sliders_2','adverts'));
    }
}
