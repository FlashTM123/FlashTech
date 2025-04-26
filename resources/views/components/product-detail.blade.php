<!-- Product Showcase -->
<div class="grid lg:grid-cols-2 gap-8 bg-base-100 p-8 rounded-3xl shadow-2xl hover:shadow-3xl transition-shadow duration-300">
    <!-- Carousel ảnh -->
    <div class="rounded-3xl overflow-hidden">
        <div class="carousel w-full rounded-3xl">
            <div class="carousel-item w-full">
                <img src="{{ $product->getProductImage() }}" class="w-full object-cover transition-transform hover:scale-105 duration-300" alt="{{ $product->getProductName() }}" />
            </div>
        </div>
    </div>

    <!-- Thông tin -->
    <div class="flex flex-col justify-between space-y-6">
        <div>
            <h1 class="text-4xl font-bold text-base-content tracking-tight">{{ $product->getProductName() }}</h1>

            <div class="mt-4 flex items-center gap-4">
                <span class="text-3xl font-extrabold text-primary">
                    {{ number_format($product->getProductPrice()) }}₫
                </span>
                @if ($product->getProductDiscount() > 0)
                    <span class="line-through text-gray-400 text-xl">
                        {{ number_format($product->getProductOriginalPrice()) }}₫
                    </span>
                    <span class="badge badge-success">
                        -{{ $product->getProductDiscount() }}%
                    </span>
                @endif
            </div>

            <div class="mt-3">
                @if ($product->getProductQuantity() > 0)
                    <span class="badge badge-outline badge-success text-sm">
                        <i class="fas fa-check-circle mr-1"></i> Còn hàng
                    </span>
                @else
                    <span class="badge badge-outline badge-error text-sm">
                        <i class="fas fa-times-circle mr-1"></i> Hết hàng
                    </span>
                @endif
            </div>
        </div>

        <!-- Nút -->
        <div>
            @if ($product->getProductQuantity() > 0)
                <form action="{{ route('customer.addToCart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->getProductName() }}">
                    <input type="hidden" name="product_price" value="{{ $product->getProductPrice() }}">
                    <input type="hidden" name="product_image" value="{{ $product->getProductImage() }}">
                    <button type="submit" class="btn btn-primary w-full text-lg rounded-xl">
                        <i class="fas fa-cart-plus mr-2"></i> Thêm vào giỏ
                    </button>
                </form>
            @else
                <button class="btn btn-disabled w-full text-lg rounded-xl">
                    <i class="fas fa-times-circle mr-2"></i> Hết hàng
                </button>
            @endif
        </div>
    </div>
</div>

<!-- Tabs nội dung -->
<div class="mt-12">
    <div class="tabs tabs-bordered rounded-xl overflow-hidden">
        <input type="radio" name="tab" role="tab" class="tab text-lg" aria-label="Mô tả" checked />
        <div role="tabpanel" class="tab-content bg-base-100 p-6">
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

        <input type="radio" name="tab" role="tab" class="tab text-lg" aria-label="Thông số" />
        <div role="tabpanel" class="tab-content bg-base-100 p-6">
            @if ($detail)
                <div class="overflow-x-auto">
                    <table class="table w-full rounded-xl">
                        <thead>
                            <tr class="bg-base-200 text-base-content">
                                <th>Thông số</th>
                                <th>Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($product->laptop)
                                <tr><td>CPU</td><td>{{ $detail->cpu }}</td></tr>
                                <tr><td>RAM</td><td>{{ $detail->ram }}</td></tr>
                                <tr><td>GPU</td><td>{{ $detail->vga }}</td></tr>
                                <tr><td>Lưu trữ</td><td>{{ $detail->storage }}</td></tr>
                            @elseif ($product->component)
                                <tr><td>Loại</td><td>{{ $detail->type }}</td></tr>
                                <tr><td>Dung lượng</td><td>{{ $detail->capacity }}</td></tr>
                            @elseif ($product->accessories)
                                <tr><td>Loại</td><td>{{ $detail->type }}</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-400">Không có dữ liệu chi tiết.</p>
            @endif
        </div>
    </div>
</div>
