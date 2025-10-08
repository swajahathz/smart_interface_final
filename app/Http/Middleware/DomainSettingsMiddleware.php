<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class DomainSettingsMiddleware
{
   public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost(); // Example: domain1.com

        // Set default settings
        $settings = [
            'title' => 'SmartRad | SmartISPSolutions CRM Billing System',
            'logo' => '<h5 style="color: white;
    font-weight: bold;font-size: 20px;">Smart<span style="font-weight: 100;
    color: #bfbfbf;
    font-size: 18px;">Rad</span></h5>',
            'description' => 'SmartISPsolutions – A powerful and user-friendly ISP Radius Billing System. Manage users, billing, plans, bandwidth, and usage with real-time monitoring and automation.',
            'fav' => '/build/assets/images/fav.png',
            'primary' => '--primary-rgb:36,60,145;',
            'sidebar' => '',
        ];
        
        // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
        config(['app.api_base_url' => 'https://radiusapi.atozsofts.com/api']);


        // Custom settings based on domain
        if ($host === 'panel.multiskybroadband.net.pk') {
            $settings = [
                'title' => 'Multi Sky BroadBand | Billing system',
                'logo' => '<img src="/build/assets/images/multisky.png" style="width: 140px;"/>',
                'description' => 'Multi Sky BroadBand.',
                'fav' => '/build/assets/images/fav.png',
                'primary' => '',
                'sidebar' => '',
            ];
        } elseif ($host === 'billing.glownet.net.pk') {
            $settings = [
                'title' => 'GlowNet | CRM',
                'logo' => '<img src="/build/assets/images/glownet.png" style="width: 140px;"/>',
                'fav' => '/build/assets/images/glownet_fav.png',
                'description' => 'GlowNet CRM',
                'primary' => '--primary-rgb: 81, 81, 81;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #444444;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://api.glownet.net.pk/api']);
                
                
        }elseif ($host === 'billing.fastnet.com.pk') {
            $settings = [
                'title' => 'FastNet | Billing System',
                'logo' => '<div style="background-color:white; padding:5px;"><img src="/build/assets/images/fast.png" style="width: 140px;"/></div>',
                'fav' => '/build/assets/images/fast_fav.png',
                'description' => 'FastNet | Billing System',
                'primary' => '--primary-rgb: 72, 13, 28;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #480d1c;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://api.fastnet.com.pk/api']);
                
                
        } elseif ($host === 'vision.smartispsolutions.net') {
            $settings = [
                'title' => 'Vision BroadBand',
                'logo' => '<img src="/build/assets/images/glownets.png" style="width: 140px;"/>',
                'fav' => '/build/assets/images/glownet_fav.png',
                'description' => 'Vision BroadBand',
                'primary' => '--primary-rgb: 81, 81, 81;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #444444;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://visionapi.smartispsolutions.net/api']);
                
                
        } elseif ($host === 'ahnetwork.smartispsolutions.net') {
            $settings = [
                'title' => 'AH NETWORK Billing System',
                'logo' => '<img src="/build/assets/images/ahnetwork.png" style="width: 100px;"/>',
                'fav' => '/build/assets/images/ahnetwork.png',
                'description' => 'AH NETWORK Billing System Powered By SmartRad',
                'primary' => '--primary-rgb: 96, 79, 52;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #444444;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://radiusapi.atozsofts.com/api']);
                
                
        }elseif ($host === 'ultralink.smartispsolutions.net') {
            $settings = [
                'title' => 'UltraLink Billing System',
                'logo' => '<img src="/build/assets/images/ultralink.png" style="width: 140px;"/>',
                'fav' => '/build/assets/images/ultralink_fav.png',
                'description' => 'UltraLink Billing System Powered By SmartRad',
                'primary' => '--primary-rgb: 81, 81, 81;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #444444;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://ultralinkapi.smartispsolutions.net/api']);
                
                
        }elseif ($host === 'clicksat.smartispsolutions.net') {
            $settings = [
                'title' => 'Clicksat Billing System',
                'logo' => '<img src="/build/assets/images/clicksat.jpg" style="width: 140px;"/>',
                'fav' => '/build/assets/images/clicksat.jpg',
                'description' => 'RDS RedTone Billing System',
                'primary' => '--primary-rgb: 81, 81, 81;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #444444;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#EC2426',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://rdsapi.atozsofts.com/api']);
                
                
        }elseif ($host === 'ebilling.rds.net.pk') {
            $settings = [
                'title' => 'RedTone Billing System',
                'logo' => '<img src="/build/assets/images/rds.png" style="width: 140px;"/>',
                'fav' => '/build/assets/images/rds_fav.png',
                'description' => 'ClickSat Billing System',
                'primary' => '--primary-rgb: 81, 81, 81;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #444444;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#EC2426',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://rdsapi.atozsofts.com/api']);
                
                
        }elseif ($host === 'al-awad.atozsofts.com') {
            $settings = [
                'title' => 'Al-Awad | User Billing System',
                'logo' => '<img src="/build/assets/images/alawad.png" style="width: 140px;"/>',
                'fav' => '/build/assets/images/galawad.png',
                'description' => 'AL-Awad CRM',
                'primary' => '--primary-rgb: 81, 81, 81;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #444444;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://al-awadapi.atozsofts.com/api']);
                
                
        }elseif ($host === 'login.greennet.com.pk') {
            $settings = [
                'title' => 'Greennet Broadband | Billing system',
                'logo' => '<div style="background-color:white;"><img src="/build/assets/images/green_logo.png" style="width: 200px;"/></div>',
                'fav' => '/build/assets/images/green_fav.png',
                'description' => 'Greennet BroadBand',
                'primary' => '--primary-rgb: 81, 81, 81;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #444444;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://api.greennet.com.pk/api']);
                
                
        }elseif ($host === 'partnerz.alburakinternet.net.pk') {
            $settings = [
                'title' => 'ALBURAK | Users billing system',
                'logo' => '<img src="/build/assets/images/alburak.png" style="width: 220px;"/>',
                'fav' => '/build/assets/images/alburakfav.png',
                'description' => 'ALBURAK user billing system',
                'primary' => '--primary-rgb: 23, 22, 75;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #17164B;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://smartradapi.alburakinternet.net.pk/api']);
                
                
        }elseif ($host === 'cloudradius.alburakinternet.net.pk') {
            $settings = [
                'title' => 'ALBURAK CLOUD RADIUS SYSTEM',
                'logo' => '<img src="/build/assets/images/alburak.png" style="width: 220px;"/>',
                'fav' => '/build/assets/images/alburakfav.png',
                'description' => 'ALBURAK user billing system',
                'primary' => '--primary-rgb: 23, 22, 75;',
                'sidebar' => '[data-menu-styles=dark][data-theme-mode=light] {
            --menu-bg: #17164B;
            --menu-prime-color: #b9b9b9;
        }',
        'card_box' => '#5151511f',
            ];
            
            
             // config(['app.api_base_url' => 'https://api.smartispsolutions.com/api']);
                config(['app.api_base_url' => 'https://dummyradius-api.alburakinternet.net.pk/api']);
                
                
        }elseif ($host === 'bill.whn.com.pk') {
            $settings = [
                'title' => 'World Home Communication | Billing system',
                'logo' => '<img src="/build/assets/images/whc.png" style="width: 140px;"/>',
                'fav' => '/build/assets/images/whc.png',
                'description' => 'World Home Communication',
                'primary' => '--primary-rgb: 0, 1, 251;',
                'sidebar' => '',
            ];
            
            // config(['app.api_base_url' => 'https://apiwhc.smartispsolutions.com/api']);
            config(['app.api_base_url' => 'https://apiwhc.atozsofts.com/api']);
            
        }elseif ($host === 'ns.networld.pk') {
            $settings = [
                'title' => 'NETSAT | Billing system',
                'logo' => '<img src="/build/assets/images/netsat.png" style="width: 140px;"/>',
                'fav' => '/build/assets/images/netsat.png',
                'description' => 'NETSAT',
                'primary' => '--primary-rgb: 17, 137, 213;',
                'sidebar' => '',
            ];
            
            // config(['app.api_base_url' => 'https://apiwhc.smartispsolutions.com/api']);
            config(['app.api_base_url' => 'https://apiwhc.atozsofts.com/api']);
            
        }elseif ($host === 'bill.mynet.pk') {
            $settings = [
                'title' => 'MyNet BroadBand | CRM',
                'logo' => '<img src="/build/assets/images/Mynet.png" style="width: 160px;"/>',
                'fav' => '/build/assets/images/mynet-fav.png',
                'description' => 'MyNet BroadBand CRM',
                'primary' => '--primary-rgb: 0, 126, 191;',
                'sidebar' => '',
            ];
            
            // config(['app.api_base_url' => 'https://apimynet.smartispsolutions.com/api']);
            config(['app.api_base_url' => 'https://apimynet.atozsofts.com/api']);
        }

        // Share settings with all views
        View::share('domainSettings', $settings);

        return $next($request);
    }
}
