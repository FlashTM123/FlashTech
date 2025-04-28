@extends('master')

@section('title', 'Phụ Kiện')

@section('content')


    @include('layouts.banner')
    <div class="grid grid-cols-5 gap-4">
        @foreach ($products->filter(fn($product) => $product->accessories_id) as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>


@endsection

