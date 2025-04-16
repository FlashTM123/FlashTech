<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Sửa namespace của DB

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [[
            "name"=> "Xiaomi",
            "category"=>"Laptop",
        ],
        [
            'name'=> "Blala",
            "category"=>"Laptop",
        ],
        [
            "name"=> "Razer",
            "category"=>"Accessories",
        ],

    ];
    foreach ($brands as $brand) {
        if (!DB::table('brands')->where('name', $brand['name'])->exists()) {
            DB::table('brands')->insert($brand);
        }
    }
    }
}
