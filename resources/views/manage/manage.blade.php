@extends("app")

@section('title', 'Manage page')

@section("content")
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card: Tổng doanh thu -->
        <div class="bg-dark p-5 rounded-lg shadow flex flex-col items-start">
            <h3 class="text-lg font-bold">Total Sales</h3>
            <p class="text-2xl font-semibold text-blue-600">$12,345</p>
        </div>

        <!-- Card: Đơn hàng mới -->
        <div class="bg-dark p-5 rounded-lg shadow flex flex-col items-start">
            <h3 class="text-lg font-bold">New Orders</h3>
            <p class="text-2xl font-semibold text-green-600">56</p>
        </div>

        <!-- Card: Khách hàng -->
        <div class="bg-dark p-5 rounded-lg shadow flex flex-col items-start">
            <h3 class="text-lg font-bold">Customers</h3>
            <p class="text-2xl font-semibold text-orange-600">1,234</p>
        </div>

        <!-- Card: Doanh thu -->
        <div class="bg-dark p-5 rounded-lg shadow flex flex-col items-start">
            <h3 class="text-lg font-bold">Revenue</h3>
            <p class="text-2xl font-semibold text-purple-600">$89,000</p>
        </div>
    </div>
@endsection
