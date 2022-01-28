<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand_list()
    {
        return view('admin.brands.brand_list');
    }

    public function brand_add()
    {
        return view('admin.brands.brand_add');
    }

    public function brand_detail($id)
    {
        return view('admin.brands.brand_detail');
    }
}
