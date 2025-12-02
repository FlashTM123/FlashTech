@extends("app")

@section('title', 'Add Component')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 p-6">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8">
                <h2 class="text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">⚙️ Thêm Linh kiện Mới</h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Tạo một sản phẩm linh kiện mới để quản lý</p>
            </div>

            <form action="{{ route('component.store') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 rounded-xl shadow-xl p-8 space-y-6 border border-gray-200 dark:border-gray-700">
                @csrf

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-microchip text-indigo-600 mr-2"></i>Tên sản phẩm</label>
                        <input type="text" name="name" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" placeholder="Nhập tên linh kiện" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-tag text-purple-600 mr-2"></i>Thương hiệu</label>
                        <select name="brand_id" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500">
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-keyboard text-blue-600 mr-2"></i>Loại</label>
                        <input type="text" name="type" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" placeholder="VD: RAM, GPU, SSD" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-database text-yellow-600 mr-2"></i>Dung lượng</label>
                        <input type="text" name="capacity" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" placeholder="VD: 16GB, 512GB" required>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-tag text-gray-600 mr-2"></i>Giá gốc (Đ)</label>
                        <input type="text" step="0.01" name="original_price" id="original_price" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" placeholder="0" required>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-percent text-orange-600 mr-2"></i>Giảm giá (%)</label>
                        <input type="text" name="discount" id="discount" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" placeholder="0">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-fire text-red-600 mr-2"></i>Giá ưu đãi (Đ)</label>
                        <input type="text" step="0.01" name="promotional_price" id="promotional_price" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" placeholder="0">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-box text-indigo-600 mr-2"></i>Số lượng</label>
                    <input type="number" name="quantity" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" placeholder="0" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-image text-purple-600 mr-2"></i>Link ảnh sản phẩm</label>
                    <input type="text" name="image" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" placeholder="https://..." required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"><i class="fas fa-pen text-pink-600 mr-2"></i>Mô tả chi tiết</label>
                    <textarea name="description" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-800 dark:text-gray-200 focus:ring-2 focus:ring-indigo-500" rows="4" placeholder="Mô tả đầy đủ về sản phẩm..." required></textarea>
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('component.index') }}" class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-lg font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Quay lại
                    </a>
                    <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:shadow-lg hover:shadow-indigo-500/50 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-plus mr-2"></i>Thêm Linh kiện
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const originalPriceInput = document.getElementById('original_price');
            const discountInput = document.getElementById('discount');
            const promotionalPriceInput = document.getElementById('promotional_price');

            function calculatePromotionalPrice() {
                const originalPrice = parseFloat(originalPriceInput.value) || 0;
                const discount = parseFloat(discountInput.value) || 0;

                if (discount > 0 && discount <= 100) {
                    const promotionalPrice = originalPrice - (originalPrice * discount / 100);
                    promotionalPriceInput.value = Math.round(promotionalPrice);
                } else {
                    promotionalPriceInput.value = Math.round(originalPrice);
                }
            }

            originalPriceInput.addEventListener('input', calculatePromotionalPrice);
            discountInput.addEventListener('input', calculatePromotionalPrice);
        });
    </script>

@endsection
