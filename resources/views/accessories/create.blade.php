@extends("app")

@section('title', 'Add Accessories')

@section('content')
    <div class="container mx-auto p-6">
        <div class="overflow-x-auto">
            <h2 class="text-2xl font-bold text-center mb-6">Add Accessory</h2>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action="{{ route('accessories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="">Name</label>
                    <input type="text" name="name" class="input input-bordered w-full" required>
                </div>
                <div>
                    <label class="">Brand</label>
                    <select name="brand_id">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="">Color</label>
                    <select name="color_id">
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">
                                {{ $color->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="">Type</label>
                    <input type="text" name="type" class="input input-bordered w-full" required>
                </div>



                <div>
                    <label class="">Price (VND)</label>
                    <input type="text" step="0.01" name="price" class="input input-bordered w-full" required>
                </div>

                <div>
                    <label class="">Quantity</label>
                    <input type="number" name="quantity" class="input input-bordered w-full" required>
                </div>

                <div>
                    <label class="">Image</label>
                    <input type="text" name="image" class="file-input w-full" required>
                </div>

                <div class="flex justify-between mt-4">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ route('accessories.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
