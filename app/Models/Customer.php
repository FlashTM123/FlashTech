<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $table = 'customers';

    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'date_of_birth', 'gender', 'address', 'phone', 'email','password'];
    public $timestamps = false;
}
