@extends('app')

@section('title', 'Edit Admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="overflow-x-auto">
            <h2 class="text-2xl font-bold text-center mb-4">Edit Admin</h2>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action=" {{ route('admin.update', $admin->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="">Name</label>
                    <input type="text" name="name" value="{{ $admin->name }}" class="input input-bordered w-full" required>
                </div>

                <div class="mb-4">
                    <label class="">Email</label>
                    <input type="email" name="email" value="{{ $admin->email }}" class="input input-bordered w-full" required>
                </div>

                <div class="mb-4">
                    <label class="">Password</label>
                    <input type="password" name="password" class="input input-bordered w-full" value="{{ $admin->password }}">
                </div>

                <div class="mb-4">
                    <label class="">Phone</label>
                    <input type="text" name="phone" value="{{ $admin->phone }}" class="input input-bordered w-full">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Admin</button>
                </div>
            </form>
        </div>
    </div>
@endsection
