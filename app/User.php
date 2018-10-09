<?php

namespace App;
use DB;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
     use Notifiable;
    
    const admin=1;
    const guest=2;
    const dealer=3;




    protected $fillable = [
        'name', 'email', 'password','number','role_id','address','img_url',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    
    public function city()
    {
        return $this->belongsTo('App\City');
    }


    
    
//////////////////////////for home page
    public function getFeaturedDealerLimit()
    {
        return DB::table('users')
        ->where([['users.role_id',\App\Role::Dealer],['users.featured',1]])
      
        ->select('users.*')
        ->limit(4)
        ->get();

    }

////////////////////////Used Car index page
    public function getAllFeaturedDealer()
    {
        return DB::table('users')
        ->where([['users.role_id',\App\Role::Dealer],['users.featured',1]])
        ->join('roles','roles.id','=','users.role_id')
        ->select('users.*')
       
        ->get();

    }

    public function getAllDealerCars()
    {
        return DB::table('users')
        ->where([['roles.title','Like','Dealer'],['active',1]])
        ->join('roles','roles.id','=','users.role_id')
        ->select('users.*')
        ->paginate(15);
       

    }
    
     public function getAllDealerByType($id)
    {
         $query = DB::table('vehicles');
         $query->where([['users.role_id', User::dealer],['vehicles.vehicle_type_id',$id]])
      
      ->join('vehicle_types','vehicle_types.id','=' , 'vehicles.vehicle_type_id')
      ->join('cities','cities.id' , '=' , 'vehicles.city_id')
      ->join('users','users.id','=','vehicles.user_id')
      ->select('users.*','vehicles.id as i')
      
      ->orderBy('users.updated_at','desc')
            ->groupby('users.id');
    

       return $query->paginate(24);
       

    }

    public function getAllCityDealersCars()
    {
       return DB::table('users')
               ->where([['roles.id', \App\Role::Dealer],['dealer_category_maping.vehicle_type', \App\VehicleType::Car],['vehicles.vehicle_type_id', \App\VehicleType::Car]])
               ->join('vehicles','vehicles.user_id','=','users.id')
               ->join('cities','cities.id','=','vehicles.city_id')
               ->join('roles','roles.id','=','users.role_id')
               ->join('dealer_category_maping','dealer_category_maping.dealer_id','=','users.id')
               ->select(DB::raw('COUNT(cities.id) as size'),'cities.title','cities.id')
               ->groupBY('cities.id')
               ->get();
    }
    
    public function getAllCityDealersBikes()
    {
      return DB::table('users')
              ->where([['roles.id', \App\Role::Dealer],['dealer_category_maping.vehicle_type', \App\VehicleType::Bike],['vehicles.vehicle_type_id', \App\VehicleType::Bike]])
               ->join('vehicles','vehicles.user_id','=','users.id')
               ->join('cities','cities.id','=','vehicles.city_id')
               ->join('roles','roles.id','=','users.role_id')
               ->join('dealer_category_maping','dealer_category_maping.dealer_id','=','users.id')
               ->select(DB::raw('COUNT(cities.id) as size'),'cities.title','cities.id')
               ->groupBY('cities.id')
               ->get();
    }
    
    public function login($request)
    {
      return  DB::table('users')->where([['password',$request->passwordlogin],['email',$request->emaillogin]])
                
                ->get();
    }
    
    public function signup($request)
    {
       // return DB::table('users')->insert(['name'=>$request->usernamesign,'email'=>$request->emailsign,'number'=>$request->numbersign,'password'=>$request->passwordsign]);
    
        
        $data= DB::table('users')->where([['number',$request->numbersign],['email',$request->emailsign]])
                
                ->get();
        if(!$data)
        {
            return DB::table('users')->insert(['name'=>$request->usernamesign,'email'=>$request->emailsign,'number'=>$request->numbersign,'password'=>$request->passwordsign]);
        }
        return 0;
                    
    
        
        }
        
        
    public function getAllDealerCategories($id)
    {
        $data=DB::table('dealer_category_maping')
                ->where('dealer_id',$id)
                ->join('users','users.id','=','dealer_category_maping.dealer_id')
                ->join('vehicle_types','vehicle_types.id','=','dealer_category_maping.vehicle_type')
                ->select('dealer_category_maping.*','vehicle_types.title as category')
                ->get();
        
        $categories="";
        foreach($data as $d)
        {
            $categories=$categories." ".$d->category;
        }
        
                return $categories;
      }
      
      public function getDealerCategories($id)
      {
         return  $data=DB::table('dealer_category_maping')
                ->where('dealer_id',$id)
                ->join('users','users.id','=','dealer_category_maping.dealer_id')
                ->join('vehicle_types','vehicle_types.id','=','dealer_category_maping.vehicle_type')
                ->select('dealer_category_maping.active as active','users.id as id','users.name as name','vehicle_types.title as category')
                ->get();
          
      }
      
      
      
      
      
      public function updateDealer($data)
    {
       date_default_timezone_set("Asia/Karachi");

        try{

         DB::table('users')->where('id',$data->id)->update(
            ['name' => $data->name,'short_description'=>$data->short_description,'description'=>$data->description,'address'=>$data->address,'city_id'=>$data->city,'number'=>$data->number,'active'=>$data->status,'featured'=>$data->feature,'created_at' => date('Y-m-d H:i:s'),'updated_at' => date('Y-m-d H:i:s')]
            );
    }catch(\Illuminate\Database\QueryException $ex){ 
        return parent::report($ex->getMessage());
        dd($ex->getMessage()); 
  // Note any method of class PDOException can be called on $ex.
    }

    $this->imageCompression($data->id);



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

            

            imagejpeg($tmp_min,public_path('images/dealer/').($id).".".$ext,100);////copy image
            $path="/dealer/".($id).".".$ext;

            DB::table('users')->where('id',$id)->update(['icon_url'=>$path]);

        

        }
    }
            
}



