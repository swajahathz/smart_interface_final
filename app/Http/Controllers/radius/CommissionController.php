<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CommissionController extends Controller
{
      public function commission_dashboard()
    {
        // Retrieve user_id from the session
        $user_id = Session::get('user_id');
        $token = Session::get('token');
        $user_name = ucfirst(Session::get('user_name'));
        $user_balance = number_format(Session::get('user_balance'));
        $roles_id = ucfirst(Session::get('roles_id'));
        $firstname = ucfirst(Session::get('firstname'));
        $lastname = ucfirst(Session::get('lastname'));
        $currentDateTime = Carbon::now();
        
         if($roles_id == 2){
            return view('radius.commission.admin', compact('currentDateTime','token','user_id','user_name','user_balance','firstname','lastname','roles_id'));
        }
        
         if($roles_id == 3){
            return view('radius.commission.franchise', compact('currentDateTime','token','user_id','user_name','user_balance','firstname','lastname','roles_id'));
        }
         if($roles_id == 4){
            return view('radius.commission.dealer', compact('currentDateTime','token','user_id','user_name','user_balance','firstname','lastname','roles_id'));
        }
         if($roles_id == 5){
            return view('radius.commission.subdealer', compact('currentDateTime','token','user_id','user_name','user_balance','firstname','lastname','roles_id'));
        }
    }
    
    
}
