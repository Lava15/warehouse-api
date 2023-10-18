<?php

use App\Http\Controllers\FallbackController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WarehousesController;
use Illuminate\Support\Facades\Route;


Route::prefix('/products')->group(function () {
    Route::get('/', [ProductsController::class, 'index']);
});

Route::prefix('/materials')->group(function () {
    Route::get('/', [MaterialsController::class, 'index']);
});

Route::prefix('/warehouse')->group(function () {
    Route::post('/calculate', [WarehousesController::class, 'calculate']);
});

Route::fallback(FallbackController::class);
