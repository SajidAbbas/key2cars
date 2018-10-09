<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class VehicleBodyType extends Model
{
    


    public function getAllBodyType()
    {
    	return DB::table('vehicle_body_types')->orderby('title','asc')->get();
    }


    public function getAllBodyTypeSize()
    {
    	return DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',1]])
        ->join('models','models.id','=','vehicles.model_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),DB::raw('min(vehicles.price) as min_price'),'vehicle_body_types.title as title','vehicle_body_types.id','vehicle_body_types.icon_url as icon')
        ->groupBY('vehicle_body_types.id')
        ->get();
    }

    public function getAllBodyTypeFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('models','models.id','=','vehicles.model_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'vehicle_body_types.title','vehicle_body_types.id')
        ->groupBY('vehicles.model_id')
        ->get();
    
    }

    public function getAllBodyTypeVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('models','models.id','=','vehicles.model_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'vehicle_body_types.title','vehicle_body_types.id')
        ->groupBY('vehicle_body_types.id')
        ->get();
    
    }
}
