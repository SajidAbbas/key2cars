<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class RegistrationCity extends Model
{
   

    public function getAllRegCities()
    {
    	return DB::table('registration_cities')->orderby('title','asc')->get();
    }

    
    public function getAllRegisterdCityFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'registration_cities.title','registration_cities.id')
        ->groupBY('vehicles.reg_city_id')
        ->get();
    
    }

    public function getAllRegisterdCityVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('registration_cities','registration_cities.id','=','vehicles.reg_city_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'registration_cities.title','registration_cities.id')
        ->groupBY('vehicles.reg_city_id')
        ->get();
    
    }
}
