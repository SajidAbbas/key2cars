<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    protected $category;
    
    
    
    public function __construct() {
        $this->category=new Category();
        
        
    }
    
    
    public function index()
    {
        //////////Get all categories/////////////////////
       $all_categories= Category::with('parent_category','discount')->orderby('display_order','asc')->get();
       
	   
        
     
        return view('admin/Shop/Category.index',compact('all_categories'));
    }
    
    public function addView()
    {
        $all_categories=  \App\Category::nested()->get();
        $discounts=\App\Discount::where('discount_type', \App\Discount::category_discount)->get();
        
        return view('admin/Shop/Category.add_category',compact('all_categories','discounts'));
        
    }
    
    public function insertNewCategory(Request $request)
    {
      //  dd($request);
       $validator = Validator::make($request->all(), [
            'name' => 'required|max:25|unique:shop_categories',
           'description'=>'required',
            'img_url'=>'required|image',
           'category'=>'required',
           
            'display_order'=>'numeric|min:1'
          
        ]);
       
         if ($validator->fails()) {
            return redirect('/Shop/Category/Add')
                        ->withErrors($validator)
                        ->withInput();
        }
         Category::create(Input::all());
        
       return Redirect('/Shop/Categories')->with('message', 'Category Added Successfully');
    }
    
     public function deleteCategories(Request $request){
        
        foreach($request->id as $id)
        {
            Category::where('id',$id)->delete();
        }
        
        return redirect()->back();
    }
    
    public function editView($id)
    {
        $category=Category::with('parent_category')->where('id',$id)->first();
         $all_categories=\App\Category::nested()->get();
          $discounts=\App\Discount::where('discount_type', \App\Discount::category_discount)->get();
          
        
        return view('admin/Shop/Category.edit_category',compact('category','all_categories','discounts'));
    }
    
    public function updateCategory(Request $request)
    {
        //  dd($request);
       $validator = Validator::make($request->all(), [
            'name' => 'required',
           'description'=>'required',
            'img_url'=>'image',
            'display_order'=>'numeric|min:1',
           'category'=>'required'
          
        ]);
       
         if ($validator->fails()) {
            return redirect('/Shop/Category/Edit/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        Category::where('id',$request->id)->update(Input::except(['_token','img_url']));
     
       if($request->img_url)
       {
           $category=Category::where('id',$request->id)->first();
           
           $category->img_url = Input::file('img_url');
           $category->save();
       }
       
      
        
       return Redirect('/Shop/Categories')->with('message', 'Category updated Successfully');
    }
    
    
}
