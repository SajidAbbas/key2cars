<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\User;
use DB;


class AccountController extends Controller
{
    protected $user;
   
    
    public function __construct()
    {
        $this->user=new User();
        //$this->req=new Request();
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    
    
}
