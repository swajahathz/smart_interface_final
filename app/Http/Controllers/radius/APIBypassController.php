<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class APIBypassController extends Controller
{
    public function manager_permission(Request $request,$manager,$type){
        
        $token = Session::get('token');
        $currentDateTime = Carbon::now();
        $roles_id = ucfirst(Session::get('roles_id'));
        $user_id = Session::get('user_id');
        $user_name = Session::get('user_name');
        
        $apiUrl = config('app.api_base_url');
        return response($apiUrl);
        
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post($apiUrl);
        
        
        $dataa = $response->json();
        
        
        
    }
}
