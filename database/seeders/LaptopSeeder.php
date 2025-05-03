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
                'name' => 'Dell Inspiron 15 3525',
                'brand_id' => 62,
                'color' => 'Black',
                'cpu' => 'AMD Ryzen 5 7535U',
                'ram' => '16GB DDR4',
                'vga' => 'AMD Radeon Graphics',
                'storage' => '512GB SSD',
                'original_price' => 17990000,
                'discount' => 10,
                'promotional_price' => 16191000,
                'quantity' => 20,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/358x/media/catalog/product/l/a/laptop-dell-insprion-3525-n5r75825u106w-1_1.jpg'
            ],
            [
                'name' => 'HP Pavilion Gaming 15',
                'brand_id' => 61,
                'color' => 'Shadow Black',
                'cpu' => 'AMD Ryzen 5 5600H',
                'ram' => '8GB DDR4',
                'vga' => 'NVIDIA GeForce GTX 1650',
                'storage' => '512GB SSD',
                'original_price' => 20990000,
                'discount' => 5,
                'promotional_price' => 19940000,
                'quantity' => 15,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop_hp_pavilion_gaming_15_ec1054ax_1n1h6pa_0004_layer_1.jpg'
            ],
            [
                'name' => 'Lenovo IdeaPad Gaming 3',
                'brand_id' => 63,
                'color' => 'Onyx Black',
                'cpu' => 'AMD Ryzen 5 5600H',
                'ram' => '8GB DDR4',
                'vga' => 'NVIDIA GTX 1650',
                'storage' => '512GB SSD',
                'original_price' => 20490000,
                'discount' => 7,
                'promotional_price' => 19055700,
                'quantity' => 18,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/1/0/10_9_13.jpg'
            ],
            [
                'name' => 'MSI GF63 Thin',
                'brand_id' => 64,
                'color' => 'Black',
                'cpu' => 'Intel Core i5-11400H',
                'ram' => '8GB DDR4',
                'vga' => 'NVIDIA GTX 1650 Max-Q',
                'storage' => '512GB SSD',
                'original_price' => 19490000,
                'discount' => 8,
                'promotional_price' => 17930800,
                'quantity' => 12,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_1__4_35.png'
            ],
            [
                'name' => 'Razer Blade 15',
                'brand_id' => 78,
                'color' => 'Black',
                'cpu' => 'Intel Core i7-12700H',
                'ram' => '16GB DDR5',
                'vga' => 'NVIDIA RTX 3060',
                'storage' => '1TB SSD',
                'original_price' => 54990000,
                'discount' => 5,
                'promotional_price' => 52240500,
                'quantity' => 7,
                'status' => 'active',
                'image' => 'https://imagor.owtg.one/unsafe/fit-in/880x495/https://d28jzcg6y4v9j1.cloudfront.net/backend/uploads/product/color_images/2020/7/30/razer-blade-15-advanced-Blade15A01NS-B7l.jpg'
            ],
            [
                'name' => 'Apple MacBook Air M2',
                'brand_id' => 65,
                'color' => 'Midnight',
                'cpu' => 'Apple M2',
                'ram' => '8GB Unified',
                'vga' => 'Apple GPU 8-core',
                'storage' => '512GB SSD',
                'original_price' => 31990000,
                'discount' => 3,
                'promotional_price' => 31030300,
                'quantity' => 10,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/macbook_air_m2_1_1.jpg'
            ],
            [
                'name' => 'Microsoft Surface Laptop 4',
                'brand_id' => 65,
                'color' => 'Platinum',
                'cpu' => 'Intel Core i5-1135G7',
                'ram' => '8GB LPDDR4x',
                'vga' => 'Intel Iris Xe Graphics',
                'storage' => '512GB SSD',
                'original_price' => 28990000,
                'discount' => 4,
                'promotional_price' => 27830400,
                'quantity' => 8,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/u/surface-laptop-3__0017_vai-xanh-2_5.jpg'
            ],
            [
                'name' => 'LG Gram 17',
                'brand_id' => 89,
                'color' => 'White',
                'cpu' => 'Intel Core i7-1260P',
                'ram' => '16GB LPDDR5',
                'vga' => 'Intel Iris Xe',
                'storage' => '1TB SSD',
                'original_price' => 41990000,
                'discount' => 6,
                'promotional_price' => 39470600,
                'quantity' => 6,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-lg-gram-17-2021-7.jpg'
            ],
            [
                'name' => 'Asus TUF Gaming A15 FA506',
                'brand_id' => 59,
                'color' => 'Gray',
                'cpu' => 'AMD Ryzen 5 5600H',
                'ram' => '16GB DDR4',
                'vga' => 'GTX 1650',
                'storage' => '512GB SSD',
                'original_price' => 20990000,
                'discount' => 9,
                'promotional_price' => 19100900,
                'quantity' => 13,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/l/a/laptop-asus-tuf-gaming-a15-ryzen-7_1_.jpg'
            ],
            [
                'name' => 'Acer Swift 3 SF314',
                'brand_id' => 60,
                'color' => 'Silver',
                'cpu' => 'Intel Core i5-1240P',
                'ram' => '16GB LPDDR4x',
                'vga' => 'Intel Iris Xe',
                'storage' => '512GB SSD',
                'original_price' => 18990000,
                'discount' => 5,
                'promotional_price' => 18040500,
                'quantity' => 9,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_5__3_16.png'
            ],
            [
                'name' => 'ASUS Vivobook 14X OLED',
                'brand_id' => 59,
                'color' => 'Indie Black',
                'cpu' => 'Intel Core i5-12450H',
                'ram' => '8GB DDR4',
                'vga' => 'Intel UHD Graphics',
                'storage' => '512GB SSD',
                'original_price' => 18990000,
                'discount' => 6,
                'promotional_price' => 17850600,
                'quantity' => 12,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_10__3_23.png'
            ],
            [
                'name' => 'HP 240 G9',
                'brand_id' => 61,
                'color' => 'Silver',
                'cpu' => 'Intel Core i3-1215U',
                'ram' => '8GB DDR4',
                'vga' => 'Intel UHD Graphics',
                'storage' => '256GB SSD',
                'original_price' => 12990000,
                'discount' => 3,
                'promotional_price' => 12600300,
                'quantity' => 14,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_7__135.png'
            ],
            [
                'name' => 'Lenovo ThinkPad E14 Gen 4',
                'brand_id' => 63,
                'color' => 'Black',
                'cpu' => 'Intel Core i5-1235U',
                'ram' => '8GB DDR4',
                'vga' => 'Intel Iris Xe',
                'storage' => '512GB SSD',
                'original_price' => 20990000,
                'discount' => 5,
                'promotional_price' => 19940500,
                'quantity' => 11,
                'status' => 'active',
                'image' => 'https://anphat.com.vn/media/product/43175_laptop_lenovo_thinkpad_e14_gen_4_21e300dsva_anphatpc_36.jpg'
            ],
            [
                'name' => 'ASUS Zenbook 14 OLED',
                'brand_id' => 59,
                'color' => 'Blue',
                'cpu' => 'Intel Core i7-1360P',
                'ram' => '16GB LPDDR5',
                'vga' => 'Intel Iris Xe',
                'storage' => '1TB SSD',
                'original_price' => 33990000,
                'discount' => 6,
                'promotional_price' => 31950600,
                'quantity' => 10,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_1__1_115.png'
            ],
            [
                'name' => 'MSI Modern 15 B12M',
                'brand_id' => 64,
                'color' => 'Carbon Gray',
                'cpu' => 'Intel Core i5-1235U',
                'ram' => '8GB DDR4',
                'vga' => 'Intel Iris Xe',
                'storage' => '512GB SSD',
                'original_price' => 16990000,
                'discount' => 5,
                'promotional_price' => 16140500,
                'quantity' => 13,
                'status' => 'active',
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/7/_/7_106_1.jpg'
            ],
            [
               "name" => "Asus ROG Strix G16 G614JI",
    "brand_id" => "84",
    "color" => "Gray",
    "cpu" => "Intel Core i9-13980HX",
    "ram" => "32GB DDR5",
    "vga" => "NVIDIA GeForce RTX 4070",
    "storage" => "1TB SSD",
    "original_price" => 56990000,
    "discount" => 10,
    "promotional_price" => 51291000,
    "quantity" => 12,
    "status" => 1,
    "image" => "https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_8__4_58.png"
            ]

        ];

        foreach ($laptops as $laptop) {
            if (!DB::table('laptops')->where('name', $laptop['name'])->exists()) {
                DB::table('laptops')->insert($laptop);
            }
        }


    }
}
