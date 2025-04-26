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
            'laptop_id' => 37,
           'description' => '​Laptop Dell Inspiron 15 3520 6HD73 là một mẫu máy tính xách tay thuộc dòng Inspiron phổ thông của Dell, hướng đến đối tượng người dùng văn phòng, học sinh – sinh viên và người dùng cá nhân cần một thiết bị đa năng, hiệu suất ổn định.​

🎨 Thiết kế hiện đại, tinh tế
Máy sở hữu thiết kế thanh lịch với tông màu đen chủ đạo, vỏ máy được làm từ chất liệu nhựa cao cấp, mang lại cảm giác chắc chắn và bền bỉ. Với trọng lượng khoảng 1.66 kg và kích thước tổng thể gọn gàng, Dell Inspiron 15 3520 6HD73 dễ dàng mang theo khi di chuyển, phù hợp cho công việc và học tập hàng ngày.​

💻 Màn hình sắc nét, bảo vệ mắt
Dell Inspiron 15 3520 6HD73 được trang bị màn hình 15.6 inch với độ phân giải Full HD (1920 x 1080), cho hình ảnh rõ nét và màu sắc trung thực. Màn hình sử dụng công nghệ chống chói, giúp giảm thiểu ánh sáng phản chiếu, bảo vệ mắt người dùng khi làm việc trong thời gian dài.​
Tech Store

⚙️ Hiệu năng ổn định cho công việc hàng ngày
Máy được trang bị bộ vi xử lý Intel Core i7-1255U thế hệ thứ 12 với 10 nhân 12 luồng, kết hợp cùng 16GB RAM DDR4 và ổ cứng SSD 512GB PCIe NVMe, mang lại hiệu suất mạnh mẽ cho các tác vụ văn phòng, học tập và giải trí. Card đồ họa tích hợp Intel Iris Xe Graphics hỗ trợ tốt cho các công việc đồ họa cơ bản và giải trí đa phương tiện.​
Tech Store
+2
CellphoneS
+2
Trung Tâm Bảo Hành
+2
Tech Store

🔌 Kết nối đa dạng, tiện lợi
Dell Inspiron 15 3520 6HD73 hỗ trợ đầy đủ các cổng kết nối cần thiết, bao gồm:​

1 x HDMI 1.4

2 x USB 3.2 Gen 1

1 x USB 2.0

1 x khe cắm thẻ SD

1 x jack tai nghe 3.5mm​
Điện Máy Xanh
+4
Trung Tâm Bảo Hành
+4
Tech Store
+4
Điện Máy Xanh

Ngoài ra, máy còn hỗ trợ kết nối không dây Wi-Fi 6 và Bluetooth 5.2, đảm bảo khả năng kết nối mạng nhanh chóng và ổn định.​

🔋 Thời lượng pin đủ dùng
Máy được trang bị pin 3 cell với dung lượng 41Wh, đáp ứng tốt nhu cầu sử dụng trong một ngày làm việc hoặc học tập. Thời lượng pin có thể thay đổi tùy thuộc vào mức độ sử dụng và cấu hình hệ thống.',

        ],
    ];
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
