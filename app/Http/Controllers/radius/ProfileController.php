<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
   public function profile(Request $request){
       
         $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        $apiUrl = config('app.api_base_url') . '/managersingle/'.$user_name;
        
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        if ($response->successful()) {
             $dataa = $response->json();
             $manager = $dataa['manager'];
             $total_users = $dataa['total_users'];
             $total_service = $dataa['total_service'];
             $total_f = $dataa['total_f'];
             $total_d = $dataa['total_d'];
             $total_sd = $dataa['total_sd'];
        
        if($roles_id == 2){
            return view('radius/manager/admin/profile', compact('roles_id','user_name','token','manager','total_users','total_service','total_f','total_d','total_sd'));
        }elseif($roles_id == 3){
            return view('radius/manager/franchise/profile', compact('roles_id','user_name','token','manager','total_users','total_service','total_f','total_d','total_sd'));
        }elseif($roles_id == 4){
            return view('radius/manager/dealer/profile', compact('roles_id','user_name','token','manager','total_users','total_service','total_f','total_d','total_sd'));
        }elseif($roles_id == 5){
            return view('radius/manager/subdealer/profile', compact('roles_id','user_name','token','manager','total_users','total_service','total_f','total_d','total_sd'));
        }
       
       
        }
   }
}
