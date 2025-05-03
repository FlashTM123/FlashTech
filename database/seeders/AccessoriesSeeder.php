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
        $accessories = [
            [
                'name' => 'Logitech MX Master 3S',
                'brand_id' => 77, // Logitech
                'type' => 'Mouse',
                'color' => 'Black',
                'original_price' => 2490000,
                'discount' => 10,
                'promotional_price' => 2241000,
                'quantity' => 40,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.bhphotovideo.com%2Fimages%2Fimages2500x2500%2Flogitech_910_006556_mx_master_3s_black_1703320.jpg&f=1&nofb=1&ipt=c8484619b77dd05dcb3f963edd794c72cbf43ec3b324c856c2d7fc47ad2681d1',
            ],
            [
                'name' => 'Keychron K2 V2 Wireless',
                'brand_id' => 90, // Keychron
                'type' => 'Keyboard',
                'color' => 'Grey',
                'original_price' => 1990000,
                'discount' => 8,
                'promotional_price' => 1830800,
                'quantity' => 35,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Funcrate.com%2Fp%2F2020%2F06%2Fkeychron-01.jpg&f=1&nofb=1&ipt=c82840b56e244d83e2e8e5f7caf1d10b6add9a581d8b6c7aa37c761f39f6ffcf',
            ],
            [
                'name' => 'Logitech C920 HD Pro',
                'brand_id' => 77,
                'type' => 'Webcam',
                'color' => 'Black',
                'original_price' => 1890000,
                'discount' => 12,
                'promotional_price' => 1663200,
                'quantity' => 20,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fc1.neweggimages.com%2FProductImageCompressAll1280%2F26-104-635-Z02.jpg&f=1&nofb=1&ipt=5e1af51a7977324efeef61566676684b53611d1a1902dc46f3372ce6d3488cb4',
            ],
            [
                'name' => 'Razer Kraken V3',
                'brand_id' => 78, // Razer
                'type' => 'Headset',
                'color' => 'Black',
                'original_price' => 2490000,
                'discount' => 15,
                'promotional_price' => 2116500,
                'quantity' => 15,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.jib.co.th%2Fimg_master%2Fproduct%2Foriginal%2F2021110509141949640_1.jpg&f=1&nofb=1&ipt=a41eebb4e920e514b0e96c9684f9e75336e3db5a3c9bb70ed6ee4c6dd4abb7a0',
            ],
            [
                'name' => 'Anker PowerCore Select 10000mAh',
                'brand_id' => 79, // Anker
                'type' => 'Power Bank',
                'color' => 'Black',
                'original_price' => 590000,
                'discount' => 10,
                'promotional_price' => 531000,
                'quantity' => 60,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.chicbom.com%2Fcdn%2Fshop%2Ffiles%2FA1223H11_f12b28f6-f361-42e6-9f8d-7a862b07fc9b.jpg%3Fv%3D1716765011&f=1&nofb=1&ipt=d8e04e18e3628c3e5819f973e1fc30b02cd3db87be83d8566ac7aa7e19f7251e',
            ],
            [
                'name' => 'Ugreen USB-C Hub 6-in-1',
                'brand_id' => 91, // Ugreen
                'type' => 'Hub',
                'color' => 'Grey',
                'original_price' => 990000,
                'discount' => 7,
                'promotional_price' => 920700,
                'quantity' => 25,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.yestobuy.com.au%2Fassets%2Ffull%2FV28-ACBUGN60383.jpg%3F20221101202517&f=1&nofb=1&ipt=83d92e5eb290b361794a6a27b91e9417388d75085fdb4250dc12f8349841f22f',
            ],
            [
                'name' => 'Apple Magic Mouse 2',
                'brand_id' => 65, // Apple
                'type' => 'Mouse',
                'color' => 'White',
                'original_price' => 2190000,
                'discount' => 5,
                'promotional_price' => 2080500,
                'quantity' => 18,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pcmag.com%2Fimagery%2Freviews%2F02Uc944h82JAA9Zepu2JypY-3.fit_scale.size_760x427.v1569471281.jpg&f=1&nofb=1&ipt=9aea4ab199f22d284b9f78eb00f133b36734c1ffd9bf3f0129887e58830e6ddc',
            ],
            [
                'name' => 'Logitech K380 Multi-Device',
                'brand_id' => 77,
                'type' => 'Keyboard',
                'color' => 'Pink',
                'original_price' => 899000,
                'discount' => 10,
                'promotional_price' => 809100,
                'quantity' => 40,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.sanity.io%2Fimages%2Fyqd1zell%2Fproduction%2Feb5ac03356eb3360c590118b3c87c05c792225d8-500x500.png&f=1&nofb=1&ipt=e84bd09f299aaf365cd04ab4adba3085a906e122e693ed24d748e1cece201a8e',
            ],
            [
                'name' => 'Sony WH-CH520',
                'brand_id' => 92, // Sony
                'type' => 'Headphone',
                'color' => 'Blue',
                'original_price' => 1390000,
                'discount' => 10,
                'promotional_price' => 1251000,
                'quantity' => 30,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.m4g.com.my%2Fimage%2Fm4g%2Fimage%2Fcache%2Fdata%2Fall_product_images%2Fproduct-4535%2Fyrdaqerb1677842049-2480x2480.jpg&f=1&nofb=1&ipt=e7b412c9b04b156a96e2e98a3db26122823596395676cbe6fec62069f0a6be24',
            ],
            [
                'name' => 'HyperX Cloud II Wireless',
                'brand_id' => 81, // HyperX (đảm bảo ID đúng với bảng brands)
                'type' => 'Headset',
                'color' => 'Black/Red',
                'original_price' => 2990000,
                'discount' => 12,
                'promotional_price' => 2631200,
                'quantity' => 28,
                'image' => 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Frow.hyperx.com%2Fcdn%2Fshop%2Ffiles%2Fhyperx_cloud_ii_core_wireless_main_1.jpg%3Fv%3D1686335800&f=1&nofb=1&ipt=115ecec350266fafd57b17a8ebf7e1f52b242d74ed67443445e213b357455d87',
            ],
        ];
        foreach ($accessories as $accessory) {
            if (!DB::table('accessories')->where('name', $accessory['name'])->exists()) {
                DB::table('accessories')->insert($accessory);
            }
        }
    }
}
