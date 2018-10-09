<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
   

    public function getAllFeatureTitle()
    {
        return DB::table('features')->where('vehicle_type_id', \App\VehicleType::Car)->orderby('title','asc')->get();
    }

    


    public function getAllFeatures()
    {
    	return $data=DB::table('features')
    	->join('vehicle_types','vehicle_types.id','=','features.vehicle_type_id')
    	->orderby('features.title','asc')
    	->select('features.*','vehicle_types.title as type')
    	->paginate(10);
    }

    public function searchFeatureByVehicleType($type)
    {
        return $data=DB::table('features')
        ->where('features.vehicle_type_id',$type)
        ->join('vehicle_types','vehicle_types.id','=','features.vehicle_type_id')
        ->orderby('features.title','asc')
        ->select('features.*','vehicle_types.title as type')
        ->paginate(10);
    }



    public function insertFeatures($data)
    {
       date_default_timezone_set("Asia/Karachi");

        try{

         $id=DB::table('features')->insertGetId(
            ['title' => $data->title,'vehicle_type_id'=>$data->type,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
            );
    }catch(\Illuminate\Database\QueryException $ex){ 
        return parent::report($ex->getMessage());
        dd($ex->getMessage()); 
  // Note any method of class PDOException can be called on $ex.
    }

    $this->imageCompression($id);



    return true;

    }

    public function imageCompression($id)
    {
        

        $post_photo=$_FILES['file']['name'];
        $post_photo_tmp=$_FILES['file']['tmp_name'];
        
    
        
        $ext=pathinfo($post_photo, PATHINFO_EXTENSION);///getting extention
        if($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='gif'||$ext=='GIF')
        {
            if($ext=='jpg' || $ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
            {
                $src=imagecreatefromjpeg($post_photo_tmp);
            }
            if($ext=='png' || $ext=='PNG')
            {
                $src=imagecreatefrompng($post_photo_tmp);
            }
            if($ext=='gif' || $ext=='GIF')
            {
                $src=imagecreatefromgif($post_photo_tmp);
            }

            list($width_min,$height_min)=getimagesize($post_photo_tmp);
            $newwidth_min=30;///set compressing image width
            $newheight_min=($height_min/$width_min)*$newwidth_min;///equation for set image height
            $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
            imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

            imagejpeg($tmp_min,public_path('images/feature/').($id).".".$ext,100);////copy image
            $path="/feature/".($id).".".$ext;

            DB::table('features')->where('id',$id)->update(['icon_url'=>$path]);

        

        }
    }

    public function deleteFeatures($ids)
    {
        foreach($ids as $id)
        {
             $data=DB::table('features')->where('id', $id)->delete();
        }
        return $data;
    }

    public function getSpecificFeature($id)
    {
        return $data=DB::table('features')
        ->where('features.id',$id)
        ->join('vehicle_types','vehicle_types.id','=','features.vehicle_type_id')
        ->orderby('features.title','asc')
        ->select('features.*','vehicle_types.title as type','vehicle_types.id as type_id')
        ->get();

    }


    public function removeFeatureImage($id)
    {

      return $data=  DB::table('features')->where('id',$id)->update(['icon_url'=>'/feature/default.png']);
    }


    ////////////update the record////////////////
    public function updateFeature($data)
    {
        date_default_timezone_set("Asia/Karachi");

/////if image change/////////////////////
        if(isset($_FILES['file']))
        {
            $this->imageCompression($data->id);

            return $data=DB::table('features')->where('id',$data->id)->update(['title'=>$data->title,'vehicle_type_id'=>$data->type,'updated_at' => date('Y-m-d H:i:s')]);

        }
        else
        {
            return $data=DB::table('features')->where('id',$data->id)->update(['title'=>$data->title,'vehicle_type_id'=>$data->type,'updated_at' => date('Y-m-d H:i:s')]);

        }




    }

    public function getFeaturesByVehicle($id)
    {
        return DB::table('vehicle_feature_mapping')
        ->where('vehicle_feature_mapping.post_id',$id)
        ->join('features','features.id','=','vehicle_feature_mapping.feature_id')
        ->orderby('features.title','asc')
        ->select('features.title as title','features.id as id','features.icon_url as url')
        ->get();
    }

    
 

}



