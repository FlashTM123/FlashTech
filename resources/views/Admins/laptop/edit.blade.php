@extends("app")

@section('title', 'Edit Laptop: ' . $laptop->name)

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-6">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <h2 class="text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">📱 Chỉnh sửa Laptop</h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Cập nhật thông tin sản phẩm: {{ $laptop->name }}</p>
            </div>

            <form action="{{ route('laptop.update', $laptop -> id) }}" method="post" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 rounded-xl shadow-xl p-8 space-y-6 border border-gray-200 dark:border-gray-700">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-id-card text-indigo-600 mr-2"></i>Laptop ID</label>
                        <input type="text" class="w-full px-4 py-3 bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop->id }}" readonly>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-laptop text-indigo-600 mr-2"></i>Tên sản phẩm</label>
                        <input type="text" name="name" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop -> name }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-tag text-purple-600 mr-2"></i>Thương hiệu</label>
                        <select name="brand_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $brand->id == $laptop->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-palette text-pink-600 mr-2"></i>Màu sắc</label>
                        <input type="text" name="color" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop -> color}}" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-microchip text-blue-600 mr-2"></i>CPU</label>
                        <input type="text" name="cpu" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop -> cpu }}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-memory text-green-600 mr-2"></i>RAM</label>
                        <input type="text" name="ram" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop -> ram }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-video text-red-600 mr-2"></i>VGA</label>
                        <input type="text" name="vga" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop -> vga }}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-database text-yellow-600 mr-2"></i>Storage (GB)</label>
                        <input type="text" name="storage" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop -> storage }}" required>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-tag text-gray-600 mr-2"></i>Giá gốc (Đ)</label>
                        <input type="text" step="0.01" name="original_price" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{$laptop -> original_price}}" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-percent text-orange-600 mr-2"></i>Giảm giá (%)</label>
                        <input type="text" name="discount" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{$laptop -> discount}}">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-fire text-red-600 mr-2"></i>Giá ưu đãi (Đ)</label>
                        <input type="text" step="0.01" name="promotional_price" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{$laptop -> promotional_price}}">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-box text-indigo-600 mr-2"></i>Số lượng</label>
                    <input type="number" name="quantity" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop -> quantity }}" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-image text-purple-600 mr-2"></i>Link ảnh sản phẩm</label>
                    <input type="text" name="image" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" value="{{ $laptop -> image }}" required>
                </div>



                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('laptop.index') }}" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Quay lại
                    </a>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:shadow-lg hover:shadow-indigo-500/50 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i>Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
