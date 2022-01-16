<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Other\AppSliderResource;
use App\Models\AppSlider;
use Illuminate\Http\Request;

class HomeController extends ApiController
{
    public function sliders()
    {
        $items = AppSliderResource::collection(AppSlider::latest()->get());
        return $this->successResponse($items);
    }

    public function detailsliders($id)
    {
        $item = new AppSliderResource(AppSlider::findOrFail($id));
        return $this->successResponse($item);
    }
}
