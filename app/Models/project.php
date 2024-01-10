<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $fillable = [
        'system_owner',
        'system_pic',
        'start_date',
        'duration',
        'dev_methodology',
        'system_platform',
        'deployment_type',
        // Add any other fields you want to be mass-fillable
    ];

    // Many-to-Many Relationship: Projects and Developers
    public function developers()
    {
        return $this->belongsToMany(Developer::class);
    }
}
