<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function setting(){
        
        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        
        if($roles_id == 2){
            
            $apiUrl = config('app.api_base_url') . '/settingconfig';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             
             $setting = $response->json();
             
             return view('/radius/manager/admin/setting', compact('setting','token','roles_id','user_name','user_id'));
         }
         
            return view('/radius/servernotresponding');
            
        }else{
            return view('/radius/notfound');
        }
        
        
        
        
        
        
        
    }
}
