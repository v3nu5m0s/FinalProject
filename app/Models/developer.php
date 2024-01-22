<?php

namespace App\Models;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Developer extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'dev_id',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'lead_developer_id');
    }
}