<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class AuthenticationController extends Controller
{
    public function comingsoon()
    {
        return view('pages.comingsoon');
    }

    public function createpassword_basic()
    {
        return view('pages.createpassword-basic');
    }

    public function createpassword_cover()
    {
        return view('pages.createpassword-cover');
    }

    public function lockscreen_basic()
    {
        return view('pages.lockscreen-basic');
    }

    public function lockscreen_cover()
    {
        return view('pages.lockscreen-cover');
    }

    public function resetpassword_basic()
    {
        return view('pages.resetpassword-basic');
    }

    public function resetpassword_cover()
    {
        return view('pages.resetpassword-cover');
    }

    public function signup_basic()
    {
        return view('pages.signup-basic');
    }

    public function signup_cover()
    {
        return view('pages.signup-cover');
    }

    public function signin_basic()
    {
        return view('pages.signin-basic');
    }

    public function signin_cover()
    {
        return view('pages.signin-cover');
    }

    public function twostep_verification_basic()
    {
        return view('pages.twostep-verification-basic');
    }

    public function twostep_verification_cover()
    {
        return view('pages.twostep-verification-cover');
    }

    public function under_maintenance()
    {
        return view('pages.under-maintenance');
    }
    
    
    public function notfound(){
        return view('radius/notfound');
    }



    // New Code

    public function signin(Request $request)
    {
        $host = $request->getHost();
        
            if ($host === 'cloudradius.alburakinternet.net.pk') {
                return view('radius/auth/sblink.signin');
            }
        
            if ($host === 'partnerz.alburakinternet.net.pk') {
                return view('radius/auth/sblink.signin');
            }

            if ($host === 'billing.glownet.net.pk') {
                return view('radius/auth/fiberish.signin');
            }
             if ($host === 'al-awad.atozsofts.com') {
                return view('radius/auth/alawad.signin');
            }
            if ($host === 'bill.mynet.pk') {
                return view('radius/auth/mynet.signin');
            }
            if ($host === 'bill.whn.com.pk') {
                return view('radius/auth/worldhome.signin');
            }
            
             if ($host === 'ns.networld.pk') {
                return view('radius/auth/netsat.signin');
            }
              if ($host === 'ebilling.rds.net.pk') {
                return view('radius/auth/rds.signin');
            }
             if ($host === 'ahnetwork.smartispsolutions.net') {
                return view('radius/auth/ahnetwork.signin');
            }
            
            if ($host === 'billing.fastnet.com.pk') {
                return view('radius/auth/fiberbeam.signin');
            }
            if ($host === 'partner.mudasirisp.net') {
                return view('radius/auth/minternet.signin');
            }
             if ($host === 'billing.abnetwork.pk') {
                return view('radius/auth/abnetwork.signin');
            }
            
            // Default behavior
           $attempt_invalid = $request->cookie('attempt_invalid'); 
           
             return view('software/auth.signin-basic',compact('attempt_invalid'));
        
        
    }


    public function signup()
    {
        return view('software/auth.signup-basic');
    }




    public function signin_function(Request $request)
    {
        // 
        // if($attempt_invalid > 0){
        //     $a = $attempt_invalid++;
        // }
        
        
        $url = config('app.api_base_url');
        $response = Http::post($url.'/login', [
            'name' => $request->input('name'),
            'password' => $request->input('password'),
        ]);

        if ($response->status() === 200) {
            $data = $response->json();

            if ($data['status'] == 1) { // Check if login was successful
                // Store the token and user ID in session
                Session::put('token', $data['token']);
                Session::put('user_id', $data['user']['id']);
                Session::put('roles_id', $data['user']['roles_id']);
                Session::put('firstname', $data['details'][0]['firstname']);
                Session::put('lastname', $data['details'][0]['lastname']);
                Session::put('user_name', $data['user']['name']);
                Session::put('user_balance', $data['details'][0]['balance']);


                 Cookie::queue(Cookie::forget('attempt_invalid'));
                 Cookie::queue(Cookie::forget('block_start'));
                return redirect()->route('dashboard')->with('message', $data['message']);
            } elseif ($data['status'] == 0) { // Check if login failed due to invalid credentials
                
                return redirect()->back()->with('error', 'Invalid username or password.');
            } else {
                return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
            }
        }

        if ($response->status() === 401) {
            $data = $response->json();


                if ($data['status'] == 0) { // Agar login fail ho gaya
                
                    // Pehle se attempt ka count le lo
                    $attempt_invalid = (int) $request->cookie('attempt_invalid', 0);
                
                    // Agar block cookie lagi hui hai
                    $block_start = $request->cookie('block_start');
                
                    if ($block_start) {
                        $block_time = now()->timestamp - $block_start; // Kitna time beet gaya
                        if ($block_time < 300) { // 300 sec = 5 minutes
                            return redirect()->back()->with([
                                'error' => 'Too many invalid attempts. Please try again later.'
                            ]);
                        } else {
                            // Agar block time complete ho gaya to reset
                            Cookie::queue(Cookie::forget('block_start'));
                            Cookie::queue(Cookie::forget('attempt_invalid'));
                            $attempt_invalid = 0;
                        }
                    }
                
                    // Invalid attempts increment karo
                    $attempt_invalid++;
                
                    if ($attempt_invalid >= 5) {
                        // Block start time save karo
                        Cookie::queue('block_start', now()->timestamp, 5); // 5 minutes
                        Cookie::queue('attempt_invalid', $attempt_invalid, 5);
                
                        return redirect()->back()->with([
                            'error' => 'Too many invalid attempts. Please try again in 5 minutes.'
                        ]);
                    }
                
                    // Updated attempts save karo
                    Cookie::queue('attempt_invalid', $attempt_invalid, 60);
                
                    return redirect()->back()->with([
                        'error'  => 'Invalid username or password.',
                        'error2' => $attempt_invalid
                    ]);
                }
 
        }

     

        return redirect()->back()->with('error', 'Unable to login. Try again later.');
    }

    public function logout()
    {
        // Clear all session data
        Session::flush();

        // Redirect to the login page with a message
        return redirect()->route('signin')->with('message', 'You have been logged out.');
    }




}
