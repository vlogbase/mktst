<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ShopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Other
Route::get('/sliders', [HomeController::class, 'sliders'])->name('sliders');

//Shop
Route::get('/home-products', [HomeController::class, 'home_products'])->name('api_home_products');
Route::get('/products', [ShopController::class, 'products_list'])->name('api_products_list');
Route::get('/products/{id}', [ShopController::class, 'product_detail'])->name('api_product_detail');
Route::get('/categories/{parent_id}', [ShopController::class, 'categories'])->name('api_categories');
