<?php

namespace App\Models;

use App\Models\BusinessUnit;
use App\Models\Developer;
use App\Models\ProgressReport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'business_unit_id',
        'pro_id',
        'lead_developer_id',
        'name',
        'description', // Add project description
        'start_date',
        'duration',
        'end_date',
        'status',
        'development_overview', // Add development overview
        'system_platform', // Add system platform
        'development_methodology', // Add development methodology
        'development_method', // Add development method
        // Add other fields as needed
    ];

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
