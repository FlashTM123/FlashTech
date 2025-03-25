@extends('master')

@section('title', '')

@section('content')
    @include('layouts.carousel')

    <div class="grid grid-cols-5 gap-4">
        @foreach ($products->where('type', 'accessories') as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>


@endsection

