@extends('app')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto bg-white dark:bg-base-200 rounded-3xl shadow-2xl border border-base-300 transition-transform hover:scale-[1.01]">
        <div class="px-10 py-8 space-y-8">

            <!-- Tiêu đề -->
            <div class="text-center">
                <h2 class="text-4xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent inline-block">
                    <i class="fas fa-pen-alt inline-block w-7 h-7 text-indigo-500 mr-2"></i>
                    Chỉnh sửa sản phẩm
                </h2>
                <p class="mt-2 text-gray-500 dark:text-gray-400 text-sm">Cập nhật thông tin sản phẩm bên dưới</p>
            </div>

            <!-- Thông báo thành công -->
            @if (session('success'))
                <div class="alert alert-success shadow-lg flex items-center gap-2">
                    <i class="fas fa-check-circle text-green-600 w-5 h-5"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Loại sản phẩm -->
                <div class="form-control">
                    <label class="label font-semibold">
                        <i class="fas fa-list w-5 h-5 mr-2 text-indigo-500"></i>Loại sản phẩm
                    </label>
                    <select name="product_type" class="select select-bordered w-full" required>
                        <option value="laptop" {{ $product->laptop ? 'selected' : '' }}>Laptop</option>
                        <option value="component" {{ $product->component ? 'selected' : '' }}>Linh kiện</option>
                        <option value="accessories" {{ $product->accessories ? 'selected' : '' }}>Phụ kiện</option>
                    </select>
                </div>

                <!-- Laptop ID -->
                <div class="form-control" id="laptop-fields" style="display: {{ $product->laptop ? 'block' : 'none' }}">
                    <label class="label font-semibold">
                        <i class="fas fa-laptop w-5 h-5 mr-2 text-indigo-500"></i>Laptop ID
                    </label>
                    <input type="text" name="laptop_id" class="input input-bordered w-full bg-gray-100 cursor-not-allowed" value="{{ $product->laptop_id ?? '' }}" readonly>
                </div>

                <!-- Component ID -->
                <div class="form-control" id="component-fields" style="display: {{ $product->component ? 'block' : 'none' }}">
                    <label class="label font-semibold">
                        <i class="fas fa-cogs w-5 h-5 mr-2 text-indigo-500"></i>Component ID
                    </label>
                    <input type="text" name="component_id" class="input input-bordered w-full bg-gray-100 cursor-not-allowed" value="{{ $product->component_id ?? '' }}" readonly>
                </div>

                <!-- Accessories ID -->
                <div class="form-control" id="accessories-fields" style="display: {{ $product->accessories ? 'block' : 'none' }}">
                    <label class="label font-semibold">
                        <i class="fas fa-headphones w-5 h-5 mr-2 text-indigo-500"></i>Accessories ID
                    </label>
                    <input type="text" name="accessories_id" class="input input-bordered w-full bg-gray-100 cursor-not-allowed" value="{{ $product->accessories_id ?? '' }}" readonly>
                </div>

                <!-- Mô tả sản phẩm -->
                <div class="form-control">
                    <label class="label font-semibold">
                        <i class="fas fa-align-left w-5 h-5 mr-2 text-indigo-500"></i>Mô tả sản phẩm
                    </label>
                    <textarea name="description" class="textarea textarea-bordered w-full" rows="8" placeholder="Mô tả chi tiết..." required>{{ $product->description }}</textarea>
                </div>

                <!-- Nút hành động -->
                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ route('product.index') }}" class="btn btn-outline btn-error">
                        <i class="fas fa-times-circle w-5 h-5 mr-2"></i>Huỷ bỏ
                    </a>
                    <button type="submit" class="btn btn-primary shadow-md">
                        <i class="fas fa-check-circle w-5 h-5 mr-2"></i>Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('select[name="product_type"]').addEventListener('change', function () {
        const type = this.value;
        document.getElementById('laptop-fields').style.display = type === 'laptop' ? 'block' : 'none';
        document.getElementById('component-fields').style.display = type === 'component' ? 'block' : 'none';
        document.getElementById('accessories-fields').style.display = type === 'accessories' ? 'block' : 'none';
    });
</script>
@endsection
