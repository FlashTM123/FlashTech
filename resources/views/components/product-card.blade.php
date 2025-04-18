@props(['product'])

<div class="bg-white dark:bg-zinc-800 rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:scale-[1.01] hover:shadow-xl">
    <div class="overflow-hidden">
        <img src="{{ $product->getProductImage() }}"
             alt="Product Image"
             class="w-full h-48 object-cover hover:scale-105 transition-transform duration-500">
    </div>

    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-800 dark:text-white truncate">{{ $product->getProductName() }}</h3>

        <div class="flex flex-wrap gap-2 mt-2 text-xs text-gray-600 dark:text-gray-300">
            @if($product->type === 'laptop')
                <span class="badge badge-neutral">{{ $product->laptop->cpu }}</span>
                <span class="badge badge-neutral">{{ $product->laptop->ram }}</span>
                <span class="badge badge-neutral">{{ $product->laptop->storage }}</span>
                <span class="badge badge-neutral">{{ $product->laptop->vga }}</span>
            @elseif($product->type === 'component')
                <span class="badge badge-primary">{{ $product->component->type }}</span>
                <span class="badge badge-primary">{{ $product->component->capacity }}</span>
            @elseif($product->type === 'accessories')
                <span class="badge badge-secondary">{{ $product->accessories->type }}</span>
            @endif
        </div>

        <div class="mt-3 space-y-1">
            @if ($product->getProductDiscount() > 0)
                <p class="text-sm line-through text-gray-400">
                    {{ number_format($product->getProductOriginalPrice()) }}đ
                </p>
            @endif
            <p class="text-xl font-bold text-orange-500">
                {{ number_format($product->getProductPrice()) }}đ
            </p>
        </div>

        <div class="flex gap-2 mt-4">
            @if ($product->getProductQuantity() > 0)
                <form action="{{ route('customer.addToCart') }}" method="POST" class="w-1/2">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->getProductName() }}">
                    <input type="hidden" name="product_price" value="{{ $product->getProductPrice() }}">
                    <input type="hidden" name="product_image" value="{{ $product->getProductImage() }}">
                    <button type="submit" class="btn btn-sm w-full btn-outline btn-primary">Thêm vào giỏ</button>
                </form>
            @else
                <button class="btn btn-sm w-1/2 btn-outline btn-error" disabled>Hết hàng</button>
            @endif

            <a href="{{ route('customer.show', ['id' => $product->id]) }}"
               class="btn btn-sm w-1/2 btn-outline btn-neutral">Chi tiết</a>
        </div>
    </div>
</div>
