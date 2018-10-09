<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ModelVersion;
use App\Models;
use App\ModelYear;


class AdminModelVersionController extends Controller
{
	protected $model_version;
	protected $model;
	protected $model_year;
   
   

	public function __construct()
	{
			$this->model_version=new ModelVersion();
			$this->model=new Models();
			$this->model_year=new ModelYear();

          
	}




	public function index()
	{

		$data =$this->model_version->getAllModelVersion();
		$make=$this->model->getModels();


		return view('admin.modelVersion',['data'=>$data,'make'=>$make]);
	}

	public function addView()
   {
    
    $model=$this->model->getModels();
    $year=$this->model_year->getAllYears();
   
    
   	
   	return view('admin.addModelVersion',['model'=>$model,'year'=>$year]);
   }

   public function addModelVersion(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'title' => 'required',
            'model'=>'required',
            'year'=>'required',
            ]);

        $this->model_version->insertModelVersion($request);
        $request->flash();

        return redirect('/ModelVersion');
    }

     public function deleteModelVersion(Request $request)
    {
        $ids=$request->get('id');

       return $data=$this->model_version->deleteModelVersions($ids);

    }

    public function editModelVersion($id)
    {
        $result=$this->model_version->getSpecificModelVersion($id);

        $model=$this->model->getModels();
        $year=$this->model_year->getAllYears();

        return view('admin.editModelVersion',['model'=>$model,'year'=>$year,'result'=>$result]);
    }

    public function updateModelVersion(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'model'=>'required',
            'year'=>'required',
            ]);

        $this->model_version->updateModelVersion($request);

        return redirect('/ModelVersion');
    }
    

    public function searchByModel(Request $request)
    {
        if($request->model==0)
        {
            return redirect('/ModelVersion');
        }
        else

        {
            $data =$this->model_version->searchAllModelVersionByModel($request->model);
        $make=$this->model->getModels();


        return view('admin.modelVersion',['data'=>$data,'make'=>$make]);

        }



    }


}
