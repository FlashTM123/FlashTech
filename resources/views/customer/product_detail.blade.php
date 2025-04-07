@extends('master')

@section('title',  $product->getProductName() )

@section('content')


<x-product-detail :product="$product" :detail="$detail" />


@endsection
