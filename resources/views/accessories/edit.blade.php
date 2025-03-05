@extends("app")

@section('title', 'Edit Accessories')

@section('content')
    <div class="container mx-auto p-6">
        <div class="overflow-x-auto">
            <h2 class="text-2xl font-bold text-center mb-6">Edit Accessory</h2>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action="{{ route('accessories.update', $accessories->id) }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="">Name</label>
                    <input type="text" name="name" class="input input-bordered w-full" required value="{{ $accessories -> name }}">
                </div>
                <div>
                    <label class="">Brand</label>
                    <select name="brand_id">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">
                                @if($brand -> id == $accessories->brand_id)

                                @endif
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="">Brand</label>
                    <select name="color_id">
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}">
                                @if($color -> id == $accessories->color_id)

                                @endif
                                {{ $color->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="">Type</label>
                    <input type="text" name="type" class="input input-bordered w-full" required value="{{ $accessories -> type }}">
                </div>



                <div>
                    <label class="">Price (VND)</label>
                    <input type="text" step="0.01" name="price" class="input input-bordered w-full" required  value="{{ $accessories -> price }}">
                </div>

                <div>
                    <label class="">Quantity</label>
                    <input type="number" name="quantity" class="input input-bordered w-full" required value="{{ $accessories -> quantity }}">
                </div>

                <div>
                    <label class="">Image</label>
                    <input type="text" name="image" class="file-input w-full" required value="{{ $accessories -> image }}">
                </div>

                <div class="flex justify-between mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('accessories.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
