<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class printController extends Controller
{
    //
    
    
    Public function print_invoice(Request $request, $tranId){
          $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        
        $apiUrl = config('app.api_base_url') . '/rechargeinvoice/'.$tranId;
         $apiUrl1 = config('app.api_base_url') . '/rechargeinvoiceledger/'.$tranId;
        $apiUrl2 = config('app.api_base_url') . '/settinginfo';
        
        

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        $response1 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl1);
        
        $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);
        
         if ($response->successful()) {
             $invoice_info = $response->json();
             
             $apiUrl3 = config('app.api_base_url') . '/subscribersingle/'.$invoice_info['username'];
             $response3 = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                    ])->get($apiUrl3);
                    
            $subscriber_info = $response3->json();
             
         }
         
         if ($response1->successful()) {
             $invoice_ledger_info = $response1->json();
             
         }
         
         if ($response2->successful()) {
             $admin_info = $response2->json();
             
         }
        
        
        return view('/radius.print', compact('subscriber_info','invoice_ledger_info','admin_info','invoice_info','roles_id','user_name','token','tranId'));
    }
}
