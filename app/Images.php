<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicle;

class Images extends Model
{
    
    public function vehicle()
    {
        return $this->belongsTo('Vehicle');
    }
}
