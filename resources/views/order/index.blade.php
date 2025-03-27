@extends('app')

@section('title', 'Order List')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Order List</h1>
    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer</th>
                    <th>Total Price</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->customer->name ?? 'Guest' }}</td>
                        <td>{{ number_format($order->total_price) }}₫</td>
                        <td>
                            <form action="{{ route('orders.updatePaymentMethod', $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="payment_method" class="select select-bordered" onchange="this.form.submit()">
                                    <option value="COD" {{ $order->payment_method == 'COD' ? 'selected' : '' }}>COD</option>
                                    <option value="Banking" {{ $order->payment_method == 'Banking' ? 'selected' : '' }}>Banking</option>
                                </select>
                            </form>
                        </td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
