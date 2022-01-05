<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        return view('customer.product.list');
    }

    public function product_detail($slug)
    {
        return view('customer.product.detail');
    }
}
