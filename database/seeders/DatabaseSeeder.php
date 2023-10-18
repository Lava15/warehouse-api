<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Material;
use App\Models\MaterialProduct;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /**
         * Products seeds
         */
        $shirt = Product::query()->create(['product_name' => 'Koylak', 'product_code' => 'AA-101']);
        $trousers = Product::query()->create(['product_name' => 'Shim', 'product_code' => 'BB-202']);
        /**
         * Materials seeds
         */
        $textile = Material::query()->create(['material_name' => 'Mato']);
        $clothingButton = Material::query()->create(['material_name' => 'Tugma']);
        $thread = Material::query()->create(['material_name' => 'Ip']);
        $zipper = Material::query()->create(['material_name' => 'Zamok']);
        /**
         * Warehouse seeds
         */
        Warehouse::query()->create([
            'material_id' => $textile->id,
            'remainder' => 12,
            'price' => 1500,
        ]);
        Warehouse::query()->create([
            'material_id' => $textile->id,
            'remainder' => 12,
            'price' => 1600,
        ]);

        Warehouse::query()->create([
            'material_id' => $thread->id,
            'remainder' => 40,
            'price' => 500,
        ]);
        Warehouse::query()->create([
            'material_id' => $thread->id,
            'remainder' => 260,
            'price' => 550,
        ]);

        Warehouse::query()->create([
            'material_id' => $clothingButton->id,
            'remainder' => 150,
            'price' => 300,
        ]);

        Warehouse::query()->create([
            'material_id' => $zipper->id,
            'remainder' => 20,
            'price' => 2000,
        ]);

        /**
         * Pivot table seeds
         * Seeding to Product Shirt -> materials
         */
        MaterialProduct::query()->create([
            'product_id' => $shirt->id,
            'material_id' => $textile->id,
            'quantity' => 0.8,
        ]);
        MaterialProduct::query()->create([
            'product_id' => $shirt->id,
            'material_id' => $clothingButton->id,
            'quantity' => 5,
        ]);
        MaterialProduct::query()->create([
            'product_id' => $shirt->id,
            'material_id' => $thread->id,
            'quantity' => 10,
        ]);
        /**
         * Pivot table seeds
         * Seeding to Product Trousers -> materials
         */
        MaterialProduct::query()->create([
            'product_id' => $trousers->id,
            'material_id' => $textile->id,
            'quantity' => 1.4,
        ]);
        MaterialProduct::query()->create([
            'product_id' => $trousers->id,
            'material_id' => $thread->id,
            'quantity' => 15,
        ]);
        MaterialProduct::query()->create([
            'product_id' => $trousers->id,
            'material_id' => $zipper->id,
            'quantity' => 1,
        ]);
    }


}
