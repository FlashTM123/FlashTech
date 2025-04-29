<?php

namespace App\Livewire;

use Livewire\Component;



class CartIcon extends Component
{
    public $cartCount = 0;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        $this->updateCartCount();
    }
    public function updateCartCount()
    {
        $cart = session()->get('cart', []);
        $this->cartCount = count($cart);

    }
    public function render()
    {
        return view('livewire.cart-icon');
    }
}
