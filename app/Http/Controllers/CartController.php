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
        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity']++;
        } else {
            $cart[$request->product_id] = [
                'name' => $request->product_name,
                'quantity' => 1,
                'price' => $request->product_price,
                'image' => $request->product_image,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('customer.cart')->with('success', 'Product added to cart successfully!');
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
        $cart = session()->get('cart', []);
        $subtotal = array_sum(array_map(function ($item) {
            return $item['quantity'] * $item['price'];
        }, $cart));

        return view('customer.checkout', compact('cart', 'subtotal'));
    }

    public function processCheckout(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('customer.cart')->with('error', 'Your cart is empty.');
        }

        // Lưu thông tin đơn hàng vào cơ sở dữ liệu (ví dụ)
        $order = Order::create([
            'customer_id' => session('customer')->id,
            'address' => $request->input('address'),
            'payment_method' => $request->input('payment_method'),
            'total' => array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart)),
            'status' => 'pending', // Đơn hàng đang chờ xử lý
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

        return redirect()->route('customer.home')->with('success', 'Order placed successfully! Your order will be delivered soon.');
    }
}
