<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricePeriodController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/prices', [PricePeriodController::class, 'getPrices']);

Route::get('/price-period', [PricePeriodController::class, 'index']);
Route::get('/price-period/{pricePeriod}', [PricePeriodController::class, 'show']);
Route::post('/price-period', [PricePeriodController::class, 'store']);
Route::post('/price-period/{pricePeriod}', [PricePeriodController::class, 'update']);
Route::delete('/price-period/{pricePeriod}', [PricePeriodController::class, 'destroy']);

Route::middleware('auth:sanctum')->group(function () {
});