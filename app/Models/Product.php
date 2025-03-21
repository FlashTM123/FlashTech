<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = ['name','type', 'type_id', 'price'];

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

}
