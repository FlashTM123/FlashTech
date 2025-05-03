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
        $brands = [
            ['name' => 'ASUS'],
            ['name' => 'Acer'],
            ['name' => 'HP'],
            ['name' => 'Dell'],
            ['name' => 'Lenovo'],
            ['name' => 'MSI'],
            ['name' => 'Apple'],

            // Linh kiện máy tính
            ['name' => 'Intel'],
            ['name' => 'AMD'],
            ['name' => 'NVIDIA'],
            ['name' => 'GIGABYTE'],
            ['name' => 'ASRock'],
            ['name' => 'Corsair'],
            ['name' => 'Kingston'],
            ['name' => 'Samsung'],
            ['name' => 'Western Digital'],
            ['name' => 'Seagate'],
            ['name' => 'Crucial'],

            // Phụ kiện
            ['name' => 'Logitech'],
            ['name' => 'Razer'],
            ['name' => 'Anker'],
            ['name' => 'SteelSeries'],
            ['name' => 'HyperX'],
            ['name' => 'Cooler Master'],
            ['name' => 'NZXT'],
            ['name' => 'ASUS ROG'],
            ['name' => 'Microsoft'],
            ['name' => 'TP-Link'],

    ];
    foreach ($brands as $brand) {
        if (!DB::table('brands')->where('name', $brand['name'])->exists()) {
            DB::table('brands')->insert($brand);
        }
    }
    }
}
