<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Add this line

class Project extends Model
{
    use HasFactory, SoftDeletes; // Add SoftDeletes to the list of traits

    protected $fillable = [
        'business_unit_id',
        'pro_id',
        'lead_developer_id',
        'name',
        'description',
        'start_date',
        'duration',
        'end_date',
        'status',
        'development_overview',
        'system_platform',
        'development_methodology',
        'development_method',
        // Add other fields as needed
    ];

    protected $dates = ['deleted_at']; // Optional, if you want to work with date attributes

    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class, 'business_unit_id');
    }

    public function leadDeveloper()
    {
        return $this->belongsTo(Developer::class, 'lead_developer_id');
    }

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'project_developers');
    }

    public function progress()
    {
        return $this->hasMany(ProgressReport::class);
    }
}
