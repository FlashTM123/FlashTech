@extends('app')

@section('title', 'Add Admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="overflow-x-auto">
            <h2 class="text-2xl font-bold text-center mb-4">Add Admin</h2>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block">Name</label>
                    <input type="text" name="name" class="input input-bordered w-full" required>
                </div>

                <div class="mb-4">
                    <label class="block ">Email</label>
                    <input type="email" name="email" class="input input-bordered w-full" required>
                </div>

                <div class="mb-4">
                    <label class="block ">Password</label>
                    <input type="password" name="password" class="input input-bordered w-full" required>
                </div>

                <div class="mb-4">
                    <label class="block ">Phone</label>
                    <input type="text" name="phone" class="input input-bordered w-full">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.create') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Add Admin</button>
                </div>
            </form>
        </div>
    </div>

@endsection
