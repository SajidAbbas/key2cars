<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Vehicle;
use App\City;
use App\CityAreas;
use App\ModelYear;
use App\VehicleType;
use App\Manufacture;
use App\Models;
use App\Color;
use App\EngineType;
use App\Transmission;
use App\Assembly;
use App\Feature;
use App\ModelVersion;
use App\RegistrationCity;
use App\ConditionDetail;
use App\ConditionDetailValues;

class AdminVehicleController extends Controller
{
	protected $vehicle;
	protected $city;
	protected $city_area;
	protected $model_year;
	protected $vehicle_type;
	protected $manufacture;
	protected $model;
	protected $color;
	protected $engine_type;
	protected $transmission;
	protected $assembly;
	protected $feature;
	protected $model_version;
	protected $reg_city;
    protected $condition_detail;
    protected $condition_detail_value;
    

    public function __construct()
    {
    	$this->vehicle=new Vehicle();
    	$this->city=new City();
    	$this->city_area=new CityAreas();
    	$this->model_year=new ModelYear();
    	$this->vehicle_type=new VehicleType();
    	$this->manufacture=new Manufacture();
    	$this->model=new Models();
    	$this->color=new Color();
    	$this->engine_type=new EngineType();
    	$this->transmission=new Transmission();
    	$this->assembly=new Assembly();
    	$this->feature=new Feature();
    	$this->model_version=new ModelVersion();
    	$this->reg_city=new RegistrationCity();
        $this->condition_detail=new ConditionDetail();
        $this->condition_detail_value=new ConditionDetailValues();


    }

    public function index()
    {
        $user=Auth::user();
        if($user->role_id== \App\Role::Guest)
        {
         $data=$this->vehicle->getAllVehiclesByUser($user->id);
        $city=$this->city->getAllCities();

    	return view('admin.vehicles',['data'=>$data,'city'=>$city]);
        }
    	$data=$this->vehicle->getAllVehicles();
        $city=$this->city->getAllCities();

    	return view('admin.vehicles',['data'=>$data,'city'=>$city]);
    }

    public function addView()
    {
    	$cities=$this->city->getAllCities();
    	$year=$this->model_year->getAllYears();
    	$type=$this->vehicle_type->getAllVehicleTypes();
    	$color=$this->color->getAllColor();
    	$engine=$this->engine_type->getAllEngineType();
    	$transmission=$this->transmission->getAllTransmission();
    	$assembly=$this->assembly->getAllAssembly();
    	$feature=$this->feature->getAllFeatureTitle();
    	$reg_city=$this->reg_city->getAllRegCities();
        $condition_detail=$this->condition_detail->getAllConditionDetail();
        $condition_detail_value=$this->condition_detail_value->getAllConditionDetailValues();





    	return view('admin.addVehicle',['city'=>$cities,'year'=>$year,'type'=>$type,'color'=>$color,'engine_type'=>$engine,'transmission'=>$transmission,'assembly'=>$assembly,'feature'=>$feature,'reg_city'=>$reg_city,'condition_detail'=>$condition_detail,'condition_detail_value'=>$condition_detail_value]);
    }
    
    public function addNewView()
    {
    	
    	$type=$this->vehicle_type->getAllVehicleTypes();
        $city= City::all();
       


    	return view('admin.addNewVehicle',['type'=>$type,'city'=>$city]);
    }
    
    public function getEngineByType(Request $request)         
    {
        return EngineType::where('vehicle_type_id',$request->type)->get();
        
    }


    public function addVehicle(Request $request)
    {
    	//dd($request);
        $this->validate($request, [
            'city' => 'required',
            'type'=>'required',
            'make'=>'required',
            'model'=>'required',
            'price'=>'required',
            'name'=>'required',
            'number'=>'required|regex:/(03)[0-9]{9}/',
            'engine_type'=>'required'
            
            ]);


       $this->vehicle->addVehicle($request);


      return redirect('/Vehicle');


    }
    
     public function addNewVehicle(Request $request)
    {
        
          $this->validate($request, [
            'city' => 'required',
            'type'=>'required',
            'make'=>'required',
            'model'=>'required',
            'price'=>'required',
            'title'=>'required',
            'engine_type'=>'required'
            
            ]);
    

       $this->vehicle->addNewVehicle($request);


      return redirect('/Admin/Vehicle/New');


    }


    public function getAreaByCity(Request $request)
    {

    	return  $data=$this->city_area->getAreaByCity($request->get('city'));
 
    }

    public function getManufactureByType(Request $request)
    {
    	return  $data=$this->manufacture->getAllManufacturerByBodyType($request->get('type'),$request->get('vehicle'));
 
    }

    public function getModelByManufacture(Request $request)
    {
    	return  $data=$this->model->getAllModelsByMake($request->get('make'),$request->get('vehicle_id'));
 
    }

    public function getModelVersionByModel(Request $request)
    {
    	return  $data=$this->model_version->getModelVersionByModel($request->get('model'));
 
    }




    public function detailVehicle($id)
    {
    	$result=$this->vehicle->getVehicleDetails($id);
    	$feature=$this->feature->getFeaturesByVehicle($id);
    	$images=$this->vehicle->getAllImagesByPostId($id);
        $condition=$this->condition_detail->getConditionByVehicle($id);

    	return view('admin.detailVehicle',['result'=>$result,'feature'=>$feature,'image'=>$images,'condition'=>$condition]);
    }
    
    public function detailNewVehicle($id)
    {
    	$data=$this->vehicle->getNewVehicleDetails($id);
    	$images=$this->vehicle->getAllImagesByPostIdNewVehicles($id);
       

    	return view('admin.viewNewVehicle',['data'=>$data,'images'=>$images]);
    }

    public function detailBike($id)
    { 
        $result=$this->vehicle->getBikeDetails($id);
       $feature=$this->feature->getFeaturesByVehicle($id);
       $image=$this->vehicle->getAllImagesByPostId($id);
   

        return view('admin.detailBike',compact('result','feature','image'));

    }
    
    public function detailOther($vehicle_id,$id)
    {
    	$result=$this->vehicle->getOtherDetails($id,$vehicle_id);
    	$feature=$this->feature->getFeaturesByVehicle($id);
    	$images=$this->vehicle->getAllImagesByPostId($id);
        
    	return view('admin.detailBus',['result'=>$result,'feature'=>$feature,'image'=>$images]);
    }

    public function deleteVehicles(Request $request)
    {
        $ids=$request->get('id');
       return $data=$this->vehicle->deleteVehicle($ids);

    }

    public function editVehicle($id)
    {

    	$cities=$this->city->getAllCities();
    	$year=$this->model_year->getAllYears();
    	$type=$this->vehicle_type->getAllVehicleTypes();
    	$color=$this->color->getAllColor();
    	$engine=$this->engine_type->getAllEngineType();
    	$transmission=$this->transmission->getAllTransmission();
    	$assembly=$this->assembly->getAllAssembly();
    	$feature=$this->feature->getAllFeatureTitle();
    	$reg_city=$this->reg_city->getAllRegCities();
        $condition_detail=$this->condition_detail->getAllConditionDetail();
        $condition_detail_value=$this->condition_detail_value->getAllConditionDetailValues();

    	$result=$this->vehicle->getVehicleDetails($id);
    	
    	$fea_res=$this->feature->getFeaturesByVehicle($id);
        $condition_result=$this->condition_detail->getConditionByVehicle($id);

    	$feature_result=array();
    	foreach($fea_res as $f_r)
    	{
    		array_push($feature_result,$f_r->title);

    	}
    	$images_result=$this->vehicle->getAllImagesByPostId($id);

    	

    	return view('admin.editVehicle',['city'=>$cities,'year'=>$year,'type'=>$type,'color'=>$color,'engine_type'=>$engine,'transmission'=>$transmission,'assembly'=>$assembly,'feature'=>$feature,'reg_city'=>$reg_city,'result'=>$result,'feature_result'=>$feature_result,'images_result'=>$images_result,'condition_detail'=>$condition_detail,'condition_detail_value'=>$condition_detail_value,'condition_result'=>$condition_result]);
    }
    
    
    public function editOther($vehicle_id,$id)
    {

        $cities=$this->city->getAllCities();
        $year=$this->model_year->getAllYears();
        $engine=$this->engine_type->getAllEngineType();
        $transmission=$this->transmission->getAllTransmission();
        $assembly=$this->assembly->getAllAssembly();
        $feature=Feature::where('vehicle_type_id',$vehicle_id)->get();
        $reg_city=$this->reg_city->getAllRegCities();
        $make=$this->manufacture->getOtherManufactures($vehicle_id);

    	$result=$this->vehicle->getOtherDetails($id,$vehicle_id);
    	
    	$fea_res=$this->feature->getFeaturesByVehicle($id);
       
    	$feature_result=array();
    	foreach($fea_res as $f_r)
    	{
    		array_push($feature_result,$f_r->title);

    	}
    	$images_result=$this->vehicle->getAllImagesByPostId($id);

    	

    	return view('admin.editOther',['city'=>$cities,'year'=>$year,'engine_type'=>$engine,'transmission'=>$transmission,'assembly'=>$assembly,'feature'=>$feature,'reg_city'=>$reg_city,'result'=>$result,'feature_result'=>$feature_result,'images_result'=>$images_result,'vehicle_id'=>$vehicle_id]);
    }
    
    
    public function editBike($id)
    {

        $city=City::get();
        $year=ModelYear::get();
       
        $engine_type=EngineType::where('vehicle_type_id',2)->get();
        $transmission=Transmission::get();
        $assembly=Assembly::get();
        $feature=Feature::where('vehicle_type_id',2)->get();
        $reg_city=RegistrationCity::get();
        $make=$this->manufacture->getAllManufacturerByType(2);

        $result=$this->vehicle->getBikeDetails($id);
       $fea_res=$this->feature->getFeaturesByVehicle($id);

       $feature_result=array();
        foreach($fea_res as $f_r)
        {
            array_push($feature_result,$f_r->title);

        }
       $images_result=$this->vehicle->getAllImagesByPostId($id);


     
        return view('admin.editBike',compact('city','year','engine_type','transmission','assembly','feature','reg_city','make','result','feature_result','images_result'));
        
        

       
    }
    
    public function editNewVehicle($id){
        
       
        $data=$this->vehicle->getNewVehicleDetails($id);
    	$images=$this->vehicle->getAllImagesByPostIdNewVehicles($id);
        $type=$this->vehicle_type->getAllVehicleTypes();
        $city= City::all();
      

    	return view('admin.editNewVehicle',['type'=>$type,'data'=>$data,'images'=>$images,'city'=>$city]);
    }



    public function updateVehicle(Request $request)
    {
        
        


        $this->vehicle->updateVehicle($request);


       
        return redirect('/Vehicle');
    }
    
    public function updateOther(Request $request)
    {

        $this->vehicle->updateOther($request);


       
        return redirect('/Vehicle');
    }

    public function updateBike(Request $request)
    {
       // dd($request);


        $this->vehicle->updateBike($request);


       
        return redirect('/Vehicle');
    }
    
    public function updateNewVehicle(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'type'=>'required',
            'make'=>'required',
            'model'=>'required',
            'price'=>'required',
            'title'=>'required',
            'engine_type'=>'required'
            
            ]);
        
        $this->vehicle->updateNewVehicle($request);

        return redirect('/Admin/Vehicle/New');
        
    }

    public function searchVehicle(Request $request)
    {
        if($request->all)
        {
            return redirect('/Vehicle');
        }

        elseif(($request->model)&&($request->city))
        {
            $result=$this->vehicle->getAllVehiclesByCity_Model($request);
        }
        elseif($request->model)
        {
            $result=$this->vehicle->getAllVehiclesByModel($request->model);
        }
        else
        {
            $result=$this->vehicle->getAllVehiclesByCity($request->city);
        }



        $city=$this->city->getAllCities();

        return view('admin.vehicles',['data'=>$result,'city'=>$city]);


    }


    public function featureVehicle(Request $request)
    {
        

        return $data=$this->vehicle->featureVehicle($request->id);

    }
    
    
    public function newVehicle()
    {
        $city=$this->city->getAllCities();
        $data=$this->vehicle->getAllNewVehicles();
        return view('admin/newVehicle',compact('city','data'));
        
    }
    
    
    public function activeClientAds()
    {
        $user=Auth::user();
        if($user->role_id== \App\Role::Guest)
        {
         $data=$this->vehicle->getAllClientAds($user->id,"approved");
        $city=$this->city->getAllCities();

    	return view('admin.vehicles',['data'=>$data,'city'=>$city]);
        }
        
    }
    public function pendingClientAds()
    {
        $user=Auth::user();
        if($user->role_id== \App\Role::Guest)
        {
         $data=$this->vehicle->getAllClientAds($user->id,"pending");
        $city=$this->city->getAllCities();

    	return view('admin.vehicles',['data'=>$data,'city'=>$city]);
        }
        
    }
    public function removingClientAds()
    {
        $user=Auth::user();
        if($user->role_id== \App\Role::Guest)
        {
         $data=$this->vehicle->getAllDeletedVehiclesByUser($user->id);
        $city=$this->city->getAllCities();

    	return view('admin.vehicles',['data'=>$data,'city'=>$city]);
        }
        
    }
            
    
    




}
