<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\HotWheels;
use App\City;
use App\Manufacture;
use App\Models;
use App\VehicleType;



class AdminHotWheelController extends Controller
{
    protected $hotwheel;
    protected $ciry;


    public function __construct() {
        $this->hotwheel=new HotWheels();
        $this->city=new City();
    }
    
    public function index()
    {
        $user=Auth::user();
        if($user->role_id==2)
        {
         $data=$this->hotwheel->getAllHotWheelsByUserId($user->id);
       

    return view('admin/hotWheel.hotwheels',['data'=>$data]);
        }
    	$data=$this->hotwheel->getAllHotWheels();
      

    	return view('admin/hotWheel.hotwheels',['data'=>$data]);
       
    }
    
    public function detailHotWheel($id)
    {
    	$result=$this->hotwheel->getHotWheelDetail($id);
    	$images=$this->hotwheel->getAllImagesByPostId($id);
        

    	return view('admin/hotWheel.detailHotWheel',['result'=>$result,'image'=>$images]);
    }
    
    public function addView()
    {
        $city=City::all();
        $category=Category::all();
        
        
        return view('admin.addAccessory',compact('city','category'));
        
    }
   
}
