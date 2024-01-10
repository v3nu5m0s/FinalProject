<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = [
        'system_owner', 'system_pic', 'start_date', 'duration', 'end_date',
        'status', 'lead_developer', 'developers', 'dev_methodology',
        'system_platform', 'deployment_type'
    ];
}
