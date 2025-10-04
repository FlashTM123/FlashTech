@extends('master')

@section('title', 'Trang chủ')

@section('content')
<div class="container mx-auto px-4 py-10 space-y-20">

    {{-- Banner Slider --}}
    @include('layouts.banner')

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

    {{-- Bộ lọc theo thương hiệu --}}

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
