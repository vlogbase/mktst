<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $productCount = Product::where('seller_id', auth('seller')->user()->id)->count();
        $data = [
            'all_orders_cnt' => $productCount,
        ];
        return view('seller.dashboard', compact('data'));
    }

    public function settings()
    {
        $seller = auth('seller')->user();
        return view('seller.profile.settings', compact('seller'));
    }
}
