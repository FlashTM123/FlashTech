<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardLaptop extends Component

{
    public $image;
    public $name;
    public $cpu;
    public $ram;
    public $storage;
    public $vga;
    public $quantity;
    public $price1;
    public $discount;
    public $price2;
    public function __construct(
        $image,
        $name,
        $cpu,
        $ram,
        $storage,
        $vga,
        $quantity,
        $price1,
        $discount,
        $price2,
    )
    {
        $this->image = $image;
        $this->name = $name;
        $this->cpu = $cpu;
        $this->ram = $ram;
        $this->storage = $storage;
        $this->vga = $vga;
        $this->quantity = $quantity;
        $this->price1 = $price1;
        $this->discount = $discount;
        $this->price2 = $price2;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-laptop');
    }
}
