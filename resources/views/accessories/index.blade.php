@extends('app')

@section('title', 'Accessories')

@section('content')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Accessory List</h2>
            <form method="GET" action="{{ route('accessories.index') }}" class="mb-4">
                <div class="flex items-center gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search brand..."
                        class="input input-bordered w-full max-w-xs"
                    />
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <a href="{{ route('accessories.create') }}" class="btn btn-primary">
                ➕ Add Accessory
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($accessories as $index => $accessory)
                    <tr class="hover:border-b">
                        <th class="p-3">{{ ($accessories->currentPage() - 1) * $accessories->perPage() + $loop->iteration }}</th>
                        <td class="p-3">{{ $accessory->name }}</td>
                        <td class="p-3">{{ $accessory->brand ? $accessory->brand->name : 'N/A' }}</td>
                        <td class="p-3">{{ $accessory->color ? $accessory->color->name : 'N/A'}}</td>
                        <td class="p-3">{{ $accessory->type }}</td>
                        <td class="p-3">{{ number_format($accessory->price) }}Đ</td>
                        <td class="p-3">{{ $accessory->quantity }}</td>
                        <td class="p-3">
                            <img src="{{ $accessory->image }}" alt="Laptop Image" class="w-12 h-12 object-cover rounded-lg">
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex space-x-2">
                                <a href="{{ route('accessories.edit', $accessory->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('accessories.destroy', $accessory->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this accessory?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-sm">
                                        ❌ Delete
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

