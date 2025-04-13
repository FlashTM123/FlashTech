<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [ [
            'name' => 'Samsung 970 EVO Plus',
            'brand_id' => 48,
            'type' => 'SSD',
            'capacity' => '1TB',
            'original_price' => 3290000,
            'discount' => 5,
            'promotional_price' => 3125500,
            'quantity' => 20,
            'image' => 'https://cdn2.cellphones.com.vn/x/media/catalog/product/8/_/8_12_82.jpg',
        ],
        [
            'name' => 'Western Digital Blue 1TB',
            'brand_id' => 32,
            'type' => 'HDD',
            'capacity' => '1TB',
            'original_price' => 1190000,
            'discount' => 10,
            'promotional_price' => 1071000,
            'quantity' => 50,
            'image' => 'https://cdn2.cellphones.com.vn/x/media/catalog/product/t/_/t_i_xu_ng_-_2023-01-28t224216.608.png',
        ],

        [
            'name' => 'Corsair Vengeance LPX 32GB',
            'brand_id' => 41,
            'type' => 'RAM DDR4',
            'capacity' => '32GB',
            'original_price' => 2990000,
            'discount' => 7,
            'promotional_price' => 2781700,
            'quantity' => 15,
            'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/r/a/ram-corsair-vengeance-rgb-rs-ddr4-3200mhz-32gb_2_.png',
        ],
        [
            'name' => 'Intel Core i5-13400F',
            'brand_id' => 37,
            'type' => 'CPU',
            'capacity' => '10 Cores / 16 Threads',
            'original_price' => 4290000,
            'discount' => 5,
            'promotional_price' => 4075500,
            'quantity' => 10,
            'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_-_2023-02-08t210655.677_1.png',
        ],
        [
            'name' => 'AMD Ryzen 5 5600X',
            'brand_id' => 54,
            'type' => 'CPU',
            'capacity' => '6 Cores / 12 Threads',
            'original_price' => 7890000,
            'discount' => 6,
            'promotional_price' => 6690000,
            'quantity' => 12,
            'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_-_2023-01-02t221507.270_2.png',
        ],
        [
            "name" => "Intel Core i7-12700K",
            "brand_id" => 37,
            "type" => "CPU",
            "capacity" => "12 cores / 20 threads",
            "original_price" => 9190000,
            "discount" => 7,
            "promotional_price" => 8546700,
            "quantity" => 25,
            "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/p/cpu-intel-core-i7-12700k_.jpg"
        ],
        [
            "name" => "Seagate Barracuda 2TB HDD 7200RPM",
            "brand_id" => 33,
            "type" => "HDD",
            "capacity" => "2TB",
            "original_price" => 1390000,
            "discount" => 10,
            "promotional_price" => 1251000,
            "quantity" => 35,
            "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0002_screenshot_3.jpg"
        ],
        [
            "name" => "GIGABYTE B660M DS3H DDR4",
            "brand_id" => 55,
            "type" => "Mainboard",
            "capacity" => "LGA 1700 / mATX",
            "original_price" => 2990000,
            "discount" => 6,
            "promotional_price" => 2810600,
            "quantity" => 20,
            "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/3/_/3_202.jpg"
        ],
        [
            "name" => "Corsair CV550 550W 80 Plus Bronze",
            "brand_id" => 41,
            "type" => "PSU",
            "capacity" => "550W",
            "original_price" => 1150000,
            "discount" => 4,
            "promotional_price" => 1104000,
            "quantity" => 30,
            "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_-_2023-01-04t235815.408.png"
        ],
    ];
        foreach ($components as $component) {
            if(!DB::table('components')->where('name', $component['name'])->exists()) {
                DB::table('components')->insert($component);
            }
        }
    }
}
