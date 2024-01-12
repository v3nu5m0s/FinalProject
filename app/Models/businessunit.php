<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class businessunit extends Authenticable
{
    use Notifiable;
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
