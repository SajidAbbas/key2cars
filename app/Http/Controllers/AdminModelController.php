<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models;
use App\Manufacture;
use App\VehicleType;
use App\brand;
use App\VehicleBodyType;

class AdminModelController extends Controller
{
    protected $model;
    protected $manufacture;
    protected $vehicle_type;
    protected $brand;
     protected $body_type;



    public function __construct()
    {
   
    	$this->model=new Models();
    	$this->manufacture=new Manufacture();
        $this->vehicle_type=new VehicleType();
        $this->brand=new brand();
       $this->body_type=new VehicleBodyType();

    }


    public function index()
    {
    	
    	$data=$this->model->getAllModels();
    	$makes=$this->brand->getAllBrands();

    	return view('admin.model',['data'=>$data,'make'=>$makes]);
    }


    public function getMakeByType(Request $request)
    {
    
       return  $data=$this->manufacture->getMakeByType($request->get('type'));
    } 


    public function deleteModel(Request $request)
    {
        $ids=$request->get('id');

       return $data=$this->model->deleteModels($ids);

    }

    public function addView()
   {
    
    $type=$this->vehicle_type->getAllVehicleTypes();
     $body_type=$this->body_type->getAllBodyType();
   	
   	return view('admin.addModel',['type'=>$type,'body_type'=>$body_type]);
   }


   public function addModel(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'title' => 'required',
            'make'=>'required',
            'type'=>'required',
          //  'body_type'=>'required'
            ]);

        $this->model->insertModel($request);
        $request->flash();

        return redirect('/Model');
    }

    public function editModel($id)
    {
        $data=$this->model->getSpecificModel($id);


        $type=$this->vehicle_type->getAllVehicleTypes();
         $body_type=$this->body_type->getAllBodyType();
         

        return view('admin.editModel',['type'=>$type,'data'=>$data,'body_type'=>$body_type]);
    }

    public function updateModel(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'make'=>'required',
            'type'=>'required',
            'body_type'=>'required'
            ]);
        $this->model->updateModel($request);

        return redirect('/Model');
    }


    public function searchByManufacture(Request $request)
    {
        if($request->make==0)
        {
            return redirect('/Model');
        }
        else
        {
            $data=$this->model->searchAllModelsByMake($request->make);

            $makes=$this->brand->getAllBrands();
            return view('admin.model',['data'=>$data,'make'=>$makes]);

        }


    }
    
}
