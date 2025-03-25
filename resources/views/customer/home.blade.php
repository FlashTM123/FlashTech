@extends('master')

@section('title', 'Home')

@section('content')


    <div class="container mx-auto px-4 py-8">
        @include('layouts.carousel')
        <form method="GET" action="{{ route('customer.home')}}" class="w-full">
            <div class="flex justify-center">
                <label class="input">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                    <input type="search" name="query" class="grow px-2 py-1 focus:outline-none" placeholder="Search..."
                        value="{{ request('query') }}" autofocus />
                    <kbd class="kbd kbd-sm hidden md:inline">⌘</kbd>
                    <kbd class="kbd kbd-sm hidden md:inline">K</kbd>
                </label>
            </div>
        </form>
        <h2 class="text-2xl font-bold mb-4">Danh sách sản phẩm</h2>

        <hr class="my-6 border-t border-gray-300">

        <!-- Laptop -->
        <h2 class="text-2xl font-bold mb-4">Laptop</h2>
        <div class="grid grid-cols-5 gap-4">
            @foreach ($products->where('type', 'laptop') as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>

        <hr class="my-6 border-t border-gray-300">

        <!-- Linh Kiện -->
        <h2 class="text-2xl font-bold mt-4">Linh Kiện</h2>
        <div class="grid grid-cols-5 gap-4">
            @foreach ($products->where('type', 'component') as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>

        <hr class="my-6 border-t border-gray-300">

        <!-- Phụ Kiện -->
        <h2 class="text-2xl font-bold mt-4">Phụ Kiện</h2>
        <div class="grid grid-cols-5 gap-4">
            @foreach ($products->where('type', 'accessories') as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
@endsection
