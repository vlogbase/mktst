<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerBrandsController extends Controller
{
    public function brands_list()
    {
        if (!auth()->user()->is_master) {
            return redirect()->route('seller.dashboard');
        }
        return view('seller.brands.index');
    }
}
