<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\PassportAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('product/list', [ProductController::class, 'getProductList']);
    Route::get('product/{id}', [ProductController::class, 'getProduct']);
    Route::post('product/create', [ProductController::class, 'createProduct']);
});
