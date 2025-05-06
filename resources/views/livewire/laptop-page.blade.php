<div x-data="{laptopId: @entangle('LaptopId'), name: @entangle('name'), brand: @entangle('brand'))}" >
    <div class="flex flex-col gap-6">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="text-2xl font-semibold">Laptop List</h2>

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
            <a href="{{ route('laptop.create') }}" class="btn btn-outline btn-primary">
                ➕ Thêm sản phẩm
            </a>

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
                    @forelse ($laptops as  $laptop)
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
                        @empty
                        <tr>
                            <td colspan="14" class="text-center">No laptops found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{ $laptops->links() }}
    </div>
</div>
