<div>
    {{-- Input tìm kiếm --}}
    <div class="flex justify-center items-center mb-4">
        <input
            type="text"
            wire:model.live.debounce.300ms="search"
            placeholder="Search accessories..."
            class="input input-primary justify-center"
        />
    </div>

    {{-- Bảng hiển thị phụ kiện --}}
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Name</th>
                <th>Brand</th>
                <th>Color</th>
                <th>Type</th>
                <th class="text-center">Original price</th>
                <th class="text-center">Discount</th>
                <th class="text-center">Promotional price</th>
                <th>Quantity</th>
                <th class="text-center">Status</th>
                <th>Image</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($accessories as $accessory)
                <tr class="hover:border-b">
                    <th class="p-4">{{ $accessory->id }}</th>
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
                    <td class="p-3">
                        <img src="{{ $accessory->image }}" alt="Accessory Image" class="w-12 h-12 object-cover rounded-lg">
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
            {{ $accessories->links('pagination::tailwind') }}
        </div>
    </div>
</div>
