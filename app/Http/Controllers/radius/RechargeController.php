<?php

namespace App\Http\Controllers\radius;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class RechargeController extends Controller
{
    public function refund_modal(Request $request, $tranId){
        
        $currentDateTime = Carbon::now();
        $token = Session::get('token');
        
         $apiUrl = config('app.api_base_url') . '/rechargeinvoice/'.$tranId;
          $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);
        
        $invoice_info = $response->json();
        
        $new = $invoice_info['newExpirationDate'];
        $formatted_new = Carbon::parse($new)->format('d-m-Y H:i');
        
        $last = $invoice_info['lastExpirationDate'];
        $formatted_last = Carbon::parse($last)->format('d-m-Y H:i');
        
        
        $qty = $invoice_info['qty'];
        
        
        $date1 = Carbon::parse($formatted_new);
        
        
                // Use Carbon objects for comparison
                if ($currentDateTime > $last) {
                    $date2 = $currentDateTime;
                } else {
                    $date2 = $last;
                }
        
    
        $diffInDays = $date1->diffInDays($date2);
        
        return view('ajax/modals/refund_invoice', compact('currentDateTime','invoice_info','tranId','formatted_last','formatted_new','diffInDays','qty'));
        
    }
}
