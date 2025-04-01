@extends('master')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Carousel (giữ nguyên) -->
    @include('layouts.carousel')

    <!-- Search Form (giữ nguyên chức năng) -->
    <form method="GET" action="{{ route('customer.home')}}" class="w-full mb-8">
        <div class="flex justify-center">
            <div class="relative w-full max-w-xl">
                <label class="input input-bordered flex items-center gap-2 w-full">
                    <svg class="h-4 w-4 opacity-70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                    <input type="search"
                           name="query"
                           class="grow"
                           placeholder="Tìm kiếm sản phẩm..."
                           value="{{ request('query') }}"
                           autofocus />
                </label>
            </div>
        </div>
    </form>

    <!-- Product Sections (giữ nguyên logic hiển thị) -->
    <div class="space-y-12">
        <!-- Laptop Section -->
        <section>
            <h2 class="text-2xl font-bold mb-6 pb-2 border-b border-base-200">Laptop</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($products->where('type', 'laptop') as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>

        <!-- Component Section -->
        <section>
            <h2 class="text-2xl font-bold mb-6 pb-2 border-b border-base-200">Linh Kiện</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($products->where('type', 'component') as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>

        <!-- Accessories Section -->
        <section>
            <h2 class="text-2xl font-bold mb-6 pb-2 border-b border-base-200">Phụ Kiện</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($products->where('type', 'accessories') as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
