<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_list()
    {
        return view('admin.customers.customer_list');
    }

    public function customer_detail($id)
    {
        return view('admin.customers.customer_detail');
    }
}
