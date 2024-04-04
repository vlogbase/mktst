<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Brand;
use App\Models\TickerTapeCategory;
use Illuminate\Http\Request;

class ApiOtherController extends ApiController
{

    public function index()
    {
        $tickerTapes = TickerTapeCategory::with('tickerTapes')->get();
        return $this->successResponse($tickerTapes);
    }

    public function filters()
    {
        $brands = Brand::all();
        return $this->successResponse($brands);
    }

}