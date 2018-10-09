<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
    protected $table = 'cities';
    
/*

    public function getAllCityVehicles()
    {
    	return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicle_type_id',1]])
    	->join('cities','cities.id','=','vehicles.city_id')
    	->select(DB::raw('COUNT(vehicles.id) as size'),'cities.title','cities.id')
    	->groupBY('vehicles.city_id')
    	->get();
    
    }
    */

    public function getAllCityBikes()
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicle_type_id',2]])
        ->join('cities','cities.id','=','vehicles.city_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'cities.title','cities.id','cities.popular')
        ->groupBY('vehicles.city_id')
        ->get();
    
    }
    
     public function getAllCityFeaturedAdsCount()
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1]])
        ->join('cities','cities.id','=','vehicles.city_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'cities.title','cities.id')
        ->groupBY('vehicles.city_id')
        ->get();
    
    }

    public function getAllCityFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id],['images.size','s']])
        ->join('cities','cities.id','=','vehicles.city_id')
        ->join('images','images.post_id','=','vehicles.id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'cities.title','cities.id')
        ->groupBY('vehicles.city_id')
        ->get();
    
    }
    
    public function getAllCityFeaturedAccessories()
    {
        return $data=DB::table('accessories')
        ->where([['accessories.is_deleted','false'],['accessories.status','approved'],['accessories.featured',1]])
        ->join('city_areas','city_areas.id','=','accessories.city_area_id')        
        ->join('cities','cities.id','=','city_areas.city_id')
        ->select(DB::raw('COUNT(accessories.id) as size'),'cities.title','cities.id')
        ->groupBY('accessories.city_area_id')
        ->get();
    
    }
    
     public function getAllCityAccessories()
    {
        return $data=DB::table('accessories')
        ->where([['accessories.is_deleted','false'],['accessories.status','approved']])
        ->join('city_areas','city_areas.id','=','accessories.city_area_id')        
        ->join('cities','cities.id','=','city_areas.city_id')
        ->select(DB::raw('COUNT(accessories.id) as size'),'cities.title','cities.id')
        ->groupby('cities.id')
        ->get();
    
    }

    public function getAllCityVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('cities','cities.id','=','vehicles.city_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'cities.title','cities.id','cities.popular')
        ->groupBY('vehicles.city_id')
        ->get();
    
    }


/// get All cities model wise/////////
    public function getAllCities()
    {
    	return $data=DB::table('cities')
    	->orderby('title','asc')
    	->get();
    }

///// get all cities Area Wise////
    public function getAllCitiesByArea()
    {
        return $data=DB::table('city_areas')
        ->join('cities','cities.id','=','city_areas.city_id')
        ->groupby('city_areas.city_id')
        ->select('cities.*')
        ->get();
    }


    ///////pagination get Cities////
    public function getAllCitiesPaginate()
    {
        return $data=DB::table('cities')
        ->orderby('title','asc')
        ->paginate(10);
    }


    public function insertCity($data)
    {
     try{
        $data=DB::table('cities')->insert(
            ['title' => $data->title]
            );
    }catch(\Illuminate\Database\QueryException $ex){ 
        
        dd($ex->getMessage());
    }
}



    public function deleteCities($ids)
    {
        foreach($ids as $id)
        {
           $data=DB::table('cities')->where('id', $id)->delete();
        }
        return $data;
    }

    public function getSpecificCity($id)
    {
        return $data=DB::table('cities')->where('id',$id)->get();
    }

    public function updateCity($request)
    {
        return $data=DB::table('cities')->where('id',$request->id)->update(['title'=>$request->title]);
    }
}
