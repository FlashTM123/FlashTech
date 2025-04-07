@extends('app')

@section('title', 'Order List')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Order List</h1>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Customer</th>
                    <th class="text-center">Total Price</th>
                    <th class="text-center">Payment Method</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="text-center">{{ $order->id }}</td>
                        <td class="text-center">{{ $order->customer->name ?? 'Guest' }}</td>
                        <td class="text-center">{{ number_format($order->total_price) }}₫</td>
                        <td class="text-center">{{ ucfirst($order->payment_method) }}</td> <!-- Hiển thị payment_method -->
                        <td class="text-center">{{$order->address}}</td>
                        <td >
                            <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="select select-bordered" onchange="this.form.submit()">
                                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }} class="text-yellow-500">Pending</option>
                                    <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }} class="text-blue-500">Processing</option>
                                    <option value="On delivery" {{ $order->status == 'On delivery' ? 'selected' : '' }} class="text-pink-500">On Delivery</option>
                                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }} class="text-green-500">Completed</option>
                                    <option value="Cancel" {{ $order->status == 'Cancel' ? 'selected' : '' }} class="text-red-500">Cancel</option>
                                </select>
                            </form>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('order.show', $order->id)}}" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{ $orders->links('pagination::simple-tailwind') }}
    </div>
</div>
@endsection
