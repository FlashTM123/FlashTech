<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
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
        // Lấy tất cả orders và sắp xếp trong PHP (MongoDB không hỗ trợ orderByRaw)
        $allOrders = Order::with(['customer', 'admin'])
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo mới nhất
            ->get();

        // Sắp xếp trong PHP: Pending lên trước, sau đó các status khác
        $sorted = $allOrders->sort(function ($a, $b) {
            $statusOrder = ['Pending' => 0, 'Confirmed' => 1, 'Shipped' => 2, 'Delivered' => 3, 'Cancelled' => 4];
            $aOrder = $statusOrder[$a->status] ?? 5;
            $bOrder = $statusOrder[$b->status] ?? 5;
            return $aOrder <=> $bOrder;
        })->values();

        // Phân trang thủ công từ collection
        $perPage = 10;
        $page = request()->get('page', 1);
        $items = $sorted->forPage($page, $perPage);

        $orders = new \Illuminate\Pagination\Paginator(
            $items,
            $perPage,
            $page,
            [
                'path' => request()->url(),
                'query' => request()->query(),
            ]
        );

        return view('Admins.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['product_id']);

        // Kiểm tra nếu số lượng sản phẩm đủ
        if ($product->quantity < $validated['quantity']) {
            return back()->with('error', 'Không đủ số lượng sản phẩm trong kho.');
        }

        // Giảm số lượng sản phẩm
        $product->quantity -= $validated['quantity'];
        $product->save();

        // Tạo đơn hàng (nếu cần)
        Order::create([
            'product_id' => $product->id,
            'customer_id' => auth()->id(),
            'quantity' => $validated['quantity'],
            'total_price' => $product->price * $validated['quantity'],
        ]);

        return back()->with('success', 'Mua hàng thành công!');
    }

    public function updateStatus(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $order = Order::findOrFail($id);

        // Cập nhật trạng thái và admin_id
        $order->update([
            'status' => $request->input('status'),
            'admin_id' => auth('admin')->id(),
        ]);

        // Chuyển hướng lại trang danh sách đơn hàng với thông báo thành công
        flash()->options(['position' => 'bottom-center'])->success('Cập nhật trạng thái đơn hàng thành công!');
        return redirect()->route('order.index');
    }
    public function show($id){
        $order = Order::with('items.product')->findOrFail($id); // Lấy thông tin đơn hàng theo ID

        return view('Admins.order.show', compact('order')); // Trả về view với thông tin đơn hàng
    }
}
