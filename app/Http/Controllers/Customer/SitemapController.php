<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $news = News::all();
        $blogs = Blog::all();
        return response()
            ->view('sitemap', compact('categories', 'products', 'news', 'blogs'))
            ->header('Content-Type', 'application/xml');
    }
}
