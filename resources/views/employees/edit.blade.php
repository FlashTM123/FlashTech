@extends('app')

@section('title', 'Edit Employee')

@section('content')
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto  p-6">
            <!-- Title -->
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800 dark:text-gray-200">Edit Employee</h2>

            <!-- Form -->
            <form action="{{ route('employees.update', $employees->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="mb-6">
                    <label class="font-semibold">Name</label>
                    <input type="text" name="name" value="{{ $employees->name }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label class="font-semibold">Email</label>
                    <input type="email" name="email" value="{{ $employees->email }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>

                <!-- Address Field -->
                <div class="mb-6">
                    <label class="font-semibold">Address</label>
                    <input type="text" name="address" value="{{ $employees->address }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>

                <!-- Password Field -->
                <div class="mb-6">
                    <label class="font-semibold">Password</label>
                    <input type="password" name="password" value="{{ $employees->password }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>

                <!-- Phone Field -->
                <div class="mb-6">
                    <label class="font-semibold">Phone</label>
                    <input type="text" name="phone" value="{{ $employees->phone }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none">
                </div>

                <!-- Role Field -->
                <div class="mb-6">
                    <label class="font-semibold">Role</label>
                    <select name="role" class="select" required>
                        <option value="sales" {{ $employees->role == 'sales' ? 'selected' : '' }}>Sales</option>
                        <option value="customer_service" {{ $employees->role == 'customer_service' ? 'selected' : '' }}>Customer Service</option>
                        <option value="Inventory_staff" {{ $employees->role == 'Inventory_staff' ? 'selected' : '' }}>Inventory Staff</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center mt-8 gap-4">
                    <button type="submit" class="btn btn-primary flex items-center justify-center w-full sm:w-auto px-6 py-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Update
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('edit_success'))
        Swal.fire({
            title: "Success!",
            text: "Employee has been updated successfully.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
        @endif

        @if ($errors->any())
        Swal.fire({
            title: "Oops! Something went wrong.",
            html: `{!! implode('<br>', $errors->all()) !!}`,
            icon: "error",
            confirmButtonColor: "#d33",
        });
        @endif
    </script>
@endsection
