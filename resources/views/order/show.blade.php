@extends('app')

@section('title', 'Order Details')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <!-- Order Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold flex items-center gap-2">
                    <i class="fas fa-receipt text-primary"></i>
                    Order #{{ $order->id }}
                </h1>
                <span class="badge badge-lg badge-status badge-{{ $order->status }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <!-- Customer Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <h3 class="text-lg font-semibold mb-2">Customer Information</h3>
                    <p><strong>Name:</strong> {{ $order->customer->name ?? 'Guest' }}</p>
                    <p><strong>Phone:</strong> {{ $order->customer->phone }}</p>
                    <p><strong>Email:</strong> {{ $order->customer->email }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-2">Shipping Information</h3>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                    <p><strong>Order Date:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <!-- Order Items -->
            <h3 class="text-xl font-bold mb-4">Order Items</h3>
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr class="bg-base-200">
                            <th>Product</th>
                            <th class="text-right">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar">
                                        <div class="w-12 rounded bg-base-200">
                                            <img src="{{ $item->product->getProductImage() }}" alt="{{ $item->product->getProductName() }}" />
                                        </div>
                                    </div>
                                    <div>
                                        {{ $item->product->getProductName() }}

                                    </div>
                                </div>
                            </td>
                            <td class="text-right">{{ number_format($item->price) }}₫</td>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-right font-semibold">{{ number_format($item->price * $item->quantity) }}₫</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <!-- Order Summary -->
            <div class="flex justify-end mt-6">
                <div class="card bg-base-200 w-full md:w-1/2">
                    <div class="card-body">
                        <div class="space-y-2">
                            <!-- Subtotal -->
                            <div class="flex justify-between">
                                <span>Shipping Fee:</span>
                                <span>30,000₫</span>
                            </div>
                            <div class="flex justify-between text-lg font-bold">
                                <span>Subtotal:</span>
                                <span class="text-primary">{{ number_format($order->total_price) }}₫</span>
                            </div>

                            <!-- Discount -->
                            @if($order->discount > 0)
                            <div class="flex justify-between">
                                <span>Discount:</span>
                                <span class="text-success">-{{ number_format($order->discount) }}₫</span>
                            </div>
                            @endif

                            <!-- Shipping Fee -->


                            <div class="divider my-0"></div>

                            <!-- Total -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
