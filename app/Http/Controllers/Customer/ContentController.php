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
        $items = Gallery::latest()->paginate(12);
        return view('customer.gallery.list', compact('items'));
    }

    public function video_gallery()
    {

        return view('customer.video.list');
    }

    public function blogs()
    {
        $items = Blog::latest()->paginate(12);
        return view('customer.blog.list', compact('items'));
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
        $items = News::latest()->paginate(12);
        return view('customer.news.list', compact('items'));
    }

    public function news_detail($slug)
    {
        $item = News::where('slug', '=', $slug)->firstOrFail();
        $previous = News::where('id', '<', $item->id)->first();
        $next = News::where('id', '>', $item->id)->first();
        return view('customer.news.detail', compact('item', 'next', 'previous'));
    }
}
