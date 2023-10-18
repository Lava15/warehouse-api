<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Responses\CollectionResponse;
use App\Models\Product;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    public function index(): Responsable
    {
        return new CollectionResponse(
            data: ProductResource::collection(
                Product::query()->get()
            ),
            status: Response::HTTP_OK
        );

    }
}
