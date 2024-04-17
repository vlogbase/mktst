<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DropzoneController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SellerController;
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

                Route::get('/ticker-tapes', [SliderController::class, 'ticker_tapes'])->name('ticker');
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
                Route::get('/popup', [ContentController::class, 'popup'])->name('popup.list');
                Route::get('/advertisement', [ContentController::class, 'advertisement'])->name('advertisement.list');
                Route::get('/advertisement/add', [ContentController::class, 'advertisement_add'])->name('advertisement.add');
                Route::get('/advertisement/{id}/edit', [ContentController::class, 'advertisement_edit'])->name('advertisement.edit');
                Route::get('/rss-feed', [ContentController::class, 'rss'])->name('rss.list');
                Route::get('/support-tickets', [ContentController::class, 'tickets'])->name('tickets.list');
                Route::get('/support-tickets/{id}/detail', [ContentController::class, 'tickets_detail'])->name('tickets.detail');
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
                Route::get('/', [CampaignController::class, 'coupon_list'])->name('list');
                Route::get('/add', [CampaignController::class, 'coupon_add'])->name('add');
                Route::get('/{id}', [CampaignController::class, 'coupon_detail'])->name('edit');
            });
        });

        //Customers
        Route::prefix('customers')->name('customers.')->group(function () {
            Route::get('/', [CustomerController::class, 'customer_list'])->name('list');
            Route::get('/create', [CustomerController::class, 'customer_create'])->name('create');
            Route::get('/{id}', [CustomerController::class, 'customer_detail'])->name('detail');
            Route::get('/{id}/edit', [CustomerController::class, 'customer_edit'])->name('edit');
        });


        //Admin Accounts
        Route::prefix('accounts')->name('accounts.')->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('list');
            Route::get('/create', [AdminController::class, 'create'])->name('create');
            //Route::get('/{id}', [SellerController::class, 'edit'])->name('edit');
            //Route::get('/{id}/team/create', [SellerController::class, 'member_create'])->name('memberCreate');
            //Route::get('/{id}/team/{memberId}', [SellerController::class, 'member_edit'])->name('memberEdit');
        });
        
        
        //Customers
        Route::prefix('sellers')->name('sellers.')->group(function () {
            Route::get('/', [SellerController::class, 'index'])->name('list');
            Route::get('/create', [SellerController::class, 'create'])->name('create');
            Route::get('/{id}', [SellerController::class, 'edit'])->name('edit');
            Route::get('/{id}/team/create', [SellerController::class, 'member_create'])->name('memberCreate');
            Route::get('/{id}/team/{memberId}', [SellerController::class, 'member_edit'])->name('memberEdit');
            
        });

        Route::prefix('offices')->name('offices.')->group(function () {
            Route::get('{customerId}/create', [OfficeController::class, 'create_office'])->name('create');
            Route::get('{customerId}/{id}/set-billing', [OfficeController::class, 'set_billing'])->name('set_billing');
            Route::get('{customerId}/{id}/set-shipping', [OfficeController::class, 'set_shipping'])->name('set_shipping');
            Route::get('{customerId}/{id}/delete', [OfficeController::class, 'delete'])->name('delete');
        });

        //Orders
        Route::prefix('orders')->name('orders.')->group(function () {
            Route::get('/', [OrderController::class, 'order_list'])->name('list');
            Route::get('/{id}', [OrderController::class, 'order_detail'])->name('detail');
        });

        //Products
        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [ProductController::class, 'product_list'])->name('list');
            Route::get('/add', [ProductController::class, 'product_add'])->name('add');
            Route::get('/{id}', [ProductController::class, 'product_detail'])->name('detail');
            Route::get('/bulk/upload', [ProductController::class, 'bulk_upload'])->name('bulk_upload');
            Route::get('/bulk/export', [ProductController::class, 'bulk_export'])->name('bulk_export');
        });

        //Categories
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'category_list'])->name('list');
            Route::get('/tree', [CategoryController::class, 'category_tree'])->name('tree');
            Route::get('/add', [CategoryController::class, 'category_add'])->name('add');
            Route::get('/{id}', [CategoryController::class, 'category_detail'])->name('detail');
        });

        //Brands
        Route::prefix('brands')->name('brands.')->group(function () {
            Route::get('/', [BrandController::class, 'brand_list'])->name('list');
            Route::get('/add', [BrandController::class, 'brand_add'])->name('add');
            Route::get('/{id}', [BrandController::class, 'brand_detail'])->name('detail');
        });
    });
});
