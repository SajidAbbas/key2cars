<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleEnum extends Model
{
    
    
    protected $enumVehicles = [
        'Car' => 1,
        'Bike' => 2,
        'Bus' => 3,
        'Truck' => 4,
        'Farm'=>5
        
    ];
}
