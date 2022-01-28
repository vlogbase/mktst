<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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
        Route::prefix('contents')->name('contents.')->group(function () {
            //Admin Contents
            Route::prefix('sliders')->name('sliders.')->group(function () {
                //Admin Contents Sliders
                //Web
                Route::get('/web-sliders', [ContentController::class, 'web_sliders'])->name('web');
                //App
                Route::get('/app-sliders', [ContentController::class, 'app_sliders'])->name('app');
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
                Route::get('/messages/{id}', [ContentController::class, 'message_detail'])->name('messages.detail');
                Route::get('/newsletter', [ContentController::class, 'newsletter_list'])->name('newsletter.list');
                Route::get('/jobresumes', [ContentController::class, 'jobresume_list'])->name('jobresumes.list');
                Route::get('/jobresumes/{id}', [ContentController::class, 'jobresume_detail'])->name('jobresumes.detail');
            });
        });
    });
});
