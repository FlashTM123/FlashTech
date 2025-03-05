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
    protected $fillable = ['name', 'brand_id', 'color_id', 'type', 'price', 'quantity', 'image'];
    public $timestamps = false;
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function color(){
        return $this->belongsTo(Color::class, 'color_id');
    }
}
