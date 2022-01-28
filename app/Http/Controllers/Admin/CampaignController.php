<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function coupon_list()
    {
        return view('admin.campaigns.coupons.coupon_list');
    }

    public function coupon_detail($id)
    {
        return view('admin.campaigns.coupons.coupon_detail');
    }

    public function coupon_add()
    {
        return view('admin.campaigns.coupons.coupon_add');
    }
}
