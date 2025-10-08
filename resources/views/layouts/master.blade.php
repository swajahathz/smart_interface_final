<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- META DATA -->
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


        @include('layouts.components.styles')

        <!-- MAIN JS -->
        <script src="{{asset('build/assets/main.js')}}"></script>

        @yield('styles')
        
        <style>
            :root {
                    {{ $domainSettings['primary'] }}
                }
                
                   {{ $domainSettings['sidebar'] }}  
                   
              :root {     
                   
                 /* Only apply to elements with custom-scroll class */
.custom-scroll::-webkit-scrollbar {
  width: 12px;
}

.custom-scroll::-webkit-scrollbar-track {
  background: #e0e0e0;
}

.custom-scroll::-webkit-scrollbar-thumb {
  background-color: #3498db;
  border-radius: 10px;
  border: 2px solid #ffffff;
}

.custom-scroll::-webkit-scrollbar-thumb:hover {
  background-color: #2980b9;
}
                    
                }
        </style>

	</head>

	<body>

        <!-- SWITCHER -->

        @include('layouts.components.switcher')

        <!-- END SWITCHER -->

        <!-- LOADER -->
		<div id="loader">
			<img src="{{asset('build/assets/images/media/loader.svg')}}" alt="">
		</div>
		<!-- END LOADER -->

        <!-- PAGE -->
		<div class="page">

            <!-- HEADER -->

            @include('layouts.components.header')

            <!-- END HEADER -->

            <!-- SIDEBAR -->
            
            @if ($roles_id == 1)
                 @include('layouts.components.radius.sidebar.superadmin_sidebar')
                @elseif ($roles_id == 2)
                    @include('layouts.components.radius.sidebar.admin_sidebar')
                @elseif ($roles_id == 3)
                    @include('layouts.components.radius.sidebar.franchise_sidebar')
                @elseif ($roles_id == 4)
                    @include('layouts.components.radius.sidebar.dealer_sidebar')
                @elseif ($roles_id == 5)
                    @include('layouts.components.radius.sidebar.subdealer_sidebar')
                @elseif ($roles_id == 6)
                    @include('layouts.components.radius.sidebar.juniordealer_sidebar')
                @endif

           

            <!-- END SIDEBAR -->

            <!-- MAIN-CONTENT -->

            <div class="main-content app-content">

                @yield('content')

            </div> 
            <!-- END MAIN-CONTENT -->

            <!-- SEARCH-MODAL -->

            @include('layouts.components.search-modal')

            <!-- END SEARCH-MODAL -->

            <!-- FOOTER -->
            
            @include('layouts.components.footer')

            <!-- END FOOTER -->

		</div>
        <!-- END PAGE-->

        <!-- SCRIPTS -->

        @include('layouts.components.scripts')

        @yield('scripts')

        <!-- STICKY JS -->
		<script src="{{asset('build/assets/sticky.js')}}"></script>

        <!-- APP JS -->
		@vite('resources/js/app.js')


        <!-- CUSTOM-SWITCHER JS -->
        @vite('resources/assets/js/custom-switcher.js')

        
        <!-- END SCRIPTS -->
        
        <script>
        let encrypt_t = '{{ $token }}';
        let baseUrls = "{{ config('app.api_base_url') }}";


$('#searchModal').on('shown.bs.modal', function () {
    $('#dashboard-search').trigger('focus');
  });

            $("#dashboard-search").on('keyup',function(){
                
                $("#dashboard_search_according").show();
                $("#dashboard_search_spinner").show();
                $("#dashboard_subscriber_found").hide();
                
                var query = $("#dashboard-search").val();
                
                 $.ajax({
                        url: baseUrls+"/dashboard_search/"+query+"/10",
                        type: "POST",
                        headers: {
                            "Authorization": "Bearer " + encrypt_t, // token header me send karna
                            "Accept": "application/json"
                        },
                        success: function (response) {
                            const roleMap = {
                                        2: "Admin",
                                        3: "Franchise",
                                        4: "Dealer",
                                        5: "Sub Dealer",
                                        6: "Junior Dealer"
                                    };
                            
                             let html = "";
                                    $.each(response.results, function (index, item) {
                                        let roleName = roleMap[item.owner?.roles_id] ?? "-";
                                        html += `
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="lh-1">
                                                            <span class="avatar avatar-sm avatar-rounded bg-${item.online_status == 1 ? 'success' : 'danger'}-transparent fw-semibold">
                                                                ${item.online_status == 1 ? 'Online' : 'Offline'}
                                                            </span>
                                                        </div>
                                                        <div class="ms-2">
                                                            <p class="fw-semibold mb-0 d-flex align-items-center">
                                                                <a href="/subscriber_info/${item.username}">${item.firstname ?? ""} ${item.lastname ?? ""}</a>
                                                            </p>
                                                            <p class="fs-12 text-muted mb-0">${item.username ?? ""}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>${item.mobile ?? "-"}</td>
                                                <td><div class="btn-group ms-auto">
                        <a href="/manager/profile/${item.owner.managername ?? "-"}" class="btn btn-sm btn-primary-light">${item.owner.managername ?? "-"}</a>
                        <button class="btn btn-sm btn-primary">${roleName}</button>
                    </div></td>
                                            </tr>
                                        `;
                                    });
                            
                                    $("#dashboard_search_result").html(html);
                                    $("#dashboard_subscriber_found").html(response.total_found);
                                    
                                    $("#dashboard_subscriber_found").show();
                                    $("#dashboard_search_spinner").hide();
                                    
                        },
                        error: function (xhr) {
                            console.error("Error:", xhr.responseText);
                        }
                    });
                });
                
           
        </script>

	</body>
</html>
