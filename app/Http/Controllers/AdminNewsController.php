<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\VehicleType;
use App\Models;
use App\NewsImages;


class AdminNewsController extends Controller
{
    protected $news;
    protected $vehicle_type;
    
    
    public function __construct() {
        $this->news=new News();
        $this->vehicle_type=new VehicleType();
    }
    
    public function index()
    {
        $data=$this->news->getAllNews();
        return view('admin/news.index',compact('data'));
                
    }
    
    public function addView()
    {
        $type= VehicleType::all();
        return view('admin/news.add-new-news',compact('type'));
    }
    
    public function getModelByManufacture(Request $request)
    {
        return Models::where('manufacture_id',$request->make)->get();
            
    }
    
    public function insertNews(Request $request)
    {
         $this->validate($request, [ 
            'type'=>'required',
            'make'=>'required',
            'model'=>'required',
            'model_version'=>'required',
            'title'=>'required',
            'news_description'=>'required',
            'images'=>'required'
            
            ]);
         
         $this->news->addNews($request);
         
         return redirect('/Admin/News');
       
    }
    
    public function detailNews($id)
    {
        $result=$this->news->getNewsByID($id);
        $section=$this->news->getAllSectionByNewsId($id);
        $image= NewsImages::where('news_id',$id)->get();
        
        return view('admin/news.detail-news',compact('result','section','image'));
        
    }
    public function removeFeaturedNews(Request $request)
    {
        return News::where('id',$request->id)->update(['isFeatured'=>0]);
    }
    
    public function featuredNews(Request $request)
    {
        $data =News::where('isFeatured',1)->get();
        foreach($data as $d)
        {
            return "One News Is already Featurd";
        }

        
            return News::where('id',$request->id)->update(['isFeatured'=>1]);
        
        
    }
    public function inActiveNews(Request $request)
    {
        return News::where('id',$request->id)->update(['isActive'=>0]);
    }
    
    public function activeNews(Request $request)
    {
        return News::where('id',$request->id)->update(['isActive'=>1]);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
            
            
    
    
}
