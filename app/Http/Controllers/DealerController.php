<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;

class DealerController extends Controller
{
    protected $user;
    
    
    public function __construct() {
        $this->user= new User();
    }


    public function index()
    {
        if(Auth::check())
        {
           return view('admin.dashboard');
        }
        else
        {
            return redirect('/Dealer/Account');
        }
       
        
    }
           
    public function login()
    {
        return view('auth.dealer-register');
        
    }
    
    public function allDealers()
    {
        $data=User::where('role_id', \App\Role::Dealer)->paginate(10);
        $category=array();
        foreach($data as $d)
        {
            
            $category[$d->id]=$this->user->getAllDealerCategories($d->id);
        }
        
        
        
        return view('admin/dealer.index',compact('data','category'));
        
    }
    
    public function detailDealer($id)
    {
        $data= User::where('id',$id)->first();
        $city= \App\City::all();
       
        return view('admin/dealer.dealer_detail',compact('data','city'));
    }
    
    
    public function updateDealer(Request $request)
    {
        
         $this->validate($request, [
            'city' => 'required',
            'name'=>'required',
            'address'=>'required',
            'number'=>'required'
            
        ]);
         
        
        $this->user->updateDealer($request);
        
        
        return redirect('/Admin/ManageDealers');
    }
}
