<?php

use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

//Admin Part
Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::middleware('guest:admin')->group(function () {
            //Admin Guest
            Route::get('/login', [AuthController::class, 'login'])->name('login');
        });

        Route::middleware('auth:admin')->group(function () {
            //Admin Authenticated
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        });
    });
});
