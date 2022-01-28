<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function shipping()
    {
        return view('admin.settings.shipping');
    }

    public function order_rules()
    {
        return view('admin.settings.order_rules');
    }

    public function payment_method()
    {
        return view('admin.settings.payment_method');
    }

    public function point_system()
    {
        return view('admin.settings.point_system');
    }

    public function general_settings()
    {
        return view('admin.settings.general_settings');
    }
}
