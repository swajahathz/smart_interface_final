<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class NasController extends Controller
{
    public function nas_list(){

        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
       return view('radius/nas', compact('roles_id','user_name','token'));
    }

    public function update_nas_modal($id){


        // return view('ajax.modals.update_nas');
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/nassingle/' . $id;

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $nas = $response->json();

             $nasid =  $nas[0]['id'];
             $nasname =  $nas[0]['name'];
             $nasip =  $nas[0]['server_ip'];
             $secret =  $nas[0]['secret'];
             $desc =  $nas[0]['description'];
             $apiusername =  $nas[0]['api_username'];
             $apipassword =  $nas[0]['api_password'];
             $apiport =  $nas[0]['api_port'];
             // Pass the data to the view
             return view('ajax.modals.update_nas', compact('apiusername','apipassword','apiport','nasid','nasname','nasip','secret','desc','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }
    
    
    public function graph(Request $requset, $nas, $username){
        
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/apidetails/' . $nas;

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        $apidetails = $response->json();
        
        
        // dd($apidetails['nas'][0]);
       
        
        // API CALL
         // Variables jo tum pass karna chahte ho
        $nas = $apidetails['nas'][0]['server_ip'];
        $port = $apidetails['nas'][0]['api_port'];
        $id = $username;
        $apiUsername = $apidetails['nas'][0]['api_username'];
        $apiPass = $apidetails['nas'][0]['api_password'];

        // URL build karo
        $url = $apidetails['server']['api_url']."/mikro_api/test/graph.php";

        // Request bhejo
        $response = Http::get($url, [
            'nas' => $nas,
            'port' => $port,
            'id' => $id,
            'apiusername' => $apiUsername,
            'apipass' => $apiPass,
        ]);

        // Response return karo
        if ($response->successful()) {
            return response()->json($response->json()); // agar JSON hai
        } else {
            return response()->json([
                'error' => 'API request failed',
                'status' => $response->status(),
                'body' => $response->body()
            ], $response->status());
        }
    }
}
