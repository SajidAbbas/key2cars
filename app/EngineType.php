<?php

namespace App;
use DB;
use App\VehicleType;

use Illuminate\Database\Eloquent\Model;

class EngineType extends Model
{
    
    public function getAllEngineType()
    {
    	return DB::table('engine_types')->where('vehicle_type_id', \App\VehicleType::Car)->orderby('title','asc')->get();

    }

   

    public function getAllEngineTypeFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'engine_types.title','engine_types.id')
        ->groupBY('vehicles.engine_type_id')
        ->get();
    
    }

    public function getAllEngineTypeVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('engine_types','engine_types.id','=','vehicles.engine_type_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'engine_types.title','engine_types.id')
        ->groupBY('vehicles.engine_type_id')
        ->get();
    
    }
    
}
