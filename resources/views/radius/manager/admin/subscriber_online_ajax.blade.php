@extends('layouts.master')

@section('styles')

  
          <!-- SWEETALERTS CSS -->
          <link rel="stylesheet" href="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.css')}}">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.0/css/buttons.dataTables.min.css"> <!-- important -->
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.7.0/css/colReorder.dataTables.min.css"/>


<style>
    .dt-button.dropdown-item.buttons-columnVisibility.active {
    background: var(--primary-color) !important;
}

div.dt-button-collection .dt-button:not(.dt-btn-split-drop) {
    min-width: auto !important;   /* ya unset bhi use kar sakte ho */
    width: auto !important;       /* taake apni content ke hisaab se chale */
}
</style>

@endsection

@section('content')
<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="dangerToast" class="toast colored-toast bg-danger-transparent" role="alert" aria-live="assertive" aria-atomic="true">
        <div id="backToast" class="toast-header bg-danger text-white">
           <strong class="me-auto header">Ynex</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Your toast message here.
        </div>
    </div>
</div>

                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <h1 class="page-title fw-semibold fs-18 mb-0">ONLINE SUBSCRIBER</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Online Subscriber</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->
                   

                <!-- Start::row-1 -->
                <div class="row">
                    
                    <div class="col-xl-12">
                        
                        <div class="row">
                                        <div class="col-xxl-3 col-lg-3 col-md-3 total_online_tab" style="cursor:pointer;">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;background-color: #5479ff1a;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Total Online</p>
                                                                    <h4 id="totalOnline" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="#">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                    
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div id="total-online-circle" style="margin-top: -20px;
    margin-bottom: -20px;
    margin-right: -20px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-xxl-3 col-lg-3 col-md-3 total_offline_tab" style="cursor:pointer;">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;background-color: #80808029;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Active Offline</p>
                                                                    <h4 id="totalOffline" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="#">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                         <div id="total-offline-circle" style="margin-top: -20px;
    margin-bottom: -20px;
    margin-right: -20px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-3 col-md-3 total_active_tab" style="cursor:pointer;">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;background-color:#edfdf2;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Active Online</p>
                                                                    <h4 id="totalActive" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="#">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="total-active-circle" style="margin-top: -20px;
    margin-bottom: -20px;
    margin-right: -20px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      
                                        <div class="col-xxl-3 col-lg-3 col-md-3 total_expire_tab" style="cursor:pointer;">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="background-color: #ff656526;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Expire Online</p>
                                                                    <h4 id="totalExpire" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="#">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="total-expire-circle" style="margin-top: -20px;
    margin-bottom: -20px;
    margin-right: -20px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            
                        </div>
                        
                        <div class="card custom-card">
                            <div class="card-header" style="justify-content: center;">
                                 <div class="card-titles">
                                    <div class="row">
                                               <div class="col-sm-12 col-xl-4 mb-3">
                                                    <select id="manager" class="form-select">
                                                           <option selected disabled>SELECT MANAGER</option>
                                                            @if(is_array($manager) && count($manager) > 0)
                                                                    @foreach($manager as $item)
                                                                        <option value="{{ $item['user_id'] }}">{{ $item['managername'] }} | {{ $item['actype'] }} | <b>{{ $item['totaluser'] }} Subscriber</b></option>
                                                                    @endforeach
                                                                @else
                                                                    <p>No Manager available.</p>
                                                                @endif
                                                                 <option value="0">All</option>
                                                        </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 mb-3">
                                                        <select id="status" class="form-select">
                                                            <option selected disabled>SELECT STATUS</option>
                                                            <option value="1">Online</option>
                                                            <option value="2">Offline</option>
                                                        </select>
                                                </div>
                                                <div class="col-sm-12 col-xl-4 mb-3">
                                                    <button id="searchBtn" class="btn btn-md btn-primary" style="width: 100%;">Search</button>
                                                    <div>
                                        
                                                     </div>
                                                </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>SUBSCRIBER</th>
                                                <th id="logintime_txt">LOGIN TIME</th>
                                                <th id="uptime_txt">UP TIME</th>
                                                <th>USAGE</th>
                                                <th>EXPIRATION</th>
                                                <th>IPv4</th>
                                                <th>IPv6</th>
                                                <th>VLAN</th>
                                                <th>MAC</th>
                                                
                                                <th>ADDRESS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End::row-1 -->


                </div>

@endsection

@section('scripts')

        <!-- JQUERY JS -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
     <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- CHARTJS CHART JS -->
        <script src="{{asset('build/assets/libs/chart.js/chart.min.js')}}"></script>
       
        <!-- SWEETALERTS JS -->
        <script src="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <!-- @vite('resources/assets/js/sweet-alerts.js') -->

<!-- DataTables + Plugins -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.7.0/js/dataTables.colReorder.min.js"></script>


        

<script>
let encrypt = '{{$token}}';
let baseUrl = "{{ config('app.api_base_url') }}";
let user_id = "{{$user_id}}";
let id = "{{ $user_id }}";
let roles_id = "{{ $roles_id }}";




$("#searchBtn").on('click',function(){
    
    let manager = $("#manager").val();
    let status = $("#status").val();
    
    
    if(manager === null){
        showToast("bg-danger","Manager Not Found","SELECT MANAGER FROM LIST");
        return
    }
    
    if(status === null){
        status = "1";
    }
    
    
      if(status === "1"){
        status = 'online';
    }else{
        status = 'offline';
    }
    
    if(status == "offline"){
         $("#logintime_txt").text("LAST LOGIN");
        $("#uptime_txt").text("DOWN TIME");
    }else{
         $("#logintime_txt").text("LOGIN TIME");
       $("#uptime_txt").text("UP TIME");
    }

    
    if(manager === "0"){
        load_datatable(user_id,0,status);
    }else{
        load_datatable(manager,1,status);
    }
    
   
    
  
    
    
    
});

load_datatable(user_id,1,'online');


$.extend(true, $.fn.dataTable.Buttons.defaults, {
    dom: {
        button: {
            className: 'btn btn-primary' // only primary
        }
    }
});

function load_datatable(manager_id,all,status){
    
     if ($.fn.dataTable.isDataTable('#datatable-basic')) {
                    $('#datatable-basic').DataTable().clear().destroy();
                }
                
                
    $('#datatable-basic').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 10,
     colReorder: true,
    "stateSave": true,
     dom: 'Bfrtip',  
    buttons: [   
        {
            extend: "colvis",
            className: "btn btn-primary"
        },
        {
            text: 'Page Length',
            className: "btn btn-primary",
            extend: 'collection',
            buttons: [
                {
                    text: '10 rows',
                    action: function (e, dt, node, config) {
                        dt.page.len(10).draw();
                        $('.dt-button-collection').fadeOut(200); // dropdown close
                        $('div.dt-button-background').css('display', 'none');
                    }
                },
                {
                    text: '25 rows',
                    action: function (e, dt, node, config) {
                        dt.page.len(25).draw();
                        $('.dt-button-collection').fadeOut(200); // dropdown close
                        $('div.dt-button-background').css('display', 'none');
                    }
                },
                {
                    text: '50 rows',
                    action: function (e, dt, node, config) {
                        dt.page.len(50).draw();
                        $('.dt-button-collection').fadeOut(200); // dropdown close
                        $('div.dt-button-background').css('display', 'none');
                    }
                },
                {
                    text: '500 rows',
                    action: function (e, dt, node, config) {
                        dt.page.len(500).draw();
                        $('.dt-button-collection').fadeOut(200); // dropdown close
                        $('div.dt-button-background').css('display', 'none');
                    }
                },
                {
                    text: '1000 rows',
                    action: function (e, dt, node, config) {
                        dt.page.len(1000).draw();
                        $('.dt-button-collection').fadeOut(200); // dropdown close
                        $('div.dt-button-background').css('display', 'none');
                    }
                }
            ]
        }
    ],
    ajax: {
        url: baseUrl+"/subscriber_"+status+"_ajax/"+manager_id+"/"+all,
        type: "GET",
        beforeSend: function(xhr) {
            xhr.setRequestHeader("Authorization", "Bearer "+encrypt);
        }
    },
    columns: [
         { 
            data: null,
            orderable: false, // serial pe sorting nahi hogi
            render: function (data, type, row, meta) {
                // meta.row = current row index (0 se start hota hai)
                // meta.settings._iDisplayStart = current page ka start index
                return meta.row + 1 + meta.settings._iDisplayStart;
            }
        },
        { data: "username",
        "render": function(data, type, row, meta) {
                                       
                                                            return `
                                                                <div class="d-flex">
                                                                                
                                                                                <div class="ms-2">
                                                                                    <p class="fw-semibold mb-0 d-flex align-items-center"><a href="/subscriber_info/${row.username}"> ${row.firstname} ${row.lastname}</a></p>
                                                                                    <p class="fs-12 text-muted mb-0">${row.username}</p>
                                                                                </div>
                                                                            </div>
                                                            `;
                                                        }
            
            
            
        },
        { data: "acctstarttime",
        render: function(data, type, row) {
        return data ? data : "Nil";
    }},
        
         { 
    data: null,
    render: function(data, type, row, meta) {
        function updateTimeDifference(acctstarttime) {
            if (!acctstarttime) {
                return "Nil"; // null ya blank ke liye
            }

            const time = new Date(acctstarttime);
            if (isNaN(time.getTime())) {
                return "Invalid"; // agar date format galat hai
            }

            const currentTime = new Date();
            let difference = currentTime - time;

            // Agar future ka time hai (galti se)
            if (difference < 0) {
                return "0s";
            }

            // Difference in milliseconds → breakdown
            let seconds = Math.floor(difference / 1000);
            let minutes = Math.floor(seconds / 60);
            let hours = Math.floor(minutes / 60);
            let days = Math.floor(hours / 24);

            // Remaining parts
            seconds = seconds % 60;
            minutes = minutes % 60;
            hours = hours % 24;

            // Output
            let displayText = "";
            if (days > 0) displayText += `${days}d `;
            if (hours > 0 || days > 0) displayText += `${hours}h `;
            if (minutes > 0 || hours > 0 || days > 0) displayText += `${minutes}m `;
            displayText += `${seconds}s`;

            return displayText.trim();
        }
        
       const b = status === "offline" ? "danger" : "success";

            return `
                <button type="button" class="btn btn-${b}-light btn-sm btn-wave" style="font-size: .65rem;">
                    ${updateTimeDifference(row.acctstarttime)}
                </button>
            `;
                }
            },
        { data: "acctinputoctets",
             "render": function(data, type, row, meta) {
                                         function formatBytes(bytes) {
                                              if (!bytes) {
                return "Nil"; // null ya blank ke liye
            }
                                            const sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
                                            if (bytes === 0 || bytes === null) return '0 B';
                                            const i = Math.floor(Math.log(bytes) / Math.log(1024));
                                            const result = (bytes / Math.pow(1024, i)).toFixed(2); // 2 decimal places
                                            return `${result} ${sizes[i]}`;
                                        }
                                        return `
                                           <div class="d-flex align-items-center gap-1">
                                                            
                                                                 <button type="button" class="btn btn-warning-light btn-sm btn-wave" style="font-size: .65rem;"><i class="bx bx-down-arrow-alt fs-10"></i> ${formatBytes(row.acctoutputoctets)} | ${formatBytes(row.acctinputoctets)} <i class="bx bx-up-arrow-alt fs-10"></i></button>
                                                        </div>
                                        `;
                                    }
        },
        
        { data: "expiration",
          orderable: false, // yeh add kar do
            "render": function(data, type, row, meta) {
                                        
                                        const givenTime = new Date(row.expiration);
                                        const now = new Date();
                                        
                                        // Difference in milliseconds
                                        let diffMilliseconds = now - givenTime;
                                        
                                        // Absolute value le lein taake negative na aaye
                                        diffMilliseconds = Math.abs(diffMilliseconds);
                                        
                                        // Calculate days and hours
                                        const totalHours = Math.floor(diffMilliseconds / (1000 * 60 * 60));
                                        const days = Math.floor(totalHours / 24);
                                        const hours = totalHours % 24;
                                        
                                        // Result string
                                        const result = `${days} day${days !== 1 ? 's' : ''} ${hours} hour${hours !== 1 ? 's' : ''}`;
                                        const badgeClass = row.status === 'active' ? 'btn-success' : 'btn-danger';
                                        
                                        return `
                                        <div class="btn-group"><button class="btn ${badgeClass} btn-sm" style="font-size: .65rem;">${row.expiration}</button></div>
                                            
                                        `;
                                    }
        },
        { data: "framedipaddress",
        render: function(data, type, row) {
        return data ? data : "Nil";
    }},{
    data: "framedipv6address",
    render: function (data, type, row) {
        // Combine IPv6 info
        let ipv6Info = [
            row.framedipv6address,
            row.framedipv6prefix,
            row.delegatedipv6prefix
        ].filter(Boolean).join(" "); // removes null/empty values

        // If all are null/empty, show "Not Assigned"
        if (!ipv6Info) {
            ipv6Info = "Not Assigned";
        }

        return `
            <button type="button" class="btn btn-success-light btn-sm btn-wave" style="font-size: .65rem;">
                ${ipv6Info}
            </button>
        `;
    }
}

         
        
    ,
       {
    data: "nasportid",
    render: function(data, type, row) {
        if (!data) {
            return "Nil";
        } else if (data.length > 20) {
            return "Nil";
        } else {
            return data;
        }
    }
},
        { data: "callingstationid",
        render: function(data, type, row) {
        return data ? data : "Nil";
    }},
    { data: "address"},
      
        {
            data: null,
            "render": function(data, type, row, meta) {
                                        return `
                                             <div class="btn-list">
                                                            <a href="/subscriber_info/${row.username}" class="btn btn-sm btn-warning-light btn-icon"><i class="ri-eye-line"></i></a>
                                                        </div>
                                        `;
                                    }
        }
        
    ]
});
}

 updateValueViaAjax();
   function updateValueViaAjax() {
                    
                      let currentValue = 0; // initial value shown
                    
$.ajax({
                            url: baseUrl+'/subscriber_online_count_main_total/'+user_id+'/'+roles_id,
                            method: 'GET',
                            headers: {
                                'Authorization': "Bearer "+encrypt
                            },
                            beforeSend: function() {
                                // $('#totalValue').addClass('shimmer').text('Loading...');
                            },
                            success: function(response) {
                                // Remove shimmer and update values
                                $('.spinner').hide();
                                $('.online_area').show();
                                $('.spinner1').hide();
                                $('.online_area1').show();
                                animateCount(document.getElementById('totalOnline'), currentValue, response.total_online.total_online, 1000);
                                animateCount(document.getElementById('totalActive'), currentValue, response.total_online.active_users, 1000);
                                animateCount(document.getElementById('totalExpire'), currentValue, response.total_online.expire_users, 1000);
                                animateCount(document.getElementById('totalOffline'), currentValue, response.total_online.offline_users, 1000);
                                
                                
                                //  var total = response.total_online.active_users;
                                //  var offline = response.total_online.offline_users;
                                //  var expire = response.total_online.expire_users;
                                //  var disable = response.total_online.disabled_users;
                                 
                                 let total = Number(response.total_online.active_users);
                                let offline = Number(response.total_online.offline_users);
                                let expire = Number(response.total_online.expire_users);
                                let active = Number(response.total_online.active_users);
                                 
                                 let total_online = total + offline;
                                 let t_f = (total / total_online) * 100;
                                 let t_o = (offline / total_online) * 100;
                                 let a_o = (active / total_online) * 100;
                                 let e_o = (expire / total_online) * 100;
                                 
                                     circle(t_f.toFixed(1),"#111C43","#total-online-circle");  
                                    circle(t_o.toFixed(1),"#808080","#total-offline-circle");
                                    circle(a_o.toFixed(1),"#15ff5e","#total-active-circle");
                                    circle(e_o.toFixed(1),"#ff6565","#total-expire-circle");
                        
                        
                            },
                            error: function() {
                            }
                        });
                        
   }

          
       function animateCount(el, start, end, duration) {
                        let range = end - start;
                        let current = start;
                        let increment = range / (duration / 20); // change every 20ms
                        let timer = setInterval(function () {
                            current += increment;
                            if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                                current = end;
                                clearInterval(timer);
                            }
                            el.textContent = Math.floor(current);
                        }, 20);
                    } 
                    
                    

function circle(percent,color,id){
    
    var options = {
      series: [percent],
      chart: {
        height: 130,
        width: 130,
        type: 'radialBar',
      },
      plotOptions: {
        radialBar: {
          hollow: {
            size: '60%',
          },
          dataLabels: {
            name: {
              show: false // ❌ hide label "Total"
            },
            value: {
              show: true,
              color: '#00E396', // ✅ value text color (change as you like)
              fontSize: '16px',
              fontWeight: 00,
              offsetY: 4,
              formatter: function (val) {
                return val + "%"; // show percentage
              }
            }
          }
        }
      },
      stroke: {
        lineCap: 'round'
      },
      colors: [color] // circle fill color
    };
    
    var chart = new ApexCharts(document.querySelector(id), options);
    chart.render();
    
}
                    
                    
   $(".total_online_tab").on('click',function(){
       load_datatable(user_id,0,'online');
       $("#logintime_txt").text("LOGIN TIME");
       $("#uptime_txt").text("UP TIME");
   });
    $(".total_offline_tab").on('click',function(){
       load_datatable(user_id,0,'offline');
       $("#logintime_txt").text("LAST LOGIN");
       $("#uptime_txt").text("DOWN TIME");
   });
    $(".total_active_tab").on('click',function(){
       load_datatable(user_id,0,'online_active');
       $("#logintime_txt").text("LOGIN TIME");
       $("#uptime_txt").text("UP TIME");
   });
    $(".total_expire_tab").on('click',function(){
       load_datatable(user_id,0,'online_expire');
       $("#logintime_txt").text("LOGIN TIME");
       $("#uptime_txt").text("UP TIME");
   });

// var chart2 = new ApexCharts(document.querySelector("#total-active-circle"), options);
// chart2.render();
    
</script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection
