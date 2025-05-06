<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    /** @use HasFactory<\Database\Factories\AccessoriesFactory> */
    use HasFactory;

    protected $table = 'accessories';

    protected $primaryKey = 'id';
    protected $fillable = ['name', 'brand_id', 'color', 'type', 'original_price', 'discount', 'promotional_price', 'quantity', 'status', 'image','product_id', 'description'];
    public $timestamps = false;
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
    protected static function booted()
    {
        static::created(function ($accessories) {
            Product::create([
                'accessories_id' => $accessories->id,
                'description' => "$accessories->description",
            ]);
        });

        static::deleted(function ($accessories) {
            Product::where('accessories_id', $accessories->id)->delete();
        });
    }

    // Trong model Accessories.php


}
