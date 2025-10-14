<?php

namespace App\Http\Controllers\auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AccountController extends Controller
{
    
    public function manager_add()
    {

        $token = Session::get('token');
        $currentDateTime = Carbon::now();
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_id = Session::get('user_id');
        $user_name = Session::get('user_name');
        
        
        return view('radius/manager_add', compact('currentDateTime','token','user_id','roles_id','user_name'));
    }
    
    public function manager($managername)
    {

        $token = Session::get('token');
        $currentDateTime = Carbon::now();
        
        $apiUrl = config('app.api_base_url') . '/managersingle/'.$managername;
        $apiUrl2 = config('app.api_base_url') . '/manager/permission/'.$managername;
        $apiUrl3 = config('app.api_base_url') . '/dplc';
        $apiUrl4 = config('app.api_base_url') . '/city';
        $user_id = Session::get('user_id');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        
        
        
        // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
         $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);
        
        $response3 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl3);
        
        $response4 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl4);
        
        
        // Check if the response is successful
         if ($response->successful()) {
             $dataa = $response->json();
             $permission = $response2->json();
             $jsonData3 = $response3->json();
             $jsonData4 = $response4->json();
             $manager = $dataa['manager'];
             $roles_id = Session::get('roles_id');
             
            if ($managername == $user_name) {
                        return view('radius/notfound');
                    }
        
             
             if (is_array($jsonData3) && isset($jsonData3['message']) && $jsonData3['message'] === 'Dplc not found!') {
                $dplc = null; // explicitly set null
            } elseif (is_array($jsonData3)) {
                $dplc = $jsonData3;
            }
             
             if (is_array($jsonData4) && isset($jsonData4['message']) && $jsonData4['message'] === 'City not found!') {
                $city = null; // explicitly set null
            } elseif (is_array($jsonData4)) {
                $city = $jsonData4;
            }
    //   dd($dataa);
             
             if($roles_id == 2){
                 
                return view('radius/manager/admin/manager_info', compact('city','dplc','permission','currentDateTime','user_name','user_id','roles_id','manager','token'));
            }
            if($roles_id == 3){
                if($manager['roles_id'] == 2){
                     return view('radius/notfound');
                }
                return view('radius/manager/franchise/manager_info', compact('currentDateTime','user_name','user_id','roles_id','manager','token'));
            }
            if($roles_id == 4){
              if ($manager['roles_id'] == 3 || $manager['roles_id'] == 2) {
                        return view('radius/notfound');
                    }
                return view('radius/manager/dealer/manager_info', compact('currentDateTime','user_name','user_id','roles_id','manager','token'));
            }
            if($roles_id == 5){
                    if ($manager['roles_id'] == 2 || $manager['roles_id'] == 3 || $manager['roles_id'] == 4) {
                        return view('radius/notfound');
                    }
                return view('radius/notfound');
            }
             
         } else {
             return redirect()->back()->withErrors('Failed to fetch.');
         }
        
        
        
    }
    
    
    public function account_list()
    {

        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/users';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $users = $response->json();
             // Pass the data to the view
             return view('software/auth/account', compact('users'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch users.');
         }
    }
    
    public function manager_list()
    {

        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        return view('software/auth/admin', compact('user_id','roles_id','user_name','token'));
    }
    
    public function admin_list()
    {

        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/users/2';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $users = $response->json();
             // Pass the data to the view
             return view('software/auth/admin', compact('users','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch users.');
         }
    }
    
    public function franchise_list()
    {

        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/users/3';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $users = $response->json();
             // Pass the data to the view
             return view('software/auth/franchise', compact('users'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch users.');
         }
    }
    
    public function dealer_list()
    {

        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/users/4';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $users = $response->json();
             // Pass the data to the view
             return view('software/auth/dealer', compact('users'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch users.');
         }
    }
    
    public function subdealer_list()
    {

        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/users/5';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $users = $response->json();
             // Pass the data to the view
             return view('software/auth/subdealer', compact('users'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch users.');
         }
    }
    
    public function juniordealer_list()
    {

        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/users/6';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $users = $response->json();
             // Pass the data to the view
             return view('software/auth/juniordealer', compact('users'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch users.');
         }
    }
}
