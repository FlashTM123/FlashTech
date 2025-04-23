<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;

class CartController extends Controller
{


    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('customer.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $cart = session()->get('cart', []);

        $cart[$request->product_id] = [
            'name' => $request->product_name,
            'price' => $request->product_price,
            'image' => $request->product_image, // Đảm bảo lưu thông tin hình ảnh
            'quantity' => isset($cart[$request->product_id]) ? $cart[$request->product_id]['quantity'] + 1 : 1,
        ];

        session()->put('cart', $cart);
        flash()->options(['position' => 'bottom-center'])->success('Sản phẩm đã được thêm vào giỏ hàng.');
        return Redirect::route('customer.home');
    }


    public function updateCart(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Lấy sản phẩm có id và số lượng muốn cập nhật
        $products = $request->product;
        // Lấy cart
        $cart = session()->get('cart', []);
        foreach ($products as $id => $quantity) {
            $cart[$id]['quantity'] = $quantity;
        }
        session()->put('cart', $cart);
        return Redirect::route('customer.cart');
    }
    public function updateQuantity(Request $request): \Illuminate\Http\JsonResponse
{
    $cart = session()->get('cart', []);
    $id = $request->input('id');
    $quantity = $request->input('quantity');

    if (isset($cart[$id])) {
        $cart[$id]['quantity'] = $quantity;
        session()->put('cart', $cart);
    }

    return response()->json(['success' => true]);
}

    public function remove($id): \Illuminate\Http\RedirectResponse
    {
        // Lấy cart
        $cart = session()->get('cart', []);
        // Xóa sản phẩm khỏi cart
        unset($cart[$id]);
        // Cập nhật lại session
        session()->put('cart', $cart);
        return Redirect::route('customer.cart');
    }

    public function removeAll(): \Illuminate\Http\RedirectResponse
    {
        session()->forget('cart');
        return Redirect::route('customer.cart');
    }

    public function checkout()
    {
        $cart = session('cart', []); // Retrieve the cart from the session
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $shippingFee = 30000; // Fixed shipping fee
        $total = $subtotal + $shippingFee;

        // Pass the cart and other variables to the view
        return view('customer.checkout', compact('cart', 'subtotal', 'shippingFee', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('customer.cart')->with('error', 'Your cart is empty.');
        }

        $shippingFee = 30000; // Phí vận chuyển cố định
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));
        $totalPrice = $subtotal + $shippingFee; // Tổng tiền bao gồm phí ship

        $order = Order::create([
            'customer_id' => session('customer')->id,
            'address' => $request->input('address'),
            'payment_method' => $request->input('payment_method'),
            'total_price' => $totalPrice, // Lưu tổng tiền đã bao gồm phí ship
            'shipping_fee' => $shippingFee, // Lưu phí ship riêng
            'status' => 'pending',
        ]);

        foreach ($cart as $id => $product) {
            $order->items()->create([
                'product_id' => $id,
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }

        // Xóa giỏ hàng sau khi đặt hàng thành công
        session()->forget('cart');

        // Xử lý theo phương thức thanh toán
        if ($request->input('payment_method') === 'bank_transfer') {
            return redirect()->route('customer.bankTransferInstructions')->with('success', 'Order placed successfully! Please follow the bank transfer instructions.');
        }
        flash()->options(['position' => 'bottom-center'])->success('Đặt hàng thành công!');
        return Redirect::route('customer.home');
    }
    public function buyNow($id)
{
    // Lấy thông tin sản phẩm
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);
    // Kiểm tra số lượng sản phẩm
    if ($product->getProductQuantity() <= 0) {
        return redirect()->back()->with('error', 'Sản phẩm này hiện đã hết hàng.');
    }

    // Chuyển hướng đến trang thanh toán với sản phẩm
    return view('customer.checkout', compact('product'));
}
}
