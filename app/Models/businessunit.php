<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class businessunit extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        // Add any other fields you want to be mass-fillable
    ];

    // Relationships

    // A business unit can own multiple projects
    public function projects()
    {
        return $this->hasMany(Project::class, 'business_unit_id');
    }

    // Add any other relationships or methods as needed
}
