<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Orderdetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderdetailFactory> */
    use HasFactory;
    protected $connection = 'mongodb';

    protected $table = "orderdetails";
    protected $fillable = ['order_id', 'product_id', 'product_type', 'quantity', 'price'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
