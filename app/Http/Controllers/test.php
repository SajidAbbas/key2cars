<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class test extends Controller
{
    

   public  function watermark()
   { 
       $image= imagecreatefromjpeg(public_path('images/accessory/10-s.png'));
       $color= imagecolorallocate($image, 255, 255, 255);
       imagettftext($image, 35, 35, imagesx($image)-220, imagesy($image)-10, $color, public_path('fonts/arial.ttf'), "KEY2CARS");
       
       imagejpeg($image,public_path('images/Accessory/').("000")."."."jpg",100);////copy image

   
   } 
}
