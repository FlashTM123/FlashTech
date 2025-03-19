<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardComponent extends Component
{
    public $image;
    public $name;
    public $type;
    public $storage;
    public $price1;
    public $discount;
    public $price2;
    public $quantity;
    public function __construct(
        $image,
        $name,
        $type,
        $storage,
        $price1,
        $discount,
        $price2,
        $quantity,
    )
    {
        $this->image = $image;
        $this->name = $name;
        $this->type = $type;
        $this->storage = $storage;
        $this->price1 = $price1;
        $this->discount = $discount;
        $this->price2 = $price2;
        $this->quantity = $quantity;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-component');
    }
}
