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
        $orders = Order::with('customer')->paginate(6);




        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function updateStatus(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::findOrFail($id);

        // Cập nhật trạng thái
        $order->update([
            'status' => $request->input('status'),
        ]);

        // Chuyển hướng lại trang danh sách đơn hàng với thông báo thành công
        return redirect()->route('order.index')->with('success', 'Order status updated successfully.');
    }
    public function show($id){
        $order = Order::with('items.product')->findOrFail($id); // Lấy thông tin đơn hàng theo ID

        return view('order.show', compact('order')); // Trả về view với thông tin đơn hàng
    }
}
