@extends('layouts.master')

@section('styles')

  
          <!-- SWEETALERTS CSS -->
          <link rel="stylesheet" href="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.css')}}">


        <!-- DATA TABLES CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

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
                        
                        
                        <div class="card custom-card">
                            <div class="card-header" style="justify-content: center;">
                                 <div class="card-titles">
                                    <div class="row">
                                               <div class="col-sm-12 col-xl-4 mb-3">
                                                    <select id="manager" class="form-control">
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
                                                        <select id="status" class="form-control">
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
                                                <th>Username</th>
                                                <th>Address</th>
                                                <th>Expiration</th>
                                                <th>IP Address</th>
                                                <th>Mac</th>
                                                <th>Login time</th>
                                                <th>Uptime</th>
                                                <th>Usage</th>
                                                <th>Action</th>
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

       
        <!-- SWEETALERTS JS -->
        <script src="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        <!-- @vite('resources/assets/js/sweet-alerts.js') -->

           <!-- DATATABLES CDN JS -->
           <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        

<script>
let encrypt = '{{$token}}';
let baseUrl = "{{ config('app.api_base_url') }}";
let user_id = "{{$user_id}}";

$('#datatable-basic').on('click', '.update', function() {
    $('#update_modal').modal('show');
    $('#updateloadingBtn').show();
    $('#updateBtn').hide();

    

    let id = $(this).data("id");

            $.ajax({
            url: '/update_nas_modal/'+id, // Your API endpoint
            method: 'GET', // Use GET since the route is defined with Route::get
        
            success: function(response) {
                $("#update_modal_body").html(response);
            },
            error: function() {
                Swal.fire("Error!", "An unexpected error occurred.", "error");
            },
            complete: function () {
                // Hide the Loading button and show the Submit button again

                // $('#nas_form input, #nas_form button').prop('disabled', false);
                $('#updateloadingBtn').hide();
                $('#updateBtn').show();
                 }
        });
});




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

    
    if(manager === "0"){
        load_datatable(user_id,0,status);
    }else{
        load_datatable(manager,1,status);
    }
    
   
    
  
    
    
    
});



    load_datatable(user_id,1,'online');
    
              function load_datatable(manager_id,all,status){
// Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#datatable-basic')) {
                    $('#datatable-basic').DataTable().clear().destroy();
                }
                // basic datatable
              $('#datatable-basic').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/subscriber_"+status+"/"+manager_id+"/"+all, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "username" },
                                { "data": "user_detail.address" },
                                { "data": "username" },
                                { "data": "ipaddress"},
                                { "data": "mac"},
                                { "data": "acctstarttime" },
                                { "data": null },
                                { "data": null },
                                { "data": null }
                            ],
                            "columnDefs": [
                                {
                                    "targets": 0,  // Target the first column for serial number
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return meta.row + 1; // Generate serial number based on row index
                                    }
                                },
                                {
                                    "targets": 3,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": true,
                                    "render": function(data, type, row, meta) {
                                        
                                        const givenTime = new Date(row.user_detail.expiration);
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
                                        const badgeClass = row.user_detail.status === 'active' ? 'btn-success' : 'btn-danger';
                                        const types = row.user_detail.status === 'active' ? 'Left' : 'ago';
                                        
                                        return `
                                        <div class="btn-group"><button class="btn ${badgeClass} btn-sm" style="font-size: .65rem;">${row.user_detail.expiration}</button></div>
                                            
                                        `;
                                    }
                                },
                                {
                                    "targets": 7,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            <button type="button" class="btn btn-success btn-sm btn-wave" style="font-size: .65rem;">Calculating..</button>
                                        `;
                                    }
                                },
                                {
                                    "targets": 1,  // Last column for action buttons
                                    "searchable": true,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        const initials = (
  (row.firstname?.charAt(0) || '') + 
  (row.lastname?.charAt(0) || '')
).toUpperCase();
                                        const ed = row.user_detail.subscriber_enable === 1 ? 'bg-success-transparent' : 'bg-danger-transparent';
                                        return `
                                            <div class="d-flex">
                                                            
                                                            <div class="ms-2">
                                                                <p class="fw-semibold mb-0 d-flex align-items-center"><a href="/subscriber_info/${row.username}"> ${row.user_detail.firstname} ${row.user_detail.lastname}</a></p>
                                                                <p class="fs-12 text-muted mb-0">${row.username}</p>
                                                            </div>
                                                        </div>
                                        `;
                                    }
                                },
                                {
                                    "targets": 8,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        const oClass = row.user_detail.subscriber_enable === 1 ? '<span class="badge bg-success-transparent">Enable</span>' : '<span class="badge bg-danger-transparent">Disable</span>';
                                        // return `
                                        //     <span class="badge ${badgeClass}" style="font-size:1em;">${row.expiration}</span>
                                        // `;
                                        return `
                                           <div class="d-flex align-items-center gap-1">
                                                            
                                                                 <button type="button" class="btn btn-warning btn-sm btn-wave" style="font-size: .65rem;"><i class="bx bx-down-arrow-alt fs-10"></i> ${formatBytes(row.download)} | ${formatBytes(row.upload)} <i class="bx bx-up-arrow-alt fs-10"></i></button>
                                                        </div>
                                        `;
                                    }
                                },
                                {
                                    "targets": -1,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                             <div class="btn-list">
                                                            <a href="/subscriber_info/${row.user_detail.username}" class="btn btn-sm btn-warning-light btn-icon"><i class="ri-eye-line"></i></a>
                                                        </div>
                                        `;
                                    }
                                }
                            ],
                            "order": [[0, 'asc']],
                            drawCallback: function(settings) {
                            setInterval(updateTimeDifference, 1000);
                        }
                });
              }
              
              function formatBytes(bytes) {
                const sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
                if (bytes === 0 || bytes === null) return '0 B';
                const i = Math.floor(Math.log(bytes) / Math.log(1024));
                const result = (bytes / Math.pow(1024, i)).toFixed(2); // 2 decimal places
                return `${result} ${sizes[i]}`;
            }
              
              
              function updateTimeDifference() {
                  
                    const rows = document.querySelectorAll("#datatable-basic tbody tr");
                    // Ab ka time
                    rows.forEach(row => {
                        if (!row.cells[6]) return;
                    
                         const timeCell = row.cells[6].textContent;
                         const time = new Date(timeCell);
                          var currentTime = new Date();

                        // Difference in milliseconds
                        var difference = currentTime - time;
                
                        // Calculate time components
                        var seconds = Math.floor(difference / 1000);
                        var minutes = Math.floor(seconds / 60);
                        var hours = Math.floor(minutes / 60);
                        var days = Math.floor(hours / 24);
                
                        // Remaining time
                        seconds = seconds % 60;
                        minutes = minutes % 60;
                        hours = hours % 24;
                
                        // Create short-form output
                        let displayText = "";
                        if (days > 0) displayText += `${days}d `;
                        if (hours > 0 || days > 0) displayText += `${hours}h `;
                        if (minutes > 0 || hours > 0 || days > 0) displayText += `${minutes}m `;
                        displayText += `${seconds}s`;
                    
                    
                        if (row.cells[6]) {
                                row.cells[7].innerHTML = '<button type="button" class="btn btn-success btn-sm btn-wave" style="font-size: .65rem;">'+displayText.trim()+'</button>';
                            }
                
                    
                    });
                }
              
    
</script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection
