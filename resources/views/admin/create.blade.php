@extends('app')

@section('title', 'Add Admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto  p-6">
            <!-- Title -->
            <h2 class="text-2xl font-bold text-center mb-6 text-white-800 dark:text-dark-200">Add Admin</h2>

            <!-- Success Message -->


            <!-- Form -->
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

                <!-- Name Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Name</label>
                    <input type="text" name="name" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Email</label>
                    <input type="email" name="email" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>
                <!-- Profile Image Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Profile Image</label>
                    <input type="file" name="profile_image" class="file-input">
                </div>


                <!-- Password Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Password</label>
                    <input type="password" name="password" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>

                <!-- Phone Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Phone</label>
                    <input type="text" name="phone" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none">
                </div>

                <!-- Buttons -->
                <!-- Buttons -->
                <div class="flex justify-between items-center mt-8 gap-4">
                    <button type="submit" class="btn btn-primary flex items-center justify-center w-full sm:w-auto px-6 py-2" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add
                    </button>
                    <a href="{{ route('admin.index') }}" class="btn btn-soft">
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
        @if(session('add_success'))
        Swal.fire({
            title: "Success!",
            text: "Admin has been added successfully.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK"
        });
        @endif

        @if ($errors->any())
        Swal.fire({
            title: "Oops! Something went wrong.",
            html: `
                @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
                @endforeach
            `,
            icon: "error",
            confirmButtonColor: "#d33",
        });
        @endif
    </script>

@endsection
