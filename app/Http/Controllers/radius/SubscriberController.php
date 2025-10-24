<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

$currentDateTime = Carbon::now();

class SubscriberController extends Controller
{
    
     public function subscriber_online_ajax(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
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
        return view('radius/subscriber_online_ajax', compact('manager','user_id','user_name','roles_id','token'));
    }
    
    
    
    public function subscriber_online_list(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
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
        return view('radius/subscriber_online_list', compact('manager','user_id','user_name','roles_id','token'));
    }
    
    public function subscribers(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
        $user_id = Session::get('user_id');

        $apiUrl = config('app.api_base_url') . '/assignservice/'.$user_id.'/'.$roles_id.'';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        
        
        $apiUrl2 = config('app.api_base_url') . '/manager/hierarchy';

         // Make a request to the API with headers
         $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);
        
        
           if ($response->successful()) {
             $jsonData = $response->json();
             
             // Check if it's not just an error message
            if (is_array($jsonData) && isset($jsonData['message']) && $jsonData['message'] === 'Service not found!') {
                $service = null; // explicitly set null
            } elseif (is_array($jsonData)) {
                $service = $jsonData;
            }
               
           }
           
           if ($response2->successful()) {
             $jsonData2 = $response2->json();
             
             // Check if it's not just an error message
            if (is_array($jsonData2) && isset($jsonData2['message']) && $jsonData2['message'] === 'Manager not found!') {
                $manager = null; // explicitly set null
            } elseif (is_array($jsonData2)) {
                $manager = $jsonData2;
            }
               
           }
           
         if($roles_id == 2){
            return view('radius/manager/admin/subscriber_ajax', compact('service','manager','user_name','roles_id','token'));
        }
        
        
        return view('radius/subscriber', compact('service','manager','user_name','roles_id','token'));
    }
    
    public function exports(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
        $user_id = Session::get('user_id');

        $apiUrl = config('app.api_base_url') . '/assignservice/'.$user_id.'/'.$roles_id.'';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        
        
        $apiUrl2 = config('app.api_base_url') . '/manager/hierarchy';

         // Make a request to the API with headers
         $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);
        
        
           if ($response->successful()) {
             $jsonData = $response->json();
             
             // Check if it's not just an error message
            if (is_array($jsonData) && isset($jsonData['message']) && $jsonData['message'] === 'Service not found!') {
                $service = null; // explicitly set null
            } elseif (is_array($jsonData)) {
                $service = $jsonData;
            }
               
           }
           
           if ($response2->successful()) {
             $jsonData2 = $response2->json();
             
             // Check if it's not just an error message
            if (is_array($jsonData2) && isset($jsonData2['message']) && $jsonData2['message'] === 'Manager not found!') {
                $manager = null; // explicitly set null
            } elseif (is_array($jsonData2)) {
                $manager = $jsonData2;
            }
               
           }
           
         if($roles_id == 2){
            return view('radius/export', compact('service','manager','user_name','roles_id','token'));
        }
        
    }
    
    
    public function subscriber(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
        $user_id = Session::get('user_id');

        $apiUrl = config('app.api_base_url') . '/assignservice/'.$user_id.'/'.$roles_id.'';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        
        
        $apiUrl2 = config('app.api_base_url') . '/manager/hierarchy';

         // Make a request to the API with headers
         $response2 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl2);
        
        
           if ($response->successful()) {
             $jsonData = $response->json();
             
             // Check if it's not just an error message
            if (is_array($jsonData) && isset($jsonData['message']) && $jsonData['message'] === 'Service not found!') {
                $service = null; // explicitly set null
            } elseif (is_array($jsonData)) {
                $service = $jsonData;
            }
               
           }
           
           if ($response2->successful()) {
             $jsonData2 = $response2->json();
             
             // Check if it's not just an error message
            if (is_array($jsonData2) && isset($jsonData2['message']) && $jsonData2['message'] === 'Manager not found!') {
                $manager = null; // explicitly set null
            } elseif (is_array($jsonData2)) {
                $manager = $jsonData2;
            }
               
           }
           
         if($roles_id == 2){
            return view('radius/manager/admin/subscriber', compact('service','manager','user_name','roles_id','token'));
        }
        
        
        return view('radius/subscriber', compact('service','manager','user_name','roles_id','token'));
    }
    
    public function subscriber_online(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
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
        return view('radius/subscriber_online_ajax', compact('manager','user_id','user_name','roles_id','token'));
    }
    
    public function subscriber_active(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
        return view('radius/subscriberActive', compact('user_name','roles_id','token'));
    }
    
    public function subscriber_expire(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
        return view('radius/subscriberExpire', compact('user_name','roles_id','token'));
    }
    
    public function subscriber_upcoming_expire(){
        $token = Session::get('token');
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
        return view('radius/subscriberupcomingexpire', compact('user_name','roles_id','token'));
    }

    public function subscriber_add_page(){
        $currentDateTime = Carbon::now();
        $token = Session::get('token');
        
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_name = ucfirst(Session::get('user_name'));
        $user_id = Session::get('user_id');

        $apiUrl = config('app.api_base_url') . '/assignservice/'.$user_id.'/'.$roles_id.'';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $jsonData = $response->json();
             
             // Check if it's not just an error message
            if (is_array($jsonData) && isset($jsonData['message']) && $jsonData['message'] === 'Service not found!') {
                $service = null; // explicitly set null
            } elseif (is_array($jsonData)) {
                $service = $jsonData;
            }
             
             return view('radius/subscriber_add', compact('roles_id','user_name','service','currentDateTime','token'));
              
             // Pass the data to the view
             
         } else {
             return redirect()->back()->withErrors('Failed to fetch nas.');
         }
        
    }

    public function subscriber_info_page($username){
        $currentDateTime = Carbon::now();
        $token = Session::get('token');
        $fullamount = 0;

        $roles_id = ucfirst(Session::get('roles_id'));
        $user_id = Session::get('user_id');
        $user_name = ucfirst(Session::get('user_name'));

        $apiUrl = config('app.api_base_url') . '/assignservice/'.$user_id.'/'.$roles_id.'';
        $apiUrl2 = config('app.api_base_url') . '/subscribersingle/'.$username;
        $apiUrl3 = config('app.api_base_url') . '/manager/permission/'.$user_name;
        $apiUrl4 = config('app.api_base_url') . '/usagesingletotal/'.$username;

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
             $service = $response->json();
             $subscriber = $response2->json();
             $permission = $response3->json();
             $usage = $response4->json();
             
             
            $srv = config('app.api_base_url') . '/servicesingle/' .  $subscriber[0]['srvid']['srvid'];
            
            $response4 = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
            ])->get($srv);
             $srv_detail = $response4->json();
             
            
         
            $recharge_type = $srv_detail[0]['recharge_type'];
            $qty = $srv_detail[0]['qty'];

          

             $lastExpiration = Carbon::parse($subscriber[0]['expiration']);
                $now = Carbon::now();
                $renewDates = Carbon::now();
                
            if($recharge_type == 0){
                if ($lastExpiration->isPast()) {
                    
                $new_expiration = $now->addMonth()->format('d M Y H:i');
                $daysAdded = $now->diffInDays($new_expiration);
                } else {
                    $new_expiration = $lastExpiration->addMonth()->format('d M Y H:i');
                    $daysAdded = $lastExpiration->diffInDays($new_expiration);
                }
            }
            if($recharge_type == 1){
                if ($lastExpiration->isPast()) {
                $new_expiration = $now->addDays($qty)->format('d M Y H:i');
                $daysAdded = $now->diffInDays($new_expiration);
                } else {
                    $new_expiration = $lastExpiration->addDays($qty)->format('d M Y H:i');
                    $daysAdded = $lastExpiration->diffInDays($new_expiration);
                }
            }
            if($recharge_type == 4){
                $billingDay = $qty;  
                
                
                if ($lastExpiration->isPast()) {
                              if ($renewDates->day < $billingDay) {
                                    $new_expiration = $renewDates->copy()->day($billingDay)->format('d M Y 12:00');
                                    $newExpirationDate_forcontroller = $renewDates->copy()->day($billingDay)->format('Y-m-d 12:00:00');
                                    $daysAdded = $renewDates->diffInDays($new_expiration);
                            } 
                            // Agar recharge date billing day se barabar ya uske baad hai (10, 15, 25 etc.)
                            else {
                                $new_expiration = $renewDates->copy()->addMonthNoOverflow()->day($billingDay)->format('d M Y 12:00');
                                $newExpirationDate_forcontroller = $renewDates->copy()->addMonthNoOverflow()->day($billingDay)->format('Y-m-d 12:00:00');
                                $daysAdded = $renewDates->diffInDays($new_expiration);
                            }
                } else {
                           
                           if ($lastExpiration->day < $billingDay) {
                                    // $newExpirationDates = $lastExpiration->copy()->day($billingDay)->format('d M Y 12:00');
                                    // $newExpirationDate_forcontroller = $lastExpiration->copy()->day($billingDay)->format('Y-m-d 12:00:00');
                                    // $daysAdded = $lastExpiration->diffInDays($newExpirationDates);
                                    
                                    
                                    // $lastExpiration = new DateTime($data->expiration);
                                    $lastExpiration = new \DateTime($subscriber[0]['expiration']);
                                    // 1) Naya expiration date
                                    $newExpirationDates2 = clone $lastExpiration;
                                    $newExpirationDates2->setDate(
                                        $lastExpiration->format("Y"),
                                        $lastExpiration->format("m"),
                                        $billingDay
                                    );
                                    $newExpirationDates2->setTime(12, 0, 0);
                                    
                                    // Format for view
                                    $new_expiration = $newExpirationDates2->format("d M Y H:i");
                                    
                                    // Difference in days
                                        $diff = $lastExpiration->diff($newExpirationDates2);
                                        $daysAdded = $diff->days;
                                    
                                    // $daysAdded = $lastExpiration->diffInDays($newExpirationDates);
                                    
                                    
                            } 
                            // Agar recharge date billing day se barabar ya uske baad hai (10, 15, 25 etc.)
                            else {
                                $new_expiration = $lastExpiration->copy()->addMonthNoOverflow()->day($billingDay)->format('d M Y 12:00');
                                $daysAdded = $lastExpiration->diffInDays($new_expiration);
                                
                                if ($lastExpiration->day > $billingDay) {
                                    $fullamount = 0; // If Billing cycle have full month
                                }else{
                                    $fullamount = 1; // If Billing cycle have full month
                                }
                                
                            }
                }
            }
            if($recharge_type == 2){
                if ($lastExpiration->isPast()) {
                $new_expiration = $now->addMonth()->format('d M Y H:i');
                
                $n = $now->copy()->addMonth();
                $daysAdded = $now->diffInDays($n);
                } else {
                    // $new_expiration = $lastExpiration->addMonth()->format('d M Y H:i');
                    
                    
                    $new_expiration = $lastExpiration->copy()->addMonth()->format('d M Y 12:00');
                                $daysAdded = $lastExpiration->diffInDays($new_expiration);
                    
                    // $n = $lastExpiration->copy()->addMonth();
                    // $daysAdded = $lastExpiration->diffInDays($n);
                }
            }


            if($roles_id == 2){
               return view('radius/manager/admin/subscriber_info', compact('usage','fullamount','recharge_type','daysAdded','permission','roles_id','user_name','service','subscriber','username','currentDateTime','new_expiration','token')); 
            }
            if($roles_id == 3){
               return view('radius/manager/franchise/subscriber_info', compact('usage','fullamount','recharge_type','daysAdded','permission','roles_id','user_name','service','subscriber','username','currentDateTime','new_expiration','token')); 
            }
            
             // Pass the data to the view
             return view('radius/subscriber_info', compact('usage','fullamount','recharge_type','daysAdded','permission','roles_id','user_name','service','subscriber','username','currentDateTime','new_expiration','token'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch.');
         }
        
    }
}
