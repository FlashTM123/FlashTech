<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            [
                'name' => 'Kingston FURY Beast 16GB DDR4',
                'brand_id' => 72,
                'type' => 'RAM',
                'capacity' => '16GB DDR4 3200MHz',
                'original_price' => 890000,
                'discount' => 10,
                'promotional_price' => 801000,
                'quantity' => 50,
                'image' => 'https://bizweb.dktcdn.net/thumb/grande/100/329/122/products/fury-beast-ddr4-black-02-40804750-7b55-4921-a17f-1c224b19259a-fa76635d-1ca6-4edd-a7b8-ca7a0fa5f90b-77e84cf0-9e75-49c6-9375-477b4e63264f-f335e71a-b760-4a34-8f9f-ccffe54db105.jpg?v=1741142433110',
            ],
            [
                'name' => 'Samsung 970 EVO Plus 1TB',
                'brand_id' => 73,
                'type' => 'SSD',
                'capacity' => '1TB NVMe M.2',
                'original_price' => 2890000,
                'discount' => 12,
                'promotional_price' => 2543200,
                'quantity' => 30,
                'image' => 'https://anphat.com.vn/media/product/29098_au_970_evoplus_nvme_m2_ssd_mz_v7s1t0bw_black_139992475.jpg',
            ],
            [
                'name' => 'Western Digital Blue 1TB',
                'brand_id' => 74,
                'type' => 'HDD',
                'capacity' => '1TB 7200RPM',
                'original_price' => 1190000,
                'discount' => 5,
                'promotional_price' => 1130500,
                'quantity' => 45,
                'image' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_-_2023-01-28t224540.685.png',
            ],
            [
                'name' => 'Intel Core i5-13400F',
                'brand_id' => 66,
                'type' => 'CPU',
                'capacity' => '10 cores / 16 threads',
                'original_price' => 4990000,
                'discount' => 8,
                'promotional_price' => 4590800,
                'quantity' => 25,
                'image' => 'https://anphat.com.vn/media/product/44272_cpu_intel_core_i5_13400f_anphat88.jpg',
            ],
            [
                'name' => 'AMD Ryzen 5 5600X',
                'brand_id' => 67,
                'type' => 'CPU',
                'capacity' => '6 cores / 12 threads',
                'original_price' => 3990000,
                'discount' => 15,
                'promotional_price' => 3391500,
                'quantity' => 20,
                'image' => 'https://cdn.tgdd.vn/News/0/amd-ryzen-5-5600x-mot-con-chip-manh-me-de-xu-ly-01-800x450.jpg',
            ],
            [
                'name' => 'ASUS PRIME B550M-A WIFI II',
                'brand_id' => 59,
                'type' => 'Mainboard',
                'capacity' => 'Micro-ATX, AM4',
                'original_price' => 3190000,
                'discount' => 10,
                'promotional_price' => 2871000,
                'quantity' => 18,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.bhphotovideo.com%2Fimages%2Fimages2000x2000%2Fasus_prime_b550m_a_wifi_ii_1717164.jpg&f=1&nofb=1&ipt=7d76a1a9fc1a99f94482f059fb31f611db8fb02f7b446c7dd08b91c86a9247f0',
            ],
            [
                'name' => 'GIGABYTE B660M DS3H DDR4',
                'brand_id' => 69,
                'type' => 'Mainboard',
                'capacity' => 'Micro-ATX, LGA1700',
                'original_price' => 2990000,
                'discount' => 9,
                'promotional_price' => 2720900,
                'quantity' => 22,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.pcupgrade.co.uk%2Fimages%2Fuploads%2FB660M%2520DS3H%2520AX%2520DDR4_3.jpg&f=1&nofb=1&ipt=64d88f5f070cdd22f55cc74413abb7a4f815713799b02e37de5ec0b837116751',
            ],
            [
                'name' => 'Corsair CV550 550W',
                'brand_id' => 71,
                'type' => 'PSU',
                'capacity' => '550W 80 Plus Bronze',
                'original_price' => 1350000,
                'discount' => 7,
                'promotional_price' => 1255500,
                'quantity' => 40,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fb.scdn.gr%2Fimages%2Fsku_main_images%2F021704%2F21704095%2F20200327171418_corsair_cv550.jpeg&f=1&nofb=1&ipt=36ac0eb45ff81daefcf971ca1bafce2508042de6b0f3a7ce2438f74a7a255d27',
            ],
            [
                'name' => 'Cooler Master Hyper 212 Black',
                'brand_id' => 82,
                'type' => 'Cooler',
                'capacity' => '120mm fan',
                'original_price' => 890000,
                'discount' => 5,
                'promotional_price' => 845500,
                'quantity' => 35,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.bhphotovideo.com%2Fimages%2Fimages1500x1500%2Fcooler_master_rr_s4kk_20pa_r1_hyper_212_halo_black_1760661.jpg&f=1&nofb=1&ipt=a9b907c304d7a582f808e3d916ce07e3f8179b83ca4f6face1355735b49ededa',
            ],
            [
                'name' => 'Kingston NV2 500GB NVMe',
                'brand_id' => 72,
                'type' => 'SSD',
                'capacity' => '500GB NVMe',
                'original_price' => 990000,
                'discount' => 6,
                'promotional_price' => 930600,
                'quantity' => 60,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fimg.terabyteshop.com.br%2Fproduto%2Fg%2Fssd-kingston-nv2-500gb-m2-nvme-2280-leitura-3500mbs-e-gravacao-2100mbs-snv2s500g_154166.jpg&f=1&nofb=1&ipt=ed0f6bb58b77da916d4107e5348fe5a884fd9db8fb39a395406a2ea0101d45f8',
            ],
    ];
        foreach ($components as $component) {
            if(!DB::table('components')->where('name', $component['name'])->exists()) {
                // Tạo Component record
                $componentRecord = DB::table('components')->insertGetId($component);

                // Tự động tạo Product record liên kết
                Product::create([
                    'component_id' => $componentRecord,
                    'description' => $component['name'] . ' - ' . $component['type'] . ' - ' . $component['capacity']
                ]);
            }
        }
    }
}
