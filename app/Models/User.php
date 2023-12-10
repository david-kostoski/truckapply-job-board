<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'desired_job_types',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ... other methods ...

    public function jobs()
    {
        return $this->hasMany(Job::class, 'user_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'user_id');
    }
}
