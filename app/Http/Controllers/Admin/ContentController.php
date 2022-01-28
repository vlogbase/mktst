<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function web_sliders()
    {
        return view('admin.contents.sliders.web_sliders');
    }

    public function app_sliders()
    {
        return view('admin.contents.sliders.app_sliders');
    }

    public function blog_list()
    {
        return view('admin.contents.contents.blogs.blog_list');
    }

    public function blog_add()
    {
        return view('admin.contents.contents.blogs.blog_add');
    }

    public function blog_edit($id)
    {
        return view('admin.contents.contents.blogs.blog_detail');
    }

    public function news_list()
    {
        return view('admin.contents.contents.news.news_list');
    }

    public function news_add()
    {
        return view('admin.contents.contents.news.news.add');
    }

    public function news_edit($id)
    {
        return view('admin.contents.contents.news.news_detail');
    }

    public function gallery_list()
    {
        return view('admin.contents.contents.gallery.gallery_list');
    }

    public function message_list()
    {
        return view('admin.contents.other.message.message_list');
    }

    public function message_detail($id)
    {
        return view('admin.contents.other.message.message_detail');
    }

    public function jobresume_list()
    {
        return view('admin.contents.other.jobresume.jobresume_list');
    }

    public function jobresume_detail($id)
    {
        return view('admin.contents.other.jobresume.jobresume_detail');
    }

    public function newsletter_list()
    {
        return view('admin.contents.other.newsletter.newsletter_list');
    }
}
