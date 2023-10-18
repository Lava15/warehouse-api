<?php

namespace App\Http\Controllers;

use App\Http\Responses\ApiErrorResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        return new ApiErrorResponse(
            message: 'Api endpoint not found',
            status: Response::HTTP_NOT_FOUND
        );
    }
}
