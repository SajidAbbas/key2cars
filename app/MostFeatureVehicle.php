<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MostFeatureVehicle extends Model
{
    protected $table='most_feature_vehicles';
    
    public function getAllVehicles()
    {
        return DB::table('most_feature_vehicles')
                ->where('isDeleted',0)
                ->join('vehicle_types','vehicle_types.id','=','most_feature_vehicles.vehicle_type')
                ->select('most_feature_vehicles.*','vehicle_types.title as type')
                    ->paginate(10);
    }
    
    public function addNewVehicle($request)
    {
         date_default_timezone_set("Asia/Karachi");
        $id=DB::table('most_feature_vehicles')->insertGetId(['title'=>$request->title,'description'=>$request->description,'vehicle_type'=>$request->type,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),'active'=>0]);
    
        $this->imageCompressionNewVehicle($id);
    }
    
    
    
    
    public function imageCompressionNewVehicle($id)
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
        $newwidth_min=290;///set compressing image width
        $newheight_min=184;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

        imagejpeg($tmp_min,public_path('images/mostFeatureVehicle/').($id).".".$ext,100);////copy image
            $path="/mostFeatureVehicle/".($id).".".$ext;

            DB::table('most_feature_vehicles')->where('id',$id)->update(['url'=>$path]);

           
      }


    }
    
    
      ////////delete Record///////////////
    public function deleteVehicle($ids)
    {
        foreach($ids as $id)
        {
             $data=DB::table('most_feature_vehicles')->where('id', $id)->update(['isDeleted'=>'1']);
        }
        return $data;
    }
    
    public function checkActiveVehiclesByType($type)
    {
        return DB::table('most_feature_vehicles')->where([['vehicle_type',$type],['active',1],['isDeleted',0]])
                ->select(DB::raw('COUNT(most_feature_vehicles.id) as size'))
                ->get();
                
    }
}
