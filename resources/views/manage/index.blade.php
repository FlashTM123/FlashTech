@extends("app")

@section('title', 'Thống kê')

@section("content")
<div class="container mx-auto px-4 py-8">
    <!-- Tiêu đề với icon -->
    <h1 class="text-3xl font-bold mb-6 flex items-center gap-2">
        <i class="fas fa-chart-pie text-primary"></i>
        Thống kê
    </h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Thống kê đơn hàng -->
        <div class="card bg-base-100 shadow-lg">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    <i class="fas fa-shopping-cart text-blue-500"></i>
                    Tổng số đơn hàng
                </h2>
                <p class="text-3xl font-bold text-primary">{{ $totalOrders }}</p>
            </div>
        </div>


        <!-- Thống kê sản phẩm -->
        <div class="card bg-base-100 shadow-lg">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    <i class="fas fa-box-open text-green-500"></i>
                    Tổng số sản phẩm
                </h2>
                <p class="text-3xl font-bold text-primary">{{ $totalProducts }}</p>
            </div>
        </div>
        <!-- Thống kê khách hàng -->
        <div class="card bg-base-100 shadow-lg">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    <i class="fas fa-users text-red-500"></i>
                    Tổng số khách hàng
                </h2>
                <p class="text-3xl font-bold text-primary">{{ $totalCustomers }}</p>
            </div>
        </div>
        <!-- Thống kê đơn hàng hoàn thành -->
        <div class="card bg-base-100 shadow-lg">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    <i class="fas fa-check-circle text-yellow-500"></i>
                    Đơn hàng đã hoàn thành
                </h2>
                <p class="text-3xl font-bold text-primary">{{ $completedOrders }}</p>
            </div>
        </div>
        <!-- Thống kê đơn hàng bị hủy -->
        <div class="card bg-base-100 shadow-lg">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    <i class="fas fa-times-circle text-red-500"></i>
                    Đơn hàng đã hủy
                </h2>
                <p class="text-3xl font-bold text-primary">{{ $canceledOrders }}</p>
            </div>
        </div>

        <!-- Thống kê doanh thu -->
        <div class="card bg-base-100 shadow-lg">
            <div class="card-body">
                <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    <i class="fas fa-money-bill-wave text-green-500"></i>
                    Doanh thu theo năm
                </h2>
                <p class="text-3xl font-bold text-primary">{{ number_format($revenueByYear, 0, ',', '.') }} VNĐ</p>
            </div>
        </div>

    </div>

    <!-- Biểu đồ doanh thu -->
    <div class="card bg-base-100 shadow-lg mb-8">
        <div class="card-body">
            <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                <i class="fas fa-money-bill-wave text-green-500"></i>
                Doanh thu theo tháng
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

                                <td class="text-center">{{ $product->getProductQuantity() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bảng sản phẩm đã hết hàng -->
    <div class="card bg-base-100 shadow-lg mt-8">
        <div class="card-body">
            <h2 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                <i class="fas fa-times-circle text-red-500"></i>
                Sản phẩm đã hết hàng
            </h2>
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr class="bg-base-200">
                            <th class="text-center">#</th>
                            <th>Tên sản phẩm</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($outofStockProducts as $index => $product)
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

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-gray-500">Không có sản phẩm nào đã hết hàng.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class=""></div>


</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Tạo danh sách các tháng từ 1 đến 12
        const allMonths = Array.from({ length: 12 }, (_, i) => `Tháng ${i + 1}`);

        // Dữ liệu doanh thu từ backend
        const revenueData = {!! json_encode($revenueByMonth->pluck('revenue', 'month')) !!};

        // Chuẩn hóa dữ liệu để đảm bảo có đủ 12 tháng
        const normalizedData = allMonths.map((month, index) => {
            const monthNumber = index + 1; // Tháng bắt đầu từ 1
            return revenueData[monthNumber] || 0; // Nếu không có dữ liệu, mặc định là 0
        });

        // Mảng màu cho từng tháng
        const colors = [
            'rgba(255, 99, 132, 0.8)',  // Tháng 1
            'rgba(54, 162, 235, 0.8)', // Tháng 2
            'rgba(255, 206, 86, 0.8)', // Tháng 3
            'rgba(75, 192, 192, 0.8)', // Tháng 4
            'rgba(153, 102, 255, 0.8)',// Tháng 5
            'rgba(255, 159, 64, 0.8)', // Tháng 6
            'rgba(199, 199, 199, 0.8)',// Tháng 7
            'rgba(83, 102, 255, 0.8)', // Tháng 8
            'rgba(255, 99, 71, 0.8)',  // Tháng 9
            'rgba(60, 179, 113, 0.8)', // Tháng 10
            'rgba(123, 104, 238, 0.8)',// Tháng 11
            'rgba(255, 215, 0, 0.8)'   // Tháng 12
        ];

        // Biểu đồ doanh thu
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: allMonths, // Hiển thị tất cả các tháng
                datasets: [{
                    label: 'Doanh thu (VNĐ)',
                    data: normalizedData, // Dữ liệu đã chuẩn hóa
                    backgroundColor: colors, // Áp dụng màu sắc cho từng tháng
                    borderColor: colors.map(color => color.replace('0.8', '1')), // Đường viền đậm hơn
                    borderWidth: 1,
                    borderRadius: 8,
                    hoverBackgroundColor: colors.map(color => color.replace('0.8', '1')) // Màu khi hover
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            font: {
                                size: 14,
                                family: 'Arial, sans-serif',
                                weight: 'bold'
                            },
                            color: '#4f46e5'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                // Định dạng số tiền trong tooltip
                                return context.raw.toLocaleString('vi-VN') + ' ₫';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            color: '#6b7280'
                        },
                        barPercentage: 0.6,
                        categoryPercentage: 0.8
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            // Định dạng số tiền trên trục Y
                            callback: function(value) {
                                return value.toLocaleString('vi-VN') + ' ₫';
                            },
                            font: {
                                size: 12
                            },
                            color: '#6b7280'
                        },
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)'
                        }
                    }
                },
                layout: {
                    padding: {
                        top: 20,
                        bottom: 20,
                        left: 10,
                        right: 10
                    }
                },
                elements: {
                    bar: {
                        maxBarThickness: 50
                    }
                },
                animation: {
                    duration: 1000,
                    easing: 'easeOutBounce'
                }
            }
        });
    });
</script>
@endsection
