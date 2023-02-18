<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/store-benefits', [HomeController::class, 'storeBenefit'])->name('store-benefits');
Route::post('/store-benefits-ratings', [HomeController::class, 'storeBenefitsRatings'])->name('store-benefits-ratings');
