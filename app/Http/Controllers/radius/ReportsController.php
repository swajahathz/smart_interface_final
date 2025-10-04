<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function topupinvoice(){
        
        
        
         $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        if($roles_id == 2){
            $list = 3;
        }elseif($roles_id == 3){
            $list = 4;
        }elseif($roles_id == 4){
            $list = 5;
        }elseif($roles_id == 5){
            $list = 6;
        }
        
        
        $apiUrl = config('app.api_base_url') . '/users/'.$list.'/'.$user_id.'/'.$roles_id;

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        $manager = $response->json();
        
        
        
        return view('radius/topupInvoice', compact('manager','user_id','roles_id','user_name','token'));
        
    }
    
    
    public function commissioninvoice(){
        
        
        
         $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        return view('radius/commissionInvoice', compact('user_id','roles_id','user_name','token'));
        
    }
    
    
     public function rechargeinvoice(){
        
        
        
         $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
       
        
        return view('radius/rechargeInvoice', compact('user_id','roles_id','user_name','token'));
        
    }
    
    public function rechargeinvoiceadmin(){
        
        
        
         $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        
         if($roles_id == 2){
            $list = 3;
        }elseif($roles_id == 3){
            $list = 4;
        }elseif($roles_id == 4){
            $list = 5;
        }elseif($roles_id == 5){
            $list = 6;
        }
        
        
        $apiUrl = config('app.api_base_url') . '/users';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        $manager = $response->json();
        
        
        return view('radius/manager/admin/rechargeInvoice', compact('manager','user_id','roles_id','user_name','token'));
        
    }
    
    
    public function walletledger(){
        
        
        
         $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        return view('radius/walletledger', compact('user_id','roles_id','user_name','token'));
        
    }
}
