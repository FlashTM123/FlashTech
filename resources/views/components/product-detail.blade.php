<!-- Product Detail Container -->
<div class="space-y-8">
    <!-- Main Product Section -->
    <div class="grid lg:grid-cols-2 gap-8 bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl transition-all">
        <!-- Image Gallery -->
        <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 p-8 flex items-center justify-center">
            <div class="w-full aspect-square rounded-xl overflow-hidden bg-white dark:bg-gray-900 flex items-center justify-center group">
                <img
                    src="{{ $product->getProductImage() }}"
                    alt="{{ $product->getProductName() }}"
                    class="w-full h-full object-contain transform group-hover:scale-110 transition-transform duration-300"
                />
            </div>
        </div>

        <!-- Product Info -->
        <div class="p-8 flex flex-col justify-between space-y-6">
            <!-- Breadcrumb -->
            <div class="text-sm text-gray-600 dark:text-gray-400 space-x-2">
                <a href="/" class="hover:text-indigo-600 dark:hover:text-indigo-400">Trang chủ</a>
                <span>/</span>
                <span>{{ $product->getProductName() }}</span>
            </div>

            <!-- Product Title & Ratings -->
            <div class="space-y-4">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white leading-tight">
                    {{ $product->getProductName() }}
                </h1>

                <!-- Rating -->
                <div class="flex items-center gap-4">
                    <div class="flex gap-1">
                        <i class="fa-solid fa-star text-yellow-400 text-lg"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-lg"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-lg"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-lg"></i>
                        <i class="fa-regular fa-star text-yellow-400 text-lg"></i>
                    </div>
                    <span class="text-sm text-gray-600 dark:text-gray-400">(124 đánh giá)</span>
                </div>

                <!-- Color Badge -->
                <div class="flex items-center gap-2">
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Màu sắc:</span>
                    <span class="px-4 py-2 rounded-lg bg-gradient-to-r from-indigo-100 to-purple-100 dark:from-indigo-900/30 dark:to-purple-900/30 text-indigo-700 dark:text-indigo-300 font-semibold">
                        <i class="fa-solid fa-palette mr-2"></i>{{ $product->getProductColor() }}
                    </span>
                </div>
            </div>

            <!-- Price Section -->
            <div class="space-y-3 p-6 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-900/50 dark:to-gray-800/50 rounded-xl border border-gray-200 dark:border-gray-700">
                @if ($product->getProductDiscount() > 0)
                    <div class="flex items-center gap-4">
                        <span class="text-3xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            {{ number_format($product->getProductPrice()) }}đ
                        </span>
                        <span class="text-lg line-through text-gray-400 dark:text-gray-500">
                            {{ number_format($product->getProductOriginalPrice()) }}đ
                        </span>
                        <span class="px-3 py-1 rounded-full bg-gradient-to-r from-red-500 to-orange-500 text-white font-bold text-sm">
                            <i class="fa-solid fa-fire mr-1"></i>-{{ $product->getProductDiscount() }}%
                        </span>
                    </div>
                    <p class="text-sm text-green-600 dark:text-green-400 font-medium">
                        <i class="fa-solid fa-check mr-1"></i>Tiết kiệm {{ number_format($product->getProductOriginalPrice() - $product->getProductPrice()) }}đ
                    </p>
                @else
                    <span class="text-4xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        {{ number_format($product->getProductPrice()) }}đ
                    </span>
                @endif
            </div>

            <!-- Stock Status -->
            <div class="flex items-center gap-2">
                @if ($product->getProductQuantity() > 0)
                    <div class="flex-1 py-3 px-4 rounded-lg bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 font-semibold flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check-circle text-xl"></i>
                        Còn {{ $product->getProductQuantity() }} sản phẩm
                    </div>
                @else
                    <div class="flex-1 py-3 px-4 rounded-lg bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 font-semibold flex items-center justify-center gap-2">
                        <i class="fa-solid fa-times-circle text-xl"></i>
                        Hết hàng
                    </div>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_name" value="{{ $product->getProductName() }}">
                <input type="hidden" name="product_price" value="{{ $product->getProductPrice() }}">
                <input type="hidden" name="product_image" value="{{ $product->getProductImage() }}">

                <div class="flex gap-3">
                    @livewire('add-to-cart', ['product' => $product])
                    <button class="flex-1 py-3 px-4 rounded-lg border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white font-bold transition-all flex items-center justify-center gap-2 group">
                        <i class="fa-solid fa-heart group-hover:scale-110 transition-transform"></i>
                        Yêu thích
                    </button>
                </div>

                <!-- Additional Info -->
                <div class="grid grid-cols-3 gap-2 text-center">
                    <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-truck text-indigo-600 dark:text-indigo-400 text-xl mb-2"></i>
                        <p class="text-xs font-medium text-gray-700 dark:text-gray-300">Giao miễn phí</p>
                    </div>
                    <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-shield text-green-600 dark:text-green-400 text-xl mb-2"></i>
                        <p class="text-xs font-medium text-gray-700 dark:text-gray-300">Hàng chính hãng</p>
                    </div>
                    <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <i class="fa-solid fa-undo text-orange-600 dark:text-orange-400 text-xl mb-2"></i>
                        <p class="text-xs font-medium text-gray-700 dark:text-gray-300">Đổi trả 30 ngày</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs Section -->
    <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden border border-gray-200 dark:border-gray-700">
        <!-- Tab Navigation -->
        <div class="flex border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
            <button class="flex-1 py-4 px-6 font-semibold text-indigo-600 dark:text-indigo-400 border-b-2 border-indigo-600 dark:border-indigo-400 transition-all tab-button" data-tab="description">
                <i class="fa-solid fa-file-lines mr-2"></i>Mô tả sản phẩm
            </button>
            <button class="flex-1 py-4 px-6 font-semibold text-gray-600 dark:text-gray-400 border-b-2 border-transparent hover:text-indigo-600 dark:hover:text-indigo-400 transition-all tab-button" data-tab="specs">
                <i class="fa-solid fa-list mr-2"></i>Thông số kỹ thuật
            </button>
            <button class="flex-1 py-4 px-6 font-semibold text-gray-600 dark:text-gray-400 border-b-2 border-transparent hover:text-indigo-600 dark:hover:text-indigo-400 transition-all tab-button" data-tab="reviews">
                <i class="fa-solid fa-comments mr-2"></i>Đánh giá & nhận xét
            </button>
        </div>

        <!-- Tab Content -->
        <div class="p-8 space-y-6">
            <!-- Description Tab -->
            <div id="description-tab" class="tab-content">
                <div class="prose dark:prose-invert max-w-none space-y-4">
                    @foreach (explode("\n", $product->description) as $paragraph)
                        @if (Str::startsWith($paragraph, '##'))
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mt-6 mb-3">
                                {{ Str::replaceFirst('##', '', $paragraph) }}
                            </h4>
                        @elseif (!empty(trim($paragraph)))
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                {{ $paragraph }}
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Specs Tab -->
            <div id="specs-tab" class="tab-content hidden">
                @if ($detail)
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @if ($product->laptop)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="py-4 px-4 font-semibold text-gray-900 dark:text-white w-1/3">CPU</td>
                                        <td class="py-4 px-4 text-gray-700 dark:text-gray-300">{{ $detail->cpu }}</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="py-4 px-4 font-semibold text-gray-900 dark:text-white">RAM</td>
                                        <td class="py-4 px-4 text-gray-700 dark:text-gray-300">{{ $detail->ram }}</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="py-4 px-4 font-semibold text-gray-900 dark:text-white">GPU</td>
                                        <td class="py-4 px-4 text-gray-700 dark:text-gray-300">{{ $detail->vga }}</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="py-4 px-4 font-semibold text-gray-900 dark:text-white">Lưu trữ</td>
                                        <td class="py-4 px-4 text-gray-700 dark:text-gray-300">{{ $detail->storage }}</td>
                                    </tr>
                                @elseif ($product->component)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="py-4 px-4 font-semibold text-gray-900 dark:text-white">Loại</td>
                                        <td class="py-4 px-4 text-gray-700 dark:text-gray-300">{{ $detail->type }}</td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="py-4 px-4 font-semibold text-gray-900 dark:text-white">Dung lượng</td>
                                        <td class="py-4 px-4 text-gray-700 dark:text-gray-300">{{ $detail->capacity }}</td>
                                    </tr>
                                @elseif ($product->accessories)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                        <td class="py-4 px-4 font-semibold text-gray-900 dark:text-white">Loại</td>
                                        <td class="py-4 px-4 text-gray-700 dark:text-gray-300">{{ $detail->type }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500 dark:text-gray-400 text-center py-8">
                        <i class="fa-solid fa-info-circle mr-2"></i>Không có dữ liệu chi tiết
                    </p>
                @endif
            </div>

            <!-- Reviews Tab -->
            <div id="reviews-tab" class="tab-content hidden">
                <div class="space-y-6">
                    <!-- Review Summary -->
                    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 p-6 rounded-xl border border-indigo-200 dark:border-indigo-800">
                        <div class="flex items-center gap-4">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">4.5</div>
                                <div class="flex text-yellow-400 justify-center mt-1">
                                    <i class="fa-solid fa-star text-sm"></i>
                                    <i class="fa-solid fa-star text-sm"></i>
                                    <i class="fa-solid fa-star text-sm"></i>
                                    <i class="fa-solid fa-star text-sm"></i>
                                    <i class="fa-regular fa-star text-sm"></i>
                                </div>
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1">124 đánh giá</p>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-700 dark:text-gray-300 mb-3">Đánh giá từ khách hàng</p>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2 text-xs">
                                        <span class="w-12">5 sao</span>
                                        <div class="flex-1 h-2 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                                            <div class="h-full bg-green-500 w-3/4"></div>
                                        </div>
                                        <span class="w-8 text-right">72%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews List -->
                    <div class="space-y-4">
                        <h4 class="font-bold text-lg text-gray-900 dark:text-white">Nhận xét gần đây</h4>
                        <p class="text-gray-600 dark:text-gray-400 text-center py-8">
                            <i class="fa-solid fa-message mr-2"></i>Hiện chưa có nhận xét nào
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.tab-button').forEach(button => {
    button.addEventListener('click', function() {
        const tabName = this.dataset.tab;

        // Hide all tabs
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });

        // Remove active styles
        document.querySelectorAll('.tab-button').forEach(btn => {
            btn.classList.remove('text-indigo-600', 'dark:text-indigo-400', 'border-indigo-600', 'dark:border-indigo-400');
            btn.classList.add('text-gray-600', 'dark:text-gray-400', 'border-transparent');
        });

        // Show selected tab
        document.getElementById(tabName + '-tab').classList.remove('hidden');

        // Add active styles
        this.classList.remove('text-gray-600', 'dark:text-gray-400', 'border-transparent');
        this.classList.add('text-indigo-600', 'dark:text-indigo-400', 'border-indigo-600', 'dark:border-indigo-400');
    });
});
</script>
