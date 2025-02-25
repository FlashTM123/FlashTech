@extends('app')

@section('title', 'Laptop')

@section('content')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Laptop List</h2>
            <form method="GET" action="{{ route('laptop.index') }}" class="mb-4">
                <div class="flex items-center gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search laptop..."
                        class="input input-bordered w-full max-w-xs"
                    />
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <a href=" {{route('laptop.create')}}" class="btn btn-primary">
                ➕ Add Laptop
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
                    <th>CPU</th>
                    <th>RAM</th>
                    <th>VGA</th>
                    <th>Storage</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($laptops as $index => $laptop)
                    <tr class="hover:bg-gray-100 border-b">
                        <th class="p-3">{{ $index + 1 }}</th>
                        <td class="p-3">{{ $laptop->name }}</td>
                        <td class="p-3">{{ $laptop->brand ? $laptop->brand->name : 'N/A' }}</td>
                        <td class="p-3">{{ $laptop->color ? $laptop->color->name : 'N/A' }}</td>

                        <td class="p-3">{{ $laptop->cpu }}</td>
                        <td class="p-3">{{ $laptop->ram }} </td>
                        <td class="p-3">{{ $laptop->vga }} </td>
                        <td class="p-3">{{ $laptop->storage }} </td>
                        <td class="p-3">{{ number_format($laptop->price) }}Đ</td>
                        <td class="p-3">{{ $laptop->quantity }}</td>
                        <td class="p-3">
                            <img src="{{  $laptop->image }}" alt="Laptop Image" class="w-12 h-12 object-cover rounded-lg">
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex  space-x-2">
                                <a href="{{ route('laptop.edit', $laptop-> id) }}" class="btn btn-warning btn-sm">
                                    ✏️ Edit
                                </a>
                                <form action="{{ route('laptop.destroy', $laptop->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this laptop?');">
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
        </div>
    </div>
@endsection
