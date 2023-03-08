<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = ['course_id', 'name', 'credit'];

    public function courseRegist()
    {
        return $this->hasMany(CourseRegist::class);
    }

    public function classModels()
    {
        return $this->hasMany(ClassModel::class, 'course_id', 'course_id');
    }
}
