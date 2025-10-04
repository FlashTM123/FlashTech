<div>
    @if ($product->getProductQuantity() > 0)
        <button
            wire:click="addToCart"
            class="btn btn-sm w-full bg-gradient-to-r from-pink-500 to-orange-400 text-white border-none hover:scale-105 transition-transform duration-300">
            🛒 Mua ngay
        </button>
        
    @else
        <button class="btn btn-sm w-full btn-error" disabled>Hết hàng</button>
    @endif
</div>
