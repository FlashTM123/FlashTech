<div>

    <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
        <h2 class="text-2xl font-semibold">Accessory List</h2>
        <form method="GET" action="{{ route('accessories.index') }}" class="mb-4" id="brand-filter-form">


        </form>
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
        <a href="{{ route('accessories.create') }}" class="btn btn-outline">
            ➕ Add Accessory
        </a>
    </div>

    {{-- Bảng hiển thị phụ kiện --}}
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Name</th>
                <th>Image</th>
                <th>Brand</th>
                <th>Color</th>
                <th>Type</th>
                <th class="text-center">Original price</th>
                <th class="text-center">Discount</th>
                <th class="text-center">Promotional price</th>
                <th>Quantity</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($accessories as $accessory)
                <tr class="hover:border-b">
                    <th class="p-4">{{ $accessory->id }}</th>
                    <td class="p-3">
                        <img src="{{ $accessory->image }}" alt="Accessory Image" class="w-12 h-12 object-cover rounded-lg">
                    </td>
                    <td class="text-center">{{ $accessory->name }}</td>
                    <td class="p-3">{{ $accessory->brand ? $accessory->brand->name : 'N/A' }}</td>
                    <td class="p-3">{{ $accessory->color }}</td>
                    <td class="p-3">{{ $accessory->type }}</td>
                    <td class="text-center">{{ number_format($accessory->original_price) }}Đ</td>
                    <td class="text-center">-{{ $accessory->discount }}%</td>
                    <td class="text-center">{{ number_format($accessory->promotional_price) }}Đ</td>
                    <td class="text-center">{{ $accessory->quantity }}</td>
                    <td class="text-center">
                        @if($accessory->quantity > 0)
                            <span class="text-green-400">In Stock</span>
                        @else
                            <span class="text-red-400">Out of stock</span>
                        @endif
                    </td>
                    <td class="p-3 text-center">
                        <div class="flex space-x-2">
                            <a href="{{ route('accessories.edit', $accessory->id) }}" class="btn btn-outline btn-primary">
                                Edit
                            </a>
                          <button wire:click="delete({{ $accessory->id}})" class="btn btn-outline btn-error" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">
                            Delete
                          </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">No accessories found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{-- Phân trang --}}
        <div class="mt-4">
            {{ $accessories->links() }}
        </div>
    </div>
</div>
