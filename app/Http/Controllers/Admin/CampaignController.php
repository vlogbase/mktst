<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function coupon_list()
    {
        return view('admin.campaigns.coupons.coupon_list');
    }

    public function coupon_detail($id)
    {
        Coupon::findOrFail($id);
        return view('admin.campaigns.coupons.coupon_detail', compact('id'));
    }

    public function coupon_add()
    {
        return view('admin.campaigns.coupons.coupon_add');
    }
}
