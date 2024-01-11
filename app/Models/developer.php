<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class developer extends Model
{
    protected $fillable = ['name'];

    // Define relationships here
    public function projects()
    {
        return $this->hasMany(Project::class, 'lead_developer_id');
    }
}