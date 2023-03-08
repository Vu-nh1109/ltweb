<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['account_id', 'password', 'name', 'email', 'type'];

    public function isAdmin()
    {
        return $this->type === 'admin';
    }

    public function isStudent()
    {
        return $this->type === 'student';
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}


