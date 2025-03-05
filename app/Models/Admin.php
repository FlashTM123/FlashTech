<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{

    use HasFactory;
    use Authenticatable;
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password', 'phone'];

    protected $hidden = ['password'];

    public $timestamps = false;


}
