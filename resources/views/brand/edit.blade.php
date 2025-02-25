@extends("app")

@section('title', 'Edit Brand')

@section('content')
    <div class="container mx-auto p-6">
        <div class="overflow-x-auto">
            <h2 class="text-2xl font-bold text-center mb-6">Edit Brand</h2>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action=" {{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $brand->name }}" class="input input-bordered w-full" required>

                    </div>
                    <div class="flex justify-between mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('brand.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>

            </form>
        </div>
    </div>


@endsection
