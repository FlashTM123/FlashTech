<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    /** @use HasFactory<\Database\Factories\LaptopFactory> */
    use HasFactory;

    protected $table = 'laptops';

    protected $primaryKey = 'id';
    protected $fillable = ['name', 'brand_id', 'color', 'cpu', 'ram', 'vga', 'storage', 'original_price', 'discount', 'promotional_price', 'quantity', 'status', 'image'];

    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    public function product()
    {
        return $this->hasOne(Product::class, 'laptop_id', 'id');
    }



}
