<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function index()
    {
        $user = Auth::guard('seller')->user();
        $productCount = $user->products->count();
        $data = [
            'all_orders_cnt' => 0,
        ];
        return view('seller.dashboard', compact('data'));
    }

    public function settings()
    {
        $seller = auth('seller')->user();
        return view('seller.profile.settings', compact('seller'));
    }
}
