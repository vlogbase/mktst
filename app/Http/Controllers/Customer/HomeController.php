<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Models\AppSlider;
use App\Models\Blog;
use App\Models\Feed;
use App\Models\News;
use App\Models\Product;
use App\Models\WebSlider;
use App\Traits\FeedHelper;
use DateTime;


class HomeController extends Controller
{
    use FeedHelper;
    public function index()
    {
       
       
        
        $currentDateTime = new DateTime();
        $adverts = Advert::where('start_live_date', '<=', $currentDateTime->format('Y-m-d H:i:s'))
                         ->where('end_live_date', '>=', $currentDateTime->format('Y-m-d H:i:s'))
                         ->get();
       
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

        $blogs = Blog::orderBy('created_at')->take(3)->get();

        $rssFeeds = $this->getLatestRssFeed();        
        return view('customer.converti');
        //return view('customer.welcome', compact('sliders', 'featured', 'best_seller', 'special_offer', 'new_arrival', 'blogs','sliders_2','adverts','rssFeeds'));
    }
}
