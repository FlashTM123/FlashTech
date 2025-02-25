@extends("app")

@section('title', 'Add Color')

@section('content')
    <div class="container mx-auto p-6">
        <div class="overflow-x-auto">
            <h2 class="text-2xl font-bold text-center mb-6">Add Brand</h2>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action=" {{ route('color.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <div>
                        <label>Name</label>
                        <input type="text" name="name" class="input input-bordered w-full" required>

                    </div>
                    <div class="flex justify-between mt-4">
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                        <a href="{{ route('color.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>

            </form>
        </div>
    </div>


@endsection
