@extends('master')

@section('title', 'Home')

@section('content')
    @include('layouts.carousel')
    <form method="GET" action="/" class="w-full">
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



        <!-- Danh sách sản phẩm -->
        <div class="grid grid-cols-5 gap-4">
            @foreach ($laptops as $laptop)
                <x-card-laptop image="{{ $laptop->image }}" name="{{ $laptop->name }}" cpu="{{ $laptop->cpu }}"
                    ram="{{ $laptop->ram }}" storage="{{ $laptop->storage }}" vga="{{ $laptop->vga }}"
                    quantity="{{ $laptop->quantity }}" price1="{{ number_format($laptop->original_price) }}đ"
                    discount="{{ $laptop->discount }}" price2="{{ number_format($laptop->promotional_price) }}đ">
                    ></x-card-laptop>
            @endforeach

        </div>
        <hr class="my-6 border-t border-gray-300">
        <h2 class="text-2xl font-bold mt-4">Linh Kiện</h2>

        <div class="grid grid-cols-5 gap-4">
            @foreach ($components as $component)
                <x-card-component image="{{ $component->image }}" name="{{ $component->name }}"
                    type="{{ $component->type }}" storage="{{ $component->capacity }}"
                    quantity="{{ $component->quantity }}" price1="{{ number_format($component->original_price) }}đ"
                    discount="{{ $component->discount }}"
                    price2="{{ number_format($component->promotional_price) }}đ"></x-card-component>
            @endforeach

        </div>

        <hr class="my-6 border-t border-gray-300">
        <h2 class="text-2xl font-bold mt-4">Phụ Kiện</h2>
        <div class="overflow-x-auto">
            <div class="grid grid-cols-5 gap-4">
                @foreach ($accessories as $accessory)
                    <x-card-accessories image="{{ $accessory->image }}" name="{{ $accessory->name }}"
                        color="{{ $accessory->color ? $accessory->color->name : 'N/A' }}" type="{{ $accessory->type }}"
                        quantity="{{ $accessory->quantity }}" price1="{{ number_format($accessory->original_price) }}đ"
                        discount="{{ $accessory->discount }}"
                        price2="{{ number_format($accessory->promotional_price) }}đ"></x-card-accessories>
                @endforeach
            </div>
        </div>
    </div>
@endsection
