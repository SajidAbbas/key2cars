<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class VehicleType extends Model
{
    
    const Car=1;
    const Bike=2;
    const Bus=3;
    const Truck=4;
    const Farm=5;
    ////////////////condition////////////////
    const Any=0;
    const New_Vehicle=1;
    const Almost_New_Vehicle=2;
    const Used_Vehicle=3;
    
    
	

    public function getAllVehicleTypes()
    {
    	return $data=DB::table('vehicle_types')->orderby('title','asc')->paginate(10);
    }


    ////////insert new record//////

    public function insertVehicleType($data)
    {

        date_default_timezone_set("Asia/Karachi");

        try{

    	 $id=DB::table('vehicle_types')->insertGetId(
    		['title' => $data->title,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
    		);
    }catch(\Illuminate\Database\QueryException $ex){ 
        return parent::report($ex->getMessage());
        dd($ex->getMessage()); 
  // Note any method of class PDOException can be called on $ex.
    }

    $this->imageCompression($id);



    return true;
    }



    //////compress and upload image////////
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

            

    		imagejpeg($tmp_min,public_path('images/vehicleType/').($id).".".$ext,100);////copy image
            $path="/vehicleType/".($id).".".$ext;

            DB::table('vehicle_types')->where('id',$id)->update(['icon_url'=>$path]);

    	

    	}
    }

////////delete Record///////////////
    public function deleteVehicleType($ids)
    {
        foreach($ids as $id)
        {
             $data=DB::table('vehicle_types')->where('id', $id)->delete();
        }
        return $data;
    }


/////////get any vehicle type//////
    public function getSpecificVehicleType($id)
    {

        return $data=DB::table('vehicle_types')->where('id',$id)->get();
       // dd($data);    
    }


///////remove image///////////////////
    public function removeVehicleTypeImage($id)
    {
      return $data=  DB::table('vehicle_types')->where('id',$id)->update(['icon_url'=>'/vehicleType/default.png']);
    }


////////////update the record////////////////
    public function updateVehicleType($data)
    {
        date_default_timezone_set("Asia/Karachi");

/////if image change/////////////////////
        if(isset($_FILES['file']))
        {
            $this->imageCompression($data->id);

            return $data=DB::table('vehicle_types')->where('id',$data->id)->update(['title'=>$data->title,'updated_at' => date('Y-m-d H:i:s')]);

        }
        else
        {
            return $data=DB::table('vehicle_types')->where('id',$data->id)->update(['title'=>$data->title,'updated_at' => date('Y-m-d H:i:s')]);

        }




    }
 




    
}
