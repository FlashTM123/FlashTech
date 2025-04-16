@extends('master')

@section('title', 'Hồ sơ khách hàng')

@section('content')
<div class="container mx-auto px-4 py-10">
    <!-- Tiêu đề -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold text-primary mb-2">
            <i class="fas fa-id-card-alt mr-2"></i> Hồ sơ của bạn
        </h1>
        <p class="text-gray-400">Thông tin cá nhân & lịch sử đơn hàng</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Hồ sơ -->
        <div class="bg-white/5 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-lg text-center">
            <div class="avatar">
                <div class="w-32 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2 mx-auto">
                    <img src="{{ asset('images/' . $customer->image) }}" />
                </div>
            </div>
            <h2 class="text-2xl font-bold mt-4 text-white">{{ $customer->name }}</h2>
            <span class="badge badge-accent mt-2 mb-1">Khách hàng VIP</span>
            <p class="text-sm text-gray-300">{{ $customer->email }}</p>

            <div class="mt-6 text-left text-sm text-gray-300 space-y-2">
                <p><i class="fas fa-phone-alt mr-2 text-green-400"></i> {{ $customer->phone }}</p>
                <p><i class="fas fa-map-marker-alt mr-2 text-red-400"></i> {{ $customer->address }}</p>
                <p><i class="fas fa-birthday-cake mr-2 text-yellow-300"></i> {{ \Carbon\Carbon::parse($customer->date_of_birth)->format('d/m/Y') }}</p>
                <p><i class="fas fa-venus-mars mr-2 text-pink-400"></i> {{ $customer->gender }}</p>
            </div>

            <button class="btn btn-primary btn-sm mt-6">

                    <a href="{{ route('customer.edit')}}" > <i class="fas fa-edit mr-2"></i> Chỉnh sửa hồ sơ</a>

            </button>
        </div>

        <!-- Phần phải -->
        <div class="lg:col-span-2 flex flex-col gap-6">
            <!-- Chi tiết tài khoản -->
            <div class="card bg-base-100 border border-base-300 shadow-md">
                <div class="card-body">
                    <h2 class="card-title text-lg text-primary mb-4">
                        <i class="fas fa-user-cog mr-2"></i> Chi tiết tài khoản
                    </h2>
                    <div class="grid md:grid-cols-2 gap-4 text-sm">
                        <div><span class="font-bold text-gray-700">ID khách hàng:</span> {{ $customer->id }}</div>
                        <div><span class="font-bold text-gray-700">Email:</span> {{ $customer->email }}</div>
                        <div><span class="font-bold text-gray-700">Ngày tạo tài khoản:</span> {{ \Carbon\Carbon::parse($customer->created_at)->format('d/m/Y') }}</div>
                    </div>
                </div>
            </div>

            <!-- Lịch sử đơn hàng -->
            <div class="card bg-base-100 border border-base-300 shadow-md">
                <div class="card-body">
                    <h2 class="card-title text-lg text-primary mb-4">
                        <i class="fas fa-shopping-bag mr-2"></i> Lịch sử đơn hàng
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Ngày</th>
                                    <th>Tổng</th>
                                    <th>Thanh toán</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($customer->orders as $order)
                                    <tr>
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
                                        <td colspan="5" class="text-center text-gray-500 py-4">
                                            <i class="fas fa-box-open mr-2"></i> Không có đơn hàng nào
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
