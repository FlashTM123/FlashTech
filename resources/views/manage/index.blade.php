@extends("app")

@section('title', 'Manage Page')

@section("content")
    <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card: Tổng doanh thu -->
        <div class=" p-6 rounded-lg shadow-lg flex flex-col items-start hover:bg-gray-700 transition-colors">
            <h3 class="text-lg font-bold ">Total Sales</h3>
            <p class="text-2xl font-semibold text-blue-400 mt-2">$12,345</p>
        </div>

        <!-- Card: Đơn hàng mới -->
        <div class=" p-6 rounded-lg shadow-lg flex flex-col items-start hover:bg-gray-700 transition-colors">
            <h3 class="text-lg font-bold ">New Orders</h3>
            <p class="text-2xl font-semibold text-green-400 mt-2">56</p>
        </div>

        <!-- Card: Khách hàng -->
        <div class=" p-6 rounded-lg shadow-lg flex flex-col items-start hover:bg-gray-700 transition-colors">
            <h3 class="text-lg font-bold ">Customers</h3>
            <p class="text-2xl font-semibold text-orange-400 mt-2">1,234</p>
        </div>

        <!-- Card: Doanh thu -->
        <div class=" p-6 rounded-lg shadow-lg flex flex-col items-start hover:bg-gray-700 transition-colors">
            <h3 class="text-lg font-bold ">Revenue</h3>
            <p class="text-2xl font-semibold text-purple-400 mt-2">$89,000</p>
        </div>
    </div>
@endsection
