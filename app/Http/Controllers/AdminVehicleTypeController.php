<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\VehicleType;


class AdminVehicleTypeController extends Controller
{
	protected $vehicleType;

    public function __construct() {
     $this->vehicleType = new VehicleType;       
    }

    
    public function index()
    {
    	$data=$this->vehicleType->getAllVehicleTypes();
    	return view('admin.vehicleType',['data'=>$data]);
    }

    public function addView()
    {
    	return view('admin.addVehicleType');
    }

    


    public function addVehicleType(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required|unique:vehicle_types',
            
            ]);
        $this->vehicleType->insertVehicleType($request);
        $request->flash();

        return redirect('/VehicleType');
    }

    public function deleteVehicleType(Request $request)
    {
        $ids=$request->get('id');
       return $data=$this->vehicleType->deleteVehicleType($ids);

    }


    public function editVehicleType($id)
    {
        $data=$this->vehicleType->getSpecificVehicleType($id);
        return view('admin.editVehicleType',['data'=>$data]);
        
    }

    public function removeVehicleTypeImage($_id)
    {
        $this->vehicleType->removeVehicleTypeImage($_id);

        return redirect()->route('editVehicleType', [$_id]);
 }


    public function updateVehicleType(Request $request)
    {


        $this->vehicleType->updateVehicleType($request);


       
        return redirect('/VehicleType');
    }


   





}
