
<div class="card lg:card-side bg-base-100 shadow-xl">
    <figure class="lg:w-1/2">
        <img
            src="{{ $product->getProductImage() }}"
            alt="{{ $product->getProductName() }}"
            class="w-full h-full object-cover"
        />
    </figure>
    <div class="card-body lg:w-1/2">
        <h2 class="card-title text-3xl font-bold mb-4 ">{{ $product->getProductName() }}</h2>

        <div class="flex items-center mb-4">
            <span class="text-2xl font-bold text-orange-500">{{ number_format($product->getProductPrice()) }}đ</span>
            @if ($product->getProductDiscount() > 0 && $product->getProductPrice() > 0)
            <span class="text-gray-400 line-through">{{ number_format($product->getProductOriginalPrice()) }}đ</span>
        @endif
        </div>

        <div class="card-actions justify-end">
            <button class="btn btn-primary">Add to Cart</button>
            <button class="btn btn-outline btn-secondary">Buy Now</button>
        </div>
    </div>
</div>

<!-- Product Description Section -->
<div class="mt-8">
    <h3 class="text-2xl font-bold mb-4">Product Description</h3>
    <p class="">{{ $product->description }}</p>
</div>

<!-- Technical Specifications Section -->
@if($detail)
    <div class="mt-8">
        <h3 class="text-2xl font-bold mb-4">Technical Specifications</h3>
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead class="text-center">
                <tr>
                    <th class="bg-base-200">Feature</th>
                    <th class="bg-base-200">Details</th>
                </tr>
                </thead>
                <tbody class="text-center">
                @if ($product->type === 'laptop')
                    <tr>
                        <td>CPU</td>
                        <td>{{ $detail->cpu }}</td>
                    </tr>
                    <tr>
                        <td>RAM</td>
                        <td>{{ $detail->ram }} GB</td>
                    </tr>
                    <tr>
                        <td>GPU</td>
                        <td>{{ $detail->vga }}</td>
                    </tr>
                    <tr>
                        <td>Storage</td>
                        <td>{{ $detail->storage }}</td>
                    </tr>
                @elseif ($product->type === 'component')
                    <tr>
                        <td>Type</td>
                        <td>{{ $detail->type }}</td>
                    </tr>
                    <tr>
                        <td>Capacity</td>
                        <td>{{ $detail->capacity }}</td>
                    </tr>
                @elseif ($product->type === 'accessories')
                    <tr>
                        <td>Type</td>
                        <td>{{ $detail->type }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endif
