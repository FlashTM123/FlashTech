<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    use Authenticatable;

    protected $table = 'customers';


    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'date_of_birth', 'gender', 'address', 'phone', 'email','password','created_at','image','updated_at'];

    protected $casts = [
        'date_of_birth' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
