@extends('app')

@section('title', 'Chi tiết sản phẩm')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-4xl mx-auto bg-white dark:bg-base-200 p-8 rounded-2xl shadow-xl">
        <h2 class="text-3xl font-bold text-center text-gradient bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent mb-8">
            Chi tiết sản phẩm
        </h2>

        <div class="flex flex-col md:flex-row gap-6">
            {{-- Hình ảnh sản phẩm --}}
            <div class="flex-shrink-0">
                <img src="{{ $detail->image ?? asset('images/default-product.png') }}" alt="Hình ảnh sản phẩm" class="rounded-lg shadow-lg w-full md:w-96">
            </div>

            {{-- Thông tin sản phẩm --}}
            <div class="flex-grow">
                <h3 class="text-2xl font-bold mb-4">{{ $detail->name }}</h3>
                <p class="text-lg"><strong>Loại:</strong>
                    @if ($product->laptop)
                        Laptop
                    @elseif ($product->component)
                        Linh kiện
                    @elseif ($product->accessories)
                        Phụ kiện
                    @endif
                </p>
                <p class="text-lg"><strong>Giá:</strong> {{ number_format($detail->price) }}₫</p>
                <p class="text-lg"><strong>Mô tả:</strong> {{ $product->description }}</p>

                {{-- Thông số kỹ thuật --}}
                <h4 class="text-xl font-bold mt-6">Thông số kỹ thuật:</h4>
                <ul class="list-disc list-inside">
                    @if ($product->laptop)
                        <li>CPU: {{ $detail->cpu }}</li>
                        <li>RAM: {{ $detail->ram }}</li>
                        <li>Ổ cứng: {{ $detail->storage }}</li>
                        <li>GPU: {{$detail->vga}}</li>
                    @elseif ($product->component)
                        <li>Loại linh kiện: {{ $detail->type }}</li>
                        <li>Thông số: {{ $detail->specifications }}</li>
                    @elseif ($product->accessories)
                        <li>Loại phụ kiện: {{ $detail->type }}</li>
                        <li>Thương hiệu: {{ $detail->brand }}</li>
                    @else
                        <li>Không có thông số kỹ thuật.</li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('product.index') }}" class="btn btn-outline btn-primary">Quay lại danh sách</a>
        </div>
    </div>
</div>
@endsection
