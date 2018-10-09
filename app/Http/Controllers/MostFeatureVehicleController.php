<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\MostFeatureVehicle;
use App\VehicleType;

class MostFeatureVehicleController extends Controller
{
    protected $mfv;
    
    public function __construct(){
        $this->mfv=new MostFeatureVehicle();
    }
    public function indexCar()
    {
        $data=$this->mfv->getAllVehicles();   
        return view('admin/mostFavouriteVehicles/Car.index',compact('data'));
        
    }
    
    public function addView()
    {
        
        $type=VehicleType::all();
        return view('admin/mostFavouriteVehicles/Car.add-car',compact('type'));
    }
    
    public function addNew(Request $request)
    {
        $this->mfv->addNewVehicle($request);
        return redirect('/MFV/Car');
    }
    
    public function deleteVehicles(Request $request)
    {
        $ids=$request->get('id');
       return $data=$this->mfv->deleteVehicle($ids);

    }
    
    
    public function changeStatus(Request $request)
    {
       
        if($request->active==0)
        {
            $data=$this->mfv->checkActiveVehiclesByType($request->type);
            $count=0;
            foreach($data as $d)
            {
                $count=$d->size;
            }
           
            if($count<4)
            {
                MostFeatureVehicle::where('id',$request->id)->update(['active'=>1]);
                return response()->json(['success'=>"Successfully Update"]);
            }
            else
            {
                return response()->json(['error'=>"maximum limit reached"]);
            }
        }
        else
        {
           MostFeatureVehicle::where('id',$request->id)->update(['active'=>0]);
           return response()->json(['success'=>"Successfully Updatedhh"]);
            
        }
           

        
    }
    
}
