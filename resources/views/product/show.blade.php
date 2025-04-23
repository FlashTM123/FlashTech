@extends('app')

@section('title', $product->getProductName())

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-6xl mx-auto bg-white dark:bg-base-200 p-8 rounded-3xl shadow-2xl transition-transform hover:scale-[1.01]">
        <!-- Tiêu đề -->
        <h2 class="text-4xl font-extrabold text-center mb-10 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent">
            <i class="lucide lucide-info w-8 h-8 mr-2 text-indigo-500"></i>
            Chi tiết sản phẩm
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Hình ảnh sản phẩm -->
            <div class="relative group">
                <img src="{{ $product->getProductImage() }}" alt="{{ $product->getProductName() }}"
                    class="rounded-xl shadow-lg transition-transform duration-300 group-hover:scale-105">
                <div class="absolute bottom-2 left-2 bg-indigo-600 text-white text-xs px-3 py-1 rounded-full shadow-md">
                    {{ ucfirst($product->type) }}
                </div>
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="space-y-4">
                <h3 class="text-3xl font-semibold text-gray-800 dark:text-gray-100">{{ $product->getProductName() }}</h3>
                <p class="text-gray-600 dark:text-gray-300"><strong>Loại:</strong> {{ ucfirst($product->type) }}</p>
                <p class="text-gray-600 dark:text-gray-300"><strong>Giá:</strong> <span class="text-lg font-bold text-red-600">{{ number_format($product->getProductPrice()) }}đ</span></p>
                <p class="text-gray-600 dark:text-gray-300"><strong>Mô tả:</strong> {{ $product->description }}</p>

                @if ($detail)
                    <div class="pt-4">
                        <h4 class="text-lg font-semibold mb-2 text-indigo-500">Thông số kỹ thuật:</h4>
                        <ul class="space-y-1 text-gray-700 dark:text-gray-300 list-disc list-inside">
                            @if ($product->type === 'laptop')
                                <li><strong>CPU:</strong> {{ $detail->cpu }}</li>
                                <li><strong>RAM:</strong> {{ $detail->ram }} GB</li>
                                <li><strong>GPU:</strong> {{ $detail->vga }}</li>
                                <li><strong>Lưu trữ:</strong> {{ $detail->storage }}</li>
                            @elseif ($product->type === 'component')
                                <li><strong>Loại:</strong> {{ $detail->type }}</li>
                                <li><strong>Dung lượng:</strong> {{ $detail->capacity }}</li>
                            @elseif ($product->type === 'accessories')
                                <li><strong>Loại:</strong> {{ $detail->type }}</li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <!-- Nút quay lại -->
        <div class="text-center mt-10">
            <a href="{{ route('product.index') }}" class="btn btn-outline btn-primary">
                <i class="lucide lucide-arrow-left mr-2 w-5 h-5"></i>Quay lại danh sách
            </a>
        </div>
    </div>
</div>
@endsection
