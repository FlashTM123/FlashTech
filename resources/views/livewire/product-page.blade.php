<div>

    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="text-3xl font-extrabold bg-gradient-to-r from-pink-500 to-violet-600 bg-clip-text text-transparent">
                Danh sách sản phẩm
            </h2>

            <select name="" id="" class="select select-bordered w-fit" wire:model.live='filter'>
                <option value="all">Tất cả</option>
                <option value="laptop">Laptop</option>
                <option value="component">Linh kiện</option>
                <option value="accessories">Phụ kiện</option>
            </select>

                <select name="" id="" class="select w-fit" wire:model.live='limit'>
                    <option value="1">1</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>

            <div>

                <label class="input">

                      <g
                        stroke-linejoin="round"
                        stroke-linecap="round"
                        stroke-width="2.5"
                        fill="none"
                        stroke="currentColor"
                      >
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                      </g>
                    </svg>
                    <input type="search" class="grow" placeholder="Search" wire:model.live.debounce.150ms='search' />
                    <kbd class="kbd kbd-sm">⌘</kbd>
                    <kbd class="kbd kbd-sm">K</kbd>
                  </label>
            </div>


        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-2xl border border-base-300 bg-base-100 shadow-xl backdrop-blur-sm">
            <table class="table table-zebra">
                <thead class="text-base font-semibold text-base-content/80 bg-base-200">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Loại</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                        <tr class="hover:bg-base-300/30 transition-all duration-150">
                            <td class="text-center font-semibold">{{ $product->id }}</td>
                            <td class="text-center">{{ $product->getProductName() }}</td>
                            <td class="text-center">
                                @if ($product->laptop)
                                    <span class="badge badge-outline">Laptop</span>
                                @elseif ($product->component)
                                    <span class="badge badge-outline">Linh kiện</span>
                                @elseif ($product->accessories)
                                    <span class="badge badge-outline">Phụ kiện</span>
                                @else
                                    <span class="badge badge-outline">Không xác định</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($product->getProductPrice() < $product->getProductOriginalPrice())
                                    <div class="flex flex-col items-center">
                                        <span class="line-through text-gray-400 text-sm">
                                            {{ number_format($product->getProductOriginalPrice()) }} Đ
                                        </span>
                                        <span class="text-red-500 font-bold text-lg">
                                            {{ number_format($product->getProductPrice()) }} Đ
                                        </span>
                                    </div>
                                @else
                                    <span class="text-red-500 font-bold text-lg">
                                        {{ number_format($product->getProductPrice()) }} Đ
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">{{ $product->getProductQuantity() }}</td>
                            <td class="text-center">
                                <div class="flex justify-center gap-2 flex-wrap">

                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-outline btn-warning">
                                        ✏️ Sửa
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="text-center">
            {{ $products->links() }}
        </div>
    </div>
</div>
