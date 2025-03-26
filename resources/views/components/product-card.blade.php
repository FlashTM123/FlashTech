@props(['product'])

<div class="card bg-base-100 shadow-md p-4 rounded-lg">
    <img src="{{ $product->getProductImage() }}" class="rounded-md" alt="">
    <h3 class="font-bold mt-2 text-base-content">{{ $product->getProductName() }}</h3>
    <div class="flex flex-wrap gap-1 mt-2">
        @if($product->type === 'laptop')
            <span class="badge badge-outline">{{ $product->laptop->cpu }}</span>
            <span class="badge badge-outline">{{ $product->laptop->ram }}</span>
            <span class="badge badge-outline">{{ $product->laptop->storage }}</span>
            <span class="badge badge-outline">{{ $product->laptop->vga }}</span>
        @elseif($product->type === 'component')
            <span class="badge badge-outline">{{ $product->component->type }}</span>
            <span class="badge badge-outline">{{ $product->component->capacity }}</span>
        @elseif($product->type === 'accessories')
            <span class="badge badge-outline">{{ $product->accessories->type }}</span>
            <span class="badge badge-outline">{{ $product->accessories->color }}</span>
        @endif
    </div>

    <div class="mt-2">
        @if ($product->getProductDiscount() > 0 && $product->getProductPrice() > 0)
            <span class="text-gray-400 line-through">{{ number_format($product->getProductOriginalPrice()) }}đ</span>
            <span class="ml-2 bg-red-500 text-white px-2 py-1 text-xs rounded">(-{{ $product->getProductDiscount() }}%)</span>
        @endif
    </div>
    <div class="text-xl font-bold text-orange-500 mt-1">
        {{ number_format($product->getProductPrice()) }}đ
    </div>
    <div class="d-flex gap-6">
        @if ($product->getProductQuantity() > 0)
            <form action="{{ route('customer.addToCart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="product_name" value="{{ $product->getProductName() }}">
                <input type="hidden" name="product_price" value="{{ $product->getProductPrice() }}">
                <input type="hidden" name="product_image" value="{{ $product->getProductImage() }}">
                <button type="submit" class="btn btn-outline btn-success">Add to cart</button>
            </form>
        @else
            <button class="btn btn-outline btn-error" disabled>Out of stock</button>
        @endif

        <a href="{{ route('customer.show', ['id' => $product->id]) }}" class="btn btn-outline btn-secondary">Detail</a>
    </div>
</div>
