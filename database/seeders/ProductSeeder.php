<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::query()->create([
            'product_name' => 'Koylak',
            'product_code' => 'AA-101',
        ]);

        Product::query()->create([
            'product_name' => 'Shim',
            'product_code' => 'BB-202',
        ]);
    }
}
