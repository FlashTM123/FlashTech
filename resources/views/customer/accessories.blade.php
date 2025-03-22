@extends('master')

@section('title', 'Accessories')

@section('content')
    @include('layouts.carousel')
    <div class="grid grid-cols-5 gap-4">
        @foreach ($accessories as $accessory)
            <x-card-accessories image="{{ $accessory->image }}" name="{{ $accessory->name }}"
                color="{{ $accessory->color ? $accessory->color->name : 'N/A' }}" type="{{ $accessory->type }}"
                quantity="{{ $accessory->quantity }}" price1="{{ number_format($accessory->original_price) }}đ"
                discount="{{ $accessory->discount }}"
                price2="{{ number_format($accessory->promotional_price) }}đ"></x-card-accessories>
        @endforeach
    </div>

@endsection
