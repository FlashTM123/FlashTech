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
        $products = [
            [
                'laptop_id' => 41,
                'description' => '✨ Thiết kế cao cấp, hiện đại
MacBook Pro 14 sở hữu thiết kế nhôm nguyên khối cực kỳ cao cấp, các cạnh bo tròn mềm mại và mỏng nhẹ nhưng vẫn rất chắc chắn. Dù chỉ nặng khoảng 1.6kg, máy vẫn mang lại cảm giác "đầm tay" và vô cùng bền bỉ, đúng phong cách Apple. Các viền màn hình được làm mỏng tối đa, giúp tổng thể gọn gàng hơn nhiều so với các thế hệ trước.

🖥️ Màn hình Liquid Retina XDR tuyệt đẹp
MacBook Pro 14 sử dụng màn hình Liquid Retina XDR 14.2 inch, độ phân giải 3024 x 1964 pixel, hỗ trợ ProMotion (tần số quét 120Hz) và độ sáng lên tới 1600 nits. Công nghệ mini-LED cho màu đen sâu hơn, độ tương phản cao hơn, rất lý tưởng cho công việc chỉnh sửa ảnh, video chuyên nghiệp hoặc trải nghiệm giải trí đỉnh cao.

⚡ Hiệu năng cực khủng
Máy được trang bị dòng chip Apple Silicon (M1 Pro, M1 Max, hoặc thế hệ mới như M3 Pro, M3 Max tùy phiên bản năm bạn hỏi), mang lại hiệu năng CPU và GPU vượt trội. Với khả năng xử lý đồ họa mạnh, chạy ứng dụng nặng và đa nhiệm mượt mà, MacBook Pro 14 dễ dàng đáp ứng các công việc chuyên sâu như dựng phim 8K, render 3D, lập trình, AI machine learning, v.v.

🔋 Thời lượng pin ấn tượng
Dù hiệu năng rất mạnh, MacBook Pro 14 vẫn duy trì thời lượng pin lên đến 17 tiếng khi lướt web hoặc 11 tiếng xem video liên tục. Đây là điểm cực kỳ mạnh so với laptop Windows cùng phân khúc hiệu năng.

🔊 Âm thanh và camera tuyệt vời
Hệ thống 6 loa, hỗ trợ Spatial Audio, mang đến âm thanh vòm sống động.

Webcam 1080p, chất lượng hình ảnh sắc nét hơn nhiều so với thế hệ cũ.

3 micro chất lượng phòng thu, hỗ trợ thu âm và gọi video cực kỳ rõ ràng.

🛠️ Kết nối đầy đủ và tiện dụng
MacBook Pro 14 được trang bị:

3 cổng Thunderbolt 4 (USB-C)

1 cổng HDMI

1 khe cắm thẻ nhớ SDXC

1 cổng sạc MagSafe 3

Jack tai nghe 3.5mm hỗ trợ tai nghe trở kháng cao

Không còn thiếu hụt cổng kết nối như MacBook Pro trước kia!'
            ],
            [
                'laptop_id' => 42,
                'description' => '​HP Pavilion x360 là dòng laptop 2-trong-1 linh hoạt của HP, nổi bật với thiết kế xoay gập 360 độ, màn hình cảm ứng nhạy bén và hiệu năng đáp ứng tốt nhu cầu học tập, làm việc và giải trí.​


💻 Thiết kế linh hoạt, hiện đại
HP Pavilion x360 sở hữu bản lề xoay gập 360 độ, cho phép người dùng dễ dàng chuyển đổi giữa các chế độ sử dụng như laptop, lều, trình chiếu hoặc máy tính bảng. Thiết kế này mang đến sự tiện lợi tối đa trong nhiều tình huống sử dụng khác nhau. Với trọng lượng nhẹ khoảng 1.51 kg và kích thước nhỏ gọn, máy dễ dàng mang theo bên mình. ​


🖥️ Màn hình cảm ứng sắc nét
Máy được trang bị màn hình 14 inch Full HD (1920 x 1080) với công nghệ IPS, mang lại góc nhìn rộng và màu sắc chân thực. Màn hình cảm ứng đa điểm nhạy bén, hỗ trợ thao tác chạm mượt mà và chính xác, phù hợp cho cả công việc và giải trí. ​


⚙️ Hiệu năng ổn định
HP Pavilion x360 sử dụng bộ vi xử lý Intel Core i3-1215U thế hệ thứ 12, kết hợp với RAM 8GB DDR4 và ổ cứng SSD 256GB PCIe NVMe, đảm bảo khả năng xử lý mượt mà các tác vụ văn phòng, học tập và giải trí hàng ngày. ​

🔌 Cổng kết nối đa dạng
Máy được trang bị đầy đủ các cổng kết nối cần thiết, bao gồm:​

1 cổng USB Type-C® SuperSpeed 10Gbps (hỗ trợ Power Delivery, DisplayPort™ 1.4, HP Sleep and Charge)

2 cổng USB Type-A SuperSpeed 5Gbps

1 cổng HDMI 2.1

1 jack tai nghe/microphone combo

1 khe đọc thẻ nhớ microSD​'
            ],
            [
                'laptop_id' => 43,
                'description' => '​Dell XPS 13 Plus 9320 là mẫu laptop cao cấp của Dell, nổi bật với thiết kế tối giản, màn hình sắc nét và hiệu năng mạnh mẽ, phù hợp cho người dùng yêu cầu cao về thẩm mỹ và hiệu suất.​

✨ Thiết kế hiện đại, tối giản
XPS 13 Plus sở hữu thiết kế nhôm nguyên khối cao cấp với các đường nét tinh tế. Bàn phím tràn viền, phím cảm ứng chức năng và touchpad ẩn dưới mặt kính tạo nên vẻ ngoài liền mạch và hiện đại. Trọng lượng nhẹ khoảng 1.26 kg, thuận tiện cho việc di chuyển. ​


🖥️ Màn hình OLED 3.5K sống động
Máy được trang bị màn hình 13.4 inch OLED độ phân giải 3.5K (3456 x 2160), hỗ trợ cảm ứng, độ sáng cao và dải màu rộng 100% sRGB, mang đến hình ảnh sắc nét và màu sắc chân thực, lý tưởng cho công việc đồ họa và giải trí. ​


⚙️ Hiệu năng mạnh mẽ
Được trang bị vi xử lý Intel Core i7-1360P, RAM 32GB LPDDR5 và ổ cứng SSD 1TB PCIe NVMe, XPS 13 Plus đáp ứng tốt các tác vụ nặng như chỉnh sửa video, lập trình và đa nhiệm. Card đồ họa tích hợp Intel Iris Xe Graphics hỗ trợ xử lý đồ họa mượt mà. ​


🔋 Thời lượng pin và kết nối
Pin 3-cell 55 Whr cho thời lượng sử dụng trung bình, phù hợp cho công việc hàng ngày. Máy hỗ trợ 2 cổng Thunderbolt 4 (USB-C), tuy nhiên không có cổng USB-A hoặc jack tai nghe 3.5mm, người dùng có thể cần sử dụng bộ chuyển đổi khi cần thiết. ​

                               '
            ],
            [
                'laptop_id'=> 44,
                'description' => '​Lenovo IdeaPad Slim 5 là dòng laptop tầm trung của Lenovo, nổi bật với thiết kế hiện đại, hiệu năng ổn định và giá cả hợp lý, phù hợp cho sinh viên, nhân viên văn phòng và người dùng phổ thông.​

💻 Thiết kế thanh lịch, bền bỉ
IdeaPad Slim 5 sở hữu thiết kế mỏng nhẹ với vỏ nhôm chắc chắn, mang đến vẻ ngoài sang trọng và độ bền cao. Trọng lượng khoảng 1.4 kg giúp người dùng dễ dàng mang theo khi di chuyển. Bàn phím có hành trình phím tốt, hỗ trợ đèn nền, tạo cảm giác thoải mái khi gõ. ​


🖥️ Màn hình sắc nét, đa dạng tùy chọn
Máy được trang bị màn hình 14 hoặc 16 inch với độ phân giải từ Full HD (1920 x 1200) đến 2K, sử dụng tấm nền IPS cho góc nhìn rộng và màu sắc trung thực. Một số phiên bản còn hỗ trợ cảm ứng, thuận tiện cho các thao tác trực tiếp trên màn hình. ​


⚙️ Hiệu năng ổn định
IdeaPad Slim 5 sử dụng các bộ vi xử lý Intel Core i5/i7 hoặc AMD Ryzen 5/7 thế hệ mới, kết hợp với RAM từ 8GB đến 16GB và ổ cứng SSD dung lượng lớn, đáp ứng tốt các nhu cầu học tập, làm việc văn phòng và giải trí nhẹ nhàng. ​

🔋 Thời lượng pin ấn tượng
Với viên pin dung lượng lớn và công nghệ sạc nhanh, máy có thể hoạt động liên tục trong nhiều giờ và sạc nhanh trong thời gian ngắn, giúp người dùng yên tâm sử dụng trong cả ngày dài. ​

🔌 Cổng kết nối đầy đủ
IdeaPad Slim 5 được trang bị đa dạng cổng kết nối như USB-A, USB-C, HDMI, jack tai nghe 3.5mm và khe đọc thẻ nhớ, đáp ứng tốt nhu cầu kết nối với các thiết bị ngoại vi. ​

'
            ],
            [
                'laptop_id' => 45,
                'description' => '​Acer Nitro 5 AN515 là dòng laptop gaming tầm trung nổi bật của Acer, được thiết kế để đáp ứng nhu cầu chơi game và làm việc hiệu quả với mức giá hợp lý. Dưới đây là mô tả chi tiết về hai phiên bản phổ biến: AN515-56 và AN515-57.​

🔹 Thiết kế và hoàn thiện
Cả hai phiên bản đều sở hữu thiết kế mạnh mẽ với các đường nét góc cạnh, vỏ ngoài màu đen kết hợp với các chi tiết đỏ tạo nên vẻ ngoài đậm chất gaming. Bàn phím có đèn nền đỏ giúp người dùng dễ dàng thao tác trong điều kiện ánh sáng yếu. Trọng lượng khoảng 2.2 kg, phù hợp cho việc di chuyển hàng ngày.​

🖥️ Màn hình
AN515-56: Trang bị màn hình 15.6 inch Full HD IPS với tần số quét 144Hz, mang lại hình ảnh mượt mà và sắc nét, phù hợp cho các tựa game hành động nhanh.​

AN515-57: Cũng sử dụng màn hình 15.6 inch Full HD IPS, nhưng một số phiên bản có thể được nâng cấp lên độ phân giải QHD (2560x1440) với tần số quét 165Hz, cung cấp trải nghiệm hình ảnh vượt trội. ​
Laptop Screen

⚙️ Hiệu năng
AN515-56: Sử dụng vi xử lý Intel Core i5-11300H, RAM 8GB DDR4 (có thể nâng cấp lên 32GB), ổ cứng SSD 512GB và card đồ họa NVIDIA GeForce GTX 1650 4GB GDDR6. ​

AN515-57: Trang bị vi xử lý Intel Core i5-11400H, RAM 8GB DDR4, ổ cứng SSD 512GB và card đồ họa NVIDIA GeForce RTX 3050 4GB GDDR6, mang lại hiệu năng mạnh mẽ hơn, đặc biệt trong các tác vụ đồ họa và chơi game nặng. ​

🔌 Cổng kết nối và tính năng khác
Cả hai phiên bản đều được trang bị đầy đủ các cổng kết nối cần thiết như USB 3.2, USB-C, HDMI, cổng mạng RJ45 và jack tai nghe 3.5mm. Máy hỗ trợ Wi-Fi 6 và Bluetooth 5.1, đảm bảo kết nối nhanh chóng và ổn định.​

🔋 Thời lượng pin
Với viên pin 4-cell, cả hai phiên bản cung cấp thời lượng sử dụng khoảng 5-6 giờ tùy theo mức độ sử dụng, đủ đáp ứng nhu cầu làm việc và giải trí cơ bản trong ngày.​

'
            ],
            [
                'laptop_id' => 48,
                'description' => '​Acer Aspire 5 A515 là dòng laptop tầm trung được thiết kế để đáp ứng nhu cầu học tập, làm việc văn phòng và giải trí nhẹ nhàng. Với thiết kế hiện đại, hiệu năng ổn định và mức giá hợp lý, đây là lựa chọn phổ biến cho nhiều đối tượng người dùng.​

💻 Thiết kế hiện đại, chắc chắn
Acer Aspire 5 A515 sở hữu thiết kế thanh lịch với vỏ ngoài bằng nhôm hoặc nhựa cao cấp, mang lại cảm giác chắc chắn và bền bỉ. Máy có trọng lượng khoảng 1.7 kg, thuận tiện cho việc di chuyển hàng ngày. Bàn phím được thiết kế thoải mái, hỗ trợ đèn nền trên một số phiên bản, giúp làm việc hiệu quả trong môi trường thiếu sáng.​

🖥️ Màn hình sắc nét
Máy được trang bị màn hình 15.6 inch độ phân giải Full HD (1920 x 1080) với tấm nền IPS, mang lại góc nhìn rộng và màu sắc trung thực. Một số phiên bản có độ sáng khoảng 248 cd/m², phù hợp cho công việc văn phòng và giải trí cơ bản. ​

⚙️ Hiệu năng ổn định
Acer Aspire 5 A515 hỗ trợ nhiều tùy chọn cấu hình, bao gồm:​

Vi xử lý: Intel Core i5/i7 thế hệ 11 hoặc 12, hoặc AMD Ryzen 5/7 dòng 5000 hoặc 7000.​


RAM: Từ 8GB đến 16GB DDR4 hoặc LPDDR5, đáp ứng tốt nhu cầu đa nhiệm.​

Ổ cứng: SSD PCIe dung lượng từ 256GB đến 1TB, cho tốc độ truy xuất dữ liệu nhanh.​

Một số phiên bản còn được trang bị card đồ họa rời như NVIDIA GeForce RTX 2050, hỗ trợ tốt cho các tác vụ đồ họa và chơi game nhẹ. ​


🔌 Cổng kết nối đa dạng
Máy được trang bị đầy đủ các cổng kết nối cần thiết, bao gồm:​

USB Type-C​

USB 3.2 Gen 1​

HDMI​

Jack tai nghe 3.5mm​

Ngoài ra, máy hỗ trợ Wi-Fi 6 và Bluetooth 5.1, đảm bảo kết nối không dây ổn định và nhanh chóng.​

🔋 Thời lượng pin hợp lý
Acer Aspire 5 A515 được trang bị pin 4-cell với dung lượng khoảng 53Wh, cho thời gian sử dụng từ 6 đến 8 giờ tùy theo mức độ sử dụng, đáp ứng tốt nhu cầu làm việc và giải trí trong ngày. ​


'
            ]
        ];
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
