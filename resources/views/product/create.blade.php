@extends('app')

@section('title', 'Thêm Sản Phẩm')

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-3xl mx-auto bg-white dark:bg-base-200 p-8 rounded-2xl shadow-xl">
        <h2 class="text-3xl font-bold text-center text-gradient bg-gradient-to-r from-indigo-500 to-purple-500 bg-clip-text text-transparent mb-8">
            <i class="fa-solid fa-circle-plus mr-2 text-indigo-500"></i>Thêm sản phẩm mới
        </h2>

        {{-- SweetAlert nếu thành công --}}
        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function(){
                    Swal.fire({
                        icon: 'success',
                        title: 'Thành công',
                        text: 'Thêm sản phẩm thành công!',
                        confirmButtonText: 'OK',
                    });
                });
            </script>
        @endif

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Loại sản phẩm --}}
            <div>
                <label class="label font-semibold">Loại sản phẩm</label>
                <select name="type" class="select select-bordered w-full">
                    <option value="laptop">Laptop</option>
                    <option value="component">Linh kiện</option>
                    <option value="accessories">Phụ kiện</option>
                </select>
            </div>

            {{-- Type ID --}}
            <div>
                <label class="label font-semibold">Mã loại</label>
                <input type="number" name="type_id" class="input input-bordered w-full" placeholder="Nhập mã loại">
            </div>

            {{-- Mô tả sản phẩm --}}
            <div>
                <label class="label font-semibold">Mô tả sản phẩm</label>
                <textarea name="description" class="textarea textarea-bordered w-full" rows="8" placeholder="Mô tả chi tiết sản phẩm..."></textarea>
            </div>

            {{-- Nút hành động --}}
            <div class="flex justify-end gap-4 pt-4">
                <a href="{{ route('product.index') }}" class="btn btn-outline btn-error">
                    <i class="fa-solid fa-circle-xmark mr-2"></i>Huỷ bỏ
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-circle-check mr-2"></i>Thêm sản phẩm
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
