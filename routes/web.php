<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::post('/store-benefits', [HomeController::class, 'storeBenefit'])->name('store-benefits');
Route::post('/store-benefits-ratings', [HomeController::class, 'storeBenefitsRatings'])->name('store-benefits-ratings');
Route::get('/flash-session', [HomeController::class, 'flashSession'])->name('flash-session');
Route::post('/store/client-info', [HomeController::class, 'storeClientInfo'])->name('store.client-info');


