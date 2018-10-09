<?php

namespace App\Http\Controllers;

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

class MachineryController extends Controller
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
        $featured_machinery=$this->vehicle->getFeaturedOthers(6);
        
        /////////////////////////FILTERS/////////////////////////////////
        ////////////////////////////////////////////////////////////////
        
        $city_vehicles_count=$this->city->getAllCityVehicles(6);
      
        $manufacture_buses=$this->manufacture->getAllManufacturesVehicles(6);
        $reg_cities=$this->registration_city->getAllRegisterdCityVehicles(6);
        $transmissions=$this->transmission->getAllTransmissionVehicles(6);
        $engine_types=$this->engine_type->getAllEngineTypeVehicles(6);
        $assemblies=$this->assembly->getAllAssemblyVehicles(6);
        $body_types=$this->body_type->getAllBodyTypeVehicles(6);
        $models=$this->model->getAllModelVehicles(6);

        //////////////////////////////////////////////////////////////////////
        
        $all_machinery=$this->vehicle->getAllOthers(6);
        
        
        return view('website/Machinerypages.index',compact('featured_machinery','city_vehicles_count','manufacture_buses','reg_cities','engine_types','transmissions','assemblies','body_types','models','all_machinery'));
        
    }
    
    public function updateAllMachinery(Request $request)
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
            $filters['vehicel_body_types']=$request->bodytype;    
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
            $filters['price_fr']=$request->price_fr;
        }
        if($request->has('price_to')){
            $filters['price_to']=$request->price_to;
        }
        if($request->has('capacity_fr')){
            $filters['capacity_fr']=$request->capacity_fr;
        }
        if($request->has('capacity_to')){
            $filters['capacity_to']=$request->capacity_to;
        }
        if($request->has('mileage_fr')){
            $filters['mileage_fr']=$request->mileage_fr;
        }
        if($request->has('mileage_to')){
            $filters['mileage_to']=$request->mileage_to;
        }
        if($request->has('condition')){
            $filters['condition']=$request->condition;
        }
   
        $all_machinery = $this->vehicle->searchOtherByAllFilters($filters,6);
    
   // dd($cars);
        return view('website/Machinerypages.update-all-machinary',compact('all_machinery'));

    
    
    }
    
    
     public function MachineryDetails(Request $request)
    {

      $data=$this->vehicle->getOtherDetails($request->id);
      foreach ($data as $d) {
            $model_id = $d->model_id;
           
        }
      
      $feature=$this->feature->getFeaturesByVehicle($request->id);
      $images=$this->vehicle->getAllImagesByPostId($request->id);
      
      $related_machinery=$this->vehicle->getRelatedOtherByModel($request->id,$model_id,6);
      

        return view('website/Machinerypages.detail-machinery',compact('data','feature','images','related_machinery'));

    }
    
    
    public function sellMachinery()
    {
        $cities=$this->city->getAllCities();
        $year=$this->model_year->getAllYears();
        $engine=$this->engine_type->getAllEngineType();
        $transmission=$this->transmission->getAllTransmission();
        $assembly=$this->assembly->getAllAssembly();
        $feature=Feature::where('vehicle_type_id',6)->get();
        $reg_city=$this->registration_city->getAllRegCities();
        $make=$this->manufacture->getOtherManufactures(6);
        
      return view('website/Machinerypages.sell-machinery',['city'=>$cities,'year'=>$year,'make'=>$make,'engine_type'=>$engine,'transmission'=>$transmission,'assembly'=>$assembly,'feature'=>$feature,'reg_city'=>$reg_city]);
     
    }
    
    public function addMachinery(Request $request)
    {  $validator = Validator::make($request->all(), [
            'city' => 'required',
            'type'=>'required',
            'make'=>'required',
            'model'=>'required',
            'model_version'=>'required',
            'price'=>'required',
            'name'=>'required',
            'number'=>'required|regex:/(03)[0-9]{9}/',
            'engine_type'=>'required',
            'transmission'=>'required',
            'assembly'=>'required',
            'city_area'=>'required',
            'registration_city'=>'required',
            
        ]);
        if (!$validator->passes()) {
             return response()->json(['error'=>$validator->errors()->all()]);
        }
       
        $code=rand(100000,999999);
        $ad_id=$this->vehicle->addOther($request,6,$code);
     
        return response()->json(['success'=>'Added new records.','code'=>$code,'id'=>$ad_id]);

    }
}
