@extends('master')

@section('title', 'Thanh toán')

@section('content')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="text-lg font-bold">Your Cart</h2>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ number_format($product['price']) }}₫</td>
                            <td>{{ number_format($product['price'] * $product['quantity']) }}₫</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right mt-4">
                <h3 class="text-lg font-bold">Subtotal: {{ number_format($subtotal) }}₫</h3>
            </div>
            <form action="{{ route('customer.processCheckout') }}" method="POST">
                @csrf
                <div class="form-control">
                    <label class="label">Shipping Address</label>
                    <input type="text" name="address" class="input input-bordered" required>
                </div>
                <div class="form-control mt-4">
                    <label class="label">Payment Method</label>
                    <select name="payment_method" class="select select-bordered" required>
                        <option value="cod">Cash on Delivery (COD)</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                </div>
                <div class="form-control mt-4">
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
