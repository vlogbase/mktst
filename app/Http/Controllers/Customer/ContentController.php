<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
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
        return view('customer.blog.detail');
    }

    public function news()
    {
        return view('customer.news.list');
    }

    public function news_detail($slug)
    {
        return view('customer.news.detail');
    }
}
