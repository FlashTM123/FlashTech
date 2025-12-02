<div x-data="{ComponentId: @entangle('ComponentId'), name: @entangle('name'))}" >
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
    </style>

    <div class="space-y-6">
        <!-- Header -->
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <h2 class="text-5xl font-bold bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                    ⚙️ Quản lý Linh kiện
                </h2>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-microchip mr-1"></i>Tổng: <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ count($components) }}</span>
                </div>
            </div>

            <!-- Filters -->
            <div class="flex flex-col md:flex-row gap-3 items-center justify-between bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex gap-3 items-center flex-1">
                    <select wire:model.live='limit' class="px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 text-sm text-gray-700 dark:text-gray-300 focus:ring-2 focus:ring-indigo-500">
                        <option value="5">5 items</option>
                        <option value="10">10 items</option>
                        <option value="20">20 items</option>
                        <option value="50">50 items</option>
                    </select>
                </div>

                <div class="flex-1 w-full md:w-auto">
                    <div class="relative">
                        <input
                            type="text"
                            wire:model.live.debounce.150ms='search'
                            placeholder="Tìm kiếm linh kiện..."
                            class="w-full px-4 py-2 pl-10 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        />
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>

                <a href="{{ route('component.create') }}" class="px-6 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold rounded-lg hover:shadow-lg hover:shadow-green-500/50 transition-all duration-300 transform hover:scale-105 whitespace-nowrap">
                    <i class="fas fa-plus mr-2"></i>Thêm Linh kiện
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="w-full">
                <!-- Header -->
                <thead>
                    <tr class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/30 dark:to-purple-900/30 border-b-2 border-indigo-200 dark:border-indigo-700">
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">#</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Ảnh</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Tên sản phẩm</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Thương hiệu</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Loại</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Dung lượng</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Giá gốc</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Giá ưu đãi</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Số lượng</th>
                        <th class="px-4 py-3 text-left font-bold text-indigo-900 dark:text-indigo-300">Trạng thái</th>
                        <th class="px-4 py-3 text-center font-bold text-indigo-900 dark:text-indigo-300">Hành động</th>
                    </tr>
                </thead>

                <!-- Body -->
                <tbody>
                    @forelse ($components as $index => $component)
                        <tr
                            class="border-b border-gray-200 dark:border-gray-700 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-colors duration-200 animate-fade-in-up"
                            style="animation-delay: {{ $index * 50 }}ms"
                        >
                            <!-- Index -->
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center justify-center w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 text-white font-bold rounded-full text-sm">
                                    {{ $index + 1 }}
                                </span>
                            </td>

                            <!-- Image -->
                            <td class="px-4 py-3">
                                <img
                                    src="{{ $component->image }}"
                                    alt="{{ $component->name }}"
                                    class="w-14 h-14 rounded-lg object-cover ring-2 ring-indigo-200 dark:ring-indigo-700 hover:scale-110 transition-transform duration-300"
                                    loading="lazy"
                                />
                            </td>

                            <!-- Name -->
                            <td class="px-4 py-3">
                                <div class="font-semibold text-gray-800 dark:text-gray-200 line-clamp-1">
                                    {{ $component->name }}
                                </div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">
                                    ID: {{ substr($component->_id, -6) }}
                                </div>
                            </td>

                            <!-- Brand -->
                            <td class="px-4 py-3">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ $component->brand ? $component->brand->name : 'N/A' }}
                                </span>
                            </td>

                            <!-- Type -->
                            <td class="px-4 py-3">
                                <span class="inline-block px-3 py-1 bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 rounded-full text-sm font-semibold">
                                    <i class="fas fa-microchip mr-1"></i>{{ $component->type }}
                                </span>
                            </td>

                            <!-- Capacity -->
                            <td class="px-4 py-3">
                                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                    <i class="fas fa-database text-blue-500 mr-1"></i>{{ $component->capacity }}
                                </span>
                            </td>

                            <!-- Original Price -->
                            <td class="px-4 py-3">
                                <span class="text-sm line-through text-gray-500 dark:text-gray-400">
                                    {{ number_format($component->original_price) }}Đ
                                </span>
                            </td>

                            <!-- Promotional Price -->
                            <td class="px-4 py-3">
                                <span class="text-sm font-bold bg-gradient-to-r from-indigo-600 to-pink-600 bg-clip-text text-transparent">
                                    {{ number_format($component->promotional_price) }}Đ
                                </span>
                                @if($component->discount > 0)
                                    <span class="inline-block ml-2 px-2 py-1 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 rounded text-xs font-bold">
                                        -{{ $component->discount }}%
                                    </span>
                                @endif
                            </td>

                            <!-- Quantity -->
                            <td class="px-4 py-3">
                                <div class="inline-flex items-center gap-2 px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-full text-sm font-semibold">
                                    <i class="fas fa-box-open text-lg"></i>
                                    {{ $component->quantity }}
                                </div>
                                @if($component->quantity < 5)
                                    <div class="text-xs text-orange-600 dark:text-orange-400 font-bold mt-1">
                                        ⚠️ Sắp hết
                                    </div>
                                @endif
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-3">
                                @if($component->quantity > 0)
                                    <span class="inline-flex items-center gap-1 text-green-600 dark:text-green-400 font-semibold">
                                        <i class="fas fa-check-circle"></i>Còn hàng
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 text-red-600 dark:text-red-400 font-semibold">
                                        <i class="fas fa-times-circle"></i>Hết hàng
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-4 py-3">
                                <div class="flex justify-center gap-2">
                                    <a
                                        href="{{ route('component.edit', $component->id) }}"
                                        class="inline-flex items-center gap-1 px-4 py-2 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 rounded-lg font-semibold hover:shadow-lg hover:shadow-blue-500/50 hover:scale-105 transition-all duration-300"
                                    >
                                        <i class="fas fa-edit"></i>Sửa
                                    </a>
                                    <button
                                        wire:click='delete({{ $component->id}})'
                                        class="inline-flex items-center gap-1 px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-300 rounded-lg font-semibold hover:shadow-lg hover:shadow-red-500/50 hover:scale-105 transition-all duration-300"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')"
                                    >
                                        <i class="fas fa-trash"></i>Xóa
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="px-4 py-12 text-center">
                                <div class="flex flex-col items-center gap-3">
                                    <i class="fas fa-inbox text-6xl text-gray-300 dark:text-gray-600"></i>
                                    <p class="text-gray-500 dark:text-gray-400 font-semibold">Không có linh kiện nào</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between px-4 py-3 bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Hiển thị <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ count($components) }}</span> kết quả
            </div>
            <div class="flex gap-2">
                {!! $components->links() !!}
            </div>
        </div>
    </div>
</div>
