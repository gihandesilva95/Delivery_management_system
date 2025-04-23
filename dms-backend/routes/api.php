<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/delivery', [DeliveryController::class, 'index']);
Route::post('/delivery', [DeliveryController::class, 'store']);

