<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LocationInfoController extends Controller
{
    public function city(){
        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        return view('radius/city', compact('roles_id','user_name','token'));
        
        
    }
    
    public function update_city_modal($id){


        // return view('ajax.modals.update_nas');
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/citysingle/' . $id;

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $city = $response->json();

             $cty_id =  $city['cty_id'];
             $name =  $city['name'];
             // Pass the data to the view
             return view('ajax.modals.update_city', compact('name','cty_id','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }
    
    public function dplc(){
        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        $apiUrl = config('app.api_base_url') . '/city';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        if ($response->successful()) {
             $jsonData = $response->json();
             
             if (is_array($jsonData) && isset($jsonData['message']) && $jsonData['message'] === 'City not found!') {
                $city = null; // explicitly set null
            } elseif (is_array($jsonData)) {
                $city = $jsonData;
            }
      
        }
        
        
        
        return view('radius/dplc', compact('roles_id','user_name','token','city'));
        
        
    }
    
    public function update_dplc_modal($id){


        // return view('ajax.modals.update_nas');
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/dplcsingle/' . $id;
           $apiUrl2 = config('app.api_base_url') . '/city';
           

         // Make a request to the API with headers
         $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $dplc = $response->json();

             $id =  $dplc['id'];
             $dplc_name =  $dplc['dplc_name'];
             $cty_id =  $dplc['cty_id'];
             $apiUrl3 = config('app.api_base_url') . '/citysingle/' . $cty_id;
             
             $response3 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl3);
        
        
             // Pass the data to the view
             if ($response2->successful()) {
             $city = $response2->json();
             $city_name = $response3->json();
            }
        
             return view('ajax.modals.update_dplc', compact('dplc_name','id','token','city','cty_id','city_name'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch dplc.');
         }
    }
}
