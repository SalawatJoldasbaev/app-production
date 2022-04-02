<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'material_id' => 1,
                'remainder' => 12,
                'price' => 1500
            ],
            [
                'material_id' => 1,
                'remainder' => 200,
                'price' => 1600
            ],
            [
                'material_id' => 2,
                'remainder' => 40,
                'price' => 500
            ],
            [
                'material_id' => 2,
                'remainder' => 300,
                'price' => 550
            ],
            [
                'material_id' => 3,
                'remainder' => 500,
                'price' => 300
            ],
            [
                'material_id' => 4,
                'remainder' => 1000,
                'price' => 2000
            ],
        ];
        Warehouse::upsert($data, [
            'material_id', 'remainder', 'price'
        ]);
    }
}
