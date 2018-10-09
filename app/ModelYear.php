<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class ModelYear extends Model
{
  


    public function getAllYears()
    {
    	return $data=DB::table('model_years')
    	->orderby('year','asc')
    	->get();
    }

}
