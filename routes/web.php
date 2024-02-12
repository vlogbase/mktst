<?php


use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\ContentController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\OtherController;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\Customer\SitemapController;
use App\Http\Controllers\Customer\UserController;
use Illuminate\Support\Facades\Route;

// In routes/web.php
Route::feeds();

//Customer Part
Route::get('/', [HomeController::class, 'index'])->name('home');

//Customer Others
Route::get('/about-us', [OtherController::class, 'about_us'])->name('about_us');
Route::get('/contact-us', [OtherController::class, 'contact_us'])->name('contact_us');
Route::get('/career', [OtherController::class, 'career'])->name('career');
Route::get('/career/{job}', [OtherController::class, 'career_detail'])->name('career_detail');
Route::get('/terms-and-conditions', [OtherController::class, 'terms_and_conditions'])->name('terms_and_conditions');
Route::get('/search-result/{search}', [OtherController::class, 'search_result'])->name('search_result');
Route::post('/search', [OtherController::class, 'search'])->name('search');

//Customer Auth
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/re-verify/{token}', [AuthController::class, 'resend_verify'])->name('resend_verify');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forget-password', [AuthController::class, 'forget_password'])->name('forget_password');
    Route::get('/reset-password/{email}/{token}', [AuthController::class, 'reset_password'])->name('reset_password');
    Route::get('/verify-email/{email}/{token}', [AuthController::class, 'verify_email'])->name('verify_email');
});

//Customer Authenticated Part
Route::middleware('auth')->group(function () {
    //Customer User Area (Middleware Guest Needed)
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::get('/detail', [UserController::class, 'detail'])->name('detail');
        Route::get('/addresses', [UserController::class, 'addresses'])->name('addresses');
        Route::get('/orders', [UserController::class, 'orders'])->name('orders');
        Route::get('/payments', [UserController::class, 'payments'])->name('payments');
        Route::get('/payments/add', [UserController::class, 'payments_add'])->name('payments_add');
        Route::get('/orders/{id}', [UserController::class, 'orders_detail'])->name('orders_detail');
        Route::get('/favorites', [UserController::class, 'favorites'])->name('favorites');
    });


    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order-complete/{ordercode}', [OrderController::class, 'order_complete'])->name('order_complete');
});

Route::get('/cart', [OrderController::class, 'cart'])->name('cart');
Route::get('/category/{slug}', [ProductController::class, 'categoryProducts'])->name('category_products');
Route::get('/products', [ProductController::class, 'products'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'product_detail'])->name('product_detail');

//Contents
Route::prefix('blogs')->name('blogs.')->group(function () {
    Route::get('/', [ContentController::class, 'blogs'])->name('index');
    Route::get('/{slug}', [ContentController::class, 'blogs_detail'])->name('detail');
});
Route::prefix('news')->name('news.')->group(function () {
    Route::get('/', [ContentController::class, 'news'])->name('index');
    Route::get('/{slug}', [ContentController::class, 'news_detail'])->name('detail');
});
Route::get('/gallery', [ContentController::class, 'gallery'])->name('gallery');
// Route::get('/video-gallery', [ContentController::class, 'video_gallery'])->name('video_gallery');


//PaymentResults
Route::get('/payment/success', [PaymentController::class, 'success_payment'])->name('api_success_payment');
Route::get('/payment/failure', [PaymentController::class, 'failure_payment'])->name('api_failure_payment');
//Newsletter Quit Link Need

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');




//NEW PAYMENT
Route::get('/stripe-callback', [PaymentController::class, 'stripe_callback'])->name('stripe_callback');
Route::get('/3ds-callback', [PaymentController::class, 'there_d_callback'])->name('3ds_callback');


require __DIR__ . '/admin.php';
