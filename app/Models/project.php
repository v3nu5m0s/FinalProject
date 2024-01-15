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
        'name',
        'start_date',
        'duration',
        'status',      // Added status field
        'end_date',    // Added end_date field
        // Add other fields as needed
    ];

    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
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
