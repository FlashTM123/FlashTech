<?php

namespace App\Http\Controllers;

use App\Models\manage;
use App\Models\Admin;

use App\Http\Requests\StoremanageRequest;
use App\Http\Requests\UpdatemanageRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;


class ManageController extends Controller
{



    public function index()
    {
        // Mảng ánh xạ type_id sang tên sản phẩm
        $typeNames = [
            1 => 'Laptop',
            2 => 'Component',
            3 => 'Accessory',
        ];

        $totalOrders = Order::count(); // Tổng số đơn hàng
        $totalProducts = Product::count(); // Tổng số sản phẩm
        $totalCustomers = Customer::count(); // Tổng số khách hàng
        // Lấy danh sách sản phẩm bán chạy
        $outofStockProducts = Product::all()->filter(function ($product) {
            return $product->getProductQuantity() == 0;
        });
        $revenueByYear = Order::sum('total_price'); // Tổng doanh thu của tất cả các năm
       $completedOrders = Order::where('status', 'completed')->count(); // Tổng số đơn hàng đã hoàn thành
       $canceledOrders = Order::where('status', 'cancelled')->count(); // Tổng số đơn hàng đã hủy
        $bestSellingProducts = Product::withSum('orderDetails', 'quantity')
            ->having('order_details_sum_quantity', '>', 0)
            ->orderByDesc('order_details_sum_quantity')
            ->take(5)
            ->get()
            ->map(function ($product) use ($typeNames) {
                // Gán tên sản phẩm dựa trên type_id
                $product->type_name = $typeNames[$product->type_id] ?? 'Không xác định';
                return $product;
            });

        // Lấy dữ liệu doanh thu theo tháng (nếu cần)
        $revenueByMonth = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $lowStockProducts = Product::all()->filter(function ($product) {
            return $product->getProductQuantity() < 10 && $product->getProductQuantity() > 0;
        });

        return view(
            'manage.index',
            compact(
                'revenueByMonth',
                'bestSellingProducts',
                'lowStockProducts',
                'totalOrders',
                'totalProducts',
                'totalCustomers',
                'outofStockProducts',
                'completedOrders',
                'canceledOrders',
                'revenueByYear'
            )
        ); // Load trang quản lý
    }


}
