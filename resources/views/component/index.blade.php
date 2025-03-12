@extends('app')

@section('title', 'Component')

@section('content')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Component List</h2>
            <form method="GET" action="{{ route('component.index') }}" class="mb-4">
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
                @foreach ($components as $index => $component)
                    <tr class="hover:border-b">
                        <th class="text-center">{{ ($components->currentPage() - 1) * $components->perPage() + $loop->iteration }}</th>
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
                                <a href="{{ route('component.edit', $component->id) }}" class="btn btn-outline btn-primary">
                                    Edit
                                </a>
                                <form action="{{ route('component.destroy', $component->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this component' +
                                 '?');">
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
                {!! $components->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>

@endsection

