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
                    <select name="brand_id" class="select">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="">Color</label>
                    <select name="color_id" class="select">
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
                    <label class="">Original price (VND)</label>
                    <input type="text" step="0.01" name="original_price" class="input input-bordered w-full" required>
                </div>
                <div>
                    <label class="">Discount (%)</label>
                    <input type="text"  name="discount" class="input input-bordered w-full" >
                </div>

                <div>
                    <label class="">Promotional price (VND)</label>
                    <input type="text" step="0.01" name="promotional_price" class="input input-bordered w-full" >
                </div>

                <div>
                    <label class="">Quantity</label>
                    <input type="number" name="quantity" class="input input-bordered w-full" required>
                </div>

                <div>
                    <label class="">Image</label>
                    <input type="text" name="image" class="file-input w-full" required>
                </div>

                <div class="flex justify-end gap-4 mt-6">
                    <button type="submit" class="btn btn-outline btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add
                    </button>
                    <a href="{{ route('accessories.index') }}" class="btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
