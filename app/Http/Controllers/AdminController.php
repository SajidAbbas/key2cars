<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\users;
use Illuminate\Support\Facades\Auth;
use App\User;

class AdminController extends Controller
{
    
    public function index()
    {
       
        if(Auth::check()){
        
       
        return view('admin.dashboard');
        
        }
    	return redirect('/login');
    }
    
    
}
