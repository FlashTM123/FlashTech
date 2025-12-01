@extends('master')

@section('title', 'Laptop')

@section('content')

@include('layouts.banner')

<div class="space-y-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
        <div>
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-white">
                    <i class="fa-solid fa-laptop"></i>
                </div>
                Danh sách Laptop
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Khám phá bộ sưu tập laptop cao cấp từ các thương hiệu nổi tiếng</p>
        </div>
        <div class="flex gap-3">
            <select class="px-4 py-2 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 focus:outline-none focus:border-indigo-500">
                <option>Sắp xếp: Mới nhất</option>
                <option>Giá: Thấp đến cao</option>
                <option>Giá: Cao đến thấp</option>
                <option>Bán chạy nhất</option>
            </select>
            <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition">
                <i class="fa-solid fa-filter mr-2"></i>Lọc
            </button>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="flex gap-3 overflow-x-auto pb-4">
        <button class="px-4 py-2 rounded-full bg-indigo-100 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-300 hover:bg-indigo-200 dark:hover:bg-indigo-900/50 transition-all whitespace-nowrap font-medium">
            <i class="fa-solid fa-fire mr-2"></i>Nổi bật
        </button>
        <button class="px-4 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all whitespace-nowrap font-medium">
            <i class="fa-solid fa-tag mr-2"></i>Giảm giá
        </button>
        <button class="px-4 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all whitespace-nowrap font-medium">
            <i class="fa-solid fa-star mr-2"></i>Đánh giá cao
        </button>
        <button class="px-4 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all whitespace-nowrap font-medium">
            <i class="fa-solid fa-hourglass-end mr-2"></i>Hết hàng
        </button>
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-6">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    @else
        <div class="text-center py-20">
            <i class="fa-solid fa-box-open text-7xl text-gray-300 dark:text-gray-600 mb-4 block"></i>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Không tìm thấy sản phẩm</h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6">Hãy thử thay đổi bộ lọc hoặc tìm kiếm từ khác</p>
            <a href="/" class="inline-block px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold rounded-lg hover:shadow-lg transition-all">
                <i class="fa-solid fa-home mr-2"></i>Quay về trang chủ
            </a>
        </div>
    @endif

    <!-- Pagination -->
    <div class="flex justify-center gap-2 mt-12">
        <button class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
            <i class="fa-solid fa-chevron-left"></i>
        </button>
        <button class="px-4 py-2 rounded-lg bg-indigo-600 text-white">1</button>
        <button class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">2</button>
        <button class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">3</button>
        <button class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>
</div>

@endsection
