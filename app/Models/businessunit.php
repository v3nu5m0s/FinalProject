<?php

namespace App\Models;
use App\Models\Project;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessUnit extends Model
{
    protected $fillable = [
        'name', 'bis_id',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    
}
