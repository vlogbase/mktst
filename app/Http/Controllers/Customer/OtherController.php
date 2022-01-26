<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    public function about_us()
    {
        return view('customer.other.about-us');
    }

    public function contact_us()
    {
        return view('customer.other.contact-us');
    }

    public function career()
    {
        return view('customer.career.index');
    }

    public function career_detail($job)
    {
        return view('customer.career.detail');
    }

    public function terms_and_conditions()
    {
        return view('customer.other.terms-and-conditions');
    }

    public function search_result($search)
    {
        //Find Products
        $products = Product::where('status', 1)->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('sku', 'LIKE', '%' . $search . '%')->get();
        $categories = Category::where('name', 'LIKE', '%' . $search . '%')->get();
        $blogs = Blog::where('name', 'LIKE', '%' . $search . '%')->get();
        $news = News::where('name', 'LIKE', '%' . $search . '%')->get();

        $data = [
            'products' => $products,
            'categories' => $categories,
            'blogs' => $blogs,
            'news' => $news
        ];
        return view('customer.other.search-result', compact('search', 'data'));
    }

    public function search(Request $request)
    {
        if (strlen($request->search_text) > 0) {
            return redirect()->route('search_result', $request->search_text);
        } else {
            return redirect()->intended('/');
        }
    }
}
