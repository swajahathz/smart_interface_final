<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class ImportController extends Controller
{
   public function importchecker(){
       
         $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
       
        $apiUrl2 = config('app.api_base_url') . '/manager/hierarchy';

         // Make a request to the API with headers
         $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);
       
      
        
         if ($response2->successful()) {
             $jsonData2 = $response2->json();
             
             // Check if it's not just an error message
            if (is_array($jsonData2) && isset($jsonData2['message']) && $jsonData2['message'] === 'Manager not found!') {
                $manager = null; // explicitly set null
            } elseif (is_array($jsonData2)) {
                $manager = $jsonData2;
            }
               
           }
        
        return view('radius/importchecker', compact('manager','user_id','roles_id','user_name','token'));
       
   }
}
