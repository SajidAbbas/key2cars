<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Http\Requests;

use App\City;
use App\Category;
use App\SubCategory;
use App\Accessories;
use Validator;
use Carbon\Carbon;


class AccessoriesController extends Controller
{
    protected  $accessory;
    protected $city;
    protected $category;
    protected $sub_cateory;


    public function __construct()
    {
        $this->accessory=new Accessories();
        $this->city=new City();
        $this->category=new Category();
        $this->sub_categroy=new SubCategory();
    }
    
    public function index()
    {
        $cities=City::get();
        $categories=Category::get();
        $featured_accessories=$this->accessory->getFeaturedAccessories();
        $city_accessories=$this->accessory->getCityAccessoriesCount();
        
        return view('website/Accessorypages.index',compact('categories','cities','featured_accessories','city_accessories'));
    }
    
    public function updateSubCategory(Request $request)
    {
        return SubCategory::where('category_id',$request->category)->get();
    }
    
    public function sellAccessories()
    {
        $city=City::all();
        $category=Category::all();
        
        
        return view('website/Accessorypages.sell-accessory',compact('city','category'));
        
    }
    
    public function insertAccessory(Request $request)
    {
      // return response()->json(['success'=>$request->all()]);
         

       $validator = Validator::make($request->all(), [
            'city' => 'required',
            'title'=>'required',
            'category'=>'required',
            'sub_category'=>'required',
            'price'=>'required|min:1',
            'name'=>'required',
           'email'=>'email',
            'number'=>'required|regex:/(03)[0-9]{9}/|min:11|max:11'
          
        ]);
        if (!$validator->passes()) {
             return response()->json(['error'=>$validator->errors()->all()]);
        }
       
       
        $code=rand(100000,999999);
        
        
        $ad_id=$this->accessory->insertAccessory($request,$code);
        
        
        if($request->video){
            $file = $request->file('video');
            $ext = File::extension($file->getClientOriginalName());
            $path = public_path().'/upload/vehicle/';
            $filename=$ad_id.".".$ext;
            $file->move($path, $filename);
           date_default_timezone_set("Asia/Karachi");
            Accessories::where('id',$ad_id)->update(['video_url'=>$filename]);
             
            
        }
     
        return response()->json(['success'=>'Added new records.','code'=>$code,'id'=>$ad_id]);

        
    }
    
    public function FeaturdAccessory()
    {
         $city_accessories=$this->accessory->getCityAccessoriesCount();
         $all_accessories=$this->accessory->getFeaturedAccessoriesPaginate();
         
         //////Search form//////
            /////////////////////////////
         $cities=City::get();
        $categories=Category::get();
         
         ////////////////////////////////////FILTERS////////////////////////
         
         $featured_category_accessories=$this->category->getAllCategoryFeaturedAccessories();
         $featured_city_accessories=$this->city->getAllCityFeaturedAccessories();
         
         $images=array();
      
      
      foreach($all_accessories as $a_a)
          {
          $images[$a_a->id]=$this->accessory->get4ImagesByPostIdAccessories($a_a->id);  
          
          }
          
          ////////////////////////////////Updated Date Converted in days//////
      $updated_date=array();
      
      foreach($all_accessories as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
          $updated_date[$a_c->id] = $this->modifiedDate($now, $end);
          
      }
      
      ////////////////////////////////////////
         
         
         
        return view('website/Accessorypages.featured-accessories',compact('updated_date','cities','categories','images','city_accessories','featured_city_accessories','featured_category_accessories','all_accessories'));
        
       
       
     
        

    /////////////////////////////////FILTERS//////////////////////////////////
      /////////////////////////////////////////////////////////////////////////
      
        $featured_category_accessories=$this->category->getAllCategoryAccessories();
        $featured_city_accessories=$this->city->getAllCityAccessories();

      
        $all_accessories=$this->accessory->getAllAccessoriesByCity($request->id);
        
        $images=array();
      
      
      foreach($all_accessories as $a_a)
          {
          $images[$a_a->id]=$this->accessory->get4ImagesByPostIdAccessories($a_a->id);  
          
          }
     
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      
      

      return view('website/Accessorypages.all-accessories',compact('cities','categories','most_featured_cars','images','new_accessories','all_accessories','featured_category_accessories','featured_city_accessories'));

      
        
        
        
    }
    
    public function updateFeaturedAccessories(Request $request)
    {
     
        $filters = [];
    if ($request->has('city')) 
    {
      $filters['cities'] = $request->city;
    }
    if ($request->has('category')) {
      $filters['categories'] = $request->category;
    }
    if($request->has('sub_category'))
    {
      $filters['sub_categories']=$request->sub_category;
    }
    if($request->has('condition'))
    {
        $filters['condition']=$request->condition;
    }
    
    if($request->price_fr!="")
    {
      $filters['price_fr']=str_replace(',','',$request->price_fr);
    }
    if($request->price_to!="")
    {
      $filters['price_to']=str_replace(',','', $request->price_to);
    }
    if($request->name!="")
    {
         $filters['name']=$request->name;
    }
    if($request->has('sort_price'))
        {
            $filters['sort_price']=$request->sort_price;
        }
    //dd($filters);

    $all_accessories = $this->accessory->searchFeaturedAccessoriesByAllFilters($filters);
    
    $images=array();
      
      
      foreach($all_accessories as $a_a)
          {
          $images[$a_a->id]=$this->accessory->get4ImagesByPostIdAccessories($a_a->id);  
          
          }
          
          ////////////////////////////////Updated Date Converted in days//////
      $updated_date=array();
      
     foreach($all_accessories as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
          $updated_date[$a_c->id] = $this->modifiedDate($now, $end);
          
      }
      
      ////////////////////////////////////////
    
    //dd($accessory);
    return view('website/Accessorypages.update-accessory',compact('all_accessories','images','updated_date'));

    }
    
    public function updateAllAccessories(Request $request)
    {
    
        $filters = [];
    if ($request->has('city')) 
    {
      $filters['cities'] = $request->city;
    }
    if ($request->has('category')) {
      $filters['categories'] = $request->category;
    }
    if($request->has('sub_category'))
    {
      $filters['sub_categories']=$request->sub_category;
    }
    if($request->has('condition'))
    {
        $filters['condition']=$request->condition;
    }
    
     if($request->price_fr!="")
    {
      $filters['price_fr']=str_replace(',','',$request->price_fr);
    }
    if($request->price_to!="")
    {
      $filters['price_to']=str_replace(',','', $request->price_to);
    }
    if($request->name!="")
    {
         $filters['name']=$request->name;
    }
    
    if($request->has('sort_price'))
        {
            $filters['sort_price']=$request->sort_price;
        }
    //dd($filters);

    $all_accessories = $this->accessory->searchAccessoriesByAllFilters($filters);
    
   
        $images=array();
      
      
      foreach($all_accessories as $a_a)
          {
          $images[$a_a->id]=$this->accessory->get4ImagesByPostIdAccessories($a_a->id);  
          
          }
          
          ////////////////////////////////Updated Date Converted in days//////
      $updated_date=array();
      
    foreach($all_accessories as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
          $updated_date[$a_c->id] = $this->modifiedDate($now, $end);
     }
      
      ////////////////////////////////////////
     
     
    
    //dd($accessory);
    return view('website/Accessorypages.update-accessory',compact('all_accessories','images','updated_date'));

    }
    
    public function accessoryDetails(Request $request)
    {
        

      $data=$this->accessory->getAccessoryDetails($request->id);
      foreach ($data as $d) {
            $category_id = $d->category_id;
           
        }
      $related_accessories=$this->accessory->getRelatedAccessoriesByCategory($request->id,$category_id);
       
     
      $images=$this->accessory->getAllImagesByPostId($request->id);
      
      ////////////////////////////////Updated Date Converted in days//////
      $updated_date=array();
      
      foreach($data as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
          $updated_date[$a_c->id] = $this->modifiedDate($now, $end);
          
      }
      
      ////////////////////////////////////////
     
    

        return view('website/Accessorypages.detail-accessory',compact('data','images','related_accessories','updated_date'));

        
    }
    
    public function getAccessoriesByCity(Request $request)
    {
        $new_accessories=$this->accessory->getallNewFeaturedAccessories();
       
        /////////////////////////////
         $cities=City::get();
        $categories=Category::get();
        

    /////////////////////////////////FILTERS//////////////////////////////////
      /////////////////////////////////////////////////////////////////////////
      
        $featured_category_accessories=$this->category->getAllCategoryAccessories();
        $featured_city_accessories=$this->city->getAllCityAccessories();

      
        $all_accessories=$this->accessory->getAllAccessoriesByCity($request->id);
        
        $images=array();
      
      
      foreach($all_accessories as $a_a)
          {
          $images[$a_a->id]=$this->accessory->get4ImagesByPostIdAccessories($a_a->id);  
          
          }
          
          ////////////////////////////////Updated Date Converted in days//////
      $updated_date=array();
      
      foreach($all_accessories as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
          $updated_date[$a_c->id] = $this->modifiedDate($now, $end);
          
      }
      
      ////////////////////////////////////////
     
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      
      

      return view('website/Accessorypages.all-accessories',compact('updated_date','cities','categories','most_featured_cars','images','new_accessories','all_accessories','featured_category_accessories','featured_city_accessories'));

      
       

      

    }
            
            
    public function searchAccessories(Request $request)
    {
    
  
     $filters = [];
    if ($request->city!="") 
    {
      $filters['cities'] = $request->city;
    }
    if ($request->category!="") {
      $filters['categories'] = $request->category;
    }
    if($request->sub_category!="")
    {
      $filters['sub_categories']=$request->sub_category;
    }
   
   
    $all_accessories = $this->accessory->searchAccessoriesByAllFilters($filters);
    
    
    
      $new_accessories=$this->accessory->getallNewFeaturedAccessories();
       
        /////////////////////////////
         $cities=City::get();
        $categories=Category::get();
        

    /////////////////////////////////FILTERS//////////////////////////////////
      /////////////////////////////////////////////////////////////////////////
      
        $featured_category_accessories=$this->category->getAllCategoryAccessories();
        $featured_city_accessories=$this->city->getAllCityAccessories();
       
        $images=array();
      
      
      foreach($all_accessories as $a_a)
          {
          $images[$a_a->id]=$this->accessory->get4ImagesByPostIdAccessories($a_a->id);  
          
          }
          
          ////////////////////////////////Updated Date Converted in days//////
      $updated_date=array();
      
     foreach($all_accessories as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
         
         $updated_date[$a_c->id] = $this->modifiedDate($now, $end);
          
      }
     
      ////////////////////////////////////////
     
      
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      
      

      return view('website/Accessorypages.all-accessories',compact('updated_date','cities','categories','most_featured_cars','images','new_accessories','all_accessories','featured_category_accessories','featured_city_accessories'));

      
    }
    
    public function sendVerificationCode(Request $request)
    {
        $data=Accessories::where('id',$request->id)->get();
        foreach($data as $d){
        $code="Verification Code for Key2Car ad ".$d->verification_code;
        $number="92".substr($d->number,1);}
        $ch = curl_init("http://brandedsms.net//api/sms-api.php?username=omer&password=omer&phone=".$number."&sender=Step&message=".$code);
        $result= curl_exec($ch);
        return $result."";
        
    }
    
    public function verifiedAd(Request $request)
    {
         date_default_timezone_set("Asia/Karachi");
        
        Accessories::where('id',$request->id)->update(['isVerified'=>1]);
    }
    
    public function modifiedDate($now, $end)
    {
        $date = '';
        
        $length = $now->diffInMonths($end);
        
          if ( $length > 0 ){
              $date = $length ." months ago";
          }
          else{
              $length = $now->diffInWeeks($end);
              
              if ( $length > 0 ){
                  $date = $length ." weeks ago";
              }
              else{
                  $length = $now->diffInDays($end);
                  if ( $length > 0 ){
                      $date = $length ." days ago";
                  }
                  else{
                      $length = $now->diffInHours($end);
                      if ( $length > 0 ){
                          $date = $length ." hours ago";
                      }
                      else{ 
                          $length = $now->diffInMinutes($end);
                          $date = $length ." mins ago";
                          
                      }
                      
                     
                  }
                  
              }
              
              
          }
          
          return $date;
    }
    
}
    

