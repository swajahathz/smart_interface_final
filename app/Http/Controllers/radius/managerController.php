<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class managerController extends Controller
{
       public function manager_list()
    {

        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        if($roles_id == 2){
            return view('radius/manager/admin/managerlist', compact('user_id','roles_id','user_name','token'));
        }
        if($roles_id == 3){
            return view('radius/manager/franchise/managerlist', compact('user_id','roles_id','user_name','token'));
        }
        if($roles_id == 4){
            return view('radius/manager/dealer/managerlist', compact('user_id','roles_id','user_name','token'));
        }
        if($roles_id == 5){
            return view('radius/manager/subdealer/managerlist', compact('user_id','roles_id','user_name','token'));
        }
        
    }
}
