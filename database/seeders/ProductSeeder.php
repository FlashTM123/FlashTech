<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [[
            'type' => 'laptop',
            'type_id' => 45,
            'description' => 'Acer Nitro 5 AN515 là chiếc laptop gaming tầm trung được trang bị vi xử lý Intel Core i7 thế hệ 12 mạnh mẽ kết hợp với card đồ họa NVIDIA GeForce RTX 3050. Máy sở hữu thiết kế góc cạnh hầm hố, đậm chất game thủ cùng màn hình 15.6 inch Full HD 144Hz cho trải nghiệm hình ảnh mượt mà. Hệ thống tản nhiệt kép Acer CoolBoost giúp máy hoạt động ổn định ngay cả khi chơi game nặng. Đây là lựa chọn phù hợp cho các game thủ hoặc người dùng làm đồ họa ở mức độ khá.',
        ],
    ];
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
