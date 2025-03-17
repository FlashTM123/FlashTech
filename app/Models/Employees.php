<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeesFactory> */
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'address','email', 'password','phone','role'];
    public $timestamps = false;
}
