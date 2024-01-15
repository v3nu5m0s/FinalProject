<?php

namespace App\Models;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $fillable = [
        'name','dev_id',
    ];
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_developers');
    }
}
