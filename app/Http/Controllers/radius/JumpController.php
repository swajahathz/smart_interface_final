<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class JumpController extends Controller
{
    public function jump(Request $request){
        
        $username = $request->input('username');
        $token = Session::get('token');
        $loginby = $request->input('loginby');
        
        
     $apiUrl = config('app.api_base_url') . '/managersingle/'.$username;

        // Make a request to the API with headers
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        if ($response->successful()) {
            $data1 = $response->json(); // Decode the JSON response into an array
            $data = $data1['manager'];
            $pass = $data['token'] ?? null; // Use null coalescing in case it's not set
        }
        
      
        
        //   // Example: if you posted 'name' and 'id'
        
        if (!empty($pass)) {
           
    
        // // Clear all session data
        Session::flush();
        
        $url = config('app.api_base_url');
        $response = Http::post($url.'/login', [
            'name' => $username,
            'password' => $pass,
        ]);

        if ($response->status() === 200) {
            $data = $response->json();

            if ($data['status'] == 1) { // Check if login was successful
                // Store the token and user ID in session
                Session::put('token', $data['token']);
                Session::put('user_id', $data['user']['id']);
                Session::put('roles_id', $data['user']['roles_id']);
                Session::put('firstname', $data['details'][0]['firstname']);
                Session::put('lastname', $data['details'][0]['lastname']);
                Session::put('user_name', $data['user']['name']);
                Session::put('user_balance', $data['details'][0]['balance']);
                
                if(!empty($loginby)){
                    
                    Session::put('jump_username', $loginby);
                }


            
                return response(1);
            } elseif ($data['status'] == 0) { // Check if login failed due to invalid credentials
                return response(2);
            } else {
                return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
            }
        }

        if ($response->status() === 401) {
            $data = $response->json();

            if ($data['status'] == 0) { // Check if login was successful
                return redirect()->back()->with('error', 'Invalid username or password.');
            } 
        }
        
         
        }else{
             return response(2);
        }

        
    }
}
