<?php

use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WarehousesController;
use Illuminate\Support\Facades\Route;


Route::apiResource('/products', ProductsController::class);
Route::apiResource('/materials', MaterialsController::class);
Route::post('/warehouse-calculate', WarehousesController::class);
