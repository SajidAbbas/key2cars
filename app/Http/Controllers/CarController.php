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
use App\ConditionDetail;
use App\ConditionDetailValues;
use Validator;
use DB;
use App\VehicleType;

use Carbon\Carbon;


class CarController extends Controller
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
        protected $condition_detail;
        protected $condition_detail_value;



    public function __construct() {
            
            $this->vehicle = new Vehicle();  
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
            $this->condition_detail=new ConditionDetail();
            $this->condition_detail_value=new ConditionDetailValues();
            $this->model_year=new ModelYear();
            
        }

    public function index()
    {
        //////////////////////////////////////////////////////////////////
      ///////////////////////////////SEARCH FORM///////////////////////////
      /////////////////////////////////////////////////////////
       $city=City::orderby('title','asc')->get();
      $engine_types=EngineType::orderby('title','asc')->where('vehicle_type_id', \App\VehicleType::Car)->get();
      $assemblies=Assembly::orderby('title','asc')->get();
      $transmissions=Transmission::orderby('title','asc')->get();
      $colors=Color::orderby('title','asc')->get();
      $model_year=ModelYear::orderby('year','asc')->get();
      
      $body_types= VehicleBodyType::where('vehicle_type_id', VehicleType::Car)->get();
      $reg_cities= RegistrationCity::get();
      $manufacture=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
      $body_type=$this->body_type->getAllBodyTypeSize();



    	$featured_vehicles=$this->vehicle->getFeaturedCars();
    	$city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Car);
    	//$body_type=$this->body_type->getAllBodyTypeSize();
    	$dealer=$this->user->getAllFeaturedDealer();
        

    	return view('website/Carpages.index',compact('body_types','manufacture','featured_vehicles','city_vehicles_count','dealer','body_type','body_type','city','engine_types','transmissions','assemblies','colors','model_year','reg_cities'));

      
    }
    
    public function newCars(){
        
        $vehicle=$this->vehicle->getNewVehiclesByType(\App\VehicleType::Car);
       
          $manufacture=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
        return view('website/Carpages.new-cars',compact('vehicle','manufacture'));
    }
    
    public function getNewCarsByMakeAndModel(Request $request)
    {
         $vehicle=$this->vehicle->getNewVehiclesByMakeAndModel($request->make,$request->model,$request->type);
         
         return view('website/Carpages.update-new-cars',compact('vehicle'));
    }
    
    public function vehicleDetails($id)
    {
        $data=$this->vehicle->getNewVehicleDetails($id);
        $images=$this->vehicle->getAllImagesByPostIdNewVehicles($id);
        
        $model_id=0;
        foreach($data as $d)
        {
            $model_id=$d->model_id;
        }
        
        $related_ads=$this->vehicle->getRelatedCarsByModel(0, $model_id);
        
       
        
      return view('website/Carpages.new-car-detail',compact('data','images','related_ads'));
    }

    public function allCars()
    {

      return view('website/Carpages.sell-a-car');

    }

    public function featuredCars()
    {
    	
    	$city_vehicles_count=$this->city->getAllCityFeaturedVehicles(\App\VehicleType::Car);
      
    	$manufacture_featured_cars=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Car);
        
    	$all_cars=$this->vehicle->getFeaturedCarsPaginate();
        
        //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      $transmission= Transmission::all();
      $assembly= Assembly::all();
      $engine_type= EngineType::all();
      $color=Color::all();
      $reg_city= RegistrationCity::all();
      $body_type= VehicleBodyType::where('vehicle_type_id', VehicleType::Car)->get();
      $make=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
      $city=City::all();
      
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////

    	///////////////////////////////////////////////////////////////////////////
    	//////////////////////////////////FILTERS//////////////////////////////////
    	//////////////////////////////////////////////////////////////////////////

    	$reg_cities=$this->registration_city->getAllRegisterdCityFeaturedVehicles(\App\VehicleType::Car);
    	$transmissions=$this->transmission->getAllTransmissionFeaturedVehicles(\App\VehicleType::Car);
    	$engine_types=$this->engine_type->getAllEngineTypeFeaturedVehicles(\App\VehicleType::Car);
    	$assemblies=$this->assembly->getAllAssemblyFeaturedVehicles(\App\VehicleType::Car);
    	$colors=$this->color->getAllColorFeaturedVehicles(\App\VehicleType::Car);
    	$body_types=$this->body_type->getAllBodyTypeFeaturedVehicles(\App\VehicleType::Car);
    	$models=$this->model->getAllModelFeaturedVehicles(\App\VehicleType::Car);
        $manufacture_cars=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Car);


        /////////////////////////////////////////////////////////////////////////////////////
        
        
        $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      
      $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          //dd($images);
          
          $updated_date=array();
      
      foreach($all_cars as $a_c)
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
    
      
      $checked[0]="";
      $checked[1]="";


    	return view('website/Carpages.featured-cars',compact('checked','updated_date','model_year','city','make','manufacture_cars','images','most_featured_cars','transmission','assembly','engine_type','color','reg_city','body_type','all_cars','city_vehicles_count','manufacture_featured_cars','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));
   
        
      
      
      
        
    }


    public function DealersCar()
    {
    	$city_dealers=$this->user->getAllCityDealersCars();
    	$dealer_cars=$this->user->getAllDealerByType(VehicleType::Car);
        
        $manufacture=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
        $city= City::all();
    	
    	
    	return view('website/Carpages.dealers-car',compact('city_dealers','dealer_cars','manufacture','city'));
    }

    public function updateFeaturedCars(Request $request)
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
    
    if($request->has('bodytype'))
    {
      $filters['vehicle_body_types']=$request->bodytype;
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
      $filters['price_fr']=str_replace(',', '', $request->price_fr);
    }
    if($request->has('price_to'))
    {
      $filters['price_to']=str_replace(',', '', $request->price_to);
    }
    if($request->has('capacity_fr'))
    {
      $filters['capacity_fr']=str_replace(',', '', $request->capacity_fr);
    }
    if($request->has('capacity_to'))
    {
      $filters['capacity_to']=str_replace(',', '', $request->capacity_to);
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
    if($request->has('condition'))
    {
        $filters['condition']=$request->condition;
        
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


    $all_cars = $this->vehicle->updateFeaturedCarsByAllFilters($filters);
    
    
        $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          $updated_date=array();
      
     foreach($all_cars as $a_c)
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
    
   
        return view('website/Carpages.update-all-car',compact('all_cars','images','updated_date'));

    
  

    
    
    }

    public function updateAllCars(Request $request)
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
    
        if($request->has('bodytype'))
        {
            $filters['vehicle_body_types']=$request->bodytype;
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
      $filters['price_fr']=str_replace(',', '', $request->price_fr);
    }
    if($request->has('price_to'))
    {
      $filters['price_to']=str_replace(',', '', $request->price_to);
    }
    if($request->has('capacity_fr'))
    {
      $filters['capacity_fr']=str_replace(',', '', $request->capacity_fr);
    }
    if($request->has('capacity_to'))
    {
      $filters['capacity_to']=str_replace(',', '', $request->capacity_to);
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
        if($request->has('condition'))
        {
            $filters['condition']=$request->condition;
        }
        if($request->has('sort_price'))
        {
            $filters['sort_price']=$request->sort_price;
        }
        
        if($request->has('name'))
        {
            $filters['name']=$request->name;
        }
    


        $all_cars = $this->vehicle->updateCarsByAllFilters($filters);
        $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          
          $updated_date=array();
      
      foreach($all_cars as $a_c)
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
    
   
        return view('website/Carpages.update-all-car',compact('all_cars','images','updated_date'));

    
    
    }



    public function searchCarsByAllFilters(Request $request)
   {
      
       
    $filters = []; 
    
    if ($request->has('city')) 
    {
        if($request->city!=-1)
        { 
            $filters['cities'] = $request->city;
         }
    }
    if ($request->has('engine_type')) {
      $filters['engine_types'] = $request->engine_type;
    }
    if($request->has('make'))
    {
       if($request->make!=-1){
           $filters['brands'] = $request->make;
                
            } 
    }
    if($request->has('model'))
    {
        if($request->model!=-1){
            $filters['models'] = $request->model;
                }
            
    }
    if($request->has('city_area'))
    {
      $filters['city_areas']=$request->city_area;
    }
    if($request->has('version'))
    {
		 if($request->version!=-1){
      $filters['model_versions']=$request->version;
		 }
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
    if($request->has('condition'))
    {
        if($request->condition!= VehicleType::Any)
        {
            $filters['condition']=$request->condition;
        }
    }
	
    
   
    $all_cars = $this->vehicle->searchCarsByAllFilters($filters);
   
    
    
    $new_cars=$this->vehicle->getallNewFeaturedCars();

      $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Car);
      
      $manufacture_cars=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Car);
      
      
      //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////

      ///////////////////////////////FILTERS//////////////////////////////////
      //////////////////////////////////////////////////////////////////////////

      $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Car);
      $transmissions=$this->transmission->getAllTransmissionVehicles(\App\VehicleType::Car);
      $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Car);
      $assemblies=$this->assembly->getAllAssemblyVehicles(\App\VehicleType::Car);
      $colors=$this->color->getAllColorVehicles(\App\VehicleType::Car);
      $body_types=$this->body_type->getAllBodyTypeVehicles(\App\VehicleType::Car);
      $models=$this->model->getAllModelVehicles(\App\VehicleType::Car);
      $city=City::get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Car);

//////////////////////////////////////////////////////////////////////

       $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          
          $updated_date=array();
      
      foreach($all_cars as $a_c)
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
     
      $checked[0]="";
      $checked[1]="";
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      

      return view('website/Carpages.all-cars-new',compact('updated_date','most_featured_cars','model_year','images','manufacture','city','checked','new_cars','all_cars','city_vehicles_count','manufacture_cars','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));


    
    }
    
    
     public function searchFeaturedCarsByAllFilters(Request $request)
   {
       
    $filters = [];
    
    if ($request->has('city')) 
    {
        if($request->city!=-1)
        {
            $filters['cities'] = $request->city;
         
        }
    }
    if ($request->has('engine_type')) {
      $filters['engine_types'] = $request->engine_type;
    }
    if($request->has('make'))
    {
       if($request->make!=-1){
          $filters['brands'] = $request->make;
                }
            
    }
    if($request->has('model'))
    {
         if($request->model!=-1){
              $filters['models'] = $request->model;
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
    if($request->has('condition'))
    {
        if($request->condition!= VehicleType::Any)
        {
            $filters['condition']=$request->condition;
        }
    }
    
   
    $all_cars = $this->vehicle->searchFeaturedCarsByAllFilters($filters);
   
    
    
     
     $city_vehicles_count=$this->city->getAllCityFeaturedVehicles(\App\VehicleType::Car);
      
    	$manufacture_featured_cars=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Car);
        
    	
        
        //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      $transmission= Transmission::all();
      $assembly= Assembly::all();
      $engine_type= EngineType::all();
      $color=Color::all();
      $reg_city= RegistrationCity::all();
      $body_type= VehicleBodyType::where('vehicle_type_id', VehicleType::Car)->get();
      $make=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
      $city=City::all();
      
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////

    	///////////////////////////////////////////////////////////////////////////
    	//////////////////////////////////FILTERS//////////////////////////////////
    	//////////////////////////////////////////////////////////////////////////

    	$reg_cities=$this->registration_city->getAllRegisterdCityFeaturedVehicles(\App\VehicleType::Car);
    	$transmissions=$this->transmission->getAllTransmissionFeaturedVehicles(\App\VehicleType::Car);
    	$engine_types=$this->engine_type->getAllEngineTypeFeaturedVehicles(\App\VehicleType::Car);
    	$assemblies=$this->assembly->getAllAssemblyFeaturedVehicles(\App\VehicleType::Car);
    	$colors=$this->color->getAllColorFeaturedVehicles(\App\VehicleType::Car);
    	$body_types=$this->body_type->getAllBodyTypeFeaturedVehicles(\App\VehicleType::Car);
    	$models=$this->model->getAllModelFeaturedVehicles(\App\VehicleType::Car);
        $manufacture_cars=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Car);


        /////////////////////////////////////////////////////////////////////////////////////
        
        
        $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      
      $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          //dd($images);
          
          $updated_date=array();
      
      foreach($all_cars as $a_c)
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
    
      
      


    	return view('website/Carpages.featured-cars',compact('updated_date','model_year','city','make','manufacture_cars','images','most_featured_cars','transmission','assembly','engine_type','color','reg_city','body_type','all_cars','city_vehicles_count','manufacture_featured_cars','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));
   
        
      
    
    }


    public function sellCar()
    {
      $cities=$this->city->getAllCities();
      $year=$this->model_year->getAllYears();
      $type=VehicleBodyType::get();
      $color=$this->color->getAllColor();
      $engine=$this->engine_type->getAllEngineType();
      $transmission=$this->transmission->getAllTransmission();
      $assembly=$this->assembly->getAllAssembly();
      $feature=$this->feature->getAllFeatureTitle();
      $reg_city=$this->registration_city->getAllRegCities();
      $condition_detail=$this->condition_detail->getAllConditionDetail();
      $condition_detail_value=$this->condition_detail_value->getAllConditionDetailValues();


      return view('website/Carpages.sell-a-car',['city'=>$cities,'year'=>$year,'type'=>$type,'color'=>$color,'engine_type'=>$engine,'transmission'=>$transmission,'assembly'=>$assembly,'feature'=>$feature,'reg_city'=>$reg_city,'condition_detail'=>$condition_detail,'condition_detail_value'=>$condition_detail_value]);
      
    }



    public function addCar(Request $request)
    {
        
    
        $validator = Validator::make($request->all(), [
            'city' => 'required',
            'type'=>'required',
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
            'reg_city'=>'required',
            'email'=>'email'
            
        ]);
        if (!$validator->passes()) {
             return response()->json(['error'=>$validator->errors()->all()]);
        }
    
        $code=rand(100000,999999);
        
        $ad_id=$this->vehicle->addVehicle($request,$code);
        
        //return response()->json(['success'=>'Added new records.','code'=>$code,'id'=>$ad_id]);
        
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

    public function getCarsByCity(Request $request)
    {
        
      
      $new_cars=$this->vehicle->getallNewFeaturedCars();

      $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Car);
      
      $manufacture_cars=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Car);
      
    //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////
      

      ////////////////////////////FILTERS//////////////////////////////////
      //////////////////////////////////////////////////////////////////////////

      $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Car);
      $transmissions=$this->transmission->getAllTransmissionVehicles(\App\VehicleType::Car);
      $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Car);
      $assemblies=$this->assembly->getAllAssemblyVehicles(\App\VehicleType::Car);
      $colors=$this->color->getAllColorVehicles(\App\VehicleType::Car);
      $body_types=$this->body_type->getAllBodyTypeVehicles(\App\VehicleType::Car);
      $models=$this->model->getAllModelVehicles(\App\VehicleType::Car);
      $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Car);

//////////////////////////////////////////////////////////////////////
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      $all_cars=$this->vehicle->getAllCarsByCity($request->id);
      
      ////////////////////////////////Updated Date Converted in days//////
      $updated_date=array();
      
      foreach($all_cars as $a_c)
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
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          //dd($images);
    
      
      $checked[0]="city";
      $checked[1]=$request->id;

      return view('website/Carpages.all-cars-new',compact('updated_date','most_featured_cars','images','model_year','manufacture','city','checked','new_cars','all_cars','city_vehicles_count','manufacture_cars','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));

    }

    public function getCarsByBodyType(Request $request)
    {
      $new_cars=$this->vehicle->getallNewFeaturedCars();

      $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Car);
      
      $manufacture_cars=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Car);
      
      
      //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////

      /////////////////////////////////////////////////FILTERS//////////////////////////////////
      //////////////////////////////////////////////////////////////////////////

      $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Car);
      $transmissions=$this->transmission->getAllTransmissionVehicles(\App\VehicleType::Car);
      $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Car);
      $assemblies=$this->assembly->getAllAssemblyVehicles(\App\VehicleType::Car);
      $colors=$this->color->getAllColorVehicles(\App\VehicleType::Car);
      $body_types=$this->body_type->getAllBodyTypeVehicles(\App\VehicleType::Car);
      $models=$this->model->getAllModelVehicles(\App\VehicleType::Car);
      $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Car);

//////////////////////////////////////////////////////////////////////

      $all_cars=$this->vehicle->getAllCarsByBodyType($request->id);
      
      $updated_date=array();
      
      foreach($all_cars as $a_c)
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
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

     
      $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
       $checked[0]="bodytype";
      $checked[1]=$request->id;

      return view('website/Carpages.all-cars-new',compact('updated_date','model_year','most_featured_cars','images','manufacture','city','checked','new_cars','all_cars','city_vehicles_count','manufacture_cars','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));

    }
    
    
    public function searchAllCar(Request $request)
    {
        $filters = [];
    
    if ($request->has('city')) 
    {
        if($request->city!=-1)
        {
            foreach($request->city as $col => $id)
            {
                if($id==-1)
                {
                    break;
                }
                else
                {
                     $filters['cities'] = $request->city;
                }
            }
     
        }
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
    if($request->has('condition'))
    {
        if($request->condition!= VehicleType::Any)
        {
            $filters['condition']=$request->condition;
        }
    }
    
   
    $all_cars = $this->vehicle->searchCarsByAllFilters($filters);
   
     $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          
          $updated_date=array();
      
      foreach($all_cars as $a_c)
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
    
    
    return view('website/Carpages.update-all-car',compact('all_cars','updated_date','images'));

    
    }
    
    public function sendVerificationCode(Request $request)
    {
        $data1=Vehicle::where('id',$request->id)->get();
        foreach($data1 as $d){
              $number="92".substr($d->number,1);
              $code="Verification Code for Key2Car ad ".$d->verification_code;
            
        }
            $apiKey = urlencode('5Yp4Ybf2r1I-czuSCBgfSuILHx5r7Duf9dXB6AN7Fa');
	
	// Message details
          
	$numbers = urlencode($number);
	$sender = urlencode('key2cars');
      
	$message = rawurlencode($code);
 
	// Prepare data for POST request
	$data = 'apikey=' . $apiKey . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;
 
	// Send the GET request with cURL
	$ch = curl_init('https://api.txtlocal.com/send/?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
        
        return $response."";
        
    }
    
    public function verifiedAd(Request $request)
    {
         date_default_timezone_set("Asia/Karachi");
        Vehicle::where('id',$request->id)->update(['isVerified'=>1]);
    }
    
    public function featuredCarsByCity(Request $request)
    {
       
        $city_vehicles_count=$this->city->getAllCityFeaturedVehicles(\App\VehicleType::Car);
      
    	$manufacture_featured_cars=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Car);
        
    	$all_cars=$this->vehicle->getAllFeaturedCarsByCity($request->id);
        
        //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      $transmission= Transmission::all();
      $assembly= Assembly::all();
      $engine_type= EngineType::all();
      $color=Color::all();
      $reg_city= RegistrationCity::all();
      $body_type= VehicleBodyType::where('vehicle_type_id', VehicleType::Car)->get();
      $make=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
      $city=City::all();
      
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////

    	///////////////////////////////////////////////////////////////////////////
    	//////////////////////////////////FILTERS//////////////////////////////////
    	//////////////////////////////////////////////////////////////////////////

    	$reg_cities=$this->registration_city->getAllRegisterdCityFeaturedVehicles(\App\VehicleType::Car);
    	$transmissions=$this->transmission->getAllTransmissionFeaturedVehicles(\App\VehicleType::Car);
    	$engine_types=$this->engine_type->getAllEngineTypeFeaturedVehicles(\App\VehicleType::Car);
    	$assemblies=$this->assembly->getAllAssemblyFeaturedVehicles(\App\VehicleType::Car);
    	$colors=$this->color->getAllColorFeaturedVehicles(\App\VehicleType::Car);
    	$body_types=$this->body_type->getAllBodyTypeFeaturedVehicles(\App\VehicleType::Car);
    	$models=$this->model->getAllModelFeaturedVehicles(\App\VehicleType::Car);
        $manufacture_cars=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Car);


        /////////////////////////////////////////////////////////////////////////////////////
        
        
        $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      
      $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          //dd($images);
          
          $updated_date=array();
      
      foreach($all_cars as $a_c)
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
    
      $checked[0]="";
      $checked[1]="";
      


    	return view('website/Carpages.featured-cars',compact('checked','updated_date','model_year','city','make','manufacture_cars','images','most_featured_cars','transmission','assembly','engine_type','color','reg_city','body_type','all_cars','city_vehicles_count','manufacture_featured_cars','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));
   
        
        
        
    }
    
    public function featuredCarsByManufacture(Request $request)
            
    {
        $city_vehicles_count=$this->city->getAllCityFeaturedVehicles(\App\VehicleType::Car);
      
    	$manufacture_featured_cars=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Car);
        
    	$all_cars=$this->vehicle->getAllFeaturedCarsByManufacture($request->id);
        
        //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      $transmission= Transmission::all();
      $assembly= Assembly::all();
      $engine_type= EngineType::all();
      $color=Color::all();
      $reg_city= RegistrationCity::all();
      $body_type= VehicleBodyType::where('vehicle_type_id', VehicleType::Car)->get();
      $make=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
      $city=City::all();
      
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////

    	///////////////////////////////////////////////////////////////////////////
    	//////////////////////////////////FILTERS//////////////////////////////////
    	//////////////////////////////////////////////////////////////////////////

    	$reg_cities=$this->registration_city->getAllRegisterdCityFeaturedVehicles(\App\VehicleType::Car);
    	$transmissions=$this->transmission->getAllTransmissionFeaturedVehicles(\App\VehicleType::Car);
    	$engine_types=$this->engine_type->getAllEngineTypeFeaturedVehicles(\App\VehicleType::Car);
    	$assemblies=$this->assembly->getAllAssemblyFeaturedVehicles(\App\VehicleType::Car);
    	$colors=$this->color->getAllColorFeaturedVehicles(\App\VehicleType::Car);
    	$body_types=$this->body_type->getAllBodyTypeFeaturedVehicles(\App\VehicleType::Car);
    	$models=$this->model->getAllModelFeaturedVehicles(\App\VehicleType::Car);
        $manufacture_cars=$this->manufacture->getAllManufacturesFeaturedVehicles(\App\VehicleType::Car);


        /////////////////////////////////////////////////////////////////////////////////////
        
        
        $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

      
      $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          //dd($images);
          
          $updated_date=array();
      
      foreach($all_cars as $a_c)
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
    
      
      $checked[0]="";
      $checked[1]="";


    	return view('website/Carpages.featured-cars',compact('checked','updated_date','model_year','city','make','manufacture_cars','images','most_featured_cars','transmission','assembly','engine_type','color','reg_city','body_type','all_cars','city_vehicles_count','manufacture_featured_cars','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));
   
        
    }
    
    public function SearchHomeForm(Request $request)
    {
        $filters = [];
    if ($request->has('city')) 
    {
         if($request->city!=-1){
         $filters['cities'] = $request->city;}
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
    if($request->has('price_fr'))
    {
        $filters['price_fr']=$request->price_fr;
    }
    if($request->has('price_to'))
    {
        $filters['price_to']=$request->price_to;
    }
    if($request->has('filter'))
    {
        $filters['condition']=$request->filter;
    }
    
    $all_cars= $this->vehicle->searchCarsByHomeFilters($filters);
   //dd($all_cars);
    
    $new_cars=$this->vehicle->getallNewFeaturedCars();

      $city_vehicles_count=$this->city->getAllCityVehicles(\App\VehicleType::Car);
      
      $manufacture_cars=$this->manufacture->getAllManufacturesVehicles(\App\VehicleType::Car);
      
      
      //////////////////////////////////////////////////////////////////////////////////////
      /////////////////////////////////SEARCH FORM//////////////////////////////////////
     
       
      $model_year=ModelYear::orderby('year','asc')->get();
      
      
      ////////////////////////////////////////////////////////////////////////////////
      ////////////////////////////////////////////////////////////////////////////////

      /////////////////////////////////////////////////FILTERS//////////////////////////////////
      //////////////////////////////////////////////////////////////////////////

      $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(\App\VehicleType::Car);
      $transmissions=$this->transmission->getAllTransmissionVehicles(\App\VehicleType::Car);
      $engine_types=$this->engine_type->getAllEngineTypeVehicles(\App\VehicleType::Car);
      $assemblies=$this->assembly->getAllAssemblyVehicles(\App\VehicleType::Car);
      $colors=$this->color->getAllColorVehicles(\App\VehicleType::Car);
      $body_types=$this->body_type->getAllBodyTypeVehicles(\App\VehicleType::Car);
      $models=$this->model->getAllModelVehicles(\App\VehicleType::Car);
      $city=City::orderby('title','asc')->get();
      $manufacture=$this->manufacture->getAllManufacturerByType(\App\VehicleType::Car);

//////////////////////////////////////////////////////////////////////

     
      
      
      $most_featured_cars= \App\MostFeatureVehicle::where([['vehicle_type', \App\VehicleType::Car],['active',1],['isDeleted',0]])->get();

     $updated_date=array();
      
      foreach($all_cars as $a_c)
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
      $images=array();
      
      
      foreach($all_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
       $checked[0]="bodytype";
      $checked[1]=$request->id;

      return view('website/Carpages.all-cars-new',compact('updated_date','model_year','most_featured_cars','images','manufacture','city','checked','new_cars','all_cars','city_vehicles_count','manufacture_cars','reg_cities','transmissions','engine_types','assemblies','colors','body_types','models'));

    
    
    
    }
    
    public function CartifiedCar()
    {
        return view('website/Carpages.key2Car-certified');
    }
    
    
    public function searchNewCars(Request $request)
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
      
        $vehicle=$this->vehicle->searchNewVehiclesByType($filters,\App\VehicleType::Car);
        
        
        $manufacture=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
        
        return view('website/Carpages.new-cars',compact('vehicle','manufacture'));
   
    }
    
    public function DealersDetailCar($id){
        
        $dealer_info= User::where('id',$id)->with('city')->first();
        $dealer_cars= $this->vehicle->getAllCarsByUserId($id);
        
        
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
      
      foreach($dealer_cars as $a_c)
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
      
      
      foreach( $dealer_cars as $a_c)
          {
          $images[$a_c->id]=$this->vehicle->get4ImagesByPostId($a_c->id);  
          
          }
          //dd($images);
        
        
       
        return view('website/Carpages.dealer_detail',compact('dealer_cars','dealer_info','images','updated_date','lat','long','address'));
	
        
    }
    
    public function searchCarDealers(Request $request)
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
             
             $dealer_cars=$this->vehicle->getFilterDealers($filters);
        
       $city_dealers=$this->user->getAllCityDealersCars();
   	
        
        $manufacture=$this->manufacture->getAllManufacturerByType(VehicleType::Car);
        $city= City::all();
    	
    	
    	return view('website/Carpages.dealers-car',compact('city_dealers','dealer_cars','manufacture','city'));
    
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
    
    $dealer_cars=$this->vehicle->getFilterDealers($filters);
    
    return view('website/Carpages.update-dealers',compact('dealer_cars'));
    
        
    }
        
        
        
	
}
