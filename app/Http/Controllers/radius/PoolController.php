<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PoolController extends Controller
{
    public function pool_list(){

        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        $apiUrl = config('app.api_base_url') . '/pool';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $pool = $response->json();
             // Pass the data to the view
             return view('radius/pool', compact('roles_id','user_name','pool','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }

    public function update_pool_modal($id){


        // return view('ajax.modals.update_nas');
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/poolsingle/' . $id;

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $pool = $response->json();

             $poolid =  $pool[0]['pool_id'];
             $poolname =  $pool[0]['name'];
             // Pass the data to the view
             return view('ajax.modals.update_pool', compact('poolid','poolname','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }
}
