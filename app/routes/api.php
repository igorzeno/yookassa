<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/product/get-product-id', [ProductController::class, 'getProductId']);
Route::get('/product/get-index', [ProductController::class, 'index']);

Route::get('/product/get-filter-products', [ProductController::class, 'filterProduct']);
Route::get('/product/get-count-products', [ProductController::class, 'countProduct']);
