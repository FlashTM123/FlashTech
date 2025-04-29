<div>
    <div class="flex justify-center items-center mb-4">
        <input type="text" wire:model.live.debounce.300ms="search"   placeholder="Search by name" class="input input-bordered  mb-4" class="input input-bordered  mb-4" >
    </div>
    <div class="my-3">
        <div>
            <div class="overflow-x-auto">
                <table class="table">
                    <thead class="text-white-800 dark:text-dark-700">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Brand</th>
                        <th class="text-center">Color</th>
                        <th class="text-center">CPU</th>
                        <th class="text-center">RAM</th>
                        <th class="text-center">VGA</th>
                        <th class="text-center">Storage</th>
                        <th class="text-center">Original price</th>
                        <th class="text-center">Discount</th>
                        <th class="text-center">Promotional price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($laptops as  $laptop)
                        <tr class="hover:bg-base-200/50">
                            <th class="text-center">{{ $laptop->id}}</th>
                            <td class="text-center">{{ $laptop->name }}</td>
                            <td class="text-center">{{ $laptop->brand ? $laptop->brand->name : 'N/A' }}</td>
                            <td class="text-center">{{ $laptop->color }}</td>

                            <td class="text-center">{{ $laptop->cpu }}</td>
                            <td class="text-center">{{ $laptop->ram }}</td>
                            <td class="text-center">{{ $laptop->vga }}</td>
                            <td class="text-center">{{ $laptop->storage }}</td>
                            <td class="text-center">{{ number_format($laptop->original_price) }}Đ</td>
                            <td class="text-center">-{{ $laptop->discount }}%</td>
                            <td class="text-center">{{ number_format($laptop->promotional_price) }}Đ</td>
                            <td class="text-center">{{ $laptop->quantity }}</td>
                            <td class="text-center">
                                @if($laptop->quantity > 0)
                                    <span class="text-green-400">In Stock</span>
                                @else
                                    <span class="text-red-400">Out of stock</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <img src="{{ $laptop->image }}" alt="Laptop Image" class="w-12 h-12 object-cover rounded-lg">
                            </td>

                            <td class="text-center">
                                <div class="flex space-x-2">
                                    <a href="{{ route('laptop.edit', $laptop->id) }}" class="btn btn-outline btn-secondary">
                                        Edit
                                    </a>
                                    <button wire:click='delete({{ $laptop->id}})' class="btn btn-outline btn-error" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không')">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $laptops->links('pagination::tailwind') }}
    </div>
</div>
