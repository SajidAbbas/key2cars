<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopDiscount extends Model
{
   
    const category_discount=1;
    
    const product_discount=3;
    const order_discount=4;
     
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'discount','is_percentage' ,'discount_type','start_date','end_date','times_used',
        'max_discount_amount','min_amount','status'
    ];
    
    public function serachDiscounts(array $filters =[])
   {
       $query = ShopDiscount::query();
       
       foreach ($filters as $col => $id) {
           $query = $query->where($col, $id);
       }
       return $query->get();
       
       
      
   }
}
