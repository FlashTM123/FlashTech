@extends('app')

@section('title', 'Accessories')

@section('content')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Accessory List</h2>
            <form method="GET" action="{{ route('accessories.index') }}" class="mb-4">
                <label class="input">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></g></svg>
                    <input ype="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search brand..."
                           class="grow" />
                    <kbd class="kbd kbd-sm">⌘</kbd>
                    <kbd class="kbd kbd-sm">K</kbd>
                </label>

            </form>
            <a href="{{ route('accessories.create') }}" class="btn btn-outline">
                ➕ Add Accessory
            </a>
        </div>

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
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($accessories as $index => $accessory)
                    <tr class="hover:border-b">
                        <th class="p-4">{{ ($accessories->currentPage() - 1) * $accessories->perPage() + $loop->iteration }}</th>
                        <td class="text-center">{{ $accessory->name }}</td>
                        <td class="p-3">{{ $accessory->brand ? $accessory->brand->name : 'N/A' }}</td>
                        <td class="p-4">{{ $accessory->color ? $accessory->color->name : 'N/A'}}</td>
                        <td class="p-3">{{ $accessory->type }}</td>
                        <td class="text-center">{{ number_format($accessory->original_price) }}Đ</td>
                        <td class="text-center">-{{ $accessory->discount }}%</td>
                        {{--                        Giá được giảm--}}
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
                            <img src="{{ $accessory->image }}" alt="Laptop Image" class="w-12 h-12 object-cover rounded-lg">
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex space-x-2">
                                <a href="{{ route('accessories.edit', $accessory->id) }}" class="btn btn-outline btn-primary">
                                    Edit
                                </a>
                                <form action="{{ route('accessories.destroy', $accessory->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this accessory?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline btn-error">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            <div class="mt-4">
                {!! $accessories->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>

@endsection

