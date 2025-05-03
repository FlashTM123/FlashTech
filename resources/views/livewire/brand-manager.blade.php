<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-800">📦 Brand List</h2>
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
        <button onclick="showAddBrandModal()" class="btn btn-primary btn-sm">
            ➕ Add Brand
        </button>
    </div>

    

    <div class="overflow-x-auto rounded-lg shadow border bg-white">
        <table class="table w-full">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">Name</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody id="brand-list">
                @foreach($brands as $brand)
                    <tr class="hover:bg-gray-50 border-b text-sm">
                        <td class="p-3 font-medium text-gray-800">{{ $brand->id }}</td>
                        <td class="p-3">{{ $brand->name }}</td>
                        <td class="p-3 text-center">
                            <div class="flex justify-center gap-2">
                                <button onclick="showEditBrandModal({{ $brand }})" class="btn btn-warning btn-sm">✏️ Edit</button>
                                <button type="button" class="btn btn-error btn-sm" onclick="confirmDelete('{{ $brand->id }}')">🗑️ Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $brands->links('') }}
    </div>
</div>
<script>
    function showAddBrandModal() {
        Swal.fire({
            title: 'Add Brand',
            html: `
                <input type="text" id="brand-name" class="swal2-input" placeholder="Brand Name">
            `,
            showCancelButton: true,
            confirmButtonText: 'Add',
            preConfirm: () => {
                const name = document.getElementById('brand-name').value;
                if (!name ) {
                    Swal.showValidationMessage('Please fill all fields');
                }
                return { name };
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
            `,
            showCancelButton: true,
            confirmButtonText: 'Update',
            preConfirm: () => {
                const name = document.getElementById('brand-name').value;
                const category = document.getElementById('brand-category').value;
                if (!name ) {
                    Swal.showValidationMessage('Please fill all fields');
                }
                return { name };
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
