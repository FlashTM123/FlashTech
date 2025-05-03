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

                'accessories_id' => 16,
                'description' => 'HyperX Cloud II Wireless là một trong những tai nghe gaming không dây phổ biến nhất hiện nay, được đánh giá cao nhờ thiết kế thoải mái, chất lượng âm thanh tốt và thời lượng pin ấn tượng. Dưới đây là tổng quan chi tiết về sản phẩm này:

🎧 Thiết kế & Độ hoàn thiện
Phong cách gaming hiện đại: Với phối màu đen đỏ đặc trưng, tai nghe mang đến vẻ ngoài mạnh mẽ và cá tính.

Khung kim loại chắc chắn: Phần khung và quai đeo được làm từ kim loại phủ sơn nhám mờ, tăng độ bền và cảm giác cao cấp.

Đệm tai và headband êm ái: Sử dụng mút hoạt tính (memory foam) bọc da, mang lại cảm giác đeo thoải mái trong thời gian dài mà không gây đau tai.


🔊 Chất lượng âm thanh & Micro
Driver 53mm: Cung cấp âm thanh chi tiết, với âm bass vừa phải và âm mid, treble rõ ràng, phù hợp cho cả chơi game và nghe nhạc.

Âm thanh vòm ảo 7.1: Hỗ trợ công nghệ DTS Headphone:X, giúp định vị âm thanh chính xác trong các tựa game FPS như CS:GO, Valorant.


Micro tháo rời: Microphone có khả năng lọc tiếng ồn, được chứng nhận bởi Discord và TeamSpeak, đảm bảo giao tiếp rõ ràng với đồng đội.

🔋 Kết nối & Thời lượng pin
Kết nối không dây 2.4GHz: Sử dụng USB dongle để kết nối với PC, PS4, PS5 và Nintendo Switch, đảm bảo độ trễ thấp và kết nối ổn định.

Thời lượng pin lên đến 30 giờ: Cho phép sử dụng liên tục trong nhiều ngày mà không cần sạc lại.

Phạm vi hoạt động 20 mét: Giúp bạn di chuyển tự do trong phòng mà không lo mất kết nối.

✅ Ưu điểm
Thiết kế đẹp, đeo thoải mái trong thời gian dài.

Chất lượng âm thanh tốt, phù hợp cho nhiều mục đích sử dụng.

Microphone chất lượng cao, dễ dàng tháo rời khi không sử dụng.

Thời lượng pin dài, kết nối ổn định.

⚠️ Nhược điểm
Không hỗ trợ kết nối Bluetooth, chỉ sử dụng được với USB dongle.

Không tương thích với Xbox.

Phần mềm đi kèm hạn chế, không có EQ để tùy chỉnh âm thanh.

',
            ],
            [

                'accessories_id' => 12,
                'description' => 'Hub chuyển đổi 6 in 1 Ugreen CM195 70411 là một thiết bị mở rộng cổng kết nối nhỏ gọn và đa năng, phù hợp cho người dùng laptop, MacBook, iPad Pro hoặc các thiết bị có cổng USB-C hỗ trợ DisplayPort Alt Mode và Power Delivery.

🔌 Tính năng nổi bật
HDMI 4K@30Hz: Cho phép xuất hình ảnh chất lượng cao lên màn hình ngoài, phù hợp cho thuyết trình, xem phim hoặc làm việc đa màn hình.

2 cổng USB 3.0: Hỗ trợ tốc độ truyền dữ liệu lên đến 5Gbps, giúp kết nối nhanh chóng với các thiết bị ngoại vi như ổ cứng, chuột, bàn phím.


Đầu đọc thẻ SD/TF: Hỗ trợ đọc đồng thời hai loại thẻ nhớ với tốc độ lên đến 104MB/s, thuận tiện cho việc chuyển dữ liệu từ máy ảnh hoặc thiết bị di động.


Cổng USB-C PD 100W: Hỗ trợ sạc nhanh cho laptop hoặc thiết bị di động, đảm bảo nguồn điện ổn định khi sử dụng nhiều thiết bị cùng lúc.

✅ Ưu điểm
Thiết kế nhỏ gọn, dễ dàng mang theo khi di chuyển.

Vỏ nhôm chắc chắn, tản nhiệt tốt và tăng độ bền cho sản phẩm.

Tương thích với nhiều hệ điều hành như Windows, macOS, iPadOS.

',
            ],
            [

                'accessories_id' => 10,
                'description' => 'Razer Kraken V3 là dòng tai nghe gaming cao cấp của Razer, nổi bật với ba phiên bản chính: Kraken V3 có dây, Kraken V3 Pro không dây và Kraken V3 X. Mỗi phiên bản đều được trang bị công nghệ âm thanh tiên tiến và thiết kế tối ưu cho game thủ.

🔊 Tính năng nổi bật
Âm thanh vòm THX Spatial Audio: Cung cấp âm thanh vòm 7.1, giúp định vị chính xác nguồn âm thanh trong game, mang đến trải nghiệm chơi game sống động.

Driver Razer™ TriForce Titanium 50mm: Thiết kế ba phần giúp tái tạo âm thanh chi tiết với dải cao, trung và thấp rõ ràng, mang lại chất lượng âm thanh vượt trội.

Microphone Razer™ HyperClear Cardioid: Microphone có khả năng loại bỏ tiếng ồn xung quanh, đảm bảo giọng nói rõ ràng và tự nhiên.

Razer Chroma™ RGB: Hệ thống đèn nền RGB với 16.8 triệu màu, có thể tùy chỉnh theo sở thích và đồng bộ với các thiết bị Razer khác.
',
            ],
            [

                'accessories_id' => 11,
                'description' => 'Anker PowerCore Select 10000mAh (A1223) là một trong những pin sạc dự phòng phổ biến, được ưa chuộng nhờ thiết kế nhỏ gọn, hiệu suất ổn định và giá thành hợp lý.

🔋 Thông số kỹ thuật nổi bật
Dung lượng pin: 10.000 mAh, đủ để sạc đầy iPhone 8 khoảng 3.5 lần hoặc Samsung Galaxy S9 khoảng 2.2 lần.

Kích thước: 10 x 6.3 x 2.5 cm, trọng lượng 190g – tương đương kích thước thẻ ATM, dễ dàng mang theo trong túi hoặc balo.


Đầu vào: Micro USB 5V/2A, thời gian sạc đầy khoảng 10–11 giờ với bộ sạc 1A.

Đầu ra: 2 cổng USB-A, mỗi cổng hỗ trợ 5V/2.4A, tổng công suất tối đa 12W khi sạc đồng thời hai thiết bị.


Công nghệ sạc thông minh: Trang bị PowerIQ và VoltageBoost, tự động nhận diện thiết bị và điều chỉnh dòng điện phù hợp để tối ưu tốc độ sạc.


Bảo vệ an toàn: Hệ thống MultiProtect tích hợp bảo vệ quá nhiệt, quá dòng và ngắn mạch, đảm bảo an toàn cho người sử dụng.

✅ Ưu điểm
Thiết kế nhỏ gọn: Dễ dàng mang theo khi di chuyển, phù hợp cho nhu cầu sử dụng hàng ngày hoặc du lịch.

Hiệu suất ổn định: Cung cấp đủ năng lượng cho các thiết bị di động, giúp bạn yên tâm sử dụng trong suốt ngày dài.

Công nghệ sạc thông minh: Tự động điều chỉnh dòng điện phù hợp với từng thiết bị, giúp sạc nhanh chóng và an toàn.

Bảo vệ an toàn: Hệ thống bảo vệ tích hợp giúp bảo vệ thiết bị và người sử dụng khỏi các sự cố điện.

⚠️ Nhược điểm
Không hỗ trợ sạc nhanh Quick Charge: Không tương thích với các công nghệ sạc nhanh như Quick Charge, có thể sạc chậm hơn so với một số pin sạc dự phòng khác.

Không có cổng USB-C: Chỉ hỗ trợ đầu vào Micro USB, không phù hợp với các thiết bị mới sử dụng cổng USB-C.

',
            ],
            [

                'accessories_id' => 8,
                'description' => 'Keychron K2 V2 Wireless là một bàn phím cơ không dây nổi bật với thiết kế nhỏ gọn, khả năng kết nối linh hoạt và hiệu suất ổn định, phù hợp cho cả làm việc và giải trí.

🔧 Tính năng nổi bật
Thiết kế 75% (84 phím): Giữ lại đầy đủ hàng phím chức năng và phím mũi tên, tối ưu không gian làm việc mà vẫn đảm bảo tiện ích.

Kết nối linh hoạt: Hỗ trợ kết nối không dây qua Bluetooth 5.1 với khả năng ghép nối lên đến 3 thiết bị và chuyển đổi dễ dàng. Ngoài ra, còn có thể kết nối có dây qua cổng USB Type-C.


Tương thích đa hệ điều hành: Tương thích với cả macOS và Windows, đi kèm keycap phù hợp cho từng hệ điều hành.

Pin dung lượng lớn: Trang bị pin 4000mAh, cho thời gian sử dụng lên đến 240 giờ khi tắt đèn nền và khoảng 72 giờ khi bật đèn nền RGB.

Đèn nền RGB đa dạng: Cung cấp hơn 15 hiệu ứng ánh sáng khác nhau, dễ dàng tùy chỉnh để phù hợp với phong cách cá nhân.

Tùy chọn switch Gateron: Có các lựa chọn switch Gateron Red (linear), Blue (clicky) và Brown (tactile) để phù hợp với sở thích gõ phím của người dùng.
',
            ],

        ];
        foreach ($products as $product) {
            DB::table('products')->insert($product);
        }
    }
}
