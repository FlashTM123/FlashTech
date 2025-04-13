<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Sửa namespace của DB

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptops = [
            [
                "name" => "Acer Nitro 5 AN515",
                "brand_id" => 43,
                "color_id" => 9,
                "cpu" => "Intel Core i7-12700H",
                "ram" => "16GB DDR4",
                "vga" => "NVIDIA GeForce RTX 3050",
                "storage" => "512GB SSD",
                "original_price" => 27990000,
                "discount" => 8,
                "promotional_price" => 25750800,
                "quantity" => 0,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/8/28_1_17.jpg",
            ],
            [
                "name" => "Acer Aspire 5 A515",
                "brand_id" => 43,
                "color_id" => 1,
                "cpu" => "Intel Core i5-1235U",
                "ram" => "8GB DDR4",
                "vga" => "Intel Iris Xe Graphics",
                "storage" => "512GB SSD",
                "original_price" => 18999000,
                "discount" => 10,
                "promotional_price" => 17099100,
                "quantity" => 0,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/8/28_1_16.jpg",
            ],
            [
                "name" => "Asus ROG Zephyrus G14",
                "brand_id" => 4,
                "color_id" => 1,
                "cpu" => "AMD Ryzen 9 6900HS",
                "ram" => "32GB DDR5",
                "vga" => "NVIDIA GeForce RTX 3060",
                "storage" => "1TB SSD",
                "original_price" => 30400000,
                "discount" => 21,
                "promotional_price" => 23990000,
                "quantity" => 0,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0006_g14-2021-4_compressed.jpg",
            ],
            [
                "name" => "Dell Inspiron 15 3525",
                "brand_id" => 2,
                "color_id" => 2,
                "cpu" => "AMD Ryzen 5 7535U",
                "ram" => "8GB DDR4",
                "vga" => "AMD Radeon Graphics",
                "storage" => "512GB SSD",
                "original_price" => 17990000,
                "discount" => 10,
                "promotional_price" => 16999000,
                "quantity" => 3,
                "image" => "",
            ],
            [
                "name" => "HP Pavilion Gaming 15",
                "brand_id" => 30,
                "color_id" => 2,
                "cpu" => "Intel Core i5-12450H",
                "ram" => "16GB DDR4",
                "vga" => "NVIDIA GeForce GTX 1650",
                "storage" => "512GB SSD",
                "original_price" => 23990000,
                "discount" => 5,
                "promotional_price" => 22790800,
                "quantity" => 3,
                "image" => "https://cdn2.cellphones.com.vn/x/media/catalog/product/l/a/laptop_hp_pavilion_gaming_15_ec1054ax_1n1h6pa_0003_layer_2.jpg",
            ],
            [
                "name" => "Lenovo IdeaPad Gaming 3",
                "brand_id" => 1,
                "color_id" => 2,
                "cpu" => "AMD Ryzen 5 5600H",
                "ram" => "8GB DDR4",
                "vga" => "NVIDIA GeForce GTX 1650",
                "storage" => "512GB SSD",
                "original_price" => 22490000,
                "discount" => 24,
                "promotional_price" => 17990000,
                "quantity" => 3,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/0/10_9_13.jpg",
            ],
            [
                "name" => "MSI GF63 Thin",
                "brand_id" => 44,
                "color_id" => 2,
                "cpu" => "Intel Core i5-12450H",
                "ram" => "8GB DDR4",
                "vga" => "NVIDIA GeForce GTX 3050",
                "storage" => "512GB SSD",
                "original_price" => 18990000,
                "discount" => 31,
                "promotional_price" => 15490000,
                "quantity" => 10,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop_msi.png",
            ],
            [
                "name" => "Razer Blade 15",
                "brand_id" => 45,
                "color_id" => 2,
                "cpu" => "Intel Core i7-12800H",
                "ram" => "16GB DDR5",
                "vga" => "NVIDIA GeForce RTX 3070",
                "storage" => "1TB SSD",
                "original_price" => 26990000,
                "quantity" => 34,
                "image" => "https://imagor.owtg.one/unsafe/fit-in/880x495/https://d28jzcg6y4v9j1.cloudfront.net/backend/uploads/product/color_images/2020/7/30/razer-blade-15-advanced-Blade15A01NS-B7l.jpg",
            ],
            [
                "name" => "Apple MacBook Air M2",
                "brand_id" => 14,
                "color_id" => 6,
                "cpu" => "Apple M2",
                "ram" => "8GB Unified Memory",
                "vga" => "Apple GPU",
                "storage" => "256GB SSD",
                "original_price" => 24990000,
                "discount" => 45,
                "promotional_price" => 19990000,
                "quantity" => 0,
                "image" => "https://cdn2.cellphones.com.vn/358x/media/catalog/product/m/a/macbook_air_m2_2_3.jpg",
            ],
            [
                "name" => "Microsoft Surface Laptop 4",
                "brand_id" => 46,
                "color_id" => 9,
                "cpu" => "AMD Ryzen 5 4680U",
                "ram" => "8GB LPDDR4x",
                "vga" => "AMD Radeon Graphics",
                "storage" => "256GB SSD",
                "original_price" => 29990000,
                "discount" => 50,
                "promotional_price" => 24990000,
                "quantity" => 5,
                "image" => "https://cdn2.cellphones.com.vn/x/media/catalog/product/l/a/laptop-surface-4-01.jpg",
            ],
            [
                "name" => "LG Gram 17",
                "brand_id" => 47,
                "color_id" => 2,
                "cpu" => "Intel Core i7-1165G7",
                "ram" => "16GB LPDDR4x",
                "vga" => "Intel Iris Xe Graphics",
                "storage" => "1TB SSD",
                "original_price" => 54900000,
                "discount" => 50,
                "promotional_price" => 31990000,
                "quantity" => 2,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-lg-gram-17-2021-7.jpg",
            ],


            [
                'name' => 'Asus TUF Gaming A15 FA506',
                'brand_id' => 4,
                'color_id' => 9,
                'cpu' => 'AMD Ryzen 5 5600H',
                'ram' => '8GB DDR4',
                'vga' => 'NVIDIA GeForce GTX 1650',
                'storage' => '512GB SSD',
                'original_price' => 26990000,
                'discount' => 4,
                'promotional_price' => 25990000,
                'quantity' => 0,
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/2/8/28_1_15.jpg',


            ],
            [
                "name" => "Acer Swift 3 SF314",
                "brand_id" => 43, // Acer
                "color_id" => 6, // Silver
                "cpu" => "Intel Core i5-1240P",
                "ram" => "16GB LPDDR4X",
                "vga" => "Intel Iris Xe Graphics",
                "storage" => "512GB SSD",
                "original_price" => 18990000,
                "discount" => 10,
                "promotional_price" => 17091000,
                "quantity" => 18,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_5__3_16.png",
            ],
            [
                "name" => "ASUS Vivobook 14X OLED",
                "brand_id" => 4, // ASUS
                "color_id" => 1, // Xám
                "cpu" => "AMD Ryzen 7 5800H",
                "ram" => "16GB DDR4",
                "vga" => "AMD Radeon Graphics",
                "storage" => "512GB SSD",
                "original_price" => 20990000,
                "discount" => 8,
                "promotional_price" => 19310800,
                "quantity" => 14,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_10__3_23.png",

            ],
            [
                "name" => "HP 240 G9",
                "brand_id" => 30, // HP
                "color_id" => 6, // Silver
                "cpu" => "Intel Core i5-1215U",
                "ram" => "8GB DDR4",
                "vga" => "Intel UHD Graphics",
                "storage" => "256GB SSD",
                "original_price" => 10990000,
                "discount" => 5,
                "promotional_price" => 10440500,
                "quantity" => 25,
                "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_10__4_155.png",

            ],


        ];

        foreach ($laptops as $laptop) {
            if (!DB::table('laptops')->where('name', $laptop['name'])->exists()) {
                DB::table('laptops')->insert($laptop);
            }
        }


    }
}
