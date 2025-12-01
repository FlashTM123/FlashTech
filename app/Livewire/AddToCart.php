<?php

namespace App\Livewire;

use Livewire\Component;

class AddToCart extends Component
{
    public $product;

    public function addToCart()
    {
        try {
            // Lấy giỏ hàng từ session
            $cart = session()->get('cart', []);

            // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
            if (isset($cart[$this->product->id])) {
                $cart[$this->product->id]['quantity']++;
            } else {
                $cart[$this->product->id] = [
                    'id' => $this->product->id,
                    'name' => $this->product->getProductName(),
                    'price' => $this->product->getProductPrice(),
                    'image' => $this->product->getProductImage(),
                    'quantity' => 1,
                ];
            }

            // Lưu giỏ hàng vào session
            session()->put('cart', $cart);

            // Dispatch event để cập nhật giỏ hàng
            $this->dispatch('cartUpdated');
            $this->dispatch('cart-updated');

            // Hiển thị thông báo thành công với SweetAlert
            $this->js('Swal.fire({icon: "success", title: "✅ Thành công", text: "Sản phẩm đã được thêm vào giỏ hàng", timer: 2000, showConfirmButton: false})');
        } catch (\Exception $e) {
            $this->js('Swal.fire({icon: "error", title: "❌ Lỗi", text: "' . $e->getMessage() . '"})');
        }
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
