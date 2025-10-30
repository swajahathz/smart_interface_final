<?php

namespace App\Http\Controllers\radius;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;


class ServiceController extends Controller
{
    public function service_list(){

        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        $apiUrl = config('app.api_base_url') . '/pool';
        $apiUrl2 = config('app.api_base_url') . '/policy';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);

         // Check if the response is successful
         if ($response->successful()) {
             $jsonData = $response->json();
             $jsonData2 = $response2->json();
             
            
             
                // Check if it's not just an error message
            if (is_array($jsonData) && isset($jsonData['message']) && $jsonData['message'] === 'Pool not found!') {
                $pool = null; // explicitly set null
            } elseif (is_array($jsonData)) {
                $pool = $jsonData;
            }
            
                // Check if it's not just an error message
            if (is_array($jsonData2) && isset($jsonData2['message']) && $jsonData2['message'] === 'Policy not found!') {
                $policy = null; // explicitly set null
            } elseif (is_array($jsonData2)) {
                $policy = $jsonData2;
            }
             // Pass the data to the view
             return view('radius/service', compact('roles_id','user_name','pool','policy','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }


    public function update_service_modal($id){


        // return view('ajax.modals.update_nas');
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/servicesingle/' . $id;

        $apiUrl2 = config('app.api_base_url') . '/pool';
        
        $apiUrl3 = config('app.api_base_url') . '/policy';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // GET POOLs
         $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);
        
        
        $response3 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl3);
        
       
        
        

         // Check if the response is successful
         if ($response->successful()) {
             $service = $response->json();
             $jsonData = $response2->json();
            $jsonData2 = $response3->json();
             
             
             
                  // Check if it's not just an error message
            if (is_array($jsonData) && isset($jsonData['message']) && $jsonData['message'] === 'Pool not found!') {
                $pool = null; // explicitly set null
            } elseif (is_array($jsonData)) {
                $pool = $jsonData;
            }
            
            
                // Check if it's not just an error message
            if (is_array($jsonData2) && isset($jsonData2['message']) && $jsonData2['message'] === 'Policy not found!') {
                $policy = null; // explicitly set null
            } elseif (is_array($jsonData2)) {
                $policy = $jsonData2;
            }

             $srvid = $service[0]['srvid'];
             $srvname = $service[0]['srvname'];
             $custattr = $service[0]['custattr'];
             $downrate = $service[0]['downrate'];
             $uprate = $service[0]['uprate'];
             $descr = $service[0]['descr'];
             $basePrice = $service[0]['basePrice'];
             $srbTax = $service[0]['srbTax'];
             $advTax = $service[0]['advTax'];
             $pool_id = $service[0]['pool_id'];
             $pool_name = $service[0]['pool']['name'];
             $recharge_type = $service[0]['recharge_type'];
             $qty = $service[0]['qty'];
             $qouta_limit = $service[0]['qouta_limit'];
             $qouta_enable = $service[0]['qouta_enable'];
             
             if($service[0]['policy_id'] == 0){
                 $policy_id = 0;
                 $policy_name = "No Policy";
             }else{
                 $policy_id = $service[0]['policy']['id'];
                $policy_name = $service[0]['policy']['name'];
             }
             
             
             // Pass the data to the view
             return view('ajax.modals.update_service', compact('qouta_limit','qouta_enable','recharge_type','qty','srvid','policy_id','policy_name','policy','srvname','pool_name','pool_id','custattr','downrate','uprate','descr','basePrice','srbTax','advTax','pool','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }
    
    
     public function dataplan_list(){

        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        return view('radius/dataplan', compact('roles_id','user_name','token'));
    }
    
    public function update_qouta_plan_modal($id){


        // return view('ajax.modals.update_nas');
        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/qoutaservicesingle/' . $id;


         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

       
        
        

         // Check if the response is successful
         if ($response->successful()) {
             $service = $response->json();
             
             
   
                $qouta_id = $service[0]['qouta_id'];
             $name = $service[0]['name'];
             $value = $service[0]['value'] / 1024;
             $price = $service[0]['price'];
             
        
             
             // Pass the data to the view
             return view('ajax.modals.update_dataplan_model', compact('qouta_id','name','value','price','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
    }
}
