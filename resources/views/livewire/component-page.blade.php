<div>
    <div class="flex justify-center items-center mb-4">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search by name"
               class="input input-bordered  mb-4" class="input input-bordered  mb-4">
    </div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th>Brand</th>

                <th>Type</th>
                <th>Capacity</th>
                <th class="text-center">Original price</th>
                <th class="text-center">Discount</th>
                <th class="text-center">Promotional price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Status</th>
                <th>Image</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($components as $index => $component)
                <tr class="hover:border-b">
                    <th class="text-center">{{ $component->id }}</th>
                    <td class="text-center">{{ $component->name }}</td>
                    <td class="p-3">{{ $component->brand ? $component->brand->name : 'N/A' }}</td>

                    <td class="p-3">{{ $component->type }}</td>
                    <td class="p-6">{{ $component->capacity }}</td>
                    <td class="text-center">{{ number_format($component->original_price) }}Đ</td>
                    <td class="text-center">-{{ $component->discount }}%</td>
                    {{--                        Giá được giảm--}}
                    <td class="text-center">{{ number_format($component->promotional_price) }}Đ</td>

                    <td class="text-center">{{ $component->quantity }}</td>
                    <td class="text-center">
                        @if($component->quantity > 0)
                            <span class="text-green-400">In Stock</span>
                        @else
                            <span class="text-red-400">Out of stock</span>
                        @endif
                    </td>

                    <td class="p-3">
                        <img src="{{ $component->image }}" alt="Laptop Image" class="w-12 h-12 object-cover rounded-lg">
                    </td>
                    <td class="text-center">
                        <div class="flex space-x-2">
                            <a href="{{ route('component.edit', $component->id) }}" class="btn btn-outline btn-secondary">
                                Edit
                            </a>
                            <button wire:click='delete({{ $component->id}})' class="btn btn-outline btn-error"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không')">Delete
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <div class="mt-4">
            {!! $components->links('pagination::tailwind') !!}
        </div>
    </div>
</div>
