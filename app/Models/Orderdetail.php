<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderdetailFactory> */
    use HasFactory;

    protected $table = "orderdetails";
    protected $fillable = ['order_id', 'product_id', 'product_type', 'quantity', 'price'];

    public function product(){
        return match ($this->product_type) {
            'laptop' => Laptop::find($this->product_id),
            'component' => Component::find($this->product_id),
            'accessories' => Accessories::find($this->product_id),
            default => null,
        };
    }
}
