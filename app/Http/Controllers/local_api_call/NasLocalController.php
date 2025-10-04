<?php

namespace App\Http\Controllers\local_api_call;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class NasLocalController extends Controller
{
    public function nas(){

            $token = Session::get('token');

            // External API URL to fetch NAS data from
            $apiUrl = 'http://api.smartispsolutions.local/api/subscriber'; // <-- replace with your actual API URL
        
            // Call the external API with Bearer token
            $response = Http::withToken($token)->get($apiUrl);
        
            // Optional: Handle errors
            if ($response->failed()) {
                return response()->json(['error' => 'Failed to fetch NAS data'], 500);
            }
        
            // Return the JSON data
            return response()->json($response->json());
    }
}
