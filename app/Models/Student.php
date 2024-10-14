<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'classroom_id',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    // Quan hệ với model Passport (1-1)
    public function passport()
    {
        return $this->hasOne(Passport::class);
    }

    // Quan hệ với model Subject (N-N)
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }
}
