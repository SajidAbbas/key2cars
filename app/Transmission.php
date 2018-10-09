<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    

    public function getAllTransmission()
    {
    	return DB::table('transmissions')->orderby('title','asc')->get();

    }

    public function getAllTransmissionFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'transmissions.title','transmissions.id')
        ->groupBY('vehicles.transmission_id')
        ->get();
    
    }

    public function getAllTransmissionVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('transmissions','transmissions.id','=','vehicles.transmission_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'transmissions.title','transmissions.id')
        ->groupBY('vehicles.transmission_id')
        ->get();
    
    }
}
