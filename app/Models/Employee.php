<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'date_of_birth',
        'hire_date',
        'salary',
        'is_active',
        'department_id',
        'manager_id',
        'address',
        'profile_picture',
    ];
}
