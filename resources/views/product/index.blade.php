@extends('app')

@section('title', 'Product List')

@section("content")
    <div class="container mx-auto p-6">
        <div class="flex flex-col h-full">
            <div class="grow">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <h2 class="text-2xl font-semibold text-white-800 dark:text-dark-200">Product List</h2>
                    <a href="{{ route('product.create')}}" class="btn btn-outline">
                        ➕ Add Product
                    </a>

                </div>
                <div class="my-3">
                    <div>
                        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                            <table class="table" >
                                <thead class="text-white-800 dark:text-dark-700">
                                <tr>
                                   <th class="text-center">#</th>
                                   <th class="text-center">Name</th>
                                   <th class="text-center">Type</th>
                                   <th class="text-center">Price</th>
                                   <th class="text-center">Quantity</th>
                                   <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $index => $product)
                                        <tr> <!-- Thêm thẻ <tr> -->
                                            <td class="text-center">{{ $product->id }}</td>
                                            <td class="text-center">{{ $product->getProductName() }}</td>
                                            <td class="text-center">{{ $product->type }}</td>
                                            <td class="p-3 text-center">
                                                @if($product->getProductPrice() < $product->getProductOriginalPrice())
                                                    <span class="line-through text-gray-400">
                                                        {{ number_format($product->getProductOriginalPrice()) }} Đ
                                                    </span>
                                                    <span class="text-red-500 font-semibold">
                                                        {{ number_format($product->getProductPrice()) }} Đ
                                                    </span>
                                                @else
                                                    <span>{{ number_format($product->getProductPrice()) }} Đ</span>
                                                @endif
                                            </td>
                                            <td class="text-center"> {{ $product->getProductQuantity()}}</td>
                                            <td class="text-center">
                                                <a href="{{ route('product.show', ['id' => $product->id]) }}" class="btn btn-outline btn-primary">Detail</a>
                                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline btn-secondary">
                                                    Edit
                                                </a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline btn-error">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{ $products->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>

@endsection
