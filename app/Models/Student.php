<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Account
{
    use HasFactory;
    protected $fillable = ['max_credit'];

    public function courseRegs()
    {
        return $this->hasMany(CourseRegist::class);
    }
}
