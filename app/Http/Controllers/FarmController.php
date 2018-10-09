<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class FarmController extends Controller
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
        
        
      
     $new_farms=$this->vehicle->getFeaturedOthers(\App\VehicleType::Farm);

      $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Farm);
      
      $manufacture_farms=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Farm);
      
     //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      $transmission= Transmission::all();
      $assembly= Assembly::all();
      $engine_type= EngineType::where('vehicle_type_id', \App\VehicleType::Car)->get();
      
      $reg_city= RegistrationCity::all();
      $body_type= VehicleBodyType::where('vehicle_type_id', \App\VehicleType::Farm)->get();
      $make=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Farm);
      $city=City::all();
      
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////
      

      ////////////////////////////FILTERS//////////////////////////////////
      //////////////////////////////////////////////////////////////////////////

      $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Farm);
      $transmissions=$this->transmission->getAllTransmissionVehicles(\App\VehicleType::Farm);
      $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Farm);
      $assemblies=$this->assembly->getAllAssemblyVehicles(\App\VehicleType::Farm);
      $colors=$this->color->getAllColorVehicles(\App\VehicleType::Farm);
      $body_types=$this->body_type->getAllBodyTypeVehicles(\App\VehicleType::Farm);
      $models=$this->model->getAllModelVehicles(\App\VehicleType::Farm);
      $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Farm);

//////////////////////////////////////////////////////////////////////
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

     $all_farms=$this->vehicle->getAllOthers(\App\VehicleType::Farm);
      $images=array();
      
      
      foreach($all_farms as $a_b)
          {
          $images[$a_b->id]=$this->vehicle->get4ImagesByPostId($a_b->id);  
          
          }
          //dd($images);
          $updated_date=array();
      
     foreach($all_farms as $a_c)
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
    
    
      
   

      return view('website/Farmpages.index',compact('updated_date','most_featured_cars','images','model_year','manufacture','city','checked','new_farms','all_farms','city_vehicles_count','manufacture_farms','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));

        
       
    }
    
    public function updateAllFarms(Request $request)
    {
        $filters = [];
    
        if ($request->has('city')) {
            $filters['cities'] = $request->city;
        }
        if ($request->has('enginetype')) {
            $filters['engine_types'] = $request->enginetype;    
        }
        if($request->has('manufacture')){
            $filters['brands']=$request->manufacture;  
        }
        if($request->has('model')){
            $filters['models']=$request->model;
        }
        if($request->has('bodytype')){
            $filters['vehicle_body_types']=$request->bodytype;    
        }
        if($request->has('reg_city')){
            $filters['registration_cities']=$request->reg_city;  
        }
        if($request->has('assembly')){
            $filters['assemblies']=$request->assembly;
        }
        if($request->has('transmission')){
            $filters['transmissions']=$request->transmission;
        }
        if($request->has('price_fr')){
            $filters['price_fr']=str_replace(',','',$request->price_fr); 
        }
        if($request->has('price_to')){
            $filters['price_to']=str_replace(',','',$request->price_to);
        }
        if($request->has('capacity_fr')){
            $filters['capacity_fr']=str_replace(',','',$request->capacity_fr);
        }
        if($request->has('capacity_to')){
            $filters['capacity_to']=str_replace(',','',$request->capacity_to);
        }
        if($request->has('mileage_fr')){
            $filters['mileage_fr']=str_replace(',','',$request->mileage_fr);
        }
        if($request->has('mileage_to')){
            $filters['mileage_to']=str_replace(',','',$request->mileage_to);
        }
        if($request->has('year_fr')){
            $filters['year_fr']=str_replace(',','',$request->year_fr);
        }
        if($request->has('year_to')){
            $filters['year_to']=str_replace(',','',$request->year_to);
        }
        if($request->has('condition')){
            $filters['condition']=$request->condition;
        }
        if($request->has('name'))
        {
            $filters['name']=$request->name;
        }
            
   
        $all_farms = $this->vehicle->searchOtherByAllFilters($filters,\App\VehicleType::Farm);
    
         $images=array();
      
      
      foreach($all_farms as $a_f)
          {
          $images[$a_f->id]=$this->vehicle->get4ImagesByPostId($a_f->id);  
          
          }
          $updated_date=array();
      
      foreach($all_farms as $a_c)
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
        return view('website/Farmpages.update-all-farm',compact('all_farms','images','updated_date'));

    
    
    }
    
    
     public function FarmDetails(Request $request)
    {

      $data=$this->vehicle->getOtherDetails($request->id);
      foreach ($data as $d) {
            $model_id = $d->model_id;
           
        }
      
      $feature=$this->feature->getFeaturesByVehicle($request->id);
      $images=$this->vehicle->getAllImagesByPostId($request->id);
      
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
      
      $related_farm=$this->vehicle->getRelatedOtherByModel($request->id,$model_id,\App\VehicleType::Farm);
      

        return view('website/Farmpages.detail-farm',compact('data','feature','images','related_farm','updated_date'));

    }
    
    
    public function sellFarm()
    {
        $cities=$this->city->getAllCities();
        $year=$this->model_year->getAllYears();
        $engine=$this->engine_type->getAllEngineType();
        $transmission=$this->transmission->getAllTransmission();
        $assembly=$this->assembly->getAllAssembly();
        $feature=Feature::where('vehicle_type_id',\App\VehicleType::Farm)->get();
        $reg_city=$this->registration_city->getAllRegCities();
        $make=$this->manufacture->getOtherManufactures(\App\VehicleType::Farm);
        
      return view('website/Farmpages.sell-farm',['city'=>$cities,'year'=>$year,'make'=>$make,'engine_type'=>$engine,'transmission'=>$transmission,'assembly'=>$assembly,'feature'=>$feature,'reg_city'=>$reg_city]);
     
    }
    
    public function addFarm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city' => 'required',
            
            'make'=>'required',
            'model'=>'required',
            'model_version'=>'required',
            'price'=>'required|min:1',
            'mileage'=>'min:1',
            'engine_capacity'=>'min:1',
            'name'=>'required',
            'number'=>'required|regex:/(03)[0-9]{9}/|min:11|max:11',
            'engine_type'=>'required',
            'transmission'=>'required',
            'assembly'=>'required',
            'city_area'=>'required',
            'email'=>'email',
            'registration_city'=>'required',
            
        ]);
        if (!$validator->passes()) {
             return response()->json(['error'=>$validator->errors()->all()]);
        }
       
        $code=rand(100000,999999);
        $ad_id=$this->vehicle->addOther($request,\App\VehicleType::Farm,$code);
        
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
    
    
    public function searchFarmByAllFilters(Request $request)
   {
       
    $filters = [];
    
    if ($request->has('city')) 
    {
      $filters['cities'] = $request->city;
    }
    if ($request->has('engine_type')) {
      $filters['engine_types'] = $request->engine_type;
    }
    if($request->has('make'))
    {
        if($request->make!=-1){
        
        $filters['brands'] = $request->make;  } 
    }
    if($request->has('model'))
    {
         if($request->model!=-1){
      $filters['models']=$request->model;
         }
    }
    if($request->has('city_area'))
    {
      $filters['city_areas']=$request->city_area;
    }
    if($request->has('version'))
    {
      $filters['model_verions']=$request->version;
    }
    if($request->has('body_type'))
    {
      $filters['vehicle_body_types']=$request->body_type;
    }
    if($request->has('color'))
    {
      $filters['colors']=$request->color;
    }
    if($request->has('reg_city'))
    {
      $filters['registration_cities']=$request->reg_city;
    }
    if($request->has('assembly'))
    {
      $filters['assemblies']=$request->assembly;
    }
    if($request->has('transmission'))
    {
      $filters['transmissions']=$request->transmission;
    }
    if($request->has('price_fr'))
    {
      $filters['price_fr']=$request->price_fr."00000";
    }
    if($request->has('price_to'))
    {
      $filters['price_to']=$request->price_to."00000";
    }
    if($request->has('capacity_fr'))
    {
      $filters['capacity_fr']=$request->capacity_fr;
    }
    if($request->has('capacity_to'))
    {
      $filters['capacity_to']=$request->capacity_to;
    }
    if($request->has('mileage_fr'))
    {
      $filters['mileage_fr']=$request->mileage_fr;
    }
     if($request->has('mileage_to'))
    {
      $filters['mileage_to']=$request->mileage_to;
    }
   
    $all_farms = $this->vehicle->searchOtherByAllFilters($filters, \App\VehicleType::Farm);
   
    $new_farms=$this->vehicle->getFeaturedOthers(\App\VehicleType::Farm);
$city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Farm);
      
      $manufacture_farms=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Farm);
      
     //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      $transmission= Transmission::all();
      $assembly= Assembly::all();
      $engine_type= EngineType::where('vehicle_type_id', \App\VehicleType::Car)->get();
      
      $reg_city= RegistrationCity::all();
      $body_type= VehicleBodyType::where('vehicle_type_id', \App\VehicleType::Farm)->get();
      $make=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Farm);
      $city=City::all();
      
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////
      

      ////////////////////////////FILTERS//////////////////////////////////
      //////////////////////////////////////////////////////////////////////////

      $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Farm);
      $transmissions=$this->transmission->getAllTransmissionVehicles(\App\VehicleType::Farm);
      $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Farm);
      $assemblies=$this->assembly->getAllAssemblyVehicles(\App\VehicleType::Farm);
      $colors=$this->color->getAllColorVehicles(\App\VehicleType::Farm);
      $body_types=$this->body_type->getAllBodyTypeVehicles(\App\VehicleType::Farm);
      $models=$this->model->getAllModelVehicles(\App\VehicleType::Farm);
      $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Farm);

//////////////////////////////////////////////////////////////////////
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

     
      $images=array();
      
      
      foreach($all_farms as $a_f)
          {
          $images[$a_f->id]=$this->vehicle->get4ImagesByPostId($a_f->id);  
          
          }
          //dd($images);
          
          $updated_date=array();
      
      foreach($all_farms as $a_c)
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
    
      
   

      return view('website/Farmpages.index',compact('updated_date','most_featured_cars','images','model_year','manufacture','city','checked','new_farms','all_farms','city_vehicles_count','manufacture_farms','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));

        
    
    }
    
    
    
    
}
