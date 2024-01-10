<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        // Add any other fields you want to be mass-fillable
    ];

    // Relationships

    // A task belongs to one project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // A task belongs to one developer
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    // Add any other relationships or methods as needed
}