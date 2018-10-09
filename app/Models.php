<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Models extends Model
{
	

    protected $table = 'models';


    public function getAllCarModelsByMake($make_id)
    {
    	return $data=DB::table('models')
        ->where([['brands.id',$make_id],['vehicle_types.title','Car']])
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
    	->orderby('title','asc')
        ->select('models.*')
        ->get();
    	
    }
    
    public function getAllModelsByMakeAndType($make_id,$type)
    {
    	return $data=DB::table('models')
        ->where([['brands.id',$make_id],['vehicle_types.id',$type]])
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
    	->orderby('title','asc')
        ->select('models.*')
        ->get();
    	
    }

   

    public function getAllModelFeaturedVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.featured',1],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('models','models.id','=','vehicles.model_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'models.title','models.id')
        ->groupBY('vehicles.model_id')
        ->get();
    
    }

    public function getAllModelVehicles($vehicle_id)
    {
        return $data=DB::table('vehicles')
        ->where([['vehicles.isDeleted','false'],['vehicles.status','approved'],['vehicles.vehicle_type_id',$vehicle_id]])
        ->join('models','models.id','=','vehicles.model_id')
        ->select(DB::raw('COUNT(vehicles.id) as size'),'models.title','models.id')
        ->groupBY('vehicles.model_id')
        ->get();
    
    }

    public function getAllModelsWithoutPagination()
    {
        return $data=DB::table('models')
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        ->select('models.*','brands.title as make','brands.id as make_id','brands.icon_url as icon','vehicle_types.title as vehicle_type','vehicle_body_types.title as body_type')
        ->orderby('models.title','asc')
        ->get();
    }

    public function getAllModels()
    {
        return $data=DB::table('models')
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        ->select('models.*','brands.title as make','vehicle_types.title as vehicle_type','vehicle_body_types.title as body_type')
        ->orderby('models.title','asc')
        ->paginate(10);
    }
    
     public function getModels()
    {
        return $data=DB::table('models')
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        ->select('models.*','brands.title as make','vehicle_types.title as vehicle_type','vehicle_body_types.title as body_type')
        ->orderby('models.title','asc')
        ->get();
    }

    public function searchAllModelsByMake($make_id)
    {
        return $data=DB::table('models')
        ->where('brands.id',$make_id)
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        ->select('models.*','brands.title as make','vehicle_types.title as vehicle_type','vehicle_body_types.title as body_type')
        ->orderby('models.title','asc')
        ->paginate(10);
    }

    public function getAllModelsByMake($make_id,$vehicle_id)
    {
        return $data=DB::table('models')
        ->where([['brands.id',$make_id],['vehicle_types.id',$vehicle_id]])
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        ->select('models.*','brands.id as brand_id','brands.title as make','vehicle_types.title as vehicle_type','vehicle_body_types.title as body_type')
        ->orderby('models.title','asc')
                
        ->get();
    }

    public function getAllBikeModelsByMake($make_id)
    {
        return $data=DB::table('models')
        ->where([['brands.id',$make_id],['vehicle_types.id',2]])
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        
        ->select('models.*','brands.title as make','vehicle_types.title as vehicle_type')
        ->orderby('models.title','asc')
                ->groupBy('models.title')
        ->get();
    }

      public function deleteModels($ids)
    {
        foreach($ids as $id)
        {
           $data=DB::table('models')->where('id', $id)->delete();
        }
        return $data;
    }

      public function insertModel($data)
    {
        date_default_timezone_set("Asia/Karachi");
       
        return $data=DB::table('models')->insert(
            ['title' => $data->title,'manufacture_id' => $data->make,'bodytype_id'=>$data->body_type,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
            );

    }



    public function getSpecificModel($id)
    {
         return $data=DB::table('models')
         ->where('models.id',$id)
        ->join('manufactures','manufactures.id','=','models.manufacture_id')
        ->join('brands','brands.id','=','manufactures.brand_id')
        ->join('vehicle_types','vehicle_types.id','=','manufactures.vehicle_type_id')
        ->join('vehicle_body_types','vehicle_body_types.id','=','models.bodytype_id')
        
        ->select('models.*','brands.title as make','brands.id as make_id','vehicle_types.title as type','vehicle_types.id as type_id','vehicle_body_types.title as body_type','vehicle_body_types.id as body_id')
        ->get();
    }

    public function updateModel($data)
    {
        date_default_timezone_set("Asia/Karachi");
       
        return $data=DB::table('models')->where('models.id',$data->id)->update(
            ['title' => $data->title,'manufacture_id' => $data->make,'bodytype_id'=>$data->body_type,'updated_at' => date('Y-m-d H:i:s')]
            );
    }

}
