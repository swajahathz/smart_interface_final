<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

    <head>

        <!-- META DATA eta Data -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="description" content="{{ $domainSettings['description'] }}">
    
<meta name="author" content="SmartISPsolutions Team">
<meta name="keywords" content="radius billing system, ISP billing software, smartISPsolutions, free radius manager, internet billing system, PPPoE billing, broadband billing software, ISP management system, bandwidth manager, freeradius laravel, mikrotik billing, ISP automation, radius server GUI, smart isp, hotspot billing system, internet plan management">

        <!-- TITLE -->
		<title>{{ $domainSettings['title'] }}</title>

        <!-- FAVICON -->
        <link rel="icon" href="{{ $domainSettings['fav'] }}" type="image/png">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="{{asset('build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="{{asset('build/assets/icon-fonts/icons.css')}}" rel="stylesheet">
        
        <!-- APP SCSS -->
        @vite(['resources/sass/app.scss'])


        <!-- MAIN JS -->
        <script src="{{asset('build/assets/authentication-main.js')}}"></script>

        @yield('styles')

	</head>

    @yield('error-body')

        @yield('content')

        
        <!-- SCRIPTS -->

        <!-- BOOTSTRAP JS -->
        <script src="{{asset('build/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        @yield('scripts')


        <!-- END SCRIPTS -->

	</body>
</html>
