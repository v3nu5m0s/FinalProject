<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class businessunit extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'db_business_unit';
    
    

    // Define relationships here if needed

    public function projects()
    {
        return $this->hasMany(Project::class, 'system_owner');
    }
}
