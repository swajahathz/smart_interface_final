<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
class OnlinePaymentController extends Controller
{
    public function onelinklist(){
        
        
        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        return view('radius/1linklist', compact('user_id','token','roles_id','user_name'));
        
    }
    
    
    public function jazzlist(){
        
        
        $token = Session::get('token');
        $roles_id = Session::get('roles_id');
        $user_name = Session::get('user_name');
        $user_id = Session::get('user_id');
        
        return view('radius/jazzcash', compact('user_id','token','roles_id','user_name'));
        
    }
    
    public function jazzcash_merchant(Request $request,$username,$password){
        
         $currentDateTime = Carbon::now();
        $token = Session::get('token');
        $fullamount = 0;

        $roles_id = ucfirst(Session::get('roles_id'));
        $user_id = Session::get('user_id');
        $user_name = ucfirst(Session::get('user_name'));
        
        
       $apiUrl2 = config('app.api_base_url') . '/subscribersinglejazz/' . $username;

        $response2 = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($apiUrl2);
        
        if ($response2->successful()) {
            $subscriber = $response2->json();
        } else {
            $subscriber = ['message' => 'Failed to fetch subscriber'];
            
         
            
        }
        $apiUrl3 = config('app.api_base_url') . '/subcriber/invoiceListjazz/' . $username;
            
    
    $response3 = Http::withHeaders([
    'Accept' => 'application/json',
        ])->post($apiUrl3);
        
        
        $invoice = $response3->json();
        
        
        
     if (isset($subscriber['message']) && $subscriber['message'] == "Subscriber not found!") {
    return view('radius/jazzcash_marchant/not_found');
}



        $pass = $subscriber[0]['password'];
        
        if($password == $pass){
             return view('radius/jazzcash_marchant/info_page', compact('subscriber','invoice'));
        }else{
             return view('radius/jazzcash_marchant/not_found');
        }

        
        
       
        
    }
    
    
    public function jazz_merchant_new(Request $request,$username,$password){
        
         $currentDateTime = Carbon::now();
        $token = Session::get('token');
        $fullamount = 0;

        $roles_id = ucfirst(Session::get('roles_id'));
        $user_id = Session::get('user_id');
        $user_name = ucfirst(Session::get('user_name'));
        
        
       $apiUrl2 = config('app.api_base_url') . '/subscribersinglejazz/' . $username;

        $response2 = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get($apiUrl2);
        
        if ($response2->successful()) {
            $subscriber = $response2->json();
        } else {
            $subscriber = ['message' => 'Failed to fetch subscriber'];
            
         
            
        }
        $apiUrl3 = config('app.api_base_url') . '/subcriber/invoiceListjazz/' . $username;
            
    
    $response3 = Http::withHeaders([
    'Accept' => 'application/json',
        ])->post($apiUrl3);
        
        
        $invoice = $response3->json();
        
        
        
     if (isset($subscriber['message']) && $subscriber['message'] == "Subscriber not found!") {
    return view('radius/jazzcash_marchant/not_found');
}



        $pass = $subscriber[0]['password'];
        
        if($password == $pass){
            
                $apiUrl2 = config('app.api_base_url') . '/subscribersingle/'.$username;
                 $response2 = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ])->get($apiUrl2);
        
        $subscriber_info = $response2->json();
        
             return view('radius/jazzcash_marchant/info_page_new', compact('subscriber','subscriber_info','invoice'));
        }else{
             return view('radius/jazzcash_marchant/not_found');
        }

        
        
       
        
    }
    
    
    
    public function portal(Request $request){
        
        return view('radius/jazzcash_marchant/signin');
        
    }
    
    public function jazzcash_merchant_form(Request $request){
        
     
         
        $responseCode = $request->input('pp_ResponseCode');
        $responseMessage = $request->input('pp_ResponseMessage');
        $pp_BillReference = $request->input('pp_BillReference');
        $amount = $request->input('pp_Amount');
        
        $valueAfter8 = substr($pp_BillReference, 8);


        if ($responseCode === '000') {
            $status = 1;
            
            
             $apiUrl3 = config('app.api_base_url') . '/cardrechargejazzcash/' . $valueAfter8 . '/' .$pp_BillReference;
            
    
                $response3 = Http::withHeaders([
                'Accept' => 'application/json',
                    ])->post($apiUrl3);
            
            $recharge = $response3->json();
            
      
            
            return view('radius/jazzcash_marchant/status', compact('status','pp_BillReference','amount','recharge'));
        } else {
            $status = 0;
            return view('radius/jazzcash_marchant/status', compact('status','pp_BillReference','amount'));
        }
        
    
        
    }
    
    public function jazzcash_merchant_status(Request $request, $status, $amount, $tid){
        
     


     return view('radius/jazzcash_marchant/status2', compact('status','tid','amount'));
    
        
    }
}
