@extends('master')

@section('title', 'Trang chủ')

@section('content')
<div class="container mx-auto px-4 py-10 space-y-20">

    {{-- Banner Slider --}}
    <div class="relative w-full overflow-hidden rounded-xl shadow-lg">
        <img src="https://images.unsplash.com/photo-1603791440384-56cd371ee9a7?auto=format&fit=crop&w=1920&q=80"
             alt="Banner" class="w-full h-64 object-cover object-center">
        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-start px-10">
            <div class="text-white max-w-xl space-y-4">
                <h1 class="text-4xl font-bold">Chào mừng đến với FlashGear</h1>
                <p class="text-lg">Nơi bạn tìm thấy những sản phẩm công nghệ đỉnh cao với giá cực tốt!</p>
                <a href="#products" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full shadow-md transition">Khám phá ngay</a>
            </div>
        </div>
    </div>

    {{-- Search Bar --}}
    <form method="GET" action="{{ route('customer.home') }}" class="flex flex-col md:flex-row justify-center gap-4">
        <div class="form-control w-full max-w-2xl">
            <label class="input input-bordered flex items-center gap-2 shadow rounded-full">
                <i class="fas fa-search text-gray-500"></i>
                <input type="search" name="query" class="grow bg-transparent text-base focus:outline-none"
                       placeholder="Tìm kiếm sản phẩm..." value="{{ request('query') }}" autofocus />
            </label>
        </div>
    </form>

    {{-- Danh mục sản phẩm --}}
    @php
        $sections = [
            ['label' => 'Laptop', 'icon' => 'fa-laptop', 'relation' => 'laptop'],
            ['label' => 'Linh Kiện', 'icon' => 'fa-microchip', 'relation' => 'component'],
            ['label' => 'Phụ Kiện', 'icon' => 'fa-headphones-alt', 'relation' => 'accessories'],
        ];
    @endphp

    @foreach ($sections as $section)
        <section id="products">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <div class="text-3xl text-primary"><i class="fas {{ $section['icon'] }}"></i></div>
                    <h2 class="text-2xl font-bold">{{ $section['label'] }}</h2>
                </div>
                <a href="#" class="text-blue-600 hover:underline text-sm">Xem tất cả</a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach ($products->filter(fn($product) => $product->{$section['relation']}) as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>
    @endforeach

</div>
@endsection
