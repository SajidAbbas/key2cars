<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

use App\ShopDiscount;

class ShopDiscountController extends Controller
{
    protected $discount;
    
    public function __construct()
    {
        $this->discount=new ShopDiscount();
     
        
    }
    
    public function index()
    {
        $all_discounts= \App\ShopDiscount::all();
        return view('admin/Shop/Discount.index',compact('all_discounts'));
    }
    
    public function addView()
    {
        return view('admin/Shop/Discount.add_discount');
    }
    
    public function addNewDiscount(Request $request)
    {
       //dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
          'start_date'=>'nullable|date|after_or_equal:'.date("Y-m-d"),
            'end_date'=>'nullable|date|after_or_equal:start_date',
            'discount_type'=>'required',
            'discount'=>'required'
          
          
        ]);
       
         if ($validator->fails()) {
            return redirect('/Shop/Discount/Add')
                        ->withErrors($validator)
                        ->withInput();
        }
        \App\ShopDiscount::create(Input::all());
        
       return Redirect('/Shop/Discount')->with('message', 'Discount Added Successfully');
    }
    
    public function deleteDiscounts(Request $request)
    {
         foreach($request->id as $id)
        {
            \App\ShopDiscount::where('id',$id)->delete();
        }
        
        return redirect()->back();
    }
    
     public function searchDiscounts(Request $request)
    {
       
        $filters = [];
    if ($request->name!=="") 
    {
      $filters['name'] = $request->name;
    }
     
    if ($request->discount!=="") 
    {
      $filters['discount_type'] = $request->discount;
    }
       
    $discounts=$this->discount->serachDiscounts($filters);
    
   //dd($images);
    return view('admin/Shop/Discount.update_table',compact('discounts'));
    
    }
    
    public function editView($id)
    {
        $discount=\App\ShopDiscount::where('id',$id)->first();
        
        return view('admin/Shop/Discount.edit_discount',compact('discount'));
    }
    
    public function updateDiscount(Request $request)
    {
        //  dd($request);
       $validator = Validator::make($request->all(), [
            'name' => 'required',
           'start_date'=>'nullable|date|after_or_equal:'.date("Y-m-d"),
            'end_date'=>'nullable|date|after_or_equal:start_date',
            'discount_type'=>'required',
            'discount'=>'required'
          
          
        ]);
       
         if ($validator->fails()) {
            return redirect('/Shop/Discount/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        \App\ShopDiscount::where('id',$request->id)->update(Input::except(['_token']));
     
       
        
       return Redirect('/Shop/Discount')->with('message', 'Discount updated Successfully');
    }
    
}
