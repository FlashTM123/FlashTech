@extends('master')

@section('title', 'Laptop')

@section('content')

 @include('layouts.banner')
    <div class="grid grid-cols-5 gap-4">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

@endsection
