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

        // Lấy danh sách sản phẩm bán chạy
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
            

        return view('manage.index', compact('revenueByMonth', 'bestSellingProducts')); // Load trang quản lý
    }


}
