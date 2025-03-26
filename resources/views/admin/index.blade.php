@extends("app")

@section('title', 'Admin List')

@section("content")
    <div class="container mx-auto p-6">
        <div class="flex flex-col h-full">
            <div class="grow">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <h2 class="text-lg font-semibold mb-4">Manage Admins</h2>
                    <a href="{{ route('admin.create') }}" class="btn btn-outline btn-primary">
                        ➕ Add Admin
                    </a>
                </div>
                <div class="my-3">
                    <div>
                        <div class="overflow-x-auto rounded-lg border border-base-content/5 bg-base-100 shadow-lg">                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                document.querySelectorAll('.increase-quantity').forEach(button => {
                                    button.addEventListener('click', function () {
                                        const id = this.getAttribute('data-id');
                                        const quantityElement = this.previousElementSibling;
                                        const quantity = parseInt(quantityElement.innerText) + 1;
                                        quantityElement.innerText = quantity;
                                        updateTotal(id, quantity);
                                        updateQuantity(id, quantity);
                                    });
                                });

                                document.querySelectorAll('.decrease-quantity').forEach(button => {
                                    button.addEventListener('click', function () {
                                        const id = this.getAttribute('data-id');
                                        const quantityElement = this.nextElementSibling;
                                        const quantity = parseInt(quantityElement.innerText) - 1;
                                        if (quantity > 0) {
                                            quantityElement.innerText = quantity;
                                            updateTotal(id, quantity);
                                            updateQuantity(id, quantity);
                                        }
                                    });
                                });

                                function updateTotal(id, quantity) {
                                    const row = document.querySelector(`tr[data-id="${id}"]`);
                                    const price = parseInt(row.querySelector('.text-lg').innerText.replace(/[^0-9]/g, ''));
                                    const totalPriceElement = row.querySelector('.total-price');
                                    const totalPrice = price * quantity;
                                    totalPriceElement.innerText = new Intl.NumberFormat().format(totalPrice) + '₫';

                                    let subtotal = 0;
                                    document.querySelectorAll('.total-price').forEach(element => {
                                        subtotal += parseInt(element.innerText.replace(/[^0-9]/g, ''));
                                    });

                                    document.getElementById('subtotal').innerText = new Intl.NumberFormat().format(subtotal) + '₫';
                                    document.getElementById('total').innerText = new Intl.NumberFormat().format(subtotal) + '₫';
                                }

                                function updateQuantity(id, quantity) {
                                    fetch('{{ route('customer.updateQuantity') }}', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({ id: id, quantity: quantity })
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            console.log('Quantity updated successfully');
                                        }
                                    });
                                }
                            });
                        </script>
                            <table class="table w-full">
                                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Password</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Created</th>
                                    <th class="text-center">Updated</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($admins as $index => $admin)
                                    <tr class="hover:bg-gray-200 dark:hover:bg-gray-800">
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $admin->name }}</td>
                                        <td class="text-center">{{ $admin->email }}</td>
                                        <td class="text-center">
                                            @if($admin->profile_image)
                                                <img src="{{ asset('storage/' . $admin->profile_image) }}" alt="Profile Image" class="w-12 h-12 rounded-full object-cover mx-auto">
                                            @else
                                                <span class="text-gray-500">No Image</span>
                                            @endif
                                        </td>

                                        <td class="text-center">{{ $admin->password }}</td>
                                        <td class="text-center">{{ $admin->phone }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($admin->created_at)->format('d/m/Y')}}</td>\
                                        <td class="text-center">{{\Carbon\Carbon::parse($admin->updated_at)->format('d/m/Y')}}</td>
                                        <td class="px-6 py-4 text-sm text-center">
                                            <div class="flex justify-center space-x-2">
                                                <!-- Edit Button -->
                                                <a href="{{ route('admin.edit', $admin->id) }}"
                                                   class="btn btn-outline btn-warning">
                                                    📝 Edit
                                                </a>
                                                <!-- Delete Button with SweetAlert -->
                                                <form id="delete-form-{{ $admin->id }}" action="{{ route('admin.destroy', $admin->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-outline btn-error"
                                                            onclick="confirmDelete({{ $admin->id }})">
                                                        🗑️ Delete
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
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>


            function confirmDelete(adminId) {
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
                        document.getElementById(`delete-form-${adminId}`).submit();
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
