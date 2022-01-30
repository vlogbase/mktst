<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DropzoneController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Support\Facades\Route;


//Admin Part
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        //Admin Guest
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::get('/forget-password', [AuthController::class, 'forget'])->name('forget');
        Route::get('/reset-password/{email}/{token}', [AuthController::class, 'reset'])->name('reset');
    });

    Route::middleware('auth:admin')->group(function () {
        //Admin Authenticated
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        //Admin

        //Contents
        Route::prefix('contents')->name('contents.')->group(function () {
            //Admin Contents
            Route::prefix('sliders')->name('sliders.')->group(function () {
                //Admin Contents Sliders
                //Web
                Route::get('/web-sliders', [SliderController::class, 'web_sliders'])->name('web');
                Route::get('/web-sliders/add', [SliderController::class, 'web_sliders_add'])->name('web_add');
                Route::get('/web-sliders/edit/{id}', [SliderController::class, 'web_sliders_edit'])->name('web_edit');
                //App
                Route::get('/app-sliders', [SliderController::class, 'app_sliders'])->name('app');
            });
            Route::prefix('blogs')->name('blogs.')->group(function () {
                //Admin Contents Blogs
                Route::get('/list', [ContentController::class, 'blog_list'])->name('list');
                Route::get('/add', [ContentController::class, 'blog_add'])->name('add');
                Route::get('/edit/{id}', [ContentController::class, 'blog_edit'])->name('edit');
            });
            Route::prefix('news')->name('news.')->group(function () {
                //Admin Contents news
                Route::get('/list', [ContentController::class, 'news_list'])->name('list');
                Route::get('/add', [ContentController::class, 'news_add'])->name('add');
                Route::get('/edit/{id}', [ContentController::class, 'news_edit'])->name('edit');
            });
            Route::prefix('gallery')->name('gallery.')->group(function () {
                //Admin Contents gallery
                Route::get('/list', [ContentController::class, 'gallery_list'])->name('list');
            });
            Route::prefix('other')->name('other.')->group(function () {
                //Admin Contents news
                Route::get('/messages', [ContentController::class, 'message_list'])->name('messages.list');
                Route::delete('/messages/delete/{id}', [ContentController::class, 'message_delete'])->name('messages.delete');
                Route::get('/messages/{id}', [ContentController::class, 'message_detail'])->name('messages.detail');
                Route::get('/newsletter', [ContentController::class, 'newsletter_list'])->name('newsletter.list');
                Route::delete('/newsletter/delete/{id}', [ContentController::class, 'newsletter_delete'])->name('newsletter.delete');
                Route::get('/jobresumes', [ContentController::class, 'jobresume_list'])->name('jobresumes.list');
                Route::get('/jobresumes/{id}', [ContentController::class, 'jobresume_detail'])->name('jobresumes.detail');
                Route::get('/jobresumes/download/{id}', [ContentController::class, 'jobresume_download'])->name('jobresumes.download');
                Route::delete('/jobresumes/delete/{id}', [ContentController::class, 'jobresume_delete'])->name('jobresumes.delete');
            });
        });

        //Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/shipping', [SettingsController::class, 'shipping'])->name('shipping');
            Route::get('/order-rules', [SettingsController::class, 'order_rules'])->name('order_rules');
            Route::get('/payment-method', [SettingsController::class, 'payment_method'])->name('payment_method');
            Route::get('/point-system', [SettingsController::class, 'point_system'])->name('point_system');
            Route::get('/general-settings', [SettingsController::class, 'general_settings'])->name('general_settings');
        });

        //Campaigns
        Route::prefix('campaigns')->name('campaigns.')->group(function () {
            //Coupons
            Route::prefix('coupons')->name('coupons.')->group(function () {
                Route::get('/list', [CampaignController::class, 'coupon_list'])->name('list');
                Route::get('/detail/{id}', [CampaignController::class, 'coupon_detail'])->name('edit');
                Route::get('/add', [CampaignController::class, 'coupon_add'])->name('add');
            });
        });

        //Customers
        Route::prefix('customers')->name('customers.')->group(function () {
            Route::get('/', [CustomerController::class, 'customer_list'])->name('list');
            Route::get('/{id}', [CustomerController::class, 'customer_detail'])->name('detail');
        });

        //Orders
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', [OrderController::class, 'order_list'])->name('list');
            Route::get('/{id}', [OrderController::class, 'order_detail'])->name('detail');
        });

        //Products
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/list', [ProductController::class, 'product_list'])->name('list');
            Route::get('/add', [ProductController::class, 'product_add'])->name('add');
            Route::get('/detail/{id}', [ProductController::class, 'product_detail'])->name('detail');
        });

        //Categories
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/list', [CategoryController::class, 'category_list'])->name('list');
            Route::get('/add', [CategoryController::class, 'category_add'])->name('add');
            Route::get('/detail/{id}', [CategoryController::class, 'category_detail'])->name('detail');
        });

        //Brands
        Route::prefix('brands')->name('brands.')->group(function () {
            Route::get('/list', [BrandController::class, 'brand_list'])->name('list');
            Route::get('/add', [BrandController::class, 'brand_add'])->name('add');
            Route::get('/detail/{id}', [BrandController::class, 'brand_detail'])->name('detail');
        });
    });
});
