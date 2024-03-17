<?php

use App\Http\Controllers\Seller\AuthSellerController;
use App\Http\Controllers\Seller\GeneralController;
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

        
    });

    
});