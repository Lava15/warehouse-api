<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        Material::query()->create([
            'material_name' => 'Mato',
        ]);
        Material::query()->create([
            'material_name' => 'Tugma',
        ]);
        Material::query()->create([
            'material_name' => 'Ip',
        ]);
        Material::query()->create([
            'material_name' => 'Zamok',
        ]);
    }
}
