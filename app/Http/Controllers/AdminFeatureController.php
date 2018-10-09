<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\VehicleType;
use App\Feature;


class AdminFeatureController extends Controller
{
    protected $vehicle_type;
    protected $feature;

	public function __construct() {
     
       $this->vehicle_type = new VehicleType();       
       $this->feature=new Feature();     
    }

   public function index()
   {

   	$type =$this->vehicle_type->getAllVehicleTypes();
   	$data=$this->feature->getAllFeatures();

   	return view('admin.feature',['data'=>$data,'type'=>$type]);
   }


   public function addView()
   {
   	$data=$this->vehicle_type->getAllVehicleTypes();
   	return view('admin.addFeature',['data'=>$data]);
   }

    public function addFeature(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type'=>'required',
            ]);

        $this->feature->insertFeatures($request);
        $request->flash();

        	
   	return redirect('/Features');
   }



    public function deleteFeatures(Request $request)
    {
        $ids=$request->get('id');

       return $data=$this->feature->deleteFeatures($ids);

    }


     public function editFeature($id)
    {
      
      $type=$this->vehicle_type->getAllVehicleTypes();
      $result=$this->feature->getSpecificFeature($id);
      return view('admin.editFeature',['type'=>$type,'result'=>$result]);

    }

     public function removeFeatureImage($_id)
    {
    

        $this->feature->removeFeatureImage($_id);

        return redirect()->route('editFeature', [$_id]);
/*
       $type=$this->vehicle_type->getAllVehicleTypes();
      $result=$this->feature->getSpecificFeature($_id);
      return view('admin.editFeature',['type'=>$type,'result'=>$result]);*/
    }

    public function updateFeature(Request $request)
    {


        $this->feature->updateFeature($request);


        return redirect('/Features');
    }

     public function searchFeatureByVehicleType(Request $request)
    {
      if($request->type==0)
      {
        return redirect('/Features');
      }
      else
      {
      
      $data=$this->feature->searchFeatureByVehicleType($request->type);
        $type=$this->vehicle_type->getAllVehicleTypes();


     return view('admin.feature',['data'=>$data,'type'=>$type]); 
   }
    }

    
}
