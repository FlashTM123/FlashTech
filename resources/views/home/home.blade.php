@extends('master')

@section('title', 'Home')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-4">Danh sách sản phẩm</h2>

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
        <div class="overflow-x-auto">
            <div class="grid grid-cols-5 gap-4">
                <div class="card bg-base-100 shadow-md p-4 rounded-lg">
                    <img src="https://laptopaz.vn/media/product/3221_loq_2024.jpg" class="rounded-md">
                    <h3 class="font-bold mt-2 text-base-content">[New 100%] Lenovo LOQ 2024 15IAX9 83GS001RVN</h3>
                    <div class="flex flex-wrap gap-1 mt-2">
                        <span class="badge badge-outline">i5-12450HX</span>
                        <span class="badge badge-outline">12GB DDR5</span>
                        <span class="badge badge-outline">SSD 512GB</span>
                    </div>
                    <p class="text-sm text-base-content/70 mt-1">Card: RTX 3050 6GB, Màn: 15.6" 144Hz</p>
                    <div class="mt-2">
                        <span class="text-gray-400 line-through">21.990.000đ</span>
                        <span class="ml-2 bg-red-500 text-white px-2 py-1 text-xs rounded">-8%</span>
                    </div>
                    <div class="text-xl font-bold text-orange-500 mt-1">20.290.000 </div>
                    <button class="btn btn-soft btn-secondary">Detail</button>

                </div>
            </div>
        </div>
        <hr class="my-6 border-t border-gray-300">
        <h2 class="text-2xl font-bold mt-4">Linh Kiện - Phụ Kiện</h2>
        <div class="overflow-x-auto">
            <div class="grid grid-cols-5 gap-4">
                <div class="card bg-base-100 shadow-md p-4 rounded-lg">
                    <img src="https://laptopaz.vn/media/product/3274_1649755742_864_o_cung_ssd_m2_pcie_1tb_wd_black_sn770_nvme_2280_1.jpg" class="rounded-md">
                    <h3 class="font-bold mt-2 text-base-content">Ổ cứng SSD WD Black SN770 PCIe Gen4 x4 NVMe M.2 2280 1TB</h3>
                    <div class="flex flex-wrap gap-1 mt-2">

                        <span class="badge badge-outline">1TB</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-gray-400 line-through">2.490.000đ</span>
                        <span class="ml-2 bg-red-500 text-white px-2 py-1 text-xs rounded">-20%</span>
                    </div>
                    <div class="text-xl font-bold text-orange-500 mt-1">1.990.000 </div>
                    <button class="btn btn-soft btn-secondary">Detail</button>

                </div>
                <div class="card bg-base-100 shadow-md p-4 rounded-lg">
                    <img src="https://laptopaz.vn/media/product/2967_l411.jpg" class="rounded-md">
                    <h3 class="font-bold mt-2 text-base-content">Bàn phím Fuhlen L411 (USB/BLACK)</h3>
                    <div class="flex flex-wrap gap-1 mt-2">

                        <span class="badge badge-outline">USB 2.0</span>
                    </div>
                    <div class="mt-2">
                        <span class="text-gray-400 line-through">250.000đ</span>
                        <span class="ml-2 bg-red-500 text-white px-2 py-1 text-xs rounded">-12%</span>
                    </div>
                    <div class="text-xl font-bold text-orange-500 mt-1">219.000 </div>
                    <button class="btn btn-soft btn-secondary">Detail</button>

                </div>
            </div>
        </div>
    </div>
@endsection
