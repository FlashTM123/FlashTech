@extends('master')

@section('title', 'Component')

@section('content')

    @include('layouts.carousel')
    <div class="grid grid-cols-5 gap-4">
        @foreach ($components as $component)
            <x-card-component image="{{ $component->image }}" name="{{ $component->name }}" type="{{ $component->type }}"
                storage="{{ $component->capacity }}" quantity="{{ $component->quantity }}"
                price1="{{ number_format($component->original_price) }}đ" discount="{{ $component->discount }}"
                price2="{{ number_format($component->promotional_price) }}đ"></x-card-component>
        @endforeach

    </div>
@endsection
