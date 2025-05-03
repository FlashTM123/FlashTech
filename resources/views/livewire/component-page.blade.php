<div x-data="{ComponentId: @entangle('ComponentId'), name: @entangle('name'))}" >
    <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
        <h2 class="text-2xl font-semibold">Component List</h2>
        <form method="GET" action="{{ route('component.index') }}" class="mb-4" id="brand-filter-form">



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

        <a href="{{ route('component.create') }}" class="btn btn-outline">
            ➕ Add Component
        </a>
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
            @forelse ($components as $index => $component)
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
            @empty
                <tr>
                    <td colspan="12" class="text-center text-gray-500">No components found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>


        <div class="mt-4">
            {!! $components->links() !!}
        </div>
    </div>
</div>
