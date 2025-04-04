@extends('master')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Carousel -->
    @include('layouts.carousel')

    <!-- Search Form -->
    <form method="GET" action="{{ route('customer.home')}}" class="w-full mb-12">
        <div class="flex justify-center">
            <div class="relative w-full max-w-2xl">
                <label class="flex items-center gap-2 w-full  shadow-lg rounded-full px-4 py-2">
                    <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                    <input type="search"
                           name="query"
                           class="grow bg-transparent border-none focus:outline-none text-lg"
                           placeholder="Tìm kiếm sản phẩm..."
                           value="{{ request('query') }}"
                           autofocus />
                </label>
            </div>
        </div>
    </form>

    <!-- Product Sections -->
    <div class="space-y-16">
        <!-- Laptop Section -->
        <section>
            <h2 class="text-3xl font-bold mb-8 pb-3 border-b-2 border-blue-500 flex items-center gap-3">
                <i class="fas fa-laptop text-blue-500"></i>
                Laptop
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                @foreach ($products->where('type', 'laptop') as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>

        <!-- Component Section -->
        <section>
            <h2 class="text-3xl font-bold mb-8 pb-3 border-b-2 border-green-500 flex items-center gap-3">
                <i class="fas fa-microchip text-green-500"></i>
                Linh Kiện
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                @foreach ($products->where('type', 'component') as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>

        <!-- Accessories Section -->
        <section>
            <h2 class="text-3xl font-bold mb-8 pb-3 border-b-2 border-purple-500 flex items-center gap-3">
                <i class="fas fa-keyboard text-purple-500"></i>
                Phụ Kiện
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                @foreach ($products->where('type', 'accessories') as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
