<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function role_list()
    {

        $token = Session::get('token');
        
        $apiUrl = config('app.api_base_url') . '/role';

         // Make a request to the API with headers
         $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->get($apiUrl);

         // Check if the response is successful
         if ($response->successful()) {
             $roles = $response->json();
             // Pass the data to the view
             return view('software/auth/roles', compact('roles'));
         } else {
             return redirect()->back()->withErrors('Failed to fetch users.');
         }
    }
}
