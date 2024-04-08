<?php

use App\Http\Controllers\Seller\AuthSellerController;
use App\Http\Controllers\Seller\GeneralController;
use App\Http\Controllers\Seller\SellerBrandsController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Seller\SellerTeamController;
use Illuminate\Support\Facades\Route;

//Admin Part
Route::prefix('seller')->name('seller.')->group(function () {

    Route::middleware('guest:seller')->group(function () {
        //Admin Guest
        Route::get('/login', [AuthSellerController::class, 'login'])->name('login');
        Route::get('/forget-password', [AuthSellerController::class, 'forget'])->name('forget');
        Route::get('/reset-password/{email}/{token}', [AuthSellerController::class, 'reset'])->name('reset');
    });

    Route::middleware('auth:seller')->group(function () {
        //Admin Authenticated
        Route::get('/', [GeneralController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AuthSellerController::class, 'logout'])->name('logout');
        Route::get('/profile-settings', [GeneralController::class, 'settings'])->name('settings');

        Route::prefix('products')->name('products.')->group(function () {
            Route::get('/', [SellerProductController::class, 'product_list'])->name('list');
            Route::get('/add', [SellerProductController::class, 'product_add'])->name('add');
            Route::get('/{id}', [SellerProductController::class, 'product_detail'])->name('detail');
            Route::get('/bulk/upload', [SellerProductController::class, 'bulk_upload'])->name('bulk_upload');
        });

        Route::prefix('brands')->name('brands.')->group(function () {
            Route::get('/', [SellerBrandsController::class, 'brands_list'])->name('list'); 
        });

        Route::prefix('team')->name('team.')->group(function () {
            Route::get('/', [SellerTeamController::class, 'team_list'])->name('list'); 
            Route::get('/create', [SellerTeamController::class, 'member_create'])->name('memberCreate');
            Route::get('/{memberId}', [SellerTeamController::class, 'member_edit'])->name('memberEdit');
        });
        
    });

    
});