<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
   public function index()
    {
        // Retrieve user_id from the session
        $user_id = Session::get('user_id');
        $token = Session::get('token');
        $user_name = ucfirst(Session::get('user_name'));
        $user_balance = number_format(Session::get('user_balance'));
        $roles_id = ucfirst(Session::get('roles_id'));
        $firstname = ucfirst(Session::get('firstname'));
        $lastname = ucfirst(Session::get('lastname'));
        
        $apiUrl = config('app.api_base_url') . '/managertotalcardrecharge';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post($apiUrl);

        $total_recharge = 0;
         // Check if the response is successful
         if ($response->successful()) {
             
             $total_recharge = $response->json() ?? 0;
             
             
         }
        
        
    
        
        
        if($roles_id == 2){
            return view('radius.dashboards.admin.main', compact('total_recharge','token','user_id','user_name','user_balance','firstname','lastname','roles_id'));
        }
        
        if($roles_id == 3){
            return view('radius.dashboards.franchise.main', compact('total_recharge','token','user_id','user_name','user_balance','firstname','lastname','roles_id'));
        }
        
        if($roles_id == 4){
            return view('radius.dashboards.dealer.main', compact('total_recharge','token','user_id','user_name','user_balance','firstname','lastname','roles_id'));
        }

        if($roles_id == 5){
            return view('radius.dashboards.subdealer.main', compact('total_recharge','token','user_id','user_name','user_balance','firstname','lastname','roles_id'));
        }
        
    }
}
