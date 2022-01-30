<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function web_sliders()
    {
        return view('admin.contents.sliders.web_sliders');
    }

    public function web_sliders_add()
    {
        return view('admin.contents.sliders.web_sliders_add');
    }

    public function web_sliders_edit($id)
    {
        return view('admin.contents.sliders.web_sliders_edit', compact('id'));
    }

    public function app_sliders()
    {
        return view('admin.contents.sliders.app_sliders');
    }
}
