<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehousesController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json('success');
    }
}
