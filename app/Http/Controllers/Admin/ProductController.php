<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_list()
    {
        return view('admin.products.product_list');
    }

    public function product_add()
    {
        return view('admin.products.product_add');
    }

    public function product_detail($id)
    {
        return view('admin.products.product_detail');
    }
}
