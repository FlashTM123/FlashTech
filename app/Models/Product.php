<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = ['type', 'type_id'];

    public $timestamps = false;

    public function getProductType()
    {
        return match ($this->type) {
            'laptop' => Laptop::find($this->type_id),
            'component' => Component::find($this->type_id),
            'accessories' => Accessories::find($this->type_id),
            default => null,
        };
    }

    public function getProductName()
    {
        $productDetails = $this->getProductType();
        return $productDetails ? $productDetails->name : null;
    }

    public function getProductPrice()
    {
        $productDetails = $this->getProductType();

        if ($productDetails) {
            return $productDetails->promotional_price ?? $productDetails->original_price;
        }

        return 0; // Return 0 if product not found
    }

    public function getProductOriginalPrice()
    {
        $productDetails = $this->getProductType();
        return $productDetails ? $productDetails->original_price : 0;
    }

    public function getProductImage()
    {
        $productDetails = $this->getProductType();
        return $productDetails ? $productDetails->image : null;

    }
    public function laptop() {
        return $this->hasOne(Laptop::class, 'product_id', 'id');
    }

    public function component() {
        return $this->hasOne(Component::class, 'product_id', 'id');
    }

    public function accessories() {
        return $this->hasOne(Accessories::class, 'product_id', 'id');
    }

}
