<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class HotWheels extends Model
{
    
    
    public function addVehicle($request,$code)
    {
       date_default_timezone_set("Asia/Karachi");
       
        $make = DB::table('manufactures')->where([['brand_id',$request->make],['vehicle_type_id',$request->type]])->first();
      
      

       $id= DB::table('hot_wheels')->insertGetId(['vehicle_type_id'=>$request->type,'status'=>"pending",'title'=>$request->title,'city_area_id'=>$request->city_area,'make'=>$make->id,'model'=>$request->model,'description'=>$request->description,'verification_code'=>$code,'isVerified'=>0,'number'=>$request->number,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),'isDeleted'=>0]);
      
      $this->imageCompression($id);
      
      return $id;
    }
    public function getAllVehicles()
    {
        return DB::table('hot_wheels')
                ->where([['isDeleted',0],['hot_wheels_images.size','s']])
                ->join('vehicle_types','vehicle_types.id','=','hot_wheels.vehicle_type_id')
                ->join('manufactures','manufactures.id','=','hot_wheels.make')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('models','models.id','=','hot_wheels.model')
                ->join('hot_wheels_images','hot_wheels_images.post_id','=','hot_wheels.id')
                ->select('hot_wheels.*','vehicle_types.title as vehicle_type','brands.title as make','models.title as model','hot_wheels_images.url as url')
                ->paginate(24);
                
    }
    
    
    public function getFilterHotWheels(array $filters =[])
    {
      


       $query = DB::table('hot_wheels');

    foreach ($filters as $col => $id) {
     
     $query->where($col. '.id', $id);
     
    }


    $query->where([['isDeleted',0],['hot_wheels_images.size','s']])
                ->join('vehicle_types','vehicle_types.id','=','hot_wheels.vehicle_type_id')
                ->join('manufactures','manufactures.id','=','hot_wheels.make')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('models','models.id','=','hot_wheels.model')
                ->join('hot_wheels_images','hot_wheels_images.post_id','=','hot_wheels.id')
                ->select('hot_wheels.*','vehicle_types.title as vehicle_type','brands.title as make','models.title as model','hot_wheels_images.url as url');
                return $query->paginate(24);

    }
        
    
    
    public function getImagesSize($id)
    {
        return DB::table('hot_wheels_images')
                ->where([['size','l'],['post_id',$id]])
                ->join('hot_wheels','hot_wheels.id','=','hot_wheels_images.post_id')
                ->select(DB::raw('COUNT(hot_wheels.id) as size'))
                ->groupby('hot_wheels_images.post_id')
                ->get();
               
    }
    
    public function getAllHotWheels()
    {
        return DB::table('hot_wheels')
                ->where([['isDeleted',0],['hot_wheels_images.size','s']])
                ->join('vehicle_types','vehicle_types.id','=','hot_wheels.vehicle_type_id')
                ->join('manufactures','manufactures.id','=','hot_wheels.make')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('models','models.id','=','hot_wheels.model')
                ->join('hot_wheels_images','hot_wheels_images.post_id','=','hot_wheels.id')
                ->select('hot_wheels.*','vehicle_types.title as vehicle_type','brands.title as make','models.title as model','hot_wheels_images.url as url')
                ->paginate(10);
                
    }
    
     public function getAllHotWheelsByUserId($user_id)
    {
        return DB::table('hot_wheels')
                ->where([['isDeleted',0],['user_id',$user_id],['hot_wheels_images.size','s']])
                ->join('vehicle_types','vehicle_types.id','=','hot_wheels.vehicle_type_id')
                ->join('manufactures','manufactures.id','=','hot_wheels.make')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('models','models.id','=','hot_wheels.model')
                 ->join('hot_wheels_images','hot_wheels_images.post_id','=','hot_wheels.id')
                ->select('hot_wheels.*','vehicle_types.title as vehicle_type','brands.title as make','models.title as model','hot_wheels_images.url as url')
                ->paginate(10);
                
    }
    
    public function getHotWheelDetail($id)
    {
        return DB::table('hot_wheels')
                ->where([['hot_wheels.id',$id],['hot_wheels_images.size','s']])
                ->join('vehicle_types','vehicle_types.id','=','hot_wheels.vehicle_type_id')
                ->join('manufactures','manufactures.id','=','hot_wheels.make')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('models','models.id','=','hot_wheels.model')
                ->join('hot_wheels_images','hot_wheels_images.post_id','=','hot_wheels.id')
                ->join('city_areas','city_areas.id','=','hot_wheels.city_area_id')
                ->join('cities','cities.id','=','city_areas.city_id')
                ->select('hot_wheels.*','vehicle_types.title as vehicle_type','brands.title as make','models.title as model','hot_wheels_images.url as url','cities.title as city','city_areas.title as city_area')
                ->get();
        
    }
    
    public function getAllImagesByPostId($id)
    {
        return DB::table('hot_wheels_images')->where([['post_id',$id],['size','l']])->limit(4)->get();
    }
    
    public function getAllPendingRequest()
    {
         return DB::table('hot_wheels')
                ->where([['isDeleted',0],['status',"pending"],['hot_wheels_images.size','s']])
                ->join('vehicle_types','vehicle_types.id','=','hot_wheels.vehicle_type_id')
                ->join('manufactures','manufactures.id','=','hot_wheels.make')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('models','models.id','=','hot_wheels.model')
                ->join('hot_wheels_images','hot_wheels_images.post_id','=','hot_wheels.id')
                ->select('hot_wheels.*','vehicle_types.title as vehicle_type','brands.title as make','models.title as model','hot_wheels_images.url as url')
                ->paginate(10);
    }
    
    public function updateRequest($request)
    {
      return DB::table('hot_wheels')->where('id',$request->id)->update(['status'=>$request->value]);
    }


    public function imageCompression($id)
    {
     
     $img_id=DB::table('hot_wheels_images')->insertGetId(['post_id'=>$id,'size'=>"s",'url'=>'/vehicle/default.png']);   
////// add Thumbnail/////////////////////////////
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

            

        imagejpeg($tmp_min,public_path('images/hotwheel/').($id."-s").".".$ext,100);////copy image
            $path="/hotwheel/".($id."-s").".".$ext;

            DB::table('hot_wheels_images')->where('id',$img_id)->update(['url'=>$path]);

            list($width_min,$height_min)=getimagesize($post_photo_tmp);
        $newwidth_min=700;///set compressing image width
        $newheight_min=430;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

        imagejpeg($tmp_min,public_path('images/hotwheel/').($id).".".$ext,100);////copy image
            $path="/hotwheel/".($id).".".$ext;

             DB::table('hot_wheels_images')->insert(['url'=>$path,'post_id'=>$id,'size'=>'l']);
      }


 ///////////////////////////////////////////////////////////////////////////////////////
 //Add other pics



            $post_photo=$_FILES['img']['name'];
            $post_photo_tmp=$_FILES['img']['tmp_name'];
            $photo_array=$_FILES['img']['size'];
            for($i=0;$i<count($photo_array);$i++)
            {
            $ext=pathinfo($post_photo[$i], PATHINFO_EXTENSION);///getting extention
            if($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='gif'||$ext=='GIF')
            {
              if($ext=='jpg' || $ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
              {
                $src=imagecreatefromjpeg($post_photo_tmp[$i]);
              }
              if($ext=='png' || $ext=='PNG')
              {
                $src=imagecreatefrompng($post_photo_tmp[$i]);
              }
              if($ext=='gif' || $ext=='GIF')
              {

                $src=imagecreatefromgif($post_photo_tmp[$i]);
              }
              list($width_min,$height_min)=getimagesize($post_photo_tmp[$i]);
              $newwidth_min=700;///set compressing image width
              $newheight_min=430;//($height_min/$width_min)*$newwidth_min;///equation for set image height
              $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
              imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress
              imagejpeg($tmp_min,public_path('images/hotwheel/').($id.'-'.$i).".".$ext,100);////copy image
              $path="/hotwheel/".($id.'-'.$i).".".$ext;
              DB::table('hot_wheels_images')->insert(['url'=>$path,'post_id'=>$id,'size'=>'l']);
            }
          }     
      
    }
}
