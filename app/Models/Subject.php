<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubjectStudent;

class Subject extends Model
{
    protected $fillable = ['name'];

    public function student()
{
    return $this->hasOne(SubjectStudent::class);
}
}
