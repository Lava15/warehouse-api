<?php

use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


Route::apiResource('/products', ProductsController::class);
Route::apiResource('/materials', MaterialsController::class);
