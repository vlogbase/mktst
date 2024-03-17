<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return view('seller.dashboard');
    }

    public function settings()
    {
        $seller = auth('seller')->user();
        return view('seller.profile.settings', compact('seller'));
    }
}
