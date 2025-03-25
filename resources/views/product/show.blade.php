@extends('app')

@section('title', 'Product Detail')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 text-center">Product Detail</h2>

        <div class="flex flex-col items-center gap-6 mt-4">
            <!-- Display product image -->
            <div class="w-1/4">
                <img src="{{ $product->getProductImage() }}" alt="{{ $product->getProductName() }}"
                    class="w-full rounded-lg shadow-md">
            </div>

            <!-- Display product information -->
            <div class="w-full md:w-1/2 text-center">
                <p><strong>Name:</strong> {{ $product->getProductName() }}</p>
                <p><strong>Type:</strong> {{ ucfirst($product->type) }}</p>
                @if ($detail)
                    <h3 class="font-semibold text-lg mt-2">
                        Specifications</h3>
                    @if ($product->type === 'laptop')
                        <p><strong>CPU: </strong> {{ $detail->cpu }}</p>
                        <p><strong>RAM: </strong> {{ $detail->ram }} GB</p>
                        <p><strong>GPU: </strong> {{ $detail->vga }}</p>
                        <p><strong>Storage: </strong> {{ $detail->storage }}</p>
                    @elseif ($product->type === 'component')
                        <p><strong>Type: </strong> {{ $detail->type }}</p>
                        <p><strong>Capacity: </strong> {{ $detail->capacity }}</p>
                    @elseif ($product->type === 'accessories')
                        <p><strong>Type: </strong> {{ $detail->type }}</p>
                    @endif
                @endif
                <p><strong>Description:</strong> {{$product->description}}</p>
                <p><strong>Price:</strong> {{ number_format($product->getProductPrice()) }}đ</p>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
