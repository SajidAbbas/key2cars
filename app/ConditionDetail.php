<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class ConditionDetail extends Model
{
   
    public function  getAllConditionDetail()
    {
    	return DB::table('condition_details')->orderby('title','asc')->get();

    }

     public function  getAllConditionDetailPaginate()
    {
    	return DB::table('condition_details')->orderby('title','asc')->paginate(10);

    }

    public function insertConditionDetail($request)
    {
    	DB::table('condition_details')->insert(['title'=>$request->title]);
    }


public function deleteConditionDetail($ids)
    {
        foreach($ids as $id)
        {
             $data=DB::table('condition_details')->where('id', $id)->delete();
        }
        return $data;
    }
    

    public function getSpecificConditionDetail($id)
    {

        return $data=DB::table('condition_details')->where('id',$id)->get();
       // dd($data);    
    }

    public function updateConditionDetail($request)
    {
        return $data=DB::table('condition_details')->where('id',$request->id)->update(['title'=>$request->title]);
    }

    public function getConditionByVehicle($id)
    {

        return DB::table('vehicle_conditions')
        ->where('ads_id',$id)
        ->join('condition_details','condition_details.id','=','vehicle_conditions.condition_detail_id')
        ->join('condition_detail_values','condition_detail_values.id','=','vehicle_conditions.condition_detail_value_id')
        ->select('condition_detail_values.title as condition_detail_value','condition_details.title as condition_detail')
        ->get();
    }

}
