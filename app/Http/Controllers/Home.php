<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Vehicle;
use App\City;
use App\Manufacture;
use App\Models;
use App\ModelYear;
use App\ConditionDetail;
use App\User;
use App\Post;
use App\Accessories;
use App\Feature;
use App\RegistrationCity;
use App\Transmission;
use App\Assembly;
use App\Color;
use App\EngineType;
use App\VehicleBodyType;
use App\NewsLetter;
use Validator;
use Illuminate\Support\Facades\Auth;
use Berkayk\OneSignal\OneSignalFacade;
use Berkayk\OneSignal\OneSignalClient;
use Berkayk\OneSignal\OneSignalServiceProvider;
use Berkayk\OneSignal;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon ;





class Home extends Controller
{
    protected $vehicle;
    protected $city;
    protected $manufacturer;
    protected $model;
    protected $model_year;
    protected $condition_detail;
    protected $user;
    protected $accessories;
    protected $feature;
    protected $reg_city;
    protected $transmission;
    protected $assembly;
    protected $color;
    protected $engine_type;
    protected $body_type;
    protected $vehilce_enum;



    public function __construct() {

     $this->vehicle = new Vehicle;    
     $this->city=new City();   
     $this->manufacture=new Manufacture();
     $this->model=new Models();
     $this->model_year=new ModelYear();
     $this->condition_detail=new ConditionDetail();
     $this->user=new User();
     $this->accessories=new Accessories();
     $this->feature=new Feature();
     $this->reg_city=new RegistrationCity();
     $this->transmission=new Transmission();
     $this->assembly=new Assembly();
     $this->color=new Color();
     $this->engine_type=new EngineType();
     $this->body_type=new VehicleBodyType();
     
     
    }
    
    public function index()
    {
      
            // Notification
             
      /* $client = new OneSignalClient(
       * '15d28381-1abd-4668-a477-8d633e36ad57',
       * 'NzRkODVhYjktYzVjZS00ZmE0LTk2ZmQtYTQ5OWMwZTQ0NDMw',
       * 'NzRkODVhYjktYzVjZS00ZmE0LTk2ZmQtYTQ5OWMwZTQ0NDMw');
         $client->sendNotificationToAll("Some Message", $url = null, $data = null, $buttons = null, $schedule = null);
      */
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Car);
        $cities=City::orderby('title','asc')->get();
        $dealer=$this->user->getFeaturedDealerLimit();
        $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Car);

        /////////////////GET FEATURED ADS/////////////////////////
        ///////////////////////////////////////////////////////

        $vehicles=$this->vehicle->getFeaturedVehicles();
        $featured_Ads=null;
        $count=0;
        foreach($vehicles as $v)
        {
            $featured_Ads[$count]['id']=$v->id;
            $featured_Ads[$count]['title']=$v->manufacture." ".$v->model." ".$v->year;
          //  $featured_Ads[$count]['title']="Toyota Corolla 2017";
            $featured_Ads[$count]['condition']=$v->condition;
            $featured_Ads[$count]['price']=$v->price;
            $featured_Ads[$count]['location']=$v->city;
            $featured_Ads[$count]['image']=$v->url;
            if ($v->vehicle_type_id == 1) {
                $featured_Ads[$count]['href'] = "/GetCarDetails";
            } elseif ($v->vehicle_type_id == 2) {
                $featured_Ads[$count]['href'] = "/GetBikeDetails";
            } elseif ($v->vehicle_type_id == 3) {
                $featured_Ads[$count]['href'] = "/GetBusDetails";
            }elseif ($v->vehicle_type_id == 4) {
                $featured_Ads[$count]['href'] = "/GetTruckDetails";
            }
            elseif ($v->vehicle_type_id == 5) {
                $featured_Ads[$count]['href'] = "/GetFarmDetails";
            }

            $count++;   
        }
        $accessories=$this->accessories->getFeaturedAccessories();
        
          foreach($accessories as $a)
        {
            $featured_Ads[$count]['id']=$a->id;
            $featured_Ads[$count]['title']=$a->category." ".$a->sub_category;
            $featured_Ads[$count]['condition']=$a->condition;
            $featured_Ads[$count]['price']=$a->price;
            $featured_Ads[$count]['location']=$a->city;
            $featured_Ads[$count]['image']=$a->url;
            $featured_Ads[$count]['href']="/GetAccessoryDetails";
         $count++;   
        }
        shuffle ($featured_Ads);
        

       // dd($featured_Ads);
       /* $city_vehicles=$this->city->getAllCityVehicles(\App\VehicleType::Car);
        $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Car);
        $cities=City::orderby('title','asc')->get();
        $dealer=$this->user->getFeaturedDealer();
        */
      //  return view('pages.home',['data'=>$featured_Ads,'city_size'=>$city_vehicles,'manufacture'=>$manufacture,'city'=>$cities,'dealer'=>$dealer]);
       

       
       return view('website.home',compact('manufacture','cities','dealer','city_vehicles_count','featured_Ads'));
    }

   


///////get ALL models by manufacturer//

    public function getModelByMake(Request $request)
    {
        $manu_id=$request->get('make');

       return  $data=$this->model->getAllCarModelsByMake($manu_id);
    }

    /////////////////////update search button value 
    public function updateSearchButton(Request $request)
    {
         
        
        $filters = [];
       
    
    if ($request->city!="-1") 
    {
      $filters['cities'] = $request->city;
    }
    
    if($request->make!="-1")
    {
        $filters['brands']=$request->make;
    }
    if($request->model!="-1")
    {
      $filters['models']=$request->model;
    }
    
    if($request->price_fr!="")
    {
      $filters['price_fr']=$request->price_fr;
    }
    if($request->price_to!="")
    {
      $filters['price_to']=$request->price_to;
    }
    if($request->condition)
    {
        $filters['condition']=$request->condition;
    }
    

        return $this->vehicle->updateSearchButton($filters);
    }

    


    public function carsByCity(Request $request)
    {
        
        dd($this->vehicle->getAllCarsByCity($request->id));
    }

    public function carDetails(Request $request)
    {

      $data=$this->vehicle->getVehicleDetails($request->id);
      foreach ($data as $d) {
            $model_id = $d->model_id;
           
        }
      $related_cars=$this->vehicle->getRelatedCarsByModel($request->id,$model_id);
       
      $feature=$this->feature->getFeaturesByVehicle($request->id);
      $images=$this->vehicle->getAllImagesByPostId($request->id);
      $condition=$this->condition_detail->getConditionByVehicle($request->id);
      
      ////////////////////////////////Updated Date Converted in days//////
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
      
      ////////////////////////////////////////
    

        return view('website/Carpages.detail-car',compact('updated_date','data','feature','images','condition','related_cars'));

    }

    public function carsByBodyType(Request $request)
    {
        
        dd($this->vehicle->getAllCarsByBodyType($request->id));
    }

    public function carsByManufacture(Request $request)
    {
        dd($this->vehicle->getAllUsedCarsByMake($request->id));
    }

    public function featuredCarsByCity(Request $request)
    {
        
        dd($this->vehicle->getAllFeaturedCarsByCity($request->id));
    }

    
    public function featuredCarsByManufacture(Request $request)
    {
        
        dd($this->vehicle->getAllUsedFeaturedCarsByMake($request->id));
    }

    
    
    public function submitEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|unique:news_letters|email'
            
        ]);
        if (!$validator->passes()) {
             return response()->json(['error'=>$validator->errors()->all()]);
        }
       
        
        NewsLetter::insert(['email'=>$request->email]);
        
        
        return response()->json(['success'=>'Added new records.']);
        
    }
    
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
        
    }
    
    
    public function allFeaturedAds()
    {
        
       
        /////////////////GET FEATURED ADS/////////////////////////
        ///////////////////////////////////////////////////////

        $featured_Ads=$this->vehicle->getAllFeaturedAds();
        
        
       $images=array();
       $href=array();
        foreach($featured_Ads as $a){
       
       
        $images[$a->id]=$this->vehicle->get4ImagesByPostId($a->id); 
        
        if ($a->vehicle_type_id == 1) {
               $href[$a->id] = "/GetCarDetails";
            } elseif ($a->vehicle_type_id == 2) {
               $href[$a->id] = "/GetBikeDetails";
            } elseif ($a->vehicle_type_id == 3) {
               $href[$a->id] = "/GetBusDetails";
            }elseif ($a->vehicle_type_id == 4) {
             $href[$a->id] = "/GetTruckDetails";
            }
            elseif ($a->vehicle_type_id == 5) {
               $href[$a->id] = "/GetFarmDetails";
            }
        
        }

        $city_vehicles_count=$this->city->getAllCityFeaturedAdsCount();
        $data=$this->vehicle->getVehicleCountByType(\App\VehicleType::Car);
        $car_size=0;
        foreach($data as $d)
        {
            $car_size=$d->size;
        }
        $data=$this->vehicle->getVehicleCountByType(\App\VehicleType::Bike);
         $bike_size=0;
        foreach($data as $d)
        {
            $bike_size=$d->size;
        }
        $data=$this->vehicle->getVehicleCountByType(\App\VehicleType::Farm);
        $farm_size=0;
        foreach($data as $d)
        {
            $farm_size=$d->size;
        }
        $data=$this->vehicle->getVehicleCountByType(\App\VehicleType::Bus);
        $bus_size=0;
        foreach($data as $d)
        {
            $bus_size=$d->size;
        }
        $data=$this->vehicle->getVehicleCountByType(\App\VehicleType::Truck);
        $truck_size=0;
        foreach($data as $d)
        {
            $truck_size=$d->size;
        }
        
         $updated_date=array();
      
      foreach($featured_Ads as $a_c)
      {
         $veh= Vehicle::where('id',$a_c->id)->first();
          
          $end = Carbon::parse($veh->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          $length = $end->diffInMonths($now);
          if($length>0)
          {
              $updated_date[$veh->id]=$length ." months ago";
          }
          else
          {
              $length = $end->diffInWeeks($now);
              if($length>0)
              {
                  $updated_date[$veh->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $end->diffInDays($now);
                  if($length>0)
                  {
                      $updated_date[$veh->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      $length = $end->diffInHours($now);
                      
                      $updated_date[$veh->id]=$length ." hours ago";
                  }
                  
              }
              
              
          }
          
      }
        
        
        
        return view('website.all-featured-ads',compact('featured_Ads','images','city_vehicles_count',
                'car_size','bike_size','farm_size','truck_size','bus_size','updated_date','href'));
        
    }
    
    public function updateFeaturedAds(Request $request)
    {
         /////////////////GET FEATURED ADS/////////////////////////
        ///////////////////////////////////////////////////////

        $featured_Ads=$this->vehicle->getAllFeaturedAdsByType($request);
        
        
       $images=array();
       $href=array();
        foreach($featured_Ads as $a){
       
       
        $images[$a->id]=$this->vehicle->get4ImagesByPostId($a->id); 
        
        if ($a->vehicle_type_id == 1) {
               $href[$a->id] = "/GetCarDetails";
            } elseif ($a->vehicle_type_id == 2) {
               $href[$a->id] = "/GetBikeDetails";
            } elseif ($a->vehicle_type_id == 3) {
               $href[$a->id] = "/GetBusDetails";
            }elseif ($a->vehicle_type_id == 4) {
             $href[$a->id] = "/GetTruckDetails";
            }
            elseif ($a->vehicle_type_id == 5) {
               $href[$a->id] = "/GetFarmDetails";
            }
        
        }

        
        
         $updated_date=array();
      
      foreach($featured_Ads as $a_c)
      {
         $veh= Vehicle::where('id',$a_c->id)->first();
          
          $end = Carbon::parse($veh->updated_at);
          $now =Carbon::now(new \DateTimeZone('Asia/Karachi'));
          $length = $end->diffInMonths($now);
          if($length>0)
          {
              $updated_date[$veh->id]=$length ." months ago";
          }
          else
          {
              $length = $end->diffInWeeks($now);
              if($length>0)
              {
                  $updated_date[$veh->id]=$length ." weeks ago";
                  
              }
              else
              {
                  $length = $end->diffInDays($now);
                  if($length>0)
                  {
                      $updated_date[$veh->id]=$length ." days ago";
                      
                  }
                  else
                  {
                      $length = $end->diffInHours($now);
                      
                      $updated_date[$veh->id]=$length ." hours ago";
                  }
                  
              }
              
              
          }
          
      }
        
        
        
        return view('website.update-featured-ads',compact('featured_Ads','images','city_vehicles_count',
                'car_size','bike_size','farm_size','truck_size','bus_size','updated_date','href'));
        
    }
    
    
    
}
