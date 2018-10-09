<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\City;
use App\VehicleBodyType;
use App\Models;
use App\User;
use App\EngineType;
use App\Assembly;
use App\Transmission;
use App\Manufacture;
use App\Color;
use App\ModelYear;

class UsedCarController extends Controller
{
	protected $vehicle;
	protected $city;
	protected $body_type;
	protected $model;
	protected $user;
	protected $manufacture;
  



	public function __construct()
	{
		$this->vehicle=new Vehicle();
		$this->city=new City();
		$this->body_type=new VehicleBodyType();
		$this->model=new Models();
		$this->user=new User();
		$this->manufacture=new Manufacture();
     
	}
        public function index()
                {
      ////////////////////////////////////////////////////
      ////////////Search Data/////////////////////////
      /////////////////////////////////////////////////
      $city=City::orderby('title','asc')->get();
      $engine_type=EngineType::orderby('title','asc')->get();
      $assembly=Assembly::orderby('title','asc')->get();
      $transmission=Transmission::orderby('title','asc')->get();
      $color=Color::orderby('title','asc')->get();
      $model_year=ModelYear::orderby('year','asc')->get();
      $body_type=$this->body_type->getAllBodyTypeSize();

      //////////////////////////////////////////////////
      $featured=$this->vehicle->getFeaturedVehicles();
      $city_vehicles=$this->city->getAllCityVehicles(1);
      $dealer=$this->user->getAllFeaturedDealer();

      $make_model=null;
      $count=0;
      $make=$this->manufacture->getAllManufacturerByType(1);
      foreach($make as $m)
      {
         $make_model[$count][0]=$m->brand;
         $make_model[$count][1]=$m->brand_id;
         $make_model[$count][2]=$m->icon;
         $make_model[$count][3]=$this->model->getAllCarModelsByMake($m->brand_id);
         $count++;
      }
      return view('usedCar.index',['featured'=>$featured,'make_model'=>$make_model,'city_size'=>$city_vehicles,'dealer'=>$dealer,'body_type'=>$body_type,'city'=>$city,'engine_type'=>$engine_type,'transmission'=>$transmission,'assembly'=>$assembly,'color'=>$color,'model_year'=>$model_year]);
   }

   

   public function searchVehiclesByGeneralFilter($col,$id)
   {
      $result=$this->vehicle->searchVehiclesByGeneralFilter($col,$id);
      dd($result);
   }


   public function searchUsedVehiclesByAllFilters(Request $request)
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
      $filters['brands']=$request->model;
    }
    if($request->has('model'))
    {
      $filters['models']=$request->model;
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
      $filters['vehicel_body_types']=$request->body_type;
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
      $filters['price_fr']=$request->price_fr;
    }
    if($request->has('price_to'))
    {
      $filters['price_to']=$request->price_to;
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


    $paginated_data = $this->vehicle->searchUsedVehiclesByAllFilters($filters);
    dd($paginated_data);

    
    }
   




   
}
