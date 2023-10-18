<?php

namespace App\Http\Controllers;

use App\Http\Resources\MaterialResource;
use App\Http\Responses\CollectionResponse;
use App\Models\Material;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaterialsController extends Controller
{
    public function index(): Responsable
    {
        return new CollectionResponse(
            data: MaterialResource::collection(
                Material::query()->get()
            ),
            status: Response::HTTP_OK
        );
    }
}
