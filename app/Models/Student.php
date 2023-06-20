<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'student_class_id'];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
