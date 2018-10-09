<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Manufacture;
use App\Models;
use App\City;
use App\HotWheels;
use Validator;

class HotWheelsController extends Controller
{
    protected $manufacture;
    protected $model;
    protected $hotwheel;


    public function __construct()
    {
        $this->manufacture=new Manufacture();
        $this->model=new Models();
        $this->hotwheel=new HotWheels();
        
    }
    public function index()
    {
        $all_vehicles=$this->hotwheel->getAllVehicles();
        $images_size=array();
        foreach($all_vehicles as $a_v)
        {
            $images_size[$a_v->id]=$this->hotwheel->getImagesSize($a_v->id);
            
        }
        return view('website/HotWheelpages.index',compact('all_vehicles','images_size'));
    }
    public function postVehicle()
    {
        $city=City::all();
        
        return view('website/HotWheelpages.post-hotwheel',compact('city'));
    }
    public function getMakeByType(Request $request)
    { 
        return $this->manufacture->getAllManufacturerByType($request->type);
    }
    public function getModelByMake(Request $request)
    {
        return $this->model->getAllModelsByMakeAndType($request->make, $request->type);
    }
    
    
    public function insertHotWheel(Request $request)
    {
        
        
        $validator = Validator::make($request->all(), [
            'city' => 'required',
            'type'=>'required',
            'make'=>'required',
            'model'=>'required',
            'file'=>'required'
            
            
        ]);
        if (!$validator->passes()) {
             return response()->json(['error'=>$validator->errors()->all()]);
        }
      
        $code=rand(100000,999999);
        
        $ad_id=$this->hotwheel->addVehicle($request,$code);
        
        
        return response()->json(['success'=>'Added new records.','code'=>$code,'id'=>$ad_id]);

    
        
    }
    
    public function sendVerificationCode(Request $request)
    {
        $data= HotWheels::where('id',$request->id)->get();
        foreach($data as $d){
        $code="Verification Code for Key2Car ad ".$d->verification_code;
        $number="92".substr($d->number,1);}
        $ch = curl_init("http://brandedsms.net//api/sms-api.php?username=omer&password=omer&phone=".$number."&sender=Step&message=".$code);
        $result= curl_exec($ch);
        return $result."";
        
    }
    
    
    public function verifiedAd(Request $request)
    {
        
        HotWheels::where('id',$request->id)->update(['isVerified'=>1]);
    }
    
    public function HotWheelDetail($id)
    {
        $data=$this->hotwheel->getHotWheelDetail($id);
        $images=$this->hotwheel->getAllImagesByPostId($id);
        
        return view('website/HotWheelpages.detail-hotwheel',compact('data','images'));
        
    }
    
    public function updateAllHotWheels(Request $request)
    {
        $filters=[];
        if($request->has('type'))
        {
            if($request->type!=-1)
            {
                $filters['vehicle_types']=$request->type;
            }
        }
         if($request->has('make'))
        {
            if($request->make!=-1)
            {
                $filters['brands']=$request->make;
            }
        }
         if($request->has('model'))
        {
            if($request->model!=-1)
            {
                $filters['models']=$request->model;
            }
        }
        
        $all_vehicles=$this->hotwheel->getFilterHotWheels($filters);
        $images_size=array();
        foreach($all_vehicles as $a_v)
        {
            $images_size[$a_v->id]=$this->hotwheel->getImagesSize($a_v->id);
            
        }
        return view('website/HotWheelpages.update-all-hotwheels',compact('all_vehicles','images_size'));
        
    }
    



    }

