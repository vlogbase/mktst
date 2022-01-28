<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order_list()
    {
        return view('admin.orders.order_list');
    }

    public function order_detail($id)
    {
        return view('admin.orders.order_detail');
    }
}
