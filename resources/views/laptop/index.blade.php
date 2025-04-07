@extends('app')

@section('title', 'Laptop')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex flex-col h-full">
            <div class="grow">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <h2 class="text-2xl font-semibold text-white-800 dark:text-dark-200">Laptop List</h2>
                    <form method="GET" action="{{ route('laptop.index') }}" class="mb-4" id="brand-filter-form">
                        <select name="brand" id="brand-select" class="select" onchange="document.getElementById('brand-filter-form').submit()">
                            <option value="">All Brands</option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    <a href="{{ route('laptop.create') }}" class="btn btn-outline">
                        ➕ Add Laptop
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
                                @foreach ($laptops as  $laptop)
                                    <tr class="hover:bg-base-200/50">
                                        <th class="text-center">{{ $laptop->id}}</th>
                                        <td class="text-center">{{ $laptop->name }}</td>
                                        <td class="text-center">{{ $laptop->brand ? $laptop->brand->name : 'N/A' }}</td>
                                        <td class="text-center">{{ $laptop->color ? $laptop->color->name : 'N/A' }}</td>

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
                                                <button type="button" class="btn btn-outline btn-error" onclick="confirmDelete('{{ $laptop->id }}')">
                                                    Delete
                                                </button>
                                                <form id="delete-form-{{ $laptop->id }}" action="{{ route('laptop.destroy', $laptop->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $laptops->links('pagination::simple-tailwind') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(laptopId) {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you really want to delete this laptop?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + laptopId).submit();
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            @if(session('add_success'))
            Swal.fire({
                title: "Added Successfully!",
                text: "Laptop has been added successfully",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK",
            });
            @endif
            @if(session('edit_success'))
            Swal.fire({
                title: "Updated Successfully!",
                text: "The laptop details have been updated successfully.",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
            @endif
            @if(session('delete_success'))
            Swal.fire({
                title: "Deleted Successfully!",
                text: "The laptop has been removed successfully.",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
            @endif
        });
    </script>
@endsection
