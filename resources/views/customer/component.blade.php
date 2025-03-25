@extends('master')

@section('title', 'Component')

@section('content')
    @include('layouts.carousel')

    <div class="grid grid-cols-5 gap-4">
        @foreach ($products->where('type', 'component') as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>


@endsection
w
