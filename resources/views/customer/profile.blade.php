@extends('master')

@section('title', 'Hồ sơ')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Profile Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold">
            <i class="fas fa-user-circle mr-3 text-primary"></i> Hồ sơ cá nhân
        </h1>
    </div>

    <!-- Main Profile Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="card bg-base-100 shadow-lg">
            <div class="card-body items-center text-center">
                <div class="avatar mb-4">
                    <div class="w-32 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                        <img src="{{ asset('images/' . $customer->image) }}" alt="Ảnh đại diện" class="object-cover">
                    </div>
                </div>
                <h2 class="card-title text-2xl mb-1">{{ $customer->name }}</h2>
                <div class="badge badge-primary mb-4">Khách hàng</div>

                <div class="divider my-2"></div>

                <div class="space-y-3 text-left w-full">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-envelope text-gray-500 dark:text-gray-300 w-5"></i>
                        <span>{{ $customer->email }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-phone text-green-500 dark:text-green-400 w-5"></i>
                        <span>{{ $customer->phone }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-map-marker-alt text-red-500 dark:text-red-400 w-5"></i>
                        <span>{{ $customer->address }}</span>
                    </div>
                </div>

                <div class="card-actions justify-center mt-6">
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-edit mr-2"></i> Chỉnh sửa hồ sơ
                    </button>
                </div>
            </div>
        </div>

        <!-- Customer Details -->
        <div class="card bg-base-100 shadow-lg lg:col-span-2">
            <div class="card-body">
                <h2 class="card-title text-xl mb-4">
                    <i class="fas fa-info-circle mr-2 text-primary"></i> Thông tin chi tiết
                </h2>

                <div class="overflow-x-auto">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th class="bg-base-200 dark:bg-gray-700 w-1/3">ID Khách hàng</th>
                                <td>{{ $customer->id }}</td>
                            </tr>
                            <tr>
                                <th class="bg-base-200 dark:bg-gray-700">Ngày sinh</th>
                                <td>{{ \Carbon\Carbon::parse($customer->date_of_birth)->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-base-200 dark:bg-gray-700">Giới tính</th>
                                <td>{{ $customer->gender }}</td>
                            </tr>
                            <tr>
                                <th class="bg-base-200 dark:bg-gray-700">Email</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th class="bg-base-200 dark:bg-gray-700">Ngày đăng ký</th>
                                <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Order History -->
    <div class="card bg-base-100 shadow-lg mt-6">
        <div class="card-body">
            <h2 class="card-title text-xl mb-4">
                <i class="fas fa-history mr-2 text-primary"></i> Lịch sử mua hàng
            </h2>

            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th class="bg-base-200 dark:bg-gray-700">Mã đơn</th>
                            <th class="bg-base-200 dark:bg-gray-700">Ngày đặt</th>
                            <th class="bg-base-200 dark:bg-gray-700">Tổng tiền</th>
                            <th class="bg-base-200 dark:bg-gray-700">Thanh toán</th>
                            <th class="bg-base-200 dark:bg-gray-700">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($customer->orders as $order)
                            <tr class="hover:bg-base-200 dark:hover:bg-gray-700 transition-colors">
                                <td>#{{ $order->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                <td>{{ number_format($order->total_price) }}₫</td>
                                <td>{{ ucfirst($order->payment_method) }}</td>
                                <td>
                                    <span class="badge
                                        @if($order->status == 'completed') badge-success
                                        @elseif($order->status == 'processing') badge-info
                                        @elseif($order->status == 'cancelled') badge-error
                                        @else badge-warning @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    <i class="fas fa-box-open mr-2"></i> Chưa có đơn hàng nào
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('{{ route('customer.orders') }}')
        .then(response => response.json())
        .then(orders => {
            const tbody = document.querySelector('table tbody');
            tbody.innerHTML = ''; // Xóa nội dung cũ

            if (orders.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="fas fa-box-open mr-2"></i> Chưa có đơn hàng nào
                        </td>
                    </tr>
                `;
                return;
            }

            orders.forEach(order => {
                const statusClass = order.status === 'completed' ? 'badge-success'
                    : order.status === 'processing' ? 'badge-info'
                    : order.status === 'cancelled' ? 'badge-error'
                    : 'badge-warning';

                tbody.innerHTML += `
                    <tr class="hover:bg-base-200 dark:hover:bg-gray-700 transition-colors">
                        <td>#${order.id}</td>
                        <td>${new Date(order.created_at).toLocaleDateString('vi-VN')}</td>
                        <td>${new Intl.NumberFormat('vi-VN').format(order.total_price)}₫</td>
                        <td>${order.payment_method.charAt(0).toUpperCase() + order.payment_method.slice(1)}</td>
                        <td>
                            <span class="badge ${statusClass}">
                                ${order.status.charAt(0).toUpperCase() + order.status.slice(1)}
                            </span>
                        </td>
                    </tr>
                `;
            });
        });
});
</script>
@endsection
