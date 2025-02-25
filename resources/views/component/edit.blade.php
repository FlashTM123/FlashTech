@extends("app")

@section('title', 'Edit Component')

@section('content')
    <div class="container mx-auto p-6">
        <div class="overflow-x-auto">
            <h2 class="text-2xl font-bold text-center mb-6">Edit Laptop</h2>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action="{{ route('component.update', $component->id) }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="">Name</label>
                    <input type="text" name="name" class="input input-bordered w-full" required value="{{ $component -> name }}">
                </div>
                <div>
                    <label class="">Brand</label>
                    <select name="brand_id">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">
                                @if($brand -> id == $component->brand_id)

                                @endif
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="">Type</label>
                    <input type="text" name="type" class="input input-bordered w-full" required value="{{ $component -> type }}">
                </div>

                <div>
                    <label class="">Capacity</label>
                    <input type="text" name="capacity" class="input input-bordered w-full" required value="{{ $component -> capacity }}">
                </div>


                <div>
                    <label class="">Price (VND)</label>
                    <input type="text" step="0.01" name="price" class="input input-bordered w-full" required  value="{{ $component -> price }}">
                </div>

                <div>
                    <label class="">Quantity</label>
                    <input type="number" name="quantity" class="input input-bordered w-full" required value="{{ $component -> quantity }}">
                </div>

                <div>
                    <label class="">Image</label>
                    <input type="text" name="image" class="file-input w-full" required value="{{ $component -> image }}">
                </div>

                <div class="flex justify-between mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('component.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

