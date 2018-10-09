<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class ModelVersion extends Model
{
	



    public function getAllModelVersion()
    {
    	return $data=DB::table('model_versions')
    	->join('model_years','model_years.id','=','model_versions.year_id')
    	->join('models','models.id','=','model_versions.model_id')
    	->select('model_years.year as year','model_versions.*','models.title as model')
    	->paginate(10);
    }


    public function insertModelVersion($data)
    {
        date_default_timezone_set("Asia/Karachi");
       
        return $data=DB::table('model_versions')->insert(
            ['title' => $data->title,'model_id' => $data->model,'year_id'=>$data->year,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
            );

    }


      public function deleteModelVersions($ids)
    {
        foreach($ids as $id)
        {
           $data=DB::table('model_versions')->where('id', $id)->delete();
        }
        return $data;
    }


     public function getSpecificModelVersion($id)
    {
    	return $data=DB::table('model_versions')
    	->where('model_versions.id',$id)
    	->join('model_years','model_years.id','=','model_versions.year_id')
    	->join('models','models.id','=','model_versions.model_id')
    	->select('model_years.year as year','model_years.id as year_id','model_versions.*','models.title as model','models.id as ,model_id')
    	->get();
    }


    public function updateModelVersion($data)
    {
        date_default_timezone_set("Asia/Karachi");
       
        return $data=DB::table('model_versions')->where('model_versions.id',$data->id)->update(
            ['title' => $data->title,'model_id' => $data->model,'year_id'=>$data->year,'updated_at' => date('Y-m-d H:i:s')]
            );
    }


    public function getModelVersionByModel($id)
    {
        return $data=DB::table('model_versions')
        ->where('model_id',$id)
        ->orderby('title','asc')
        ->get();

    }

    
    public function searchAllModelVersionByModel($model_id)
    {
        return $data=DB::table('model_versions')
        ->where('model_versions.model_id',$model_id)
        ->join('model_years','model_years.id','=','model_versions.year_id')
        ->join('models','models.id','=','model_versions.model_id')
        ->select('model_years.year as year','model_versions.*','models.title as model')
        ->paginate(10);
    }


}
