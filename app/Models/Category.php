<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        // Add additional relevant fields if needed
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    // Define custom scopes for filtering jobs by category

    public function scopeTruckJobs($query)
    {
        return $query->whereIn('name', ['Local Truck Driver', 'Long Haul Truck Driver', 'Specialized Hauling', 'Oversized Load Specialist']);
    }

    public function scopeTankerJobs($query)
    {
        return $query->whereIn('name', ['Tanker Truck Driver', 'Hazardous Materials Transportation']);
    }

    public function scopeFlatbedJobs($query)
    {
        return $query->whereIn('name', ['Flatbed Truck Driver', 'Heavy Equipment Transport']);
    }

    // ... Define additional scopes for other types of CDL-A jobs

    // Get child categories (optional)

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // ... Implement other methods as needed
}
