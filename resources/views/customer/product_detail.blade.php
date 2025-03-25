@extends('master')

@section('title', 'Product Detail')

@section('content')


<x-product-detail :product="$product" :detail="$detail" />


@endsection
