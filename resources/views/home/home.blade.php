@extends('master')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-4">Danh sách sản phẩm</h2>
        <div class="flex space-x-2 mb-6">
            <button class="btn btn-outline">5tr-10tr</button>
            <button class="btn btn-outline">10tr-20tr</button>
            <button class="btn btn-outline">20tr-30tr</button>
            <button class="btn btn-outline">30tr-40tr</button>
            <button class="btn btn-outline"> >40tr </button>

        </div>
        <!-- Đường kẻ ngăn cách -->
        <hr class="my-6 border-t border-gray-300">

        <h2 class="text-2xl font-bold mb-4">Laptop</h2>

        <!-- Bộ lọc thương hiệu -->
        <div class="flex space-x-2 mb-6">
            <button class="btn btn-outline">Acer</button>
            <button class="btn btn-outline">Lenovo</button>
            <button class="btn btn-outline">Asus</button>
            <button class="btn btn-outline">Dell</button>
            <button class="btn btn-outline">Gigabyte</button>
            <button class="btn btn-outline">Apple</button>
            <button class="btn btn-outline">Xem tất cả ▼</button>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="grid grid-cols-5 gap-4">
            <x-card-laptop image="https://laptopaz.vn/media/product/3221_loq_2024.jpg" name="[New 100%] Lenovo LOQ 2024 15IAX9 83GS001RVN" cpu="i5-12450HX" ram="12GB DDR5" storage="SSD 512GB" gpu="RTX 3050 6GB" quantity="1" price1="21.990.000" discount="-8" price2="20.290.000"></x-card-laptop>
            <x-card-laptop image="https://cdn2.cellphones.com.vn/x/media/catalog/product/l/a/laptop-lenovo-legion-5-pro-16ach6h-82jq001vvn-1.jpg" name="Lenovo Legion 5 Pro 16ACH6H 82JQ001VVN" cpu="AMD Ryzen 7 5800H" ram="16 GB DDR4" storage="SSD 512GB" gpu="RTX 3060 6GB" quantity="0" price1="43.690.000" discount="-8" price2="41.190.000"></x-card-laptop>
        </div>
        <hr class="my-6 border-t border-gray-300">
        <h2 class="text-2xl font-bold mt-4">Linh Kiện</h2>

            <div class="grid grid-cols-5 gap-4">

                <x-card-component image="https://laptopaz.vn/media/product/3274_1649755742_864_o_cung_ssd_m2_pcie_1tb_wd_black_sn770_nvme_2280_1.jpg" name="Ổ cứng SSD WD Black SN770 PCIe Gen4 x4 NVMe M.2 2280 1TB" storage="1TB" type="SSD" quantity="1" price1="2.490.000" discount="-20" price2="1.990.000"></x-card-component>
                <x-card-component image="https://cdn2.cellphones.com.vn/x/media/catalog/product/g/r/group_235_2_1.png" name="RAM PNY XLR8 DDR4 3200MHz Heatsink RGB 16GB" storage="16GB" type="RAM DDR4" quantity="0" price1="
1.490.000" discount="-20" price2="1.190.00"></x-card-component>
            </div>

        <hr class="my-6 border-t border-gray-300">
        <h2 class="text-2xl font-bold mt-4">Phụ Kiện</h2>
        <div class="overflow-x-auto">
            <div class="grid grid-cols-5 gap-4">
               <x-card-accessories image="https://laptopaz.vn/media/product/2967_l411.jpg" name="Bàn phím Fuhlen L411" type="USB 2.0" quantity="2" price1="250.000" discount="-12" price2="219.000"></x-card-accessories>
                <x-card-accessories image="https://laptopaz.vn/media/product/2967_l411.jpg" name="Bàn phím Fuhlen L411" type="USB 2.0" quantity="0" price1="250.000" discount="-12" price2="219.000"></x-card-accessories>
            </div>
        </div>
    </div>
@endsection
