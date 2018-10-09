<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{



    public function getAllBrands()
    {

    	return $data=DB::table('brands')->orderby('title','asc')->get();

    }

}