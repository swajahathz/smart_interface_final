<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class PolicyController extends Controller
{
    public function policy_list(){

        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        $apiUrl = config('app.api_base_url') . '/policy';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $policy = $response->json();
             // Pass the data to the view
             return view('radius/policy', compact('user_name','roles_id','policy','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }
    
    
     public function group_list($id){

        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        $apiUrl = config('app.api_base_url') . '/policysingle/'.$id;

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $policy = $response->json();
             // Pass the data to the view
             $groupname = $policy[0]['name'];
             $groupid = $policy[0]['id'];
             return view('radius/grouplist', compact('id','user_name','roles_id','groupname','groupid','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }

    public function update_policy_modal($id){


        // return view('ajax.modals.update_nas');
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/policysingle/' . $id;

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $policy = $response->json();

             $policyid =  $policy[0]['id'];
             $policyname =  $policy[0]['name'];
             $policydesc =  $policy[0]['desc'];
             // Pass the data to the view
             return view('ajax.modals.update_policy', compact('policyid','policyname','policydesc','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }
    
    public function update_policy_group_modal($id){


        // return view('ajax.modals.update_nas');
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/policygroupsingle/' . $id;

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $policy = $response->json();

             $id =  $policy[0]['id'];
             $groupname =  $policy[0]['groupname'];
             $attribute =  $policy[0]['attribute'];
             $group_id =  $policy[0]['group_id'];
             $op =  $policy[0]['op'];
             $value =  $policy[0]['value'];
             // Pass the data to the view
             return view('ajax.modals.update_policy_group', compact('id','op','value','group_id','groupname','attribute','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }
}
