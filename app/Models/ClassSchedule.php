<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'day_of_week',
        'start_at',
        'end_at',
        'location',
    ];

    public function classModel()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
