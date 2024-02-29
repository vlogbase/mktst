<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\FeedCategory;
use App\Models\Gallery;
use App\Models\News;
use App\Traits\FeedHelper;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    use FeedHelper;
    public function gallery()
    {

        return view('customer.gallery.list');
    }

    public function video_gallery()
    {

        return view('customer.video.list');
    }

    public function blogs()
    {

        return view('customer.blog.list');
    }

    public function rss_feed(Request $request)
    {
        $categorySlug = $request->c;

        if ($categorySlug) {
            $feedCategory = FeedCategory::where('slug', $categorySlug)->first();
            if ($feedCategory) {
                $slug = $feedCategory->slug;
                $feeds = $this->getAllRssFeed($feedCategory->id);
            }else{
                $slug = null;
                $feeds = $this->getAllRssFeed();
            }
        } else {
            $slug = null;
            $feeds = $this->getAllRssFeed();
        }

        $feedCategories = FeedCategory::all();

        return view('customer.feeds.list', compact('feeds', 'feedCategories', 'slug'));
    }

    public function blogs_detail($slug)
    {

        $item = Blog::where('slug', '=', $slug)->firstOrFail();
        $previous = Blog::where('id', '<', $item->id)->first();
        $next = Blog::where('id', '>', $item->id)->first();
        return view('customer.blog.detail', compact('item', 'next', 'previous'));
    }

    public function news()
    {

        return view('customer.news.list');
    }

    public function news_detail($slug)
    {
        $item = News::where('slug', '=', $slug)->firstOrFail();
        $previous = News::where('id', '<', $item->id)->first();
        $next = News::where('id', '>', $item->id)->first();
        return view('customer.news.detail', compact('item', 'next', 'previous'));
    }
}
