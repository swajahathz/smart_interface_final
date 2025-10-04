<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class OnlinePaymentController extends Controller
{
    public function onelinklist(){
        
        
        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        return view('radius/1linklist', compact('user_id','token','roles_id','user_name'));
        
    }
    
    
    public function jazzlist(){
        
        
        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        return view('radius/jazzcash', compact('user_id','token','roles_id','user_name'));
        
    }
}
