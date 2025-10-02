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
        $orders = Order::with(['customer', 'admin'])
            ->orderByRaw("FIELD(status, 'Pending') DESC") // Đưa trạng thái "Pending" lên đầu
            ->orderBy('created_at', 'desc') // Sắp xếp theo ngày tạo mới nhất
            ->paginate(10); // Phân trang

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
