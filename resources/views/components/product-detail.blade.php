<!-- Product Showcase -->
<div class="grid lg:grid-cols-2 gap-8 bg-base-100 p-6 shadow-xl rounded-3xl">
    <!-- Carousel ảnh sản phẩm -->
    <div class="rounded-box overflow-hidden">
        <div class="carousel w-full rounded-box">
            <div class="carousel-item w-full">
                <img src="{{ $product->getProductImage() }}" class="w-full object-cover" alt="{{ $product->getProductName() }}" />
            </div>
            {{-- Nếu có thêm ảnh phụ, có thể thêm ở đây --}}
        </div>
    </div>

    <!-- Thông tin sản phẩm -->
    <div>
        <h1 class="text-4xl font-extrabold text-base-content">{{ $product->getProductName() }}</h1>

        <div class="mt-4 flex items-center gap-4">
            <span class="text-3xl font-bold text-primary">
                {{ number_format($product->getProductPrice()) }}₫
            </span>
            @if ($product->getProductDiscount() > 0)
                <span class="line-through text-gray-400 text-xl">
                    {{ number_format($product->getProductOriginalPrice()) }}₫
                </span>
                <span class="badge badge-success text-sm">
                    -{{ $product->getProductDiscount() }}%
                </span>
            @endif
        </div>

        <div class="mt-4">
            @if ($product->getProductQuantity() > 0)
                <span class="badge badge-success text-sm">
                    <i class="fas fa-check-circle mr-1"></i> Còn hàng
                </span>
            @else
                <span class="badge badge-error text-sm">
                    <i class="fas fa-times-circle mr-1"></i> Hết hàng
                </span>
            @endif
        </div>

        <!-- Nút hành động -->
        <div class="mt-6 flex gap-4">
            @if ($product->getProductQuantity() > 0)
                <form action="{{ route('customer.addToCart') }}" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->getProductName() }}">
                    <input type="hidden" name="product_price" value="{{ $product->getProductPrice() }}">
                    <input type="hidden" name="product_image" value="{{ $product->getProductImage() }}">
                    <button type="submit" class="btn btn-primary w-full text-lg">
                        <i class="fas fa-cart-plus mr-2"></i> Thêm vào giỏ
                    </button>
                </form>
            @else
                <button class="btn btn-error w-full text-lg" disabled>
                    <i class="fas fa-times-circle mr-2"></i> Sản phẩm hết hàng
                </button>
            @endif
        </div>
    </div>
</div>

<!-- Tabs nội dung sản phẩm -->
<div class="mt-10">
    <div role="tablist" class="tabs tabs-bordered">
        <input type="radio" name="tab" role="tab" class="tab" aria-label="Mô tả" checked />
        <div role="tabpanel" class="tab-content p-6">
            <div class="prose max-w-none">
                @foreach (explode("\n", $product->description) as $paragraph)
                    @if (Str::startsWith($paragraph, '##'))
                        <h4 class="text-xl font-semibold">{{ Str::replaceFirst('##', '', $paragraph) }}</h4>
                    @else
                        <p>{{ $paragraph }}</p>
                    @endif
                @endforeach
            </div>
        </div>

        <input type="radio" name="tab" role="tab" class="tab" aria-label="Thông số" />
        <div role="tabpanel" class="tab-content p-6">
            @if ($detail)
                <table class="table">
                    <thead>
                        <tr class="bg-base-200">
                            <th>Thông số</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($product->type === 'laptop')
                            <tr><td>CPU</td><td>{{ $detail->cpu }}</td></tr>
                            <tr><td>RAM</td><td>{{ $detail->ram }}</td></tr>
                            <tr><td>GPU</td><td>{{ $detail->vga }}</td></tr>
                            <tr><td>Lưu trữ</td><td>{{ $detail->storage }}</td></tr>
                        @elseif ($product->type === 'component')
                            <tr><td>Loại</td><td>{{ $detail->type }}</td></tr>
                            <tr><td>Dung lượng</td><td>{{ $detail->capacity }}</td></tr>
                        @elseif ($product->type === 'accessories')
                            <tr><td>Loại</td><td>{{ $detail->type }}</td></tr>
                        @endif
                    </tbody>
                </table>
            @else
                <p class="text-gray-400">Không có dữ liệu chi tiết.</p>
            @endif
        </div>
    </div>
</div>
