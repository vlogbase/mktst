<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\SellerDetail;
use Illuminate\Http\Request;

class SellerTeamController extends Controller
{
    public function team_list()
    {
        if (!auth()->user()->is_master) {
            return redirect()->route('seller.dashboard');
        }
        $seller = auth()->guard('seller')->user();
        $sellerDetail = $seller->sellerDetail;
        return view('seller.team.index',compact('sellerDetail'));
    }

    public function member_create()
    {
        $seller = auth()->guard('seller')->user();
        $sellerDetail = $seller->sellerDetail;
        return view('seller.team.create', compact('sellerDetail'));
    }

    public function member_edit($memberId)
    {
        $seller = auth()->guard('seller')->user();
        $sellerDetail = $seller->sellerDetail;
        $member = Seller::findOrFail($memberId);
        return view('seller.team.edit', compact('member'));
    }
}
