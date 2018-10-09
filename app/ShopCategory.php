<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
   
     protected $fillable = [
        'name', 'description','img_url' ,'parent_id','shown_homepage','shown_nav','featured','published',
        'display_order','discount_id','banner_img','ribbon_id'
    ];
    
     public function parent_category()
    {
        return $this->belongsTo(self::class,'parent_id');
    }
    
    public function sub_category()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    
    
    public function discount()
    {
        return $this->belongsTo('App\Discount');
    }
    

   
}
