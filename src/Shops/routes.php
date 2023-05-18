<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/shops/', function () {
        return inertia('Shops/Index');
    });
    Route::get('/shops/shop/', function () {
        return inertia('Shop/Show');
    });
});
