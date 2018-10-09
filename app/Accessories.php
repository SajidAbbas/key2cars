<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;


class Accessories extends Model
{
    private $col;
    private $id;
    
    
    public function getAccessoryDetails($id)
    {
         return DB::table('accessories')
                ->where([['accessories.id',$id],['accessories.is_deleted',0],['accessories.status','Like','approved'],['accessory_images.size','s']])
                ->join('city_areas','city_areas.id','=','accessories.city_area_id')
                ->join('cities','cities.id','=','city_areas.city_id')
                ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
                ->join('categories','categories.id','=','sub_categories.category_id')
                ->join('accessory_images','accessory_images.post_id','=','accessories.id')
                 ->join('users','users.id','=','accessories.user_id')
                ->select('accessories.*','users.name as name','users.number as number','sub_categories.title as sub_category','categories.id as category_id','categories.title as category','cities.title as city','accessory_images.url as url')
                ->get();
        
        
    }
    
    public function getRelatedAccessoriesByCategory($id,$category_id)
    {
         return DB::table('accessories')
                ->where([['accessories.id','!=',$id],['categories.id',$category_id],['accessories.is_deleted',0],['accessories.status','Like','approved'],['accessory_images.size','s']])
                ->join('city_areas','city_areas.id','=','accessories.city_area_id')
                ->join('cities','cities.id','=','city_areas.city_id')
                ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
                ->join('categories','categories.id','=','sub_categories.category_id')
                ->join('accessory_images','accessory_images.post_id','=','accessories.id')
                ->select('accessories.*','sub_categories.title as sub_category','categories.id as category_id','categories.title as category','cities.title as city','accessory_images.url as url')
                ->limit(4)
                 ->get();
        
    }
  
    public function getFeaturedAccessories()
    {
       return DB::table('accessories')
                ->where([['accessories.featured',1],['accessories.is_deleted',0],['accessories.status','Like','approved'],['accessory_images.size','s']])
                ->join('city_areas','city_areas.id','=','accessories.city_area_id')
                ->join('cities','cities.id','=','city_areas.city_id')
                ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
                ->join('categories','categories.id','=','sub_categories.category_id')
                ->join('accessory_images','accessory_images.post_id','=','accessories.id')
                ->select('accessories.*','sub_categories.title as sub_category','categories.title as category','cities.title as city','accessory_images.url as url')
                ->get();
    }
    
    public function getallNewFeaturedAccessories()
    {
        return DB::table('accessories')
                ->where([['accessories.featured',1],['accessories.is_deleted',0],['accessories.status','Like','approved'],['accessory_images.size','s']])
                ->join('city_areas','city_areas.id','=','accessories.city_area_id')
                ->join('cities','cities.id','=','city_areas.city_id')
                ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
                ->join('categories','categories.id','=','sub_categories.category_id')
                ->join('accessory_images','accessory_images.post_id','=','accessories.id')
                ->select('accessories.*','sub_categories.title as sub_category','categories.title as category','cities.title as city','accessory_images.url as url')
                ->get();
        
    }
    
     public function getFeaturedAccessoriesPaginate()
    {
       return DB::table('accessories')
                ->where([['accessories.featured',1],['accessories.is_deleted',0],['accessories.status','Like','approved'],['accessory_images.size','s']])
                ->join('city_areas','city_areas.id','=','accessories.city_area_id')
                ->join('cities','cities.id','=','city_areas.city_id')
                ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
                ->join('categories','categories.id','=','sub_categories.category_id')
                ->join('accessory_images','accessory_images.post_id','=','accessories.id')
                ->select('accessories.*','sub_categories.title as sub_category','categories.title as category','cities.title as city','accessory_images.url as url')
                ->paginate(15);
    }
    
    public function insertAccessory($request,$code)
    {
        
         date_default_timezone_set("Asia/Karachi");
         $user_id=null;
         $data=DB::table('users')->where('number',$request->number)->first();
         
         if($data){
         $user_id=$data->id;
         }
         
          $id= DB::table('accessories')->insertGetId(['user_id'=>$user_id,'title'=>$request->title,'description'=>$request->description,'price'=>$request->price,'city_area_id'=>$request->city_area,'condition'=>$request->condition,'is_deleted'=>"false",'featured'=>0,'status'=>"pending",'sub_category_id'=>$request->sub_category,'number'=>$request->number,'email'=>$request->email,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),'verification_code'=>$code,'isVerified'=>0]);
         
         
         $this->imageCompression($id);
         
         
         
         
        
        return $id;
    }
    
    public function imageCompression($id)
    {
     
     $img_id=DB::table('accessory_images')->insertGetId(['post_id'=>$id,'size'=>"s",'url'=>'/accessory/default.png']);   

 ////// add Thumbnail/////////////////////////////
     if($_FILES['file']['name'])
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

            

        imagejpeg($tmp_min,public_path('images/Accessory/').($id."-s").".".$ext,100);////copy image
            $path="/Accessory/".($id."-s").".".$ext;

            DB::table('accessory_images')->where('id',$img_id)->update(['url'=>$path]);

            list($width_min,$height_min)=getimagesize($post_photo_tmp);
        $newwidth_min=700;///set compressing image width
        $newheight_min=430;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

        
          /*  $stamp = imagecreatefrompng(public_path('assets/images/logo.png'));
            $marge_right = 5;
            $marge_bottom = 5;
            $sx = imagesx($stamp);
            $sy = imagesy($stamp);
            
            
            
            imagecopy($tmp_min, $stamp, imagesx($tmp_min) - $sx - $marge_right, imagesy($tmp_min) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

            $color= imagecolorallocate($tmp_img, 255, 255, 255);
            
            imagettftext($tmp_min, 14, 0, imagesx($tmp_min)-125, imagesy($tmp_min)-20, "Black", public_path('fonts/arial.ttf'), "KEY2CARS");
*/        
        

        imagejpeg($tmp_min,public_path('images/Accessory/').($id).".".$ext,100);////copy image
            $path="/Accessory/".($id).".".$ext;

             DB::table('accessory_images')->insert(['url'=>$path,'post_id'=>$id,'size'=>'l']);
             
      }
      
     }
     else
     {
            $post_photo=$_FILES['img']['name'];
            $post_photo_tmp=$_FILES['img']['tmp_name'];
            $photo_array=$_FILES['img']['size'];
            for($i=0;$i<1;$i++)
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
        $newwidth_min=290;///set compressing image width
        $newheight_min=184;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

        imagejpeg($tmp_min,public_path('images/Accessory/').($id."-s").".".$ext,100);////copy image
            $path="/Accessory/".($id."-s").".".$ext;

            DB::table('accessory_images')->where('id',$img_id)->update(['url'=>$path]);

            
      }
         
     }
     
     
     }

//////////////////////////////////////// //Add other pics




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
              imagejpeg($tmp_min,public_path('images/Accessory/').($id.'-'.$i).".".$ext,100);////copy image
              $path="/Accessory/".($id.'-'.$i).".".$ext;
              DB::table('accessory_images')->insert(['url'=>$path,'post_id'=>$id,'size'=>'l']);
            }
          }     
      
    }
    
    public function getAllAccessory()
    {
        return $data=DB::table('accessories')
   ->where([['accessory_images.size','=','s'],['accessories.is_deleted',false]])
   
      ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
       ->join('categories','categories.id','=','sub_categories.category_id')
       ->join('city_areas','city_areas.id','=','accessories.city_area_id')
      ->join('cities','cities.id' , '=' , 'city_areas.city_id')
      ->join('accessory_images','accessory_images.post_id' , '=' , 'accessories.id')
      
     
   
      ->select('accessories.*','categories.title as category','sub_categories.title as sub_category','cities.title as city','accessory_images.url as url')
      ->paginate(10);
    }
    
    public function getAllAccessoryByUser($user_id)
    {
        return $data=DB::table('accessories')
   ->where([['accessory_images.size','=','s'],['accessories.is_deleted',false],['user_id',$user_id]])
   
      ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
       ->join('categories','categories.id','=','sub_categories.category_id')
       ->join('city_areas','city_areas.id','=','accessories.city_area_id')
      ->join('cities','cities.id' , '=' , 'city_areas.city_id')
      ->join('accessory_images','accessory_images.post_id' , '=' , 'accessories.id')
      
     
   
      ->select('accessories.*','categories.title as category','sub_categories.title as sub_category','cities.title as city','accessory_images.url as url')
      ->orderBy('accessories.updated_at','desc')
                ->paginate(10);
    }
    
    public function getAccesssoryDetail($id)
    {
      return $data=DB::table('accessories')
      ->where('accessories.id',$id)
      ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
      ->join('categories','categories.id','=','sub_categories.category_id')
       ->join('city_areas','city_areas.id','=','accessories.city_area_id')
      ->join('cities','cities.id' , '=' , 'city_areas.city_id')
      
      ->join('users','users.id','=','accessories.user_id')     
      ->select('accessories.*','categories.id as category_id','categories.title as category','sub_categories.id as sub_category_id','sub_categories.title as sub_category','users.name as seller_name','users.number as number ','cities.title as city','cities.id as city_id','city_areas.id as city_area_id','city_areas.title as city_area')
      ->get();


    }
     public function getAllImagesByPostId($id)
    {
      return DB::table('accessory_images')->where([['post_id',$id],['size','l']])->get();
    }
    public function get4ImagesByPostIdAccessories($id)
    {
      return DB::table('accessory_images')->where([['post_id',$id],['size','l']])->orderby('id','asc')->limit(4)->get();
    }
    
    public function getAllPendingRequest()
    {
     return $data=DB::table('accessories')
   ->where([['accessory_images.size','=','s'],['accessories.is_deleted',false]])
   
      ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
       ->join('categories','categories.id','=','sub_categories.category_id')
       ->join('city_areas','city_areas.id','=','accessories.city_area_id')
      ->join('cities','cities.id' , '=' , 'city_areas.city_id')
      ->join('accessory_images','accessory_images.post_id' , '=' , 'accessories.id')
     
      ->select('accessories.*','categories.title as category','sub_categories.title as sub_category','cities.title as city','accessory_images.url as url')
      ->orderby('created_at', 'desc')
      ->paginate(10);


    }
    
     public function updateRequest($request)
    {
      return DB::table('accessories')->where('id',$request->id)->update(['status'=>$request->value]);
    }
    
    public function deleteAccessories($ids)
    {
        foreach($ids as $id)
        {
             $data=DB::table('accessories')->where('id', $id)->update(['isDeleted'=>'1']);
        }
        return $data;
    }
    
     public function featureAccessory($id)
    {
      return DB::table('accessories')->where('id',$id)->update(['featured'=>1]);
    }

    public function getCityAccessoriesCount()
    {
         return $data=DB::table('accessories')
        ->where([['accessories.is_deleted','false'],['accessories.status','approved']])
        ->join('city_areas','city_areas.id','=','accessories.city_area_id')         
        ->join('cities','cities.id','=','city_areas.city_id')
        ->select(DB::raw('COUNT(accessories.id) as size'),'cities.title','cities.id')
        ->groupBY('cities.id')
        ->get();
    }
    
    
    
    
    public function searchFeaturedAccessoriesByAllFilters(array $filters =[])
    {
      


       $query = DB::table('accessories');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('accessories.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('accessories.price','<=', $this->id);
      }
      else if($this->col=="name")
      {
        $query=$query->Where('accessories.title','Like','%'. $this->id.'%');
      }
      
      
      else if($this->col=="condition")
      {
          $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('accessories.condition', $id1);
          }
            });
          
      }
      else if($this->col=="sort_price")
     {
         
     }
      else
      {
        $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere($this->col. '.id', $id1);
          }
            });
            
          
       
    }
      
     
    }


    $query->where([['accessories.featured',1],['accessories.is_deleted','false'],['accessory_images.size','s'],['accessories.status','approved']])
      
       ->join('city_areas','city_areas.id','=','accessories.city_area_id')     
       ->join('cities','cities.id' , '=' , 'city_areas.city_id')
       ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')     
       ->join('categories','categories.id','=','sub_categories.category_id')     
      ->join('accessory_images','accessory_images.post_id' , '=' , 'accessories.id')
     ->select('accessories.*','categories.title as category','sub_categories.title as sub_category','cities.title as city','accessory_images.url');
    // ->orderBy('accessories.updated_at','desc');
    
    foreach ($filters as $col => $id)
    {
        if($col=="sort_price")
      {
          if ($id == 0)
          {
              $query->orderBy('accessories.price','asc');
          }
          else if($id == 1)
          {
             $query->orderBy('accessories.price','desc');
          }
      }
        
    }
    
      
      //->groupby('vehicles.id');

       return $query->paginate(15);

    }
    
    public function searchAccessoriesByAllFilters(array $filters =[])
    {
      


       $query = DB::table('accessories');

    foreach ($filters as $this->col => $this->id) {
      if($this->col=="price_fr")
      {
        $query=$query->Where('accessories.price','>=', $this->id);
      }
      else if($this->col=="price_to")
      {
        $query=$query->Where('accessories.price','<=', $this->id);
      }
      else if($this->col=="name")
      {
        $query=$query->Where('accessories.title','Like','%'. $this->id.'%');
      }
      else if($this->col=="sort_price")
     {
         
     }
      
      
      
      else if($this->col=="condition")
      {
          $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere('accessories.condition', $id1);
          }
            });
          
      }
      else
      {
        $query->Where(function ($query) {
          foreach ($this->id as  $id1)
          {
            $query->orwhere($this->col. '.id', $id1);
          }
            });
            
          
       
    }
      
     
    }


    $query->where([['accessories.is_deleted','false'],['accessory_images.size','s'],['accessories.status','approved']])
      
       ->join('city_areas','city_areas.id','=','accessories.city_area_id')     
       ->join('cities','cities.id' , '=' , 'city_areas.city_id')
       ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')     
       ->join('categories','categories.id','=','sub_categories.category_id')     
      ->join('accessory_images','accessory_images.post_id' , '=' , 'accessories.id')
     ->select('accessories.*','categories.title as category','sub_categories.title as sub_category','cities.title as city','accessory_images.url');
      //->orderBy('accessories.updated_at','desc')
      
    foreach ($filters as $col => $id)
    {
        if($col=="sort_price")
      {
          if ($id == 0)
          {
              $query->orderBy('accessories.price','asc');
          }
          else if($id == 1)
          {
             $query->orderBy('accessories.price','desc');
          }
      }
        
    }
      //->groupby('vehicles.id');

       return $query->paginate(15);

    }
    
    
    
    public function getAllAccessoriesByCity($city_id)
    {
        return DB::table('accessories')
                ->where([['cities.id',$city_id],['accessories.is_deleted',0],['accessories.status','Like','approved'],['accessory_images.size','s']])
                ->join('city_areas','city_areas.id','=','accessories.city_area_id')
                ->join('cities','cities.id','=','city_areas.city_id')
                ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')
                ->join('categories','categories.id','=','sub_categories.category_id')
                ->join('accessory_images','accessory_images.post_id','=','accessories.id')
                ->select('accessories.*','sub_categories.title as sub_category','categories.title as category','cities.title as city','accessory_images.url as url')
                ->orderby('accessories.featured',1)
                ->paginate(15);
        
    }
    
   /* function calculAngleBtwHypoAndLeftSide($bottomSideWidth, $leftSideWidth)
            {
        $hypothenuse = sqrt(pow($bottomSideWidth, 2) + pow($leftSideWidth, 2));
        $bottomRightAngle = acos($bottomSideWidth / $hypothenuse) + 180 / pi();
        return -round(90 - $bottomRightAngle);
        
            }
    * 
    */
      public function updateAccessory($request)
      {
          date_default_timezone_set("Asia/Karachi");
        
         
          DB::table('accessories')->where('id',$request->id)->update(['title'=>$request->title,'description'=>$request->description,'price'=>$request->price,'city_area_id'=>$request->city_area,'condition'=>$request->condition,'is_deleted'=>"false",'featured'=>0,'status'=>"pending",'sub_category_id'=>$request->sub_category,'number'=>$request->number,'email'=>$request->email,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),'verification_code'=>$code,'isVerified'=>0]);
         
         
        // $this->imageCompression($id);
         
      }





}
