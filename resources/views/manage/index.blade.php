@extends("app")

@section('title', 'Thống kê')

@section("content")
<div class="container mx-auto px-4 py-8">
    <!-- Tiêu đề với icon -->
    <h1 class="text-3xl font-bold mb-6 flex items-center gap-2">
        <i class="fas fa-chart-pie text-primary"></i>
        Dashboard
    </h1>

    <!-- Biểu đồ doanh thu -->
    <div class="card bg-base-100 shadow-lg mb-8">
        <div class="card-body">
            <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                <i class="fas fa-money-bill-wave text-green-500"></i>
                Revenue by Month
            </h2>
            <div class="w-full" style="height: 400px">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Bảng sản phẩm bán chạy -->
    <div class="card bg-base-100 shadow-lg">
        <div class="card-body">
            <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                <i class="fas fa-star text-yellow-400"></i>
                Sản phẩm bán chạy
            </h2>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th class="text-center">#</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-center">
                                <i class="fas fa-shopping-cart mr-1"></i>
                                Số lượng bán
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bestSellingProducts as $index => $product)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        @if($product->getProductImage())
                                        <div class="avatar">
                                            <div class="w-8 rounded">
                                                <img src="{{ $product->getProductImage() }}" alt="{{ $product->getProductName() }}">
                                            </div>
                                        </div>
                                        @endif
                                        {{ $product->getProductName() }}
                                    </div>
                                </td>
                                <td class="text-center">{{ $product->order_details_sum_quantity ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bảng sản phẩm sắp hết hàng -->
    <div class="card bg-base-100 shadow-lg mt-8">
        <div class="card-body">
            <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                <i class="fas fa-exclamation-circle text-red-500"></i>
                Sản phẩm sắp hết hàng
            </h2>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th class="text-center">#</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-center">Loại</th>
                            <th class="text-center">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lowStockProducts as $index => $product)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>
                                    <div class="flex items-center gap-2">
                                        @if($product->getProductImage())
                                        <div class="avatar">
                                            <div class="w-8 rounded">
                                                <img src="{{ $product->getProductImage() }}" alt="{{ $product->getProductName() }}">
                                            </div>
                                        </div>
                                        @endif
                                        {{ $product->getProductName() }}
                                    </div>
                                </td>
                                <td class="text-center">{{ ucfirst($product->type) }}</td>
                                <td class="text-center">{{ $product->getProductQuantity() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card bg-base-100 shadow-lg mt-8">
        <div class="card-body">
            <h2 class="text"></h2>
        </div>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Biểu đồ doanh thu (giữ nguyên)
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($revenueByMonth->pluck('month')->map(fn($m) => "Tháng $m")) !!},
                datasets: [{
                    label: 'Revenue (VNĐ)',
                    data: {!! json_encode($revenueByMonth->pluck('revenue')) !!},
                    backgroundColor: 'rgba(79, 70, 229, 0.7)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString() + '₫';
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
