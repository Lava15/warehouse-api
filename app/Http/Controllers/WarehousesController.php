<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseRequest;
use App\Http\Responses\CollectionResponse;
use App\Services\WarehouseService;
use Illuminate\Contracts\Support\Responsable;
use Symfony\Component\HttpFoundation\Response;

class WarehousesController extends Controller
{
    public function __construct(
        private readonly WarehouseService $service
    )
    {
    }

    public function calculate(WarehouseRequest $request): Responsable
    {
        $productsData = $request->validated('products');
        $result = collect($productsData)->map(function ($product) {
            // Extract product data from service
            $productData = $this->service->getProductData($product);
            // Get the associated materials from service for product
            $relatedMaterials = $this->service->getRelatedMaterials($product['id']);
            // Attach product's materials info
            $productData['product_materials'] = $relatedMaterials->map(function ($material) use ($product) {
                return $this->service->process($material->material_id, $material->quantity * $product['quantity']);
            })->flatten(1);
            return $productData;
        })->toArray();

        return new CollectionResponse(
            data: ['result' => $result],
            status: Response::HTTP_OK
        );
    }
}
