<?php

namespace App\Livewire;

use Livewire\Component;

class CartDropdown extends Component
{
    public $cartItems = [];
    public $totalPrice = 0;

    protected $listeners = ['cartUpdated' => 'updateCart'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $cart = session()->get('cart', []);
        $this->cartItems = $cart;
        $this->totalPrice = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    }

    public function render()
    {
        return view('livewire.cart-drop-down');
    }
}
