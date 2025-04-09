@extends("app")

@section('title', 'Brand List')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Brand List</h2>
            <button onclick="showAddBrandModal()" class="btn btn-outline btn-primary">➕ Add Brand</button>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="brand-list">
                @foreach($brands as $index => $brand)
                    <tr class="hover:bg-gray-100 border-b">
                        <th class="p-3">{{ $index + 1 }}</th>
                        <td class="p-3">{{ $brand->name }}</td>
                        <td class="p-3">{{ $brand->category }}</td>
                        <td class="p-3 text-center">
                            <div class="flex space-x-2">
                                <button onclick="showEditBrandModal({{ $brand }})" class="btn btn-outline btn-warning">✏️ Edit</button>
                                <button type="button" class="btn btn-outline btn-error" onclick="confirmDelete('{{ $brand->id }}')">
                                    Delete
                                </button>
                                <form id="delete-form-{{ $brand->id }}" action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display: none;">
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
        <div class="mt-4">
            {{ $brands->links('pagination::simple-tailwind') }}
    </div>

    <script>
        function showAddBrandModal() {
            Swal.fire({
                title: 'Add Brand',
                html: `
                    <input type="text" id="brand-name" class="swal2-input" placeholder="Brand Name">
                    <input type="text" id="brand-category" class="swal2-input" placeholder="Category">
                `,
                showCancelButton: true,
                confirmButtonText: 'Add',
                preConfirm: () => {
                    const name = document.getElementById('brand-name').value;
                    const category = document.getElementById('brand-category').value;
                    if (!name || !category) {
                        Swal.showValidationMessage('Please fill all fields');
                    }
                    return { name, category };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.post('{{ route('brand.store') }}', result.value)
                        .then(response => {
                            Swal.fire('Success', 'Brand added successfully', 'success');
                            location.reload();
                        })
                        .catch(error => {
                            Swal.fire('Error', 'Something went wrong', 'error');
                        });
                }
            });
        }

        function showEditBrandModal(brand) {
            Swal.fire({
                title: 'Edit Brand',
                html: `
                    <input type="text" id="brand-name" class="swal2-input" value="${brand.name}" placeholder="Brand Name">
                    <input type="text" id="brand-category" class="swal2-input" value="${brand.category}" placeholder="Category">
                `,
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: () => {
                    const name = document.getElementById('brand-name').value;
                    const category = document.getElementById('brand-category').value;
                    if (!name || !category) {
                        Swal.showValidationMessage('Please fill all fields');
                    }
                    return { name, category };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.put("{{ route('brand.update', ':id') }}".replace(':id', brand.id), result.value)

                        .then(response => {
                            Swal.fire('Success', 'Brand updated successfully', 'success');
                            location.reload();
                        })
                        .catch(error => {
                            Swal.fire('Error', 'Something went wrong', 'error');
                        });
                }

            });

        }
        function confirmDelete(brandId) {
            Swal.fire({
                title: "Are you sure?",
                text: "This action cannot be undone!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("delete-form-" + brandId).submit();
                }
            });
        }
        document.addEventListener("DOMContentLoaded", function() {

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
