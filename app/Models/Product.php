<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = ['laptop_id', 'component_id', 'accessories_id', 'description'];

    public $timestamps = false;

    // Quan hệ với Laptop
    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }

    // Quan hệ với Component
    public function component()
    {
        return $this->belongsTo(Component::class);
    }

    // Quan hệ với Accessories
    public function accessories()
    {
        return $this->belongsTo(Accessories::class);
    }

    // Quan hệ với OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(Orderdetail::class, 'product_id');
    }

    // Quan hệ với Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Lấy tên sản phẩm
    public function getProductName()
    {
        return $this->laptop?->name ?? $this->component?->name ?? $this->accessories?->name;
    }

    // Lấy giá sản phẩm
    public function getProductPrice()
    {
        $productDetails = $this->laptop ?? $this->component ?? $this->accessories;

        if ($productDetails) {
            return $productDetails->promotional_price ?? $productDetails->original_price;
        }

        return 0; // Trả về 0 nếu không tìm thấy sản phẩm
    }

    // Lấy giá gốc của sản phẩm
    public function getProductOriginalPrice()
    {
        return $this->laptop?->original_price ?? $this->component?->original_price ?? $this->accessories?->original_price ?? 0;
    }

    // Lấy hình ảnh sản phẩm
    public function getProductImage()
    {
        return $this->laptop?->image ?? $this->component?->image ?? $this->accessories?->image;
    }

    // Lấy giảm giá của sản phẩm
    public function getProductDiscount()
    {
        return $this->laptop?->discount ?? $this->component?->discount ?? $this->accessories?->discount;
    }

    // Lấy số lượng sản phẩm
    public function getProductQuantity()
    {
        return $this->laptop?->quantity ?? $this->component?->quantity ?? $this->accessories?->quantity;
    }
    public function getProductColor()
    {
        return $this->laptop?->color ?? $this->component?->color ?? $this->accessories?->color;
    }
}
