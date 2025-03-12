@extends("app")

@section('title', 'Manage Page')

@section("content")
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card: Tổng doanh thu -->
            <div class="card bg-base-100 shadow-xl hover:bg-gray-700 transition-colors">
                <div class="card-body">
                    <h3 class="card-title">Total Sales</h3>
                    <p class="text-2xl font-semibold text-blue-400 mt-2">$12,345</p>
                </div>
            </div>

            <!-- Card: Đơn hàng mới -->
            <div class="card bg-base-100 shadow-xl hover:bg-gray-700 transition-colors">
                <div class="card-body">
                    <h3 class="card-title">New Orders</h3>
                    <p class="text-2xl font-semibold text-green-400 mt-2">56</p>
                </div>
            </div>

            <!-- Card: Khách hàng -->
            <div class="card bg-base-100 shadow-xl hover:bg-gray-700 transition-colors">
                <div class="card-body">
                    <h3 class="card-title">Customers</h3>
                    <p class="text-2xl font-semibold text-orange-400 mt-2">1,234</p>
                </div>
            </div>

            <!-- Card: Doanh thu -->
            <div class="card bg-base-100 shadow-xl hover:bg-gray-700 transition-colors">
                <div class="card-body">
                    <h3 class="card-title">Revenue</h3>
                    <p class="text-2xl font-semibold text-purple-400 mt-2">$89,000</p>
                </div>
            </div>
        </div>

        <!-- Chart: Revenue Over Time -->
        <div class="mt-8 p-6 bg-base-100 shadow-xl rounded-lg">
            <h3 class="text-xl font-bold mb-4">Revenue Over Time</h3>
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Revenue',
                        data: [12000, 15000, 13000, 14000, 16000, 17000, 18000],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
