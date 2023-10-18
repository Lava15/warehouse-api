<?php

namespace App\Services;

use App\Models\Material;
use App\Models\MaterialProduct;
use App\Models\Product;
use App\Models\Warehouse;

class WarehouseService
{
    private array $emptyWareHouse = [];
    private array $warehouseParties = [];

    public function getProductData($product): array
    {
        return [
            'product_name' => Product::query()->find($product['id'])->product_name,
            'product_quantity' => $product['quantity'],
        ];
    }

    public function getRelatedMaterials($productId)
    {
        return MaterialProduct::query()
            ->where('product_id', $productId)
            ->get(['material_id', 'quantity']);
    }

    public function getMaterialName($material_id): string
    {
        return Material::query()->find($material_id)->material_name;
    }

    public function process($material_id, $quantity): array
    {
        $processResult = [];

        $materials = Warehouse::query()
            ->where('material_id', $material_id)
            ->when(count($this->emptyWareHouse), function ($query) {
                $query->whereNotIn('id', $this->emptyWareHouse);
            })
            ->get();

        foreach ($materials as $warehouse) {
            $remainder = $this->warehouseParties[$warehouse->id] ?? $warehouse->remainder;

            if ($remainder >= $quantity && $quantity) {
                $processResult[] = [
                    'warehouse_id' => $warehouse->id,
                    'material_name' => $this->getMaterialName($warehouse->material_id),
                    'quantity' => $quantity,
                    'price' => $warehouse->price
                ];

                $this->warehouseParties[$warehouse->id] = ($this->warehouseParties[$warehouse->id] ?? $warehouse->remainder) - $quantity;
                $quantity = 0;
            } else {
                $getRemaining = $remainder;
                $processResult[] = [
                    'warehouse_id' => $warehouse->id,
                    'material_name' => $this->getMaterialName($warehouse->material_id),
                    'quantity' => $getRemaining,
                    'price' => $warehouse->price
                ];

                $quantity -= $getRemaining;
                $this->emptyWareHouse[] = $warehouse->id;
            }
        }

        if ($quantity) {
            $processResult[] = [
                'warehouse_id' => null,
                'material_name' => $this->getMaterialName($material_id),
                'quantity' => $quantity,
                'price' => null
            ];
        }

        return $processResult;
    }

}
