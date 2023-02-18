<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
//Route::post('/store', [HomeController::class, 'store'])->name('store.benefits-brands');
//Route::post('/store-client', [HomeController::class, 'storeClientInformation'])->name('store.client');
//Route::post('/flash-client-data', [HomeController::class, 'flashRequestClientInfo'])->name('flash.client-data');

Route::get('/store-benefits', [HomeController::class, 'storeBenefit'])->name('store-benefits');
Route::post('/store-benefits-ratings', [HomeController::class, 'storeBenefitsRatings'])->name('store-benefits-ratings');
