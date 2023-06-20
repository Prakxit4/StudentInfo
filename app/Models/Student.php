<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}

