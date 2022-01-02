<?php

use Illuminate\Support\Facades\Route;


//Customer Part
Route::get('/', function () {
    return view('customer.welcome');
});


//Admin Part
Route::get('/admin', function () {
    return view('admin.dashboard');
});
