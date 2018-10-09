<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Manufacture;
use App\VehicleType;
use App\brand;

class AdminManufactureController extends Controller
{
	protected $manufacture;
	protected $vehicle_type;
  protected $brand;

	public function __construct() {
     $this->manufacture = new Manufacture;  
       $this->vehicle_type = new VehicleType;    
       $this->brand=new brand();        
    }

   public function index()
   {

   	$data =$this->manufacture->getAllManufacturer();
   	$titles=$this->vehicle_type->getAllVehicleTypes();

   	return view('admin.manufacture',['data'=>$data,'title'=>$titles]);
   }


   public function addView()
   {
   	$type=$this->vehicle_type->getAllVehicleTypes();
    $brand=$this->brand->getAllBrands();
   	return view('admin.addManufacture',['type'=>$type,'brand'=>$brand]);
   }

    public function addManufacture(Request $request)
    {
        $this->validate($request, [
            
            'brand' => 'required',
            'type'=>'required',
            ]);


        $this->manufacture->insertManufacture($request);
        $request->flash();

        return redirect('/Manufacture');
    }



    public function deleteManufacture(Request $request)
    {
        $ids=$request->get('id');

       return $data=$this->manufacture->deleteManufacture($ids);

    }

    public function editManufacture($id)
    {
      $type=$this->vehicle_type->getAllVehicleTypes();
    $brand=$this->brand->getAllBrands();
      $result=$this->manufacture->editManufacture($id);
      return view('admin.editManufacture',['type'=>$type,'brand'=>$brand,'result'=>$result]);

    }

    public function updateManufacture(Request $request)
    {
      

      $this->manufacture->updateManufacture($request);

     return redirect('/Manufacture');
    }


    public function searchByVehicleType(Request $request)
    {
      if($request->type==0)
      {
        return redirect('/Manufacture');
      }
      else
      {
      
      $data=$this->manufacture->getManufactureByVehicleType($request->type);
        $titles=$this->vehicle_type->getAllVehicleTypes();


     return view('admin.manufacture',['data'=>$data,'title'=>$titles]); 
   }
    }
}
