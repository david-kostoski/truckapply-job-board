<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company_name',
        'location',
        'description',
        'requirements',
        'skills',
        'salary_range',
        'application_deadline',
        'status',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    // Optional relationship for Company model
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // ... other methods ...
}
