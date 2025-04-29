<?php

namespace App\Livewire;

use Livewire\Component;

class AddToCart extends Component
{
    public $product;

    public function addToCart()
    {
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

        // Gửi thông báo thành công
        $this->dispatch('cartUpdated'); // Sự kiện để cập nhật giỏ hàng
        flash()->options(['position' => 'bottom-center'])->success('Sản phẩm đã được thêm vào giỏ hàng.');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
