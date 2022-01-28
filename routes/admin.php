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
            Route::get('/forget-password', [AuthController::class, 'forget'])->name('forget');
            Route::get('/reset-password/{email}/{token}', [AuthController::class, 'reset'])->name('reset');
        });

        Route::middleware('auth:admin')->group(function () {
            //Admin Authenticated
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        });
    });
});
