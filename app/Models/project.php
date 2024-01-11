<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
        'system_owner', 'system_pic', 'start_date', 'duration', 'end_date',
        'status', 'lead_developer_id', 'methodology', 'platform', 'deployment_type'
    ];

    // Define relationships here
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }

    public function leadDeveloper()
    {
        return $this->belongsTo(LeadDeveloper::class);
    }

    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'project_developers');
    }
}