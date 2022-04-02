<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run(): void
    {
        Material::create([
            'name' => 'Mato'
        ]);
        Material::create([
            'name' => 'Ip'
        ]);
        Material::create([
            'name' => 'Tugma'
        ]);
        Material::create([
            'name' => 'Zamok'
        ]);
    }
}
