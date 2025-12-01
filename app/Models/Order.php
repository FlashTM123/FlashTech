<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $connection = 'mongodb';

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = ['customer_id', 'payment_method', 'total_price', 'status', 'address','admin_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function items()
    {
        return $this->hasMany(Orderdetail::class, 'order_id', 'id');
    }

    public function getTotalPriceWithShippingAttribute()
    {
        return $this->total_price + $this->shipping_fee; // Tổng tiền bao gồm phí ship
    }
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id', 'id');
    }
}
