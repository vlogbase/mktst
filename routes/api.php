<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\ApiOtherController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CreditCardsController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\UserController;
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

//Home
Route::get('/api-info', [HomeController::class, 'api_info'])->name('api_info');
Route::get('/sliders', [HomeController::class, 'sliders'])->name('api_sliders');
Route::get('/home-products', [HomeController::class, 'home_products'])->name('api_home_products');
Route::get('ticker-tapes/', [ApiOtherController::class, 'index']);
Route::get('get-filters/', [ApiOtherController::class, 'filters']);

//Shop
Route::get('/products', [ShopController::class, 'products_list'])->name('api_products_list');
Route::get('/products/{id}', [ShopController::class, 'product_detail'])->name('api_product_detail');
Route::get('/categories/{parent_id}', [ShopController::class, 'categories'])->name('api_categories');
Route::post('/cart-price', [ShopController::class, 'cart_price'])->name('api_cart_price');


//Auth
Route::post('/auth/get-addresses', [AuthController::class, 'address_list'])->name('api_address_list');
Route::post('/auth/login', [AuthController::class, 'login'])->name('api_login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('api_register');
Route::post('/auth/send-verification', [AuthController::class, 'send_verification'])->name('api_send_verification');
Route::post('/auth/forget-password', [AuthController::class, 'forget_password'])->name('api_forget_password');

//Authenticated Part
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout'])->name('api_logout');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('api_user_profile');
    Route::get('/user/orders', [UserController::class, 'orders'])->name('api_user_orders');
    Route::get('/user/orders/{id}', [UserController::class, 'orders_detail'])->name('api_user_orders_detail');
    Route::get('/user/favorites', [UserController::class, 'favorites'])->name('api_user_favorites');
    Route::get('/user/favorites/toggle/{id}', [UserController::class, 'toggle_favorites'])->name('api_user_toggle_favorites');
    Route::get('/products/{id}/is-favorited', [ShopController::class, 'product_is_favorited'])->name('api_product_is_favorited');
    Route::post('/delete-account', [UserController::class, 'user_delete'])->name('api_user_delete_request');

    //Order
    Route::post('/checkout-price', [OrderController::class, 'checkout'])->name('api_checkout');
    Route::post('/coupon-apply', [OrderController::class, 'coupon_apply'])->name('api_coupon_apply');
    Route::post('/order-request', [OrderController::class, 'order_request'])->name('api_order_request');

    Route::get('tickets/', [TicketController::class, 'index']);
    Route::post('tickets/', [TicketController::class, 'store']);
    Route::get('tickets/{ticket}', [TicketController::class, 'show']);
    Route::put('tickets/{ticket}/update', [TicketController::class, 'update']);


    Route::get('credit-cards/', [CreditCardsController::class, 'index']);
    Route::post('credit-cards/', [CreditCardsController::class, 'store']);
    Route::put('credit-cards/{paymentMethod}/default', [CreditCardsController::class, 'update']);
    Route::delete('credit-cards/{paymentMethod}/delete', [CreditCardsController::class, 'delete']);


    Route::get('addresses/', [AddressController::class, 'index']);
    Route::get('addresses/countries', [AddressController::class, 'countries']);
    Route::post('addresses/', [AddressController::class, 'store']);
    Route::get('addresses/{address}', [AddressController::class, 'show']);
    Route::put('addresses/{address}/update', [AddressController::class, 'update']);
    Route::delete('addresses/{address}/delete', [AddressController::class, 'delete']);

    
});

//PaymentResults
Route::get('/payment/success', [PaymentController::class, 'success_payment'])->name('api_success_payment');
Route::get('/payment/failure', [PaymentController::class, 'failure_payment'])->name('api_failure_payment');
