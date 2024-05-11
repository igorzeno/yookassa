<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/foo', function () {
    Artisan::call('storage:link');
});

Route::get('/', function () { return view('index'); });
Route::get('/products', function () { return view('product.index'); });

Route::match(['get', 'post'],'/payments/callback', [PaymentController::class, 'callback'])
    ->name('payments.callback');

Route::post('/payments/create', [PaymentController::class, 'create'])
    ->name('payment.create');

Route::get('payments', [PaymentController::class, 'index'])
    ->name('payment.index');
