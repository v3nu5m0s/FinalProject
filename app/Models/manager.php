<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager extends Model
{
    protected $fillable = ['name'];

    // Define relationships here
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}