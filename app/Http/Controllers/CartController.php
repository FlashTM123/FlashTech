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
            'name' => $detail->name ?? $product->name, // Lấy tên từ bảng liên quan hoặc bảng products
            'price' => $price, // Lấy giá từ bảng liên quan hoặc bảng products
            'image' => $product->getProductImage(), // Lấy hình ảnh từ phương thức
            'quantity' => isset($cart[$product->id]) ? $cart[$product->id]['quantity'] + 1 : 1,
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
        $cart = session('cart', []); // Lấy giỏ hàng từ session
        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $shippingFee = 30000; // Phí vận chuyển cố định
        $total = $subtotal + $shippingFee;

        // Lấy thông tin người dùng từ session
        $customer = session('customer');
        $address = $customer->address ?? ''; // Lấy địa chỉ từ thông tin người dùng, nếu không có thì để trống

        // Truyền dữ liệu vào view
        return view('customer.checkout', compact('cart', 'subtotal', 'shippingFee', 'total', 'address'));
    }

    public function processCheckout(Request $request)
    {
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
                flash()->options(['position' => 'bottom-center'])->error('Sản phẩm ' . $product['name']  . ' không đủ số lượng trong kho.');
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
