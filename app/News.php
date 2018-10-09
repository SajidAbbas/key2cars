<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class News extends Model
{
    
    public function getAllNews(){
        
        return DB::table('news')
                ->join('vehicle_types','vehicle_types.id','=','news.vehicle_type')
                ->join('models','models.id','=','news.model')
                ->join('manufactures','manufactures.id','=','models.manufacture_id')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('model_versions','model_versions.id','=','news.model_version')
                ->select('news.*','brands.title as make','models.title as model','model_versions.title as model_version','vehicle_types.title as type')
                ->orderby('news.created_at','desc')
                ->paginate(10);
    }
    
    public function getAllActiveNews(){
        
        return DB::table('news')
                ->where([['isActive',1],['news_images.size','s']])
                ->join('vehicle_types','vehicle_types.id','=','news.vehicle_type')
                ->join('models','models.id','=','news.model')
                ->join('manufactures','manufactures.id','=','models.manufacture_id')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('model_versions','model_versions.id','=','news.model_version')
                ->join('news_images','news_images.news_id','=','news.id')
                ->select('news.*','brands.title as make','models.title as model','model_versions.title as model_version','vehicle_types.title as type','news_images.url as url')
                ->orderby('news.created_at','desc')
                
                ->paginate(20);
    }
    
    public function getNewsByID($id)
    {
         return DB::table('news')
                 ->where('news.id',$id)
                ->join('vehicle_types','vehicle_types.id','=','news.vehicle_type')
                ->join('models','models.id','=','news.model')
                ->join('manufactures','manufactures.id','=','models.manufacture_id')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('model_versions','model_versions.id','=','news.model_version')
                ->select('news.*','brands.title as make','manufactures.id as make_id','models.id as model_id','models.title as model','model_versions.id as model_version_id','model_versions.title as model_version','vehicle_types.title as type')
                ->get();
    }
    
    public function getAllSectionByNewsId($id)
    {
        return DB::table('news_sections')
                ->where('news_sections.news_id',$id)
                ->join('news_section_images','news_section_images.section_id','=','news_sections.id')
                ->select('news_sections.*','news_section_images.url as url')
                ->get();
    }
    
    
    public function addNews($request)
    {
        date_default_timezone_set("Asia/Karachi");
        
        //////////Add news/////////////////
        $news_id=DB::table('news')->insertGetId(['title'=>$request->title,'vehicle_type'=>$request->type,'model'=>$request->model,'model_version'=>$request->model_version,'description'=>$request->news_description,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s'),'isActive'=>1,'isFeatured'=>0]);
        
        $this->imageCompressionNews($news_id);
        
        //////////add new sections///////////
        
        for($i=0;$i<count($request->description);$i++)
        {
            $section_id=DB::table('news_sections')->insertGetId(['title'=>$request->heading[$i],'description'=>$request->description[$i],'news_id'=>$news_id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
            
            
            $this->imageCompressionNewsSection($section_id,$i);
            
        }
        
       
        
        
    }
    
    
    
    
    public function imageCompressionNews($id)
    {
     
        date_default_timezone_set("Asia/Karachi");
            $post_photo=$_FILES['images']['name'];
            $post_photo_tmp=$_FILES['images']['tmp_name'];
            $photo_array=$_FILES['images']['size'];
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
              if($i==0)
              {
                  list($width_min,$height_min)=getimagesize($post_photo_tmp[$i]);
              $newwidth_min=290;///set compressing image width
              $newheight_min=184;//($height_min/$width_min)*$newwidth_min;///equation for set image height
              $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
              imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress
              imagejpeg($tmp_min,public_path('images/news/').($id.'-s').".".$ext,100);////copy image
              $path="/news/".($id.'-'.$i).".".$ext;
              DB::table('news_images')->insert(['url'=>$path,'news_id'=>$id,'size'=>'s','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
            
                  
              }
              
              list($width_min,$height_min)=getimagesize($post_photo_tmp[$i]);
              $newwidth_min=1440;///set compressing image width
              $newheight_min=400;//($height_min/$width_min)*$newwidth_min;///equation for set image height
              $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
              imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress
              imagejpeg($tmp_min,public_path('images/news/').($id.'-'.$i).".".$ext,100);////copy image
              $path="/news/".($id.'-'.$i).".".$ext;
              DB::table('news_images')->insert(['url'=>$path,'news_id'=>$id,'size'=>'l','created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
            }
          }     
      
    }
    
    
    
    public function imageCompressionNewsSection($id,$index)
    {
     
        date_default_timezone_set("Asia/Karachi");
        
            $post_photo=$_FILES['section_img']['name'];
            $post_photo_tmp=$_FILES['section_img']['tmp_name'];
            $photo_array=$_FILES['section_img']['size'];
            for($i=0;$i<count($photo_array);$i++)
            {
                if($i==$index){
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
              imagejpeg($tmp_min,public_path('images/news/news_section/').($id.'-'.$i).".".$ext,100);////copy image
              $path="/news/news_section/".($id.'-'.$i).".".$ext;
              DB::table('news_section_images')->insert(['url'=>$path,'section_id'=>$id,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]);
            }
          }     
            }
    }
    
    
    
    public function updateAllNews(array $filters =[])
    {
        

       $query = DB::table('news');

    foreach ($filters as $col => $id) {
     
     $query->where($col. '.id', $id);
     
    }


    $query->where([['isActive',1],['news_images.size','s']])
                ->join('vehicle_types','vehicle_types.id','=','news.vehicle_type')
                ->join('models','models.id','=','news.model')
                ->join('manufactures','manufactures.id','=','models.manufacture_id')
                ->join('brands','brands.id','=','manufactures.brand_id')
                ->join('model_versions','model_versions.id','=','news.model_version')
                ->join('news_images','news_images.news_id','=','news.id')
                ->select('news.*','brands.title as make','models.title as model','model_versions.title as model_version','vehicle_types.title as type','news_images.url as url')
                ->orderby('news.created_at','desc');
                
                
     return $query->paginate(20);

    }
        
    
    
    
    
}
