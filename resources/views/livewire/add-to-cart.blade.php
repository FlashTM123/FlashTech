<div class="w-full">
    @if ($product->getProductQuantity() > 0)
        <button
            type="button"
            wire:click="addToCart"
            wire:loading.attr="disabled"
            class="w-full px-4 py-2 rounded-lg bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold transition-all hover:shadow-lg hover:scale-105 flex items-center justify-center gap-2 group disabled:opacity-50 disabled:cursor-not-allowed">
            <i class="fa-solid fa-shopping-cart group-hover:scale-110 transition-transform"></i>
            <span wire:loading.remove>Thêm vào giỏ</span>
            <span wire:loading><i class="fa-solid fa-spinner animate-spin"></i></span>
        </button>
    @else
        <button
            type="button"
            disabled
            class="w-full px-4 py-2 rounded-lg bg-gray-400 dark:bg-gray-600 text-white font-semibold cursor-not-allowed flex items-center justify-center gap-2">
            <i class="fa-solid fa-ban"></i>
            Hết hàng
        </button>
    @endif
</div>
