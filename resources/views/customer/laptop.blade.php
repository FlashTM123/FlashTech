@extends('master')

@section('title', 'Laptop')

@section('content')
    @include('layouts.carousel')

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
@endsection
