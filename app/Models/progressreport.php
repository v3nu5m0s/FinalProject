<?php

namespace App\Models;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $fillable = [
        'date',
        'status',
        'description',
    ];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
