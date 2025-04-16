@extends('app')

@section('title', 'Component')

@section('content')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Component List</h2>
            <form method="GET" action="{{ route('component.index') }}" class="mb-4" id="brand-filter-form">
                
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
                                <button type="button" class="btn btn-outline btn-error" onclick="confirmDelete('{{ $component->id }}')">

                                    Delete
                                </button>
                                <form id="delete-form-{{ $component->id }}" action="{{ route('component.destroy', $component->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>


        function confirmDelete(componentId) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${componentId}`).submit();
                }
            });
        }

        @if(session('add_success'))
        Swal.fire({
            title: "Added Successfully!",
            text: "The admin has been added successfully.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
        @endif

        @if(session('edit_success'))
        Swal.fire({
            title: "Updated Successfully!",
            text: "The admin details have been updated successfully.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
        @endif

        @if(session('delete_success'))
        Swal.fire({
            title: "Deleted Successfully!",
            text: "The admin has been removed successfully.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
        @endif
    </script>


@endsection

