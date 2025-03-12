<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardLaptop extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $image,
        public string $name,
        public string $cpu,
        public string $ram,
        public string $storage,
        public string $gpu,
        public string $quantity,
        public string $price1,
        public string $price2,
        public string $discount
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-laptop');
    }
}
