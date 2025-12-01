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
       $canceledOrders = Order::where('status', 'Cancel')->count(); // Tổng số đơn hàng đã hủy
        $bestSellingProducts = Product::all()
            ->map(function ($product) use ($typeNames) {
                // Tính tổng số lượng bán của sản phẩm
                $totalQuantity = $product->orderDetails()->sum('quantity') ?? 0;
                $product->order_details_sum_quantity = $totalQuantity;
                $product->type_name = $typeNames[$product->type_id] ?? 'Không xác định';
                return $product;
            })
            ->filter(function ($product) {
                return $product->order_details_sum_quantity > 0;
            })
            ->sortByDesc('order_details_sum_quantity')
            ->take(5)
            ->values();

        // Lấy dữ liệu doanh thu theo tháng (nếu cần)
        $allOrders = Order::all();
        $revenueByMonth = $allOrders->groupBy(function ($order) {
            return \Carbon\Carbon::parse($order->created_at)->format('m');
        })->map(function ($orders, $month) {
            return [
                'month' => $month,
                'revenue' => $orders->sum('total_price')
            ];
        })->values();
        $lowStockProducts = Product::all()->filter(function ($product) {
            return $product->getProductQuantity() < 10 && $product->getProductQuantity() > 0;
        });

        return view(
            'Admins.manage.index',
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
