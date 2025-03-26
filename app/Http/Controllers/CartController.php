<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function checkout()
    {
        // Implement checkout logic here
        return view('customer.checkout');
    }
}
