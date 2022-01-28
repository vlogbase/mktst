<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list()
    {
        return view('admin.categories.category_list');
    }

    public function category_add()
    {
        return view('admin.categories.category_add');
    }

    public function category_detail($id)
    {
        return view('admin.categories.category_detail');
    }
}
