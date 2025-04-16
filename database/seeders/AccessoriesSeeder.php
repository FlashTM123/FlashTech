<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AccessoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accessories =[[
            'name' => 'Razer BlackWidow V3',
        'brand_id' => 45, // Razer
        'color_id' => 2, // Đen
        'type' => 'Bàn phím cơ',
        'original_price' => 2990000,
        'discount' => 15,
        'promotional_price' => 2541500,
        'quantity' => 15,
        'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/7/_/7_15_63.jpg',
        ],
    ];
        foreach ($accessories as $accessory) {
          if(!DB::table('accessories')->where('name', $accessory['name'])->exists()){
            DB::table('accessories')->insert($accessory);
          }
        }
    }
}
