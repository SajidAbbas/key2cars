<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class CityAreas extends Model
{
    


    public function getAllAreas()
    {
    	return $data=DB::table('city_areas')
    	->join('cities','cities.id','=','city_areas.city_id')
    	->select('city_areas.*','cities.title as city')
    	->orderby('title','asc')
    	->paginate(10);
    }

    public function insertArea($data)
    {
     try{
        $data=DB::table('city_areas')->insert(
            ['title' => $data->title, 'city_id'=>$data->type]
            );
    }catch(\Illuminate\Database\QueryException $ex){ 
        
        dd($ex->getMessage());
    }
}



    public function deleteAreas($ids)
    {
        foreach($ids as $id)
        {
           $data=DB::table('city_areas')->where('id', $id)->delete();
        }
        return $data;
    }

    public function getSpecificArea($id)
    {
        return $data=DB::table('city_areas')
        ->where('city_areas.id',$id)
        ->join('cities','cities.id','=','city_areas.city_id')
        ->select('city_areas.*','cities.title as city','cities.id as city_id')
        ->get();

    }

    public function updateArea($request)
    {
        return $data=DB::table('city_areas')->where('id',$request->id)->update(['title'=>$request->title,'city_id'=>$request->city]);
    }


    public function getAreaByCity($city)
    {
        return $data=DB::table('city_areas')
        ->where('city_id',$city)
       ->select('city_areas.*')
        ->get();
    }

    public function searchAreaByCity($city_id)
    {
        return $data=DB::table('city_areas')
        ->where('city_areas.city_id',$city_id)
        ->join('cities','cities.id','=','city_areas.city_id')
        ->select('city_areas.*','cities.title as city')
        ->orderby('title','asc')
        ->paginate(10);
    }
}
