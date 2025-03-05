@extends('app')

@section('title', 'Component')

@section('content')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Component List</h2>
            <form method="GET" action="{{ route('component.index') }}" class="mb-4">
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
            <a href="{{ route('component.create') }}" class="btn btn-primary">
                ➕ Add Component
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Capacity</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($components as $index => $component)
                    <tr class="hover:border-b">
                        <th class="p-3">{{ ($components->currentPage() - 1) * $components->perPage() + $loop->iteration }}</th>
                        <td class="p-3">{{ $component->name }}</td>
                        <td class="p-3">{{ $component->brand ? $component->brand->name : 'N/A' }}</td>
                        <td class="p-3">{{ $component->type }}</td>
                        <td class="p-3">{{ $component->capacity }}</td>
                        <td class="p-3">{{ number_format($component->price) }}Đ</td>
                        <td class="p-3">{{ $component->quantity }}</td>
                        <td class="p-3">
                            <img src="{{ $component->image }}" alt="Laptop Image" class="w-12 h-12 object-cover rounded-lg">
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex space-x-2">
                                <a href="{{ route('component.edit', $component->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('component.destroy', $component->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this component' +
                                 '?');">
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
                {!! $components->links('pagination::tailwind') !!}
            </div>
        </div>
    </div>

@endsection

