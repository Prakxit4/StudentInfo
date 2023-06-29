<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubjectStudent;

class Student extends Model
{
    protected $fillable = ['name', 'student_class_id'];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class);
    }

    public function subject()
    {
        return $this->hasOne(SubjectStudent::class);
    }
}
