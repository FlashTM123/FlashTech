<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use App\Models\Product;

class Laptop extends Model
{
    protected $connection = 'mongodb';

    /** @use HasFactory<\Database\Factories\LaptopFactory> */
    use HasFactory;

    protected $table = 'laptops';

    protected $primaryKey = 'id';
    protected $fillable = ['name', 'brand_id', 'color', 'cpu', 'ram', 'vga', 'storage', 'original_price', 'discount', 'promotional_price', 'quantity', 'status', 'image', 'description'];

    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'laptop_id', 'id');
    }

    // Thêm sự kiện created
    protected static function booted()
    {
        static::created(function ($laptop) {
            Product::create([
                'laptop_id' => $laptop->id,
                'description' => $laptop->description,
            ]);
        });

        static::deleted(function ($laptop) {
            Product::where('laptop_id', $laptop->id)->delete();
        });
    }
}
