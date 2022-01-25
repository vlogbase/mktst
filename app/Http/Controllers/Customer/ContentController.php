<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Http\Request;

class ContentController extends Controller
{
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
