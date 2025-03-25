<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductDetail extends Component
{
    public Product $product;
    public $detail;
    public function __construct(Product $product, $detail)
    {
        $this->product = $product;
        $this->detail = $detail;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-detail');
    }
}
