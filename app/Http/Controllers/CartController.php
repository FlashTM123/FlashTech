<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function isLoggedIn()
    {
        // Kiểm tra nhiều cách đăng nhập khác nhau
        return Auth::check() || 
               session()->has('customer') || 
               session()->has('user') || 
               session()->has('logged_in');
    }

    private function redirectToLogin()
    {
        flash()->options(['position' => 'bottom-center'])->error('Vui lòng đăng nhập để tiếp tục.');
        return redirect()->route('customer.login');
    }

    public function cart()
    {
        if (!$this->isLoggedIn()) {
            return $this->redirectToLogin();
        }

        $cart = session()->get('cart', []);

        // Kiểm tra sản phẩm trong giỏ hàng có tồn tại trong bảng products
        foreach ($cart as $id => $product) {
            if (!Product::find($id)) {
                unset($cart[$id]); // Xóa sản phẩm không tồn tại
            }
        }

        // Cập nhật lại giỏ hàng trong session
        session()->put('cart', $cart);

        return view('customer.cart', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        if (!$this->isLoggedIn()) {
            return $this->redirectToLogin();
        }

        $cart = session()->get('cart', []);

        // Lấy thông tin sản phẩm từ cơ sở dữ liệu
        $product = Product::with(['laptop', 'component', 'accessories'])->findOrFail($request->product_id);

        // Kiểm tra loại sản phẩm và lấy thông tin chi tiết
        $detail = $product->laptop ?? $product->component ?? $product->accessories;

        // Kiểm tra và lấy giá từ bảng liên quan hoặc bảng products
        $price = $detail->promotional_price ?? ($detail->original_price - ($detail->original_price * $detail->discount / 100)) ?? $product->price;

        if (is_null($price)) {
            return redirect()->route('customer.cart')->with('error', 'Sản phẩm không có giá hợp lệ.');
        }

        $cart[$product->id] = [
            'name' => $detail->name ?? $product->name,
            'price' => $price,
            'image' => $product->getProductImage(),
            'quantity' => isset($cart[$product->id]) ? $cart[$product->id]['quantity'] + 1 : 1,
        ];

        session()->put('cart', $cart);
        flash()->options(['position' => 'bottom-center'])->success('Sản phẩm đã được thêm vào giỏ hàng.');
        return Redirect::route('customer.home');
    }

    public function updateCart(Request $request): \Illuminate\Http\RedirectResponse
    {
        if (!$this->isLoggedIn()) {
            return $this->redirectToLogin();
        }

        $products = $request->product;
        $cart = session()->get('cart', []);
        foreach ($products as $id => $quantity) {
            $cart[$id]['quantity'] = $quantity;
        }
        session()->put('cart', $cart);
        return Redirect::route('customer.cart');
    }

    public function updateQuantity(Request $request): \Illuminate\Http\JsonResponse
    {
        if (!$this->isLoggedIn()) {
            return response()->json(['success' => false, 'message' => 'Vui lòng đăng nhập.']);
        }

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
        if (!$this->isLoggedIn()) {
            return $this->redirectToLogin();
        }

        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);
        return Redirect::route('customer.cart');
    }

    public function removeAll(): \Illuminate\Http\RedirectResponse
    {
        if (!$this->isLoggedIn()) {
            return $this->redirectToLogin();
        }

        session()->forget('cart');
        return Redirect::route('customer.cart');
    }

    public function checkout()
    {
        if (!$this->isLoggedIn()) {
            return $this->redirectToLogin();
        }

        $cart = session('cart', []);
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $shippingFee = 30000;
        $total = $subtotal + $shippingFee;

        $customer = session('customer') ?? Auth::user();
        $address = $customer->address ?? '';

        return view('customer.checkout', compact('cart', 'subtotal', 'shippingFee', 'total', 'address'));
    }

    public function processCheckout(Request $request)
    {
        if (!$this->isLoggedIn()) {
            return $this->redirectToLogin();
        }

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('customer.cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $shippingFee = 30000; // Phí vận chuyển cố định
        $subtotal = 0;

        foreach ($cart as $id => $product) {
            // Lấy sản phẩm từ cơ sở dữ liệu
            $dbProduct = Product::find($id);
            if (!$dbProduct) {
                unset($cart[$id]); // Xóa sản phẩm không tồn tại khỏi giỏ hàng
                continue;
            }

            // Kiểm tra số lượng sản phẩm trong kho
            if ($dbProduct->getProductQuantity() < $product['quantity']) {
                flash()->options(['position' => 'bottom-center'])->error('Sản phẩm ' . $product['name']  . ' hiện không đủ số lượng trong kho.');
                return redirect()->route('customer.cart');
            }

            // Giảm số lượng sản phẩm trong kho
            if ($dbProduct->laptop) {
                $dbProduct->laptop->decrement('quantity', $product['quantity']);
            } elseif ($dbProduct->component) {
                $dbProduct->component->decrement('quantity', $product['quantity']);
            } elseif ($dbProduct->accessories) {
                $dbProduct->accessories->decrement('quantity', $product['quantity']);
            }

            $subtotal += $product['price'] * $product['quantity'];
        }

        // Cập nhật lại giỏ hàng trong session
        session()->put('cart', $cart);

        if (empty($cart)) {
            return redirect()->route('customer.cart')->with('error', 'Một số sản phẩm trong giỏ hàng không còn tồn tại.');
        }

        $totalPrice = $subtotal + $shippingFee; // Tổng tiền bao gồm phí ship

        // Tạo đơn hàng
        $order = Order::create([
            'customer_id' => session('customer')->id,
            'address' => $request->input('address'),
            'payment_method' => $request->input('payment_method'),
            'total_price' => $totalPrice, // Lưu tổng tiền đã bao gồm phí ship
            'shipping_fee' => $shippingFee, // Lưu phí ship riêng
            'status' => 'pending',
        ]);

        // Lưu chi tiết đơn hàng
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
            return redirect()->route('customer.bankTransferInstructions')->with('success', 'Đặt hàng thành công! Vui lòng làm theo hướng dẫn chuyển khoản.');
        }

        flash()->options(['position' => 'bottom-center'])->success('Đặt hàng thành công!');
        return Redirect::route('customer.home');
    }
}
