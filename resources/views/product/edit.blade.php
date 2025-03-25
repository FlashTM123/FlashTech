@extends('app')

@section('title', 'Product Edit')

@section('content')
    <div class="container mx-auto p-6">
        <div class="max-w-2xl mx-auto p-6">
            <h2 class="text-2xl font-bold text-center mb-6">Edit Product</h2>

            @if (session('success'))
                <div class="alert alert-success mb-4">{{ session('success')}}</div>
            @endif


            <form action="{{ route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf


                <div>
                    <label class="">Id</label>
                    <input type="number" name="type_id" class="input input-bordered w-full" value="{{ $product->type_id }}" >
                </div>
                <div>
                <div>
                    <label class="">Description</label>
                    <textarea name="description" class="textarea textarea-bordered w-full textarea-lg" rows="5" placeholder="Enter your description here..."  required  >{{ $product->description }}</textarea>
                </div>
                <div class="flex justify-end gap-4 mt-6">
                    <button type="submit" class="btn btn-outline btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Update
                    </button>
                    <a href="{{ route('product.index') }}" class="btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancel</a>
                </div>

            </form>
        </div>
    </div>


@endsection
