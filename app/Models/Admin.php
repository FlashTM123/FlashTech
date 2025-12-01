<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{

    use HasFactory;
    use Authenticatable;
    protected $connection = 'mongodb';
    protected $table = 'admin';

    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email','profile_image', 'password', 'phone', 'role', 'status', 'created_at','updated_at'];

    protected $hidden = ['password'];



    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'admin_id', 'id');
    }
}
