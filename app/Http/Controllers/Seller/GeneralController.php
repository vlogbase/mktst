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
        $sellerDetail = $user->sellerDetail;
        $brands_count = $sellerDetail->brands->count();
        $brands_ids = $sellerDetail->brands->pluck('id');
        $products_count = Product::latest()->whereIn('brand_id',  $brands_ids)->count();
        $data = [
            'brands_cnt' => $brands_count,
            'products_cnt' => $products_count,
        ];
        return view('seller.dashboard', compact('data'));
    }

    public function settings()
    {
        $seller = auth('seller')->user();
        $sellerDetail = $seller->sellerDetail;
        return view('seller.profile.settings', compact('sellerDetail','seller'));
    }
}
