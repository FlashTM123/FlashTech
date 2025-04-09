<div class="card lg:card-side bg-base-100 shadow-xl rounded-box">
    <!-- Product Image -->
    <figure class="lg:w-1/2">
        <img src="{{ $product->getProductImage() }}"
             alt="{{ $product->getProductName() }}"
             class="w-full h-full object-cover rounded-l-box"/>
    </figure>

    <!-- Product Info -->
    <div class="card-body lg:w-1/2 p-8">
        <!-- Product Name -->
        <h2 class="card-title text-3xl font-bold">{{ $product->getProductName() }}</h2>

        <!-- Price Section -->
        <div class="flex items-center gap-4 my-4">
            <span class="text-2xl font-bold text-primary">
                {{ number_format($product->getProductPrice()) }}₫
            </span>
            @if ($product->getProductDiscount() > 0 && $product->getProductPrice() > 0)
                <span class="text-gray-500 line-through text-lg">
                    {{ number_format($product->getProductOriginalPrice()) }}₫
                </span>
                <span class="badge badge-success">
                    -{{ $product->getProductDiscount() }}%
                </span>
            @endif
        </div>

        <!-- Stock Status -->
        <div class="mb-6">
            @if ($product->getProductQuantity() > 0)
                <span class="badge badge-success gap-2">
                    <i class="fas fa-check-circle"></i>
                    Còn hàng
                </span>
            @else
                <span class="badge badge-error gap-2">
                    <i class="fas fa-times-circle"></i>
                    Hết hàng
                </span>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="card-actions flex flex-col gap-4">
            @if ($product->getProductQuantity() > 0)
                <form action="{{ route('customer.addToCart') }}" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->getProductName() }}">
                    <input type="hidden" name="product_price" value="{{ $product->getProductPrice() }}">
                    <input type="hidden" name="product_image" value="{{ $product->getProductImage() }}">
                    <div class="flex gap-4">
                        <button type="submit" class="btn btn-primary gap-2 flex-1">
                            <i class="fas fa-cart-plus"></i>
                            Thêm vào giỏ
                        </button>

                    </div>
                </form>
            @else
                <button class="btn btn-error w-full" disabled>
                    <i class="fas fa-times-circle"></i>
                    Sản phẩm hết hàng
                </button>
            @endif
        </div>
    </div>
</div>

<!-- Product Description -->
<div class="card bg-base-100 shadow-lg mt-8">
    <div class="card-body">
        <h3 class="card-title text-2xl font-bold gap-2">
            <i class="fas fa-align-left text-primary"></i>
            Mô tả sản phẩm
        </h3>
        <div class="prose max-w-none">
            @foreach (explode("\n", $product->description) as $paragraph)
                @if (Str::startsWith($paragraph, '##'))
                    <h4 class="text-xl font-bold mt-4">{{ Str::replaceFirst('##', '', $paragraph) }}</h4>
                @else
                    <p>{{ $paragraph }}</p>
                @endif
            @endforeach
        </div>
    </div>
</div>

<!-- Technical Specifications -->
@if($detail)
<div class="card bg-base-100 shadow-lg mt-8">
    <div class="card-body">
        <h3 class="card-title text-2xl font-bold gap-2">
            <i class="fas fa-microchip text-primary"></i>
            Thông số kỹ thuật
        </h3>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr class="bg-base-200">
                        <th class="w-1/3">Thông số</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($product->type === 'laptop')
                        <tr>
                            <td class="font-semibold">CPU</td>
                            <td>{{ $detail->cpu }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">RAM</td>
                            <td>{{ $detail->ram }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">GPU</td>
                            <td>{{ $detail->vga }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Lưu trữ</td>
                            <td>{{ $detail->storage }}</td>
                        </tr>
                    @elseif ($product->type === 'component')
                        <tr>
                            <td class="font-semibold">Loại</td>
                            <td>{{ $detail->type }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Dung lượng</td>
                            <td>{{ $detail->capacity }}</td>
                        </tr>
                    @elseif ($product->type === 'accessories')
                        <tr>
                            <td class="font-semibold">Loại</td>
                            <td>{{ $detail->type }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

<script>
    function buyNow(productId) {
        window.location.href = `/checkout?product_id=${productId}`;
    }
</script>
