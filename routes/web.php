<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'dashboard'])
    ->name('dashboard');

Route::resource('products', ProductController::class);