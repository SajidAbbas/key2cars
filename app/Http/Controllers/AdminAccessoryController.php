<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Accessories;
use App\City;
use App\Category;

class AdminAccessoryController extends Controller
{
    protected $accessory;
    protected $ciry;


    public function __construct() {
        $this->accessory=new Accessories();
        $this->city=new City();
    }
    
    public function index()
    {
        $user=Auth::user();
        if($user->role_id==2)
        {
         $data=$this->accessory->getAllAccessoryByUser($user->id);
        $city=$this->city->getAllCities();

    return view('admin.accessories',['data'=>$data,'city'=>$city]);
        }
    	$data=$this->accessory->getAllAccessory();
        $city=$this->city->getAllCities();
       // dd($data);

    	return view('admin.accessories',['data'=>$data,'city'=>$city]);
       
    }
    
    public function addView()
    {
        $city=City::all();
        $category=Category::all();
        
        
        return view('admin.addAccessory',compact('city','category'));
        
    }
    public function detailAccessory($id)
    {
    	$result=$this->accessory->getAccesssoryDetail($id);
    	$images=$this->accessory->getAllImagesByPostId($id);
        

    	return view('admin.detailAccessory',['result'=>$result,'image'=>$images]);
    }
    
     public function featureAccessory(Request $request)
    {
        

        return $data= Accessories::where('id',$request->id)->update(['featured'=>1]);

    }
    
    public function editAccessory($id)
    {
        $result=$this->accessory->getAccesssoryDetail($id);
    	$image=$this->accessory->getAllImagesByPostId($id);
        $city=City::all();
        $category=Category::all();
       // dd($result);
        

    	return view('admin.editAccessory',compact('result','image','city','category'));
        
    }
    
    public function updateAccessory(Request $request)
    {
        $this->accessory->updateAccessory($request);
        
        return redirect('/Ads/Accessory');
        
    }
}
