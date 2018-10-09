<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    
    public function getAllCategoryFeaturedAccessories()
    {
        return $data=DB::table('accessories')
        ->where([['accessories.is_deleted','false'],['accessories.status','approved'],['accessories.featured',1]])
        ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')        
        ->join('categories','categories.id','=','sub_categories.category_id')
        ->select(DB::raw('COUNT(accessories.id) as size'),'categories.title','categories.id')
        ->groupby('categories.id')
        ->get();
    
    }
    
     public function getAllCategoryAccessories()
    {
        return $data=DB::table('accessories')
        ->where([['accessories.is_deleted','false'],['accessories.status','approved']])
        ->join('sub_categories','sub_categories.id','=','accessories.sub_category_id')        
        ->join('categories','categories.id','=','sub_categories.category_id')
        ->select(DB::raw('COUNT(accessories.id) as size'),'categories.title','categories.id')
        ->groupby('categories.id')
        ->get();
    
    }
}
