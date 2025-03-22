@extends('master')

@section('title', 'Product Detail')

@section('content')
    <div class="container mx-auto p-4">
        <div class="card lg:card-side bg-base-100 shadow-xl">
            <figure class="lg:w-1/2">
                <img
                    src="https://img.daisyui.com/images/stock/photo-1494232410401-ad00d5433cfa.webp"
                    alt="Product Image"
                    class="w-full h-full object-cover"
                />
            </figure>
            <div class="card-body lg:w-1/2">
                <h2 class="card-title text-3xl font-bold mb-4">Product Name</h2>
                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="flex items-center mb-4">
                    <span class="text-2xl font-bold text-primary">$99.99</span>
                    <span class="text-sm text-gray-500 line-through ml-2">$129.99</span>
                </div>

                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Add to Cart</button>
                    <button class="btn btn-outline btn-secondary">Buy Now</button>
                </div>
            </div>
        </div>

        <!-- Product Description Section -->
        <div class="mt-8">
            <h3 class="text-2xl font-bold mb-4">Product Description</h3>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>

        <!-- Technical Specifications Section -->
        <div class="mt-8">
            <h3 class="text-2xl font-bold mb-4">Technical Specifications</h3>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <th class="bg-base-200">Feature</th>
                        <th class="bg-base-200">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Material</td>
                        <td>High-quality plastic</td>
                    </tr>
                    <tr>
                        <td>Dimensions</td>
                        <td>10 x 5 x 3 cm</td>
                    </tr>
                    <tr>
                        <td>Weight</td>
                        <td>150 grams</td>
                    </tr>
                    <tr>
                        <td>Color</td>
                        <td>Black, White, Blue</td>
                    </tr>
                    <tr>
                        <td>Warranty</td>
                        <td>1 year</td>
                    </tr>
                    <tr>
                        <td>Compatibility</td>
                        <td>iOS, Android, Windows</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Reviews Section -->

@endsection
