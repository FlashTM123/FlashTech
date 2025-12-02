<div>
    <div class="flex flex-col gap-8">
        <!-- Premium Header Section -->
        <div class="pb-6 border-b-2 border-indigo-600/20">
            <div class="flex flex-col gap-4 mb-6">
                <div>
                    <h2 class="text-5xl font-extrabold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">
                        Quản lý sản phẩm
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 flex items-center gap-2">
                        <i class="fa-solid fa-box text-indigo-600"></i>
                        Tổng sản phẩm: <span class="font-bold text-indigo-600">{{ $products->total() }}</span>
                    </p>
                </div>
            </div>

            <!-- Filters Section -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Category Filter -->
                <div class="relative group">
                    <label class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 block">
                        <i class="fa-solid fa-filter text-indigo-600 mr-2"></i>Loại sản phẩm
                    </label>
                    <select wire:model.live='filter' class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 transition-all duration-300 font-medium">
                        <option value="all">🎯 Tất cả sản phẩm</option>
                        <option value="laptop">💻 Laptop</option>
                        <option value="component">🔧 Linh kiện</option>
                        <option value="accessories">🎧 Phụ kiện</option>
                    </select>
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-indigo-600/0 to-purple-600/0 opacity-0 group-hover:opacity-10 transition-opacity pointer-events-none"></div>
                </div>

                <!-- Items Per Page -->
                <div class="relative group">
                    <label class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 block">
                        <i class="fa-solid fa-list text-indigo-600 mr-2"></i>Hiển thị
                    </label>
                    <select wire:model.live='limit' class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 transition-all duration-300 font-medium">
                        <option value="5">5 mục</option>
                        <option value="10">10 mục</option>
                        <option value="20">20 mục</option>
                        <option value="50">50 mục</option>
                    </select>
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-indigo-600/0 to-purple-600/0 opacity-0 group-hover:opacity-10 transition-opacity pointer-events-none"></div>
                </div>

                <!-- Search Input -->
                <div class="md:col-span-2 relative group">
                    <label class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2 block">
                        <i class="fa-solid fa-magnifying-glass text-indigo-600 mr-2"></i>Tìm kiếm
                    </label>
                    <div class="relative">
                        <input type="search"
                            wire:model.live.debounce.150ms='search'
                            placeholder="Nhập tên sản phẩm..."
                            class="w-full px-4 py-3 pl-12 rounded-xl border-2 border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:border-indigo-500 dark:focus:border-indigo-400 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900 transition-all duration-300 font-medium">
                        <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Table - Premium Design -->
        <div class="overflow-x-auto rounded-2xl border border-indigo-600/20 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 shadow-2xl">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-indigo-600/10 to-purple-600/10 dark:from-indigo-600/20 dark:to-purple-600/20 border-b-2 border-indigo-600/20">
                    <tr>
                        <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">#</th>
                        <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Hình ảnh</th>
                        <th class="text-left px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Tên sản phẩm</th>
                        <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Loại</th>
                        <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Giá</th>
                        <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Số lượng</th>
                        <th class="text-center px-6 py-4 text-sm font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($products as $index => $product)
                        <tr class="hover:bg-indigo-50/50 dark:hover:bg-indigo-900/10 transition-all duration-300 group product-row">
                            <td class="text-center px-6 py-5">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-bold">
                                    {{ ($products->currentPage() - 1) * $products->perPage() + $loop->index + 1 }}
                                </span>
                            </td>

                            <td class="text-center px-6 py-5">
                                <div class="flex justify-center">
                                    <div class="relative w-14 h-14 rounded-xl overflow-hidden ring-2 ring-indigo-200 dark:ring-indigo-700 shadow-lg group-hover:ring-indigo-500 transition-all">
                                        <img src="{{ $product->getProductImage() }}"
                                             alt="Product Image"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                             loading="lazy">
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-5">
                                <p class="font-semibold text-gray-900 dark:text-white group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors line-clamp-2">
                                    {{ $product->getProductName() }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">ID: {{ substr($product->id, -8) }}</p>
                            </td>

                            <td class="text-center px-6 py-5">
                                @if ($product->laptop)
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-semibold">
                                        <i class="fa-solid fa-laptop text-lg"></i>Laptop
                                    </span>
                                @elseif ($product->component)
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 text-sm font-semibold">
                                        <i class="fa-solid fa-microchip text-lg"></i>Linh kiện
                                    </span>
                                @elseif ($product->accessories)
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-pink-100 dark:bg-pink-900/30 text-pink-700 dark:text-pink-300 text-sm font-semibold">
                                        <i class="fa-solid fa-keyboard text-lg"></i>Phụ kiện
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-semibold">
                                        <i class="fa-solid fa-question text-lg"></i>N/A
                                    </span>
                                @endif
                            </td>

                            <td class="text-center px-6 py-5">
                                @if($product->getProductPrice() < $product->getProductOriginalPrice())
                                    <div class="flex flex-col items-center gap-1">
                                        <span class="line-through text-gray-400 text-sm font-medium">
                                            {{ number_format($product->getProductOriginalPrice()) }}đ
                                        </span>
                                        <span class="text-lg font-extrabold bg-gradient-to-r from-red-600 to-pink-600 bg-clip-text text-transparent">
                                            {{ number_format($product->getProductPrice()) }}đ
                                        </span>
                                        <span class="text-xs px-2 py-1 rounded-full bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 font-bold">
                                            -{{ round((1 - $product->getProductPrice() / $product->getProductOriginalPrice()) * 100) }}%
                                        </span>
                                    </div>
                                @else
                                    <span class="text-lg font-extrabold text-indigo-600 dark:text-indigo-400">
                                        {{ number_format($product->getProductPrice()) }}đ
                                    </span>
                                @endif
                            </td>

                            <td class="text-center px-6 py-5">
                                <div class="flex items-center justify-center gap-2">
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 font-semibold text-sm">
                                        <i class="fa-solid fa-box-open text-lg"></i>
                                        {{ $product->getProductQuantity() }}
                                    </span>
                                    @if($product->getProductQuantity() == 0)
                                        <span class="text-xs px-2 py-1 rounded-full bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 font-bold">Hết hàng</span>
                                    @elseif($product->getProductQuantity() < 5)
                                        <span class="text-xs px-2 py-1 rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400 font-bold">Cảnh báo</span>
                                    @endif
                                </div>
                            </td>

                            <td class="text-center px-6 py-5">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('product.edit', $product->id) }}"
                                       class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:scale-105 action-btn">
                                        <i class="fa-solid fa-pen-to-square text-lg"></i>
                                        <span class="hidden sm:inline">Sửa</span>
                                    </a>
                                    <button type="button"
                                            onclick="deleteProduct('{{ $product->id }}')"
                                            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-semibold text-sm transition-all duration-300 hover:shadow-lg hover:scale-105 action-btn">
                                        <i class="fa-solid fa-trash-can text-lg"></i>
                                        <span class="hidden sm:inline">Xóa</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-20">
                                <div class="flex flex-col items-center gap-4">
                                    <div class="w-24 h-24 rounded-2xl bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                        <i class="fa-solid fa-inbox text-5xl text-gray-300 dark:text-gray-600"></i>
                                    </div>
                                    <p class="text-lg text-gray-600 dark:text-gray-400 font-semibold">Không có sản phẩm nào</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-500">Thử thay đổi bộ lọc hoặc tìm kiếm</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination - Premium Design -->
        <div class="flex flex-col items-center gap-6 pt-4">
            <div class="flex justify-center w-full pagination-wrapper">
                {{ $products->links() }}
            </div>

            <!-- Info -->
            <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                <p>Hiển thị <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ $products->firstItem() ?? 0 }}</span> -
                   <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ $products->lastItem() ?? 0 }}</span>
                   trong <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ $products->total() }}</span> sản phẩm</p>
            </div>
        </div>
    </div>

    <!-- Styles -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .product-row {
            animation: fadeInUp 0.5s ease-out backwards;
        }

        .action-btn {
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        /* Pagination Styling */
        .pagination-wrapper :where(nav) {
            @apply flex justify-center gap-2;
        }

        .pagination-wrapper :where(a, span) {
            @apply px-3 py-2 rounded-lg font-semibold transition-all duration-300;
        }

        .pagination-wrapper :where(a:hover) {
            @apply bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 scale-105;
        }

        .pagination-wrapper :where(span.relative.inline-flex.items-center.px-4.py-2) {
            @apply bg-indigo-600 dark:bg-indigo-700 text-white;
        }
    </style>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add animation to rows
            const rows = document.querySelectorAll('.product-row');
            rows.forEach((row, index) => {
                row.style.animationDelay = `${index * 0.05}s`;
            });

            // Smooth hover effects
            document.querySelectorAll('.action-btn').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px) scale(1.05)';
                });
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Add loading state when filter changes
            @this.on('filterChanged', function() {
                document.querySelector('table tbody').style.opacity = '0.5';
                setTimeout(() => {
                    document.querySelector('table tbody').style.opacity = '1';
                }, 300);
            });
        });

        function deleteProduct(id) {
            if (confirm('Bạn chắc chắn muốn xóa sản phẩm này?')) {
                // Emit delete event or make API call
                console.log('Delete product:', id);
            }
        }
    </script>
</div>
