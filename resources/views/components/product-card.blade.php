@props(['product'])

<div class="group relative">
    <!-- Card Container -->
    <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700 hover:border-indigo-300 dark:hover:border-indigo-600 transition-all duration-300 h-full flex flex-col shadow-sm hover:shadow-xl hover:-translate-y-1">

        <!-- Image Container -->
        <div class="relative overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 h-48 sm:h-40">
            <!-- Product Image -->
            <img src="{{ $product->getProductImage() }}"
                 alt="{{ $product->getProductName() }}"
                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">

            <!-- Discount Badge -->
            @if ($product->getProductDiscount() > 0)
                <div class="absolute top-3 right-3 z-10">
                    <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white px-3 py-1 rounded-full text-xs sm:text-sm font-bold shadow-lg">
                        <i class="fa-solid fa-fire mr-1"></i>-{{ $product->getProductDiscount() }}%
                    </div>
                </div>
            @endif

            <!-- Wishlist Button -->
            <button class="absolute top-3 left-3 w-8 h-8 rounded-full bg-white dark:bg-gray-700 shadow-md hover:bg-red-50 dark:hover:bg-red-900/30 flex items-center justify-center text-gray-600 dark:text-gray-300 hover:text-red-500 transition-all opacity-0 group-hover:opacity-100 transition-opacity">
                <i class="fa-solid fa-heart text-sm"></i>
            </button>

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <!-- Content Container -->
        <div class="p-4 sm:p-5 flex-1 flex flex-col space-y-3">
            <!-- Product Name -->
            <h3 class="font-bold text-sm sm:text-base text-gray-900 dark:text-white line-clamp-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                {{ $product->getProductName() }}
            </h3>

            <!-- Specs Tags -->
            @if ($product->laptop || $product->component || $product->accessories)
                <div class="flex flex-wrap gap-1">
                    @if ($product->laptop)
                        <span class="inline-block bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 px-2 py-1 rounded text-xs font-medium">
                            {{ $product->laptop->cpu ?? 'CPU' }}
                        </span>
                        <span class="inline-block bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 px-2 py-1 rounded text-xs font-medium">
                            {{ $product->laptop->ram ?? 'RAM' }}
                        </span>
                    @elseif ($product->component)
                        <span class="inline-block bg-purple-50 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 px-2 py-1 rounded text-xs font-medium">
                            {{ $product->component->type ?? 'Component' }}
                        </span>
                    @elseif ($product->accessories)
                        <span class="inline-block bg-pink-50 dark:bg-pink-900/30 text-pink-700 dark:text-pink-300 px-2 py-1 rounded text-xs font-medium">
                            {{ $product->accessories->type ?? 'Accessory' }}
                        </span>
                    @endif
                </div>
            @endif

            <!-- Rating & Reviews -->
            <div class="flex items-center gap-2">
                <div class="flex text-yellow-400">
                    <i class="fa-solid fa-star text-xs"></i>
                    <i class="fa-solid fa-star text-xs"></i>
                    <i class="fa-solid fa-star text-xs"></i>
                    <i class="fa-solid fa-star text-xs"></i>
                    <i class="fa-regular fa-star text-xs text-gray-300 dark:text-gray-600"></i>
                </div>
                <span class="text-xs text-gray-600 dark:text-gray-400">(24)</span>
            </div>

            <!-- Price Section -->
            <div class="space-y-1 border-t border-gray-200 dark:border-gray-700 pt-3 mt-auto">
                @if ($product->getProductDiscount() > 0)
                    <p class="text-xs text-gray-500 dark:text-gray-400 line-through">
                        {{ number_format($product->getProductOriginalPrice()) }}đ
                    </p>
                @endif
                <p class="text-lg sm:text-xl font-extrabold bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400 bg-clip-text text-transparent">
                    {{ number_format($product->getProductPrice()) }}đ
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-2 pt-2">
                @livewire('add-to-cart', ['product' => $product], key($product->id))
                <a href="{{ route('customer.show', ['id' => $product->id]) }}"
                   class="flex-1 px-3 py-2 rounded-lg border-2 border-indigo-600 dark:border-indigo-400 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-600 hover:text-white dark:hover:bg-indigo-500 font-semibold text-sm transition-all text-center">
                    <i class="fa-solid fa-eye mr-1"></i>Chi tiết
                </a>
            </div>
        </div>
    </div>
</div>
