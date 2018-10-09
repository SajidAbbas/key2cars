<?php

namespace App;

use DB;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    

    public function getAllColor()
    {

    	return $data=DB::table('colors')->orderby('title','asc')->get();
    }

    public function getAllColorFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('colors','colors.id','=','vehicles.color_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'colors.title','colors.id')
        ->groupBY('vehicles.color_id')
        ->get();
    
    }

     public function getAllColorVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('colors','colors.id','=','vehicles.color_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'colors.title','colors.id')
        ->groupBY('vehicles.color_id')
        ->get();
    
    }
}
