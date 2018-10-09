<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;

class AdminCityController extends Controller
{
    protected $city;


    public function __construct()
    {
   
    	$this->city=new City();
    }






    public function index()
    {
    	
    	$data=$this->city->getAllCities();
    	$cities=$this->city->getAllCitiesPaginate();

    	return view('admin.city',['data'=>$data,'city'=>$cities]);
    }

    public function deleteCity(Request $request)
    {
        $ids=$request->get('id');

       return $data=$this->city->deleteCities($ids);

    }

    public function addView()
   {
   	
   	return view('admin.addCity');
   }


   public function addCity(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            ]);

        $this->city->insertCity($request);
        $request->flash();

        

    	return redirect('/City');
    }



    public function editCity($id)
    {

        $result=$this->city->getSpecificCity($id);

        return view('admin.editCity',['result'=>$result]);
    }

    public function updateCity(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            ]);

        $this->city->updateCity($request);

        return redirect('/City');

    }
}
