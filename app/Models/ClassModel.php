<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'class_id',
        'course_id',
        'max_students',
        'attached_class_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function attachedClass()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class, 'class_id', 'class_id');
    }
}
