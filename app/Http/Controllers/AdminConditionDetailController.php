<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\ConditionDetail;

class AdminConditionDetailController extends Controller
{
    protected $condition_detail;


    public function __construct()
    {
    	$this->condition_detail=new ConditionDetail();
    }



    public function index()
    {
    	$data=$this->condition_detail->getAllConditionDetailPaginate();

    	return view('admin.condition_detail',['data'=>$data]);
    }

    public function addView()
    {
    	return view('admin.addConditionDetail');
    }

    public function addConditionDetail(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required|unique:condition_details',
            
            ]);
        $this->condition_detail->insertConditionDetail($request);
        $request->flash();

        return redirect('/Condition_Detail');
    }

    public function deleteConditionDetail(Request $request)
    {
        $ids=$request->get('id');
       return $data=$this->condition_detail->deleteConditionDetail($ids);

    }

    public function editConditionDetail($id)
    {
        $data=$this->condition_detail->getSpecificConditionDetail($id);
        return view('admin.editConditionDetail',['result'=>$data]);
        
    }

    public function updateConditionDetail(Request $request)
    {


        $this->condition_detail->updateConditionDetail($request);


       
        return redirect('/Condition_Detail');
    }


}
