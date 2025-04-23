@extends('app')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content')
<div class="container mx-auto px-4 py-10">
    <div class="max-w-4xl mx-auto bg-white dark:bg-base-200 rounded-3xl shadow-2xl border border-base-300 transition-transform hover:scale-[1.01]">
        <div class="px-10 py-8 space-y-8">

            <!-- Tiêu đề -->
            <div class="text-center">
                <h2 class="text-4xl font-extrabold bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 bg-clip-text text-transparent inline-block">
                    <i class="lucide lucide-pen-line inline-block w-7 h-7 text-indigo-500 mr-2"></i>
                    Chỉnh sửa sản phẩm
                </h2>
                <p class="mt-2 text-gray-500 dark:text-gray-400 text-sm">Cập nhật thông tin sản phẩm bên dưới</p>
            </div>

            <!-- Thông báo thành công -->
            @if (session('success'))
                <div class="alert alert-success shadow-lg flex items-center gap-2">
                    <i class="lucide lucide-check-circle text-green-600 w-5 h-5"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Type ID -->
                <div class="form-control">
                    <label class="label font-semibold">
                        <i class="lucide lucide-hash w-5 h-5 mr-2 text-indigo-500"></i>Mã loại
                    </label>
                    <input type="number" name="type_id" class="input input-bordered w-full" value="{{ $product->type_id }}" required>
                </div>

                <!-- Mô tả sản phẩm -->
                <div class="form-control">
                    <label class="label font-semibold">
                        <i class="lucide lucide-align-left w-5 h-5 mr-2 text-indigo-500"></i>Mô tả sản phẩm
                    </label>
                    <textarea name="description" class="textarea textarea-bordered w-full" rows="8" placeholder="Mô tả chi tiết..." required>{{ $product->description }}</textarea>
                </div>

                <!-- Nút hành động -->
                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ route('product.index') }}" class="btn btn-outline btn-error">
                        <i class="lucide lucide-x-circle w-5 h-5 mr-2"></i>Huỷ bỏ
                    </a>
                    <button type="submit" class="btn btn-primary shadow-md">
                        <i class="lucide lucide-check-circle w-5 h-5 mr-2"></i>Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
