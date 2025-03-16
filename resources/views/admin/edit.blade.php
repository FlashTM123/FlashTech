@extends('app')

@section('title', 'Edit Admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto  p-6">
            <!-- Title -->
            <h2 class="text-2xl font-bold text-center mb-6 text-white-800 dark:text-dark-200">Edit Admin</h2>

            <!-- Success Message -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Oops! Something went wrong.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- Form -->
            <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
                @method('PUT')

                <!-- Name Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Name</label>
                    <input type="text" name="name" value="{{ $admin->name }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Email</label>
                    <input type="email" name="email" value="{{ $admin->email }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none" required>
                </div>
                <div class="mb-6">
                    <label class="block font-semibold">Profile Image</label>
                    <input type="file" name="profile_image" class="file-input">
                    @if ($admin->profile_image)
                        <img src="{{ asset('storage/' . $admin->profile_image) }}" alt="Profile Image" class="mt-3 w-12 h-12 rounded-full">
                    @endif
                </div>


                <!-- Password Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Password</label>
                    <input type="password" name="password" value="{{ $admin->password }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none">
                </div>

                <!-- Phone Field -->
                <div class="mb-6">
                    <label class="pt-0 label label-text font-semibold">Phone</label>
                    <input type="text" name="phone" value="{{ $admin->phone }}" class="input border border-gray-300 rounded-lg w-full px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 outline-none">
                </div>

                <!-- Buttons -->
                <div class="flex justify-between items-center mt-8 gap-4">
                    <button type="submit" class="btn btn-primary flex items-center justify-center w-full sm:w-auto px-6 py-2" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 576 512" stroke="currentColor">
                            <path fill="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                        </svg>
                        Update
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
@endsection
