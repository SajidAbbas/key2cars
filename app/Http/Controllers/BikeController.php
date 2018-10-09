<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Vehicle;
use App\City;
use App\User;
use App\VehicleBodyType;
use App\Manufacture;
use App\RegistrationCity;
use App\Transmission;
use App\EngineType;
use App\Assembly;
use App\Feature;
use App\Color;
use App\Models;
use App\ModelYear;
use Validator;
use DB;
use Carbon\Carbon;

class BikeController extends Controller
{

    protected $vehicle;
    protected $city;
    protected $user;
    protected $body_type;
    protected $manufacture;
    protected $registration_city;
    protected $transmission;
    protected $engine_type;
    protected $assembly;
    protected $feature;
    protected $color;
    protected $model;
    protected $model_year;
  


    public function __construct() {

     $this->vehicle = new Vehicle;  
     $this->city=new City();
     $this->user=new User();
     $this->body_type=new VehicleBodyType();
     $this->manufacture=new Manufacture();
     $this->registration_city=new RegistrationCity();
     $this->transmission=new Transmission();
     $this->engine_type=new EngineType();
     $this->assembly=new Assembly();
     $this->color=new Color();
     $this->feature=new Feature();
     $this->model=new Models();
     $this->model_year=new ModelYear();


 }
    
    public function index()
    {
        
        $featured_bikes=$this->vehicle->getFeaturedBikes();
        $make=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        $count=0;
        $make_model=array();
        foreach($make as $m)
        {
         $make_model[$count][0]=$m->brand;
         $make_model[$count][1]=$m->brand_id;
         $make_model[$count][2]=$m->icon;
         $make_model[$count][3]=$this->model->getAllBikeModelsByMake($m->brand_id);
         $count++;
      }
     //dd($make_model);
      
       $city=City::orderby('title','asc')->get();
      $engine_type=EngineType::orderby('title','asc')->where('vehicle_type_id',\App\VehicleType::Bike)->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();

      
        $city_bikes=$this->city->getAllCityBikes();
    	return view('website/Bikepages.index',compact('make','featured_bikes','city_bikes','make_model','city','engine_type','model_year','reg_city'));
    }
    
    public function newBike()
    {
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        $vehicle=$this->vehicle->getNewVehiclesByType(\App\VehicleType::Bike);
        return view('website/Bikepages.new-bikes',compact('vehicle','manufacture'));
       
    }
    
    
    public function vehicleDetails($id)
    {
        
       
         $data=$this->vehicle->getNewVehicleDetails($id);
        $images=$this->vehicle->getAllImagesByPostIdNewVehicles($id);
        
      
        foreach($data as $d)
        {
            $model_id=$d->model_id;
        }
        
        $related_ads=$this->vehicle->getRelatedBikesByModel(0, $model_id);
        
        
      return view('website/Carpages.new-car-detail',compact('data','images','related_ads'));
    }
    

    public function featuredBike(){
            
             
        
        //////////////////////////////////////SEARCH FORM//////////////////////////////////////
       
      $engine_type=EngineType::where('vehicle_type_id',\App\VehicleType::Bike)->orderby('title','asc')->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();
         
        
       /////////////////////////////Filters/////////////

        $city_vehicles_count=$this->city->getAllCityFeaturedVehicles(\App\VehicleType::Bike);
        $manufacture_featured_bikes=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Bike);
       
        $reg_cities=$this->registration_city->getAllRegisterdCityFeaturedVehicles(\App\VehicleType::Bike);
        $engine_types=$this->engine_type->getAllEngineTypeFeaturedVehicles(\App\VehicleType::Bike);
        $model_bikes=$this->model->getAllModelFeaturedVehicles(\App\VehicleType::Bike);
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        $city=City::all();

        ////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////

        
        
       $all_bikes=$this->vehicle->getFeaturedBikesPaginate();
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
          
           $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
     
     
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Bike],['active',1],['isDeleted',0]])->get();


        return view('website/Bikepages.featured-bikes',compact('updated_date','all_bikes','most_featured_cars','images','city','engine_type','model_year','reg_city','manufacture','city','new_bikes','all_bikes','city_vehicles_count','manufacture_featured_bikes','engine_types','reg_cities','model_bikes'));

    
    }
    
     public function featuredBikesByCity(Request $request)
    {
       
        //////////////////////////////////////SEARCH FORM//////////////////////////////////////
       
      $engine_type=EngineType::where('vehicle_type_id',\App\VehicleType::Bike)->orderby('title','asc')->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();
         
        
       /////////////////////////////Filters/////////////

        $city_vehicles_count=$this->city->getAllCityFeaturedVehicles(\App\VehicleType::Bike);
        $manufacture_featured_bikes=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Bike);
       
        $reg_cities=$this->registration_city->getAllRegisterdCityFeaturedVehicles(\App\VehicleType::Bike);
        $engine_types=$this->engine_type->getAllEngineTypeFeaturedVehicles(\App\VehicleType::Bike);
        $model_bikes=$this->model->getAllModelFeaturedVehicles(\App\VehicleType::Bike);
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        $city=City::all();

        ////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////

        
        
       $all_bikes=$this->vehicle->getAllFeaturedBikesByManufacture();
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
          
           $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
     
     
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Bike],['active',1],['isDeleted',0]])->get();


        return view('website/Bikepages.featured-bikes',compact('updated_date','all_bikes','most_featured_cars','images','city','engine_type','model_year','reg_city','manufacture','city','new_bikes','all_bikes','city_vehicles_count','manufacture_featured_bikes','engine_types','reg_cities','model_bikes'));

        
    }
    
    public function featuredBikesByManufacture(Request $request)
            
    {
        
        //////////////////////////////////////SEARCH FORM//////////////////////////////////////
       
      $engine_type=EngineType::where('vehicle_type_id',\App\VehicleType::Bike)->orderby('title','asc')->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();
         
        
       /////////////////////////////Filters/////////////

        $city_vehicles_count=$this->city->getAllCityFeaturedVehicles(\App\VehicleType::Bike);
        $manufacture_featured_bikes=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Bike);
       
        $reg_cities=$this->registration_city->getAllRegisterdCityFeaturedVehicles(\App\VehicleType::Bike);
        $engine_types=$this->engine_type->getAllEngineTypeFeaturedVehicles(\App\VehicleType::Bike);
        $model_bikes=$this->model->getAllModelFeaturedVehicles(\App\VehicleType::Bike);
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        $city=City::all();

        ////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////

        
        
       $all_bikes=$this->vehicle->getAllFeaturedBikesByManufacture();
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
          
           $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
     
     
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Bike],['active',1],['isDeleted',0]])->get();


        return view('website/Bikepages.featured-bikes',compact('updated_date','all_bikes','most_featured_cars','images','city','engine_type','model_year','reg_city','manufacture','city','new_bikes','all_bikes','city_vehicles_count','manufacture_featured_bikes','engine_types','reg_cities','model_bikes'));

    }

    public function bikeDealer()
    {
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        $city=City::all();
    	$city_dealers=$this->user->getAllCityDealersBikes();
    	$dealer=$this->user->getAllDealerByType(\App\VehicleType::Bike);
        
    	return view('website/Bikepages.dealers-bike',compact('city_dealers','dealer','city','manufacture'));
    
    }
    
    public function searchBikeDealers(Request $request)
    {
         $filters = [];
   
         if ($request->make!="-1") 
             {
             $filters['brands'] = $request->make;
             
             }
   
             if($request->model!="-1"){
                 $filters['models'] = $request->model;
                 
             }
             
             if ($request->city!="-1") {
                 $filters['cities'] = $request->city;
                 
             }
             if($request->category!="-1"){
                 $filters['condition'] = $request->category;
                 
             }
             
             $dealer=$this->vehicle->getFilterDealersBike($filters);
        
       $city_dealers=$this->user->getAllCityDealersBikes();
    	
        
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        $city= City::all();
    	
    	
    	return view('website/Bikepages.dealers-bike',compact('city_dealers','dealer','manufacture','city'));
    
   
        
    }
    
    public function DealersDetailBike($id){
        
        $dealer_info= User::where('id',$id)->with('city')->first();
        $dealer_bikes= $this->vehicle->getAllBikesByUserId($id);
        
        
        /////////////////////////////map///////////////////////////////
        $add=$dealer_info->city->title."+".$dealer_info->address;
        $address = rawurlencode($add);
        $url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Pakistan&key=AIzaSyA54_BAhhswZGQTm-TxTGQ-maWfJDMyxXM";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
       
        curl_close($ch);
        
        $response_a = json_decode($response);
        
       if($response_a->results){
           $lat = $response_a->results[0]->geometry->location->lat;
           $long = $response_a->results[0]->geometry->location->lng;
       }else{
           $lat = 33.521715;
           $long = 73.0901496;
           
       }
        
       

        //////////////////////////////////////////////////////////////////
        
        ////////////////////////////////Updated Date Converted in days//////
      $updated_date=array();
      
      foreach($dealer_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
      
      ////////////////////////////////////////
      
      
      $images=array();
      
      
      foreach( $dealer_bikes as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          //dd($images);
        
        
       
        return view('website/Bikepages.dealers-detail',compact('dealer_bikes','dealer_info','images','updated_date','lat','long','address'));
	
        
    }

    public function sellBike()
    {
        $city=City::get();
        $year=ModelYear::get();
       
        $engine_type=EngineType::where('vehicle_type_id',\App\VehicleType::Bike)->get();
        $transmission=Transmission::get();
        $assembly=Assembly::get();
        $feature=Feature::where('vehicle_type_id',\App\VehicleType::Bike)->get();
        $reg_city=RegistrationCity::get();
        $make=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
     
        return view('website/Bikepages.sell-a-bike',compact('city','year','engine_type','transmission','assembly','feature','reg_city','make'));
    }

    public function getBikeModelByManufacture(Request $request)
    {
        return  $data=$this->model->getAllBikeModelsByMake($request->get('make'));
 
    }

    public function addBike(Request $request)
    {
      $validator = Validator::make($request->all(), [
            'city' => 'required',
            'make'=>'required',
            'model'=>'required',
            'price'=>'required|min:1',
          'mileage'=>'min:1',
            'name'=>'required',
          'email'=>'email',
           'number'=>'required|regex:/(03)[0-9]{9}/|min:11|max:11',
            'engine_type'=>'required'
        ]);
        if (!$validator->passes()) {
             return response()->json(['error'=>$validator->errors()->all()]);
        }
       
        $code=rand(100000,999999);
        $ad_id=$this->vehicle->addBike($request,$code);
        
         if($request->video){
            $file = $request->file('video');
            $ext = File::extension($file->getClientOriginalName());
            $path = public_path().'/upload/vehicle/';
            $filename=$ad_id.".".$ext;
            $file->move($path, $filename);
             date_default_timezone_set("Asia/Karachi");
          
            Vehicle::where('id',$ad_id)->update(['video_url'=>$filename]);
             
            
        }
     
        return response()->json(['success'=>'Added new records.','code'=>$code,'id'=>$ad_id]);

    }


    public function updateFeaturedBikes(Request $request)
    {
        //dd($request);

        $filters = [];
    if ($request->has('city')) 
    {
        
      $filters['cities'] = $request->city;
    }
    if ($request->has('enginetype')) {
      $filters['engine_types'] = $request->enginetype;
    }
    if($request->has('manufacture'))
    {
      $filters['brands']=$request->manufacture;
    }
    if($request->has('model'))
    {
      $filters['models']=$request->model;
    }
    
   
    if($request->has('reg_city'))
    {
      $filters['registration_cities']=$request->reg_city;
    }
    
    if($request->has('price_fr'))
    {
      $filters['price_fr']=str_replace(',', '', $request->price_fr);
    }
    if($request->has('price_to'))
    {
      $filters['price_to']=str_replace(',', '', $request->price_to);
    }
    
    if($request->has('mileage_fr'))
    {
      $filters['mileage_fr']=str_replace(',', '', $request->mileage_fr);
    }
     if($request->has('mileage_to'))
    {
      $filters['mileage_to']=str_replace(',', '', $request->mileage_to);
    }
    if($request->has('year_fr'))
    {
      $filters['year_fr']=str_replace(',', '', $request->year_fr);
    }
     if($request->has('year_to'))
    {
      $filters['year_to']=str_replace(',', '', $request->year_to);
    }
    
    if($request->has('sort_price'))
        {
            $filters['sort_price']=$request->sort_price;
        }
        if($request->has('name'))
        {
            $filters['name']=$request->name;
        }
    //dd($filters);


    $all_bikes = $this->vehicle->updateFeaturedBikesByAllFilters($filters);
    
    
    
    
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
          
          $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
    
   // dd($cars);
    return view('website/Bikepages.update-all-bikes',compact('all_bikes','images','updated_date'));
   
    
    
    }

   public function bikeDetails(Request $request)
    {

      $data=$this->vehicle->getBikeDetails($request->id);
      foreach ($data as $d) {
            $model_id = $d->model_id;
           
        }
      $related_bikes=$this->vehicle->getRelatedBikesByModel($request->id,$model_id);
       
      $updated_date=array();
      
     foreach($data as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
       $feature=$this->feature->getFeaturesByVehicle($request->id);
    $images=$this->vehicle->getAllImagesByPostId($request->id);
   

        return view('website/Bikepages.detail-bike',compact('data','feature','images','related_bikes','updated_date'));

    }

    public function getBikesByManufacture(Request $request)
    {
        

        $new_bikes=$this->vehicle->getallNewFeaturedBikes();
        
        //////////////////////////////////////SEARCH FORM//////////////////////////////////////
       
      $engine_type=EngineType::orderby('title','asc')->where('vehicle_type_id',\App\VehicleType::Bike)->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();
         
        
        ////////////////////////////////////////////////////////////////////////////////////////

        $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Bike);
        $manufacture_featured_bikes=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Bike);
        $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Bike);
        $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Bike);
        $model_bikes=$this->model->getAllModelVehicles(\App\VehicleType::Bike);
        $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        
     
       $all_bikes=$this->vehicle->getAllBikesByManufacture($request->id);
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
     
     $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Bike],['active',1],['isDeleted',0]])->get();


        return view('website/Bikepages.all-bikes',compact('updated_date','most_featured_cars','images','city','engine_type','model_year','reg_city','manufacture','city','new_bikes','all_bikes','city_vehicles_count','manufacture_featured_bikes','engine_types','reg_cities','model_bikes'));



    }

    public function getBikesByCity(Request $request)
    {

        $new_bikes=$this->vehicle->getallNewFeaturedBikes();
        
        //////////////////////////////////////SEARCH FORM//////////////////////////////////////
       
      $engine_type=EngineType::orderby('title','asc')->where('vehicle_type_id',\App\VehicleType::Bike)->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();
         
        
        ////////////////////////////////////////////////////////////////////////////////////////

        $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Bike);
        $manufacture_featured_bikes=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Bike);
        $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Bike);
        $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Bike);
        $model_bikes=$this->model->getAllModelVehicles(\App\VehicleType::Bike);
        $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        
        $all_bikes=$this->vehicle->getAllBikesByCity($request->id);
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
     
     $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Bike],['active',1],['isDeleted',0]])->get();


        return view('website/Bikepages.all-bikes',compact('updated_date','most_featured_cars','images','city','engine_type','model_year','reg_city','manufacture','city','new_bikes','all_bikes','city_vehicles_count','manufacture_featured_bikes','engine_types','reg_cities','model_bikes'));



    }

    public function getBikesByModel(Request $request)
    {
        
        $new_bikes=$this->vehicle->getallNewFeaturedBikes();
        
        //////////////////////////////////////SEARCH FORM//////////////////////////////////////
       
      $engine_type=EngineType::orderby('title','asc')->where('vehicle_type_id',\App\VehicleType::Bike)->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();
         
        
        ////////////////////////////////////////////////////////////////////////////////////////

        $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Bike);
        $manufacture_featured_bikes=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Bike);
        $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Bike);
        $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Bike);
        $model_bikes=$this->model->getAllModelVehicles(\App\VehicleType::Bike);
        $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        
         $all_bikes=$this->vehicle->getAllBikesByModel($request->id);
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
     
     $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Bike],['active',1],['isDeleted',0]])->get();


        return view('website/Bikepages.all-bikes',compact('updated_date','most_featured_cars','images','city','engine_type','model_year','reg_city','manufacture','city','new_bikes','all_bikes','city_vehicles_count','manufacture_featured_bikes','engine_types','reg_cities','model_bikes'));



    }

    public function updateAllBikes(Request $request)
    {
         $filters = [];
    if ($request->has('city')) 
    {
      $filters['cities'] = $request->city;
    }
    if ($request->has('enginetype')) {
      $filters['engine_types'] = $request->enginetype;
    }
    if($request->has('manufacture'))
    {
      $filters['brands']=$request->manufacture;
    }
    if($request->has('model'))
    {
      $filters['models']=$request->model;
    }
    
   
    if($request->has('reg_city'))
    {
      $filters['registration_cities']=$request->reg_city;
    }
    
    if($request->has('price_fr'))
    {
      $filters['price_fr']=str_replace(',', '', $request->price_fr);
    }
    if($request->has('price_to'))
    {
      $filters['price_to']=str_replace(',', '', $request->price_to);
    }
    
    if($request->has('mileage_fr'))
    {
      $filters['mileage_fr']=str_replace(',', '', $request->mileage_fr);
    }
     if($request->has('mileage_to'))
    {
      $filters['mileage_to']=str_replace(',', '', $request->mileage_to);
    }
    if($request->has('year_fr'))
    {
      $filters['year_fr']=str_replace(',', '', $request->year_fr);
    }
     if($request->has('year_to'))
    {
      $filters['year_to']=str_replace(',', '', $request->year_to);
    }
     if($request->has('sort_price'))
        {
            $filters['sort_price']=$request->sort_price;
        }
         if($request->has('name'))
        {
            $filters['name']=$request->name;
        }
    //dd($filters);


    $all_bikes = $this->vehicle->updateBikesByAllFilters($filters);
    
    
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
          $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
    
   // dd($cars);
    return view('website/Bikepages.update-all-bikes',compact('all_bikes','images','updated_date'));

    }
    
    
    
    public function searchBikesByAllFilters(Request $request)
   {
    // dd($request);
    $filters = [];
    
    if ($request->has('city')) 
    {
       if($request->city!=-1){
                     $filters['cities'] = $request->city;
                }
            
    }
    if ($request->has('engine_type')) {
      $filters['engine_types'] = $request->engine_type;
    }
    if($request->has('make'))
    {
        if($request->make!=-1){
        $filters['brands']=$request->make;}
    }
    if($request->has('model'))
    {
        if($request->model!=-1){
        $filters['models']=$request->model;}
    }
   
    if($request->has('city_area'))
    {
      $filters['city_areas']=$request->city_area;
    }
   
    if($request->has('reg_city'))
    {
      $filters['registration_cities']=$request->reg_city;
    }
   
    if($request->has('price_fr'))
    {
      $filters['price_fr']=$request->price_fr."00000";
    }
    if($request->has('price_to'))
    {
      $filters['price_to']=$request->price_to."00000";
    }
   if($request->has('condition'))
    {
       foreach($request->condition as $condition)
       {
        if($condition==\App\VehicleType::Any)
        {
            break;
        }
        else
            {
            $filters['condition']=$request->condition;
        }
       }
            
        
    }
    //dd($filters);
   
    $all_bikes=$this->vehicle->searchBikesByAllFilters($filters);
    
    
$new_bikes=$this->vehicle->getallNewFeaturedBikes();
        
        //////////////////////////////////////SEARCH FORM//////////////////////////////////////
       
      $engine_type=EngineType::orderby('title','asc')->where('vehicle_type_id',\App\VehicleType::Bike)->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();
         
        
        ////////////////////////////////////////////////////////////////////////////////////////

        $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Bike);
        $manufacture_featured_bikes=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Bike);
        $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Bike);
        $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Bike);
        $model_bikes=$this->model->getAllModelVehicles(\App\VehicleType::Bike);
        $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        
         
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
     $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
     
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Bike],['active',1],['isDeleted',0]])->get();


        return view('website/Bikepages.all-bikes',compact('updated_date','most_featured_cars','images','city','engine_type','model_year','reg_city','manufacture','city','new_bikes','all_bikes','city_vehicles_count','manufacture_featured_bikes','engine_types','reg_cities','model_bikes'));

    
    }

    public function searchFeaturedBikesByAllFilters(Request $request)
   {
     
    $filters = [];
    
    if ($request->has('city')) 
    {
       if($request->city!=-1){
                     $filters['cities'] = $request->city;
                }
            
    }
    if ($request->has('engine_type')) {
      $filters['engine_types'] = $request->engine_type;
    }
    if($request->has('make'))
    {
        if($request->make!=-1){
        $filters['brands']=$request->make;}
    }
    if($request->has('model'))
    {
        if($request->model!=-1){
        $filters['models']=$request->model;}
    }
   
    if($request->has('city_area'))
    {
      $filters['city_areas']=$request->city_area;
    }
   
    if($request->has('reg_city'))
    {
      $filters['registration_cities']=$request->reg_city;
    }
   
    if($request->has('price_fr'))
    {
      $filters['price_fr']=$request->price_fr."00000";
    }
    if($request->has('price_to'))
    {
      $filters['price_to']=$request->price_to."00000";
    }
   if($request->has('condition'))
    {
        foreach($request->condition as $condition)
       {
        if($condition==\App\VehicleType::Any)
        {
            break;
        }
        else
            {
            $filters['condition']=$request->condition;
        }
       }
    }
    
   
    
    
    
 //////////////////////////////////////SEARCH FORM//////////////////////////////////////
       
      $engine_type=EngineType::orderby('title','asc')->where('vehicle_type_id',\App\VehicleType::Bike)->get();
      $model_year=ModelYear::orderby('year','asc')->get();
       $reg_city= RegistrationCity::get();
         
        
       /////////////////////////////Filters/////////////

        $city_vehicles_count=$this->city->getAllCityFeaturedVehicles(\App\VehicleType::Bike);
        $manufacture_featured_bikes=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Bike);
       
        $reg_cities=$this->registration_city->getAllRegisterdCityFeaturedVehicles(\App\VehicleType::Bike);
        $engine_types=$this->engine_type->getAllEngineTypeFeaturedVehicles(\App\VehicleType::Bike);
        $model_bikes=$this->model->getAllModelFeaturedVehicles(\App\VehicleType::Bike);
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        $city=City::all();

        ////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////

        
        
       $all_bikes=$this->vehicle->searchFeaturedBikesByAllFilters($filters);
        
        foreach($all_bikes as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
          
           $updated_date=array();
      
      foreach($all_bikes as $a_c)
      {
          date_default_timezone_set('Asia/Karachi');
          $end = Carbon::parse($a_c->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          
         
         
          $length = $now->diffInMonths($end);
          if($length>0)
          {
              $updated_date[$a_c->id]=$length ." months ago";
          }
          else
          {
              $length = $now->diffInWeeks($end);
              if($length>0)
              {
                  $updated_date[$a_c->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $now->diffInDays($end);
                  if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      
                      $length = $now->diffInHours($end);
                      
                       if($length>0)
                  {
                      $updated_date[$a_c->id]=$length ." hours ago";
                      
                  }
                  else
                  {
                      
                     $length = $now->diffInMinutes($end);
                      
                      $updated_date[$a_c->id]=$length ." mins ago";
                  }
                      
                     
                  }
                  
              }
              
              
          }
          
      }
    
     
     
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Bike],['active',1],['isDeleted',0]])->get();


        return view('website/Bikepages.featured-bikes',compact('updated_date','all_bikes','most_featured_cars','images','city','engine_type','model_year','reg_city','manufacture','city','new_bikes','all_bikes','city_vehicles_count','manufacture_featured_bikes','engine_types','reg_cities','model_bikes'));

    
    }
    
    
     public function getModelByMake(Request $request)
    {
        $manu_id=$request->get('make');

       return  $data=$this->model->getAllBikeModelsByMake($manu_id);
    }
    
    
     public function searchNewBikes(Request $request)
    {
         
         $filters = [];
    if ($request->has('make')) 
    {
        if($request->make!="-1"){
      $filters['brands'] = $request->make;
        }
    }
    if ($request->has('model')) {
        if($request->model!="-1"){
        
      $filters['models'] = $request->model;
        }
    }
      
        $vehicle=$this->vehicle->searchNewVehiclesByType($filters,\App\VehicleType::Bike);
        
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Bike);
        
        return view('website/Bikepages.new-bikes',compact('vehicle','manufacture'));
       
    }
    
     public function updateDealers(Request $request)
    {
         $filters = [];
    if ($request->has('city')) 
    {
         if($request->city!=-1){
         $filters['cities'] = $request->city;}
    }
    if ($request->has('name')) 
    {
         if($request->name!=-1){
         $filters['name'] = $request->name;}
    }
    
    $dealer=$this->vehicle->getFilterDealersBike($filters);
    
    return view('website/Bikepages.update-dealers',compact('dealer'));
    
        
    }
}
