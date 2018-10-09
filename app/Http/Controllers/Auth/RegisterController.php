<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'number'=>'required|min:11|max:11'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        if($data['role_id']== \App\Role::Dealer)
        {
            if($data['img_url']){
                $path=$this->imageCompression();	
		}
                else {
                    $path="/dealer/default.png";
                }
            return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'number'=>$data['number'],
            'role_id'=>$data['role_id'],
            'address'=>$data['address'],
            'img_url'=>$path,
        ]);
            
            
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'number'=>$data['number'],
            'role_id'=>$data['role_id'],
        ]);
    }
    
     public function imageCompression()
    {
     
         $user_id = DB::table('users')->max('id') + 1;
     
      $post_photo=$_FILES['img_url']['name'];
      $post_photo_tmp=$_FILES['img_url']['tmp_name'];   
      $ext=pathinfo($post_photo, PATHINFO_EXTENSION);///getting extention
      if($ext=='png'||$ext=='PNG'||$ext=='jpg'||$ext=='JPG'||$ext=='jpeg'||$ext=='JPEG'||$ext=='gif'||$ext=='GIF')
      {
        if($ext=='jpg' || $ext=='jpeg'||$ext=='JPG'||$ext=='JPEG')
        {
          $src=imagecreatefromjpeg($post_photo_tmp);
        }
        if($ext=='png' || $ext=='PNG')
        {
          $src=imagecreatefrompng($post_photo_tmp);
        }
        if($ext=='gif' || $ext=='GIF')
        {
          $src=imagecreatefromgif($post_photo_tmp);
        }

        list($width_min,$height_min)=getimagesize($post_photo_tmp);
        $newwidth_min=290;///set compressing image width
        $newheight_min=250;//($height_min/$width_min)*$newwidth_min;///equation for set image height
        $tmp_min=imagecreatetruecolor($newwidth_min, $newheight_min);///create fraame for compress image
        imagecopyresampled($tmp_min,$src, 0, 0, 0, 0, $newwidth_min, $newheight_min, $width_min, $height_min);/////compress

            

        imagejpeg($tmp_min,public_path('images/dealer/').($user_id).".".$ext,100);////copy image
            $path="/dealer/".($user_id).".".$ext;

            return $path;

            
      }


 
      
    }
}
