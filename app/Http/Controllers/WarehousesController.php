<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehousesController extends Controller
{
    public function calculate(Request $request)
    {
        return response()->json('success');
    }
}
