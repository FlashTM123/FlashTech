@extends("app")

@section('title', 'Edit Laptop: ' . $laptop->name)

@section('content')
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto p-6">
            <h2 class="text-2xl font-bold text-center mb-6">Edit Laptop</h2>

            @if(session('success'))
                <div class="alert alert-success mb-4">{{ session('success') }}</div>
            @endif

            <form action="{{ route('laptop.update', $laptop -> id) }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="">Name</label>
                    <input type="text" name="name" class="input input-bordered w-full" required value="{{ $laptop -> name }}">
                </div>
                <div>
                    <label class="">Brand</label>
                    <select name="brand_id" class="select">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}"
                                {{ $brand->id == $laptop->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="">Color</label>
                    <select name="color_id" class="select">
                        @foreach($colors as $color)
                            <option value="{{ $color->id }}"
                                {{ $color->id == $laptop->color_id ? 'selected' : '' }}>
                                {{ $color->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="">CPU</label>
                    <input type="text" name="cpu" class="input input-bordered w-full" required value="{{ $laptop -> cpu }}">
                </div>

                <div>
                    <label class="">RAM</label>
                    <input type="text" name="ram" class="input input-bordered w-full" required value="{{ $laptop -> ram }}">
                </div>
                <div>
                    <label class="">VGA</label>
                    <input type="text" name="vga" class="input input-bordered w-full" required value="{{ $laptop -> vga }}">
                </div>
                <div>
                    <label class="">Storage (GB)</label>
                    <input type="text" name="storage" class="input input-bordered w-full" required value="{{ $laptop -> storage }}">
                </div>

                <div>
                    <label class="">Original price (VND)</label>
                    <input type="text" step="0.01" name="original_price" class="input input-bordered w-full" required value="{{$laptop -> original_price}}">
                </div>
                <div>
                    <label class="">Discount (%)</label>
                    <input type="text"  name="discount" class="input input-bordered w-full"  value="{{$laptop -> discount}}">
                </div>

                <div>
                    <label class="">Promotional price (VND)</label>
                    <input type="text" step="0.01" name="promotional_price" class="input input-bordered w-full"  value="{{$laptop -> promotional_price}}">
                </div>

                <div>
                    <label class="">Quantity</label>
                    <input type="number" name="quantity" class="input input-bordered w-full" required value="{{ $laptop -> quantity }}">
                </div>

                <div>
                    <label class="">Image</label>
                    <input type="text" name="image" class="file-input w-full" required value="{{ $laptop -> image }}">
                </div>

                <div class="flex justify-end gap-4 mt-6">
                    <button type="submit" class="btn btn-outline btn-secondary">  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 576 512" stroke="currentColor">
                            <path fill="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z" />
                        </svg>
                        Update</button>
                    <a href="{{ route('laptop.index') }}" class="btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
