<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use App\Manufacture;
use App\NewsImages;
use App\Vehicle;

class NewsController extends Controller
{
    protected $news;
    protected $make;
    protected $vehicle;


    public function __construct()
    {
        $this->news=new News();
        $this->make=new Manufacture();
        $this->vehicle=new Vehicle();
    }


    public function index()
    { 
        
        
        $featured_news=News::where('isFeatured',1)->first();
        $featured_news_images=array();
        if($featured_news){
        $featured_news_images= \App\NewsImages::where([['news_id',$featured_news->id],['size','l']])->limit(1)->get();
        }$all_news=$this->news->getAllActiveNews();
        
        //////////////////search///////
        
        $make=$this->make->getAllManufacturerByType(\App\VehicleType::Car);
        
        return view('website/Newspages.index',compact('all_news','featured_news','featured_news_images','make'));
    }
    
    public function detailnews($id)
    {
        $result=$this->news->getNewsByID($id);
       
       // $section=$this->news->getAllSectionByNewsId($id);
       
       
        $image= NewsImages::where([['news_id',$id],['size','l']])->get();
        
        foreach($result as $r){
        $important_links=$this->vehicle->getRelatedLinks($r->make_id,$r->model_id);
        $owner_reviews=$this->vehicle->getOwnerReviews($r->make_id,$r->model_id,$r->model_version_id);
        
        }
        
        
        
        
        return view('website/Newspages.detail-news',compact('result','image','important_links','owner_reviews'));
        
    }
    
    public function updateAllNews(Request $request)
    {
        $filters=[];
        if($request->has('make'))
        {
            if($request->make!=-1)
            {
                $filters['brands']=$request->make;
            }
        }
         if($request->has('model'))
        {
            if($request->model!=-1)
            {
                $filters['models']=$request->model;
            }
        }
         if($request->has('model_version'))
        {
            if($request->model_version!=-1)
            {
                $filters['model_versions']=$request->model_version;
            }
        }
        
        
        
        $all_news=$this->news->updateAllNews($filters);
        
        return view('website/Newspages.updateAllNews',compact('all_news'));
    }
            
}
