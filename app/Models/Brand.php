<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\BrandFactory> */
    use HasFactory;

    protected $table = 'brands';

    protected $primaryKey = 'id';

    protected $fillable = ['name','category'];

    public $timestamps = false;

    public function laptops(){
        return $this->hasMany(Laptop::class);
    }

    public function components(){
        return $this->hasMany(Component::class);
    }

    public function accessories(){
        return $this->hasMany(Accessories::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
