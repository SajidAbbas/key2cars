<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class ConditionDetailValues extends Model
{
   
    public function getAllConditionDetailValues()
    {
    	return DB::table('condition_detail_values')->orderby('title','asc')->get();
    }
}
