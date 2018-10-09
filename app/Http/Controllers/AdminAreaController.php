<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CityAreas;
use App\City;

class AdminAreaController extends Controller
{
    //
    protected $area;
    protected $city;


    public function __construct()
    {
    	$this->area=new CityAreas();
    	$this->city=new City();
    }






    public function index()
    {
    	$data=$this->area->getAllAreas();
    	$cities=$this->city->getAllCities();
    	
    	return view('admin.cityArea',['data'=>$data,'city'=>$cities]);
    }

    public function deleteArea(Request $request)
    {
        $ids=$request->get('id');

       return $data=$this->area->deleteAreas($ids);

    }

    public function addView()
   {
   	$data=$this->city->getAllCities();
   	return view('admin.addCityArea',['data'=>$data]);
   }


   public function addarea(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'type'=>'required',
            ]);

        $this->area->insertArea($request);
        $request->flash();

    	return redirect('/CityArea');
    }



    public function editArea($id)
    {

        $result=$this->area->getSpecificArea($id);
        $city=$this->city->getAllCities();
        
        return view('admin.editCityArea',['city'=>$city,'result'=>$result]);
    }


    public function updateArea(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'city'=>'required'
            ]);

        $this->area->updateArea($request);

        return redirect('/CityArea');

    }


    public function searchByCity(Request $request)
    {
        if($request->city==0)
        {
            return redirect('/CityArea');
        }
        else
            $data=$this->area->searchAreaByCity($request->city);
        $cities=$this->city->getAllCities();
        
        return view('admin.cityArea',['data'=>$data,'city'=>$cities]);

    } 
}
