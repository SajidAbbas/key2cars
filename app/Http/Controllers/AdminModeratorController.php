<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Vehicle;
use App\Feature;
use App\ConditionDetail;
use App\Accessories;
use App\HotWheels;

class AdminModeratorController extends Controller
{
	protected $vehicle;
	protected $feature;
	protected $condition_detail;
        protected $accessory;
        protected $hotwheel;


        public function __construct()
	{
		$this->vehicle=new Vehicle();
		$this->feature=new Feature();
		$this->condition_detail=new ConditionDetail();
                $this->accessory=new Accessories();
                $this->hotwheel=new HotWheels();
	}
    

    public function index()
    {
    	$data=$this->vehicle->getAllPendingRequest();

    	return view('admin.moderator',['data'=>$data]);
    }
    
    public function accessory()
    {
        $data=$this->accessory->getAllPendingRequest();

    	return view('admin.moderatorAccessory',['data'=>$data]);
        
    }
    
    public function hotWheel()
    {
        $data=$this->hotwheel->getAllPendingRequest();

    	return view('admin/HotWheel.moderatorhotWheel',['data'=>$data]);
        
    }

    public function detailVehicle($id)
    {
    	$result=$this->vehicle->getVehicleDetails($id);
    	$feature=$this->feature->getFeaturesByVehicle($id);
    	$images=$this->vehicle->getAllImagesByPostId($id);
        $condition=$this->condition_detail->getConditionByVehicle($id);

    	return view('admin.detailVehicle',['result'=>$result,'feature'=>$feature,'image'=>$images,'condition'=>$condition]);
    }

   public function deleteVehicles(Request $request)
    {
        $ids=$request->get('id');
       return $data=$this->vehicle->deleteVehicle($ids);

    }
    
     public function deleteAccessory(Request $request)
    {
        $ids=$request->get('id');
       return $data=$this->vehicle->deleteVehicle($ids);

    }

    public function updateRequest(Request $request)
    {
        
         return $data=$this->vehicle->updateRequest($request);
    }
    
     public function updateRequestAccessory(Request $request)
    {
        
         return $data=$this->accessory->updateRequest($request);
    }
    
    public function updateRequestHotWheel(Request $request)
    {
        
         return $data=$this->hotwheel->updateRequest($request);
    }


}
