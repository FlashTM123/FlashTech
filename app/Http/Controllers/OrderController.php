<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $orders = Order::with('customer')->get(); // Lấy danh sách đơn hàng
       return view('order.index', compact('orders')); // Trả về viewers = Order::all();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function updatePaymentMethod(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::findOrFail($id);

        // Cập nhật phương thức thanh toán
        $order->update([
            'payment_method' => $request->input('payment_method'),
        ]);

        // Chuyển hướng lại trang danh sách đơn hàng với thông báo thành công
        return redirect()->route('orders.index')->with('success', 'Payment method updated successfully.');
    }
}
