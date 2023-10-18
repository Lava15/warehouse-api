<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use Illuminate\Http\Request;

class WarehousesController extends Controller
{
    public function calculate(WarehouseRequest $request)
    {
        return response()->json($request->validated());
    }
}
