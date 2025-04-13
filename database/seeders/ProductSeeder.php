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
            'type_id' => 58,
            'description' => 'Asus TUF Gaming A15 FA506 là mẫu laptop gaming tầm trung nổi bật với hiệu năng ổn định và độ bền chuẩn quân đội. Máy được trang bị vi xử lý AMD Ryzen 5 5600H kết hợp với card đồ họa NVIDIA GeForce GTX 1650, mang lại khả năng chiến tốt các tựa game phổ biến như Liên Minh, Valorant, GTA V hay CS:GO ở thiết lập trung bình đến cao. RAM 16GB DDR4 và ổ SSD 512GB giúp xử lý đa nhiệm mượt mà, rút ngắn thời gian khởi động máy và mở ứng dụng. Thiết kế máy đậm chất game thủ, đạt chuẩn MIL-STD-810H về độ bền, đi kèm bàn phím RGB và hệ thống tản nhiệt hai quạt giúp máy hoạt động ổn định khi chơi game lâu. Đây là lựa chọn hợp lý cho sinh viên hoặc game thủ đang tìm kiếm một laptop gaming bền, mạnh và giá tốt.

',
        ],
    ];
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
