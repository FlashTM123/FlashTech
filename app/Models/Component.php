<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /** @use HasFactory<\Database\Factories\ComponentFactory> */
    use HasFactory;

    protected $table = 'components';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'brand_id', 'type', 'capacity', 'price', 'quantity', 'image' ];

    public $timestamps = false;

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}
