@props(['product'])

<div class="group bg-white dark:bg-zinc-900 rounded-3xl shadow-lg hover:shadow-[0_20px_40px_-10px_rgba(255,105,135,0.4)] overflow-hidden hover:scale-[1.03] transition-all duration-500 border border-transparent hover:border-rose-300">
    <div class="relative overflow-hidden">
        <img src="{{ $product->getProductImage() }}"
             alt="Product Image"
             class="w-full h-52 object-cover transform group-hover:scale-110 transition-transform duration-700 rounded-t-3xl">

        @if ($product->getProductDiscount() > 0)
            <div class="absolute top-2 right-2 z-10 animate-bounce">
                <span class="badge badge-warning text-xs shadow-md">🔥 -{{ $product->getProductDiscount() }}%</span>
            </div>
        @endif

        {{-- Dải màu gradient phía dưới ảnh --}}
        <div class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-zinc-900 via-transparent to-transparent pointer-events-none"></div>
    </div>

    <div class="p-5 space-y-3">
        <h3 class="text-base md:text-lg font-bold text-gray-800 dark:text-white truncate">
            {{ $product->getProductName() }}
        </h3>

        <div class="flex flex-wrap gap-2 text-xs md:text-sm font-medium text-gray-600 dark:text-gray-300">
            @if($product->type === 'laptop')
                <span class="badge badge-outline badge-info">{{ $product->laptop->cpu }}</span>
                <span class="badge badge-outline badge-info">{{ $product->laptop->ram }}</span>
                <span class="badge badge-outline badge-info">{{ $product->laptop->storage }}</span>
                <span class="badge badge-outline badge-info">{{ $product->laptop->vga }}</span>
            @elseif($product->type === 'component')
                <span class="badge badge-outline badge-success">{{ $product->component->type }}</span>
                <span class="badge badge-outline badge-success">{{ $product->component->capacity }}</span>
            @elseif($product->type === 'accessories')
                <span class="badge badge-outline badge-accent">{{ $product->accessories->type }}</span>
            @endif
        </div>

        <div class="text-right">
            @if ($product->getProductDiscount() > 0)
                <p class="text-sm line-through text-gray-400">
                    {{ number_format($product->getProductOriginalPrice()) }}đ
                </p>
            @endif
            <p class="text-xl font-extrabold bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 bg-clip-text text-transparent drop-shadow">
                {{ number_format($product->getProductPrice()) }}đ
            </p>
        </div>

        <div class="flex gap-3 pt-2">
            @if ($product->getProductQuantity() > 0)
                <form action="{{ route('customer.addToCart') }}" method="POST" class="w-1/2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->getProductName() }}">
                    <input type="hidden" name="product_price" value="{{ $product->getProductPrice() }}">
                    <input type="hidden" name="product_image" value="{{ $product->getProductImage() }}">
                    <button type="submit"
                        class="btn btn-sm w-full bg-gradient-to-r from-pink-500 to-orange-400 text-white border-none hover:scale-105 transition-transform duration-300">
                        🛒 Mua ngay
                    </button>
                </form>
            @else
                <button class="btn btn-sm w-1/2 btn-error" disabled>Hết hàng</button>
            @endif

            <a href="{{ route('customer.show', ['id' => $product->id]) }}"
               class="btn btn-sm w-1/2 btn-outline btn-primary hover:btn-accent transition-all duration-300">Chi tiết</a>
        </div>
    </div>
</div>
