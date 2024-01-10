<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class developer extends Model
{
    protected $fillable = [
        'name',
        'email',
        // Add any other fields you want to be mass-fillable
    ];

    // Many-to-Many Relationship: Developers and Projects
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
