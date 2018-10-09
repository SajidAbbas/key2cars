<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{


//////get All Manufactrues//////
    public function getAllManufacturer()
    {
        return $data=DB::table('manufactures')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->orderby('brands.title','asc')
        ->select('brands.*','manufactures.id as manu_id','vehicle_types.title as type')
        ->paginate(10);

    }

    public function getAllManufacturesFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('manufactures','manufactures.id','=','vehicles.manufacture_id')
         ->join('brands','brands.id','=','manufactures.brand_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'brands.title','brands.id','brands.popular as popular')
        ->groupBY('vehicles.manufacture_id')
        ->get();
    
    }

    public function getAllManufacturesVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('manufactures','manufactures.id','=','vehicles.manufacture_id')
         ->join('brands','brands.id','=','manufactures.brand_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'brands.title','brands.id')
        ->groupBY('vehicles.manufacture_id')
        ->get();
    
    }



/////get specific manufacturer////

    public function editManufacture($id)
    {
        return $data=DB::table('manufactures')
        ->where('manufactures.id',$id)
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->select('brands.title as brand','brands.id as brand_id','vehicle_types.title as type','vehicle_types.id as type_id','manufactures.id as id')
        ->get();

    }



////get all manufacturer companies name By Vehicle_Type//

    public function getAllManufacturerByType($type)
    {
    	return $data=DB::table('manufactures')
    	->where('manufactures.vehicle_type_id',$type)
    	->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
    	->select('manufactures.*','brands.title as brand','brands.icon_url as icon','brands.id as brand_id','brands.popular as popular','vehicle_types.title as type')
    	->groupBy('brands.id')
                ->get();

    }
    
    public function getAllManufacturerByBodyType($type,$vehicle)
    {
    	return $data=DB::table('models')
    	->where([['models.bodytype_id',$type],['manufactures.vehicle_type_id',$vehicle]])
    	->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        
    	->select('manufactures.*','brands.title as brand','brands.icon_url as icon','brands.id as brand_id')
    	->groupBy('brands.title')
                ->get();

    }

   //////update Record///

   public function updateManufacture($request)
   {
    date_default_timezone_set("Asia/Karachi");
    return $data=DB::table('manufactures')
    ->where('id',$request->id)
    ->update(['brand_id'=>$request->brand,'vehicle_type_id'=>$request->type,'updated_at' => date('Y-m-d H:i:s')]);

   } 

/*
 public function getAllCitiesByArea()
    {
        return $data=DB::table('city_areas')
        ->join('cities','cities.id','=','city_areas.city_id')
        ->groupby('city_areas.city_id')
        ->select('cities.*')
        ->get();
    }
*/


    public function insertManufacture($data)
    {
         date_default_timezone_set("Asia/Karachi");

        
        try{

         $id=DB::table('manufactures')->insertGetId(
            ['brand_id' => $data->brand,'vehicle_type_id'=>$data->type,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
            );
    }catch(\Illuminate\Database\QueryException $ex){ 
        return parent::report($ex->getMessage());
        dd($ex->getMessage()); 
  // Note any method of class PDOException can be called on $ex.
    }
    return true;
        
    }

  


    public function deleteManufacture($ids)
    {
        foreach($ids as $id)
        {
             $data=DB::table('manufactures')->where('id', $id)->delete();
        }
        return $data;
    }


    public function getMakeByType($id)
    {

         return $data=DB::table('manufactures')
        ->where('manufactures.vehicle_type_id',$id)
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->select('brands.title as brand','manufactures.id as id')
        ->groupby('brands.id')
        ->get();
        
    }

    public function getMAnufactureByVehicleType($type)
    {

        return $data=DB::table('manufactures')
        ->where('manufactures.vehicle_type_id',$type)
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->orderby('brands.title','asc')
        ->select('brands.*','manufactures.id as manu_id','vehicle_types.title as type')
        ->paginate(10);
    }
    
    public function getOtherManufactures($vehicle_id)
    {
        return $data=DB::table('manufactures')
        ->where('manufactures.vehicle_type_id',$vehicle_id)
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->orderby('brands.title','asc')
        ->select('brands.*','manufactures.id as manu_id','vehicle_types.title as type')
          ->groupby('brands.id')       
        ->get();
        
    }


}
