@extends('master')

@section('title', 'Trang chủ')


@section('content')
<div class="container mx-auto px-4 py-10 space-y-16">

    {{-- Carousel --}}
    @include('layouts.carousel')

    {{-- Search --}}
    <form method="GET" action="{{ route('customer.home') }}" class="w-full flex justify-center">
        <div class="form-control w-full max-w-2xl">
            <label class="input input-bordered flex items-center gap-2 shadow-md rounded-full">
                <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z"/>
                </svg>
                <input type="search"
                       name="query"
                       class="grow text-base bg-transparent focus:outline-none"
                       placeholder="Tìm kiếm sản phẩm..."
                       value="{{ request('query') }}"
                       autofocus />
            </label>
        </div>
    </form>

    {{-- Section: Laptop --}}
    <section>
        <div class="flex items-center gap-3 mb-6">
            <div class="text-3xl text-blue-500"><i class="fas fa-laptop"></i></div>
            <h2 class="text-2xl font-bold border-b-2 border-blue-400 pb-2 w-full">Laptop</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach ($products->where('type', 'laptop') as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>

    {{-- Section: Linh kiện --}}
    <section>
        <div class="flex items-center gap-3 mb-6">
            <div class="text-3xl text-green-500"><i class="fas fa-microchip"></i></div>
            <h2 class="text-2xl font-bold border-b-2 border-green-400 pb-2 w-full">Linh Kiện</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach ($products->where('type', 'component') as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>

    {{-- Section: Phụ kiện --}}
    <section>
        <div class="flex items-center gap-3 mb-6">
            <div class="text-3xl text-purple-500"><i class="fas fa-keyboard"></i></div>
            <h2 class="text-2xl font-bold border-b-2 border-purple-400 pb-2 w-full">Phụ Kiện</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach ($products->where('type', 'accessories') as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </section>

</div>
@endsection
