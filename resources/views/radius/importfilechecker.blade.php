@extends('layouts.master')

@section('styles')

  
          <!-- SWEETALERTS CSS -->
          <link rel="stylesheet" href="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.css')}}">


        <!-- DATA TABLES CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
        <style>
            .success_card{
                background-color: #ff00001f;
            }
            
            .reject_card{
                background-color: #0ee9001f;
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
                        <h1 class="page-title fw-semibold fs-18 mb-0">SUBSCRIBER FILE IMPORT CHECKER</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Subscrbier Import Checker</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->
                   

                <!-- Start::row-1 -->
                <div class="row">
                    
                    @php
                        use Carbon\Carbon;
                    
                        $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
                        $endDate = Carbon::now()->format('Y-m-d');
                    @endphp
                    
                    <div class="col-xxl-3 col-lg-3 col-md-3" id="success_tab" style="cursor: pointer;">
                                            <div class="card overflow-hidden" id="success_card">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                             <p class="text-muted mb-0">Ready for Import <span style="font-size: 9px;
    color: red;
    font-weight: 600;">(Without Repeated)</span></p>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <h4 id="success" class="fw-semibold mt-1 fs-20">0</h4>
                                                                <button class="btn btn-success btn-sm import_subscriber" style="margin-left:10px;">Import</button>
                                                                <button class="btn btn-success btn-sm import_subscriber_loading" style="margin-left:10px; display:none;"><span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                    <div class="col-xxl-3 col-lg-3 col-md-3" id="repeated_tab" style="cursor: pointer;">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                             <p class="text-muted mb-0">Repeated</p>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <h4 id="repeated" class="fw-semibold mt-1 fs-20">0</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                     <div class="col-xxl-2 col-lg-2 col-md-2"  id="duplicate_tab" style="cursor: pointer;">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Duplicate</p>
                                                                    <h4 id="duplicate" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-xxl-2 col-lg-2 col-md-2" id="special_tab" style="cursor: pointer;">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Special Charector</p>
                                                                    <h4 id="special" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-xxl-2 col-lg-2 col-md-2" id="service_tab" style="cursor: pointer;">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Service Assign Error</p>
                                                                    <h4 id="notassign" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         
                       <div class="col-xl-12">
                        <div class="card custom-card p-3">
                            <h4>Instructions:</h4>
<ul>
    <li>Download the demo file: <a href="/demo.xlsx" class="text-primary">Click Here</a></li>
    <li>The username must start with a lowercase letter.</li>
    <li>The first name can be up to 40 characters long. (Mandatory)</li>
    <li>The Service ID (srvid) is mandatory.</li>
</ul>

                        </div>
                    </div> 
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header" style="justify-content: center;">
                                <div class="card-titles d-flex">
                                      <div><label class="form-control">Select Manager</label></div>
                                    <div  style="margin-right:1rem;">
                                        <select id="manager" class="form-control">
                                           
                                            @if(is_array($manager) && count($manager) > 0)
                                                    @foreach($manager as $item)
                                                        <option value="{{ $item['user_id'] }}">{{ $item['managername'] }} | {{ $item['actype'] }} | <b>{{ $item['totaluser'] }} Subscriber</b></option>
                                                    @endforeach
                                                @else
                                                    <p>No Manager available.</p>
                                                @endif
                                        </select>
                                    </div>
                                    <div  style="margin-right:1rem;">
                                        <input id="file" type="file" class="form-control" />
                                    </div>
                                    <div><button id="uploadBtn" class="btn btn-md btn-primary">Upload</button></div>
                                </div>
                                
                                
                            </div>
                            <div class="card-body" id="report_table" style="display:none;">
                                <div class="table-responsive">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Mobile</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Service</th>
                                                <th>CNIC</th>
                                                <th>Address</th>
                                                <th>Expiration</th>
                                                <th>Status</th>
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
let encrypt = "{{$token}}";
let baseUrl = "{{ config('app.api_base_url') }}";
let id = "{{ $user_id }}";



$("#uploadBtn").on('click', function () {
    let manager = $("#manager").val();

    let fileInput = $("#file")[0];

    if (fileInput.files.length === 0) {
        showToast("bg-danger","File not found!","Please select a file.")
        return;
    }

    let file = fileInput.files[0];
    let fileSizeMB = file.size / (1024 * 1024); // Convert to MB
    let allowedTypes = ['text/csv', 
                        'application/vnd.ms-excel', // .xls
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']; // .xlsx

    // Check type
    if (!allowedTypes.includes(file.type)) {
        // alert("Only CSV, XLS, or XLSX files are allowed.");
        showToast("bg-danger","File format error!","Only CSV, XLS, or XLSX files are allowed.")
        return;
    }

    // Check size (at least 15 MB)
    if (fileSizeMB > 15) {
        showToast("bg-danger","File size error!","Greater then 15 mb File not accepted.")
        return;
    }


    let formData = new FormData();
    formData.append("file", file);
    formData.append("manager", manager);

    $.ajax({
        url: baseUrl+"/import-subscriber/"+manager,
        type: "POST",
        headers: {
            "Authorization": "Bearer " + encrypt
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            $.ajax({
                    url: baseUrl+'/import-subscriber-list-status/'+id,
                    method: 'POST',
                    headers: {
                        'Authorization': "Bearer " + encrypt
                    },
                    beforeSend: function() {
                        // Show shimmer
                        $('#success').addClass('shimmer').text('Loading...');
                        $('#duplicate').addClass('shimmer').text('Loading...');
                        $('#special').addClass('shimmer').text('Loading...');
                        $('#notassign').addClass('shimmer').text('Loading...');
                        $('#repeated').addClass('shimmer').text('Loading...');
                        
                        
                    },
                    success: function(response) {
                        
                        if(response.ready === 0){
                            $('#success_card').addClass('success_card');
                        }else{
                            $('#success_card').addClass('reject_card');
                            
                        }
                        // Remove shimmer and update values
                        $('#success').removeClass('shimmer').text(response.success+"/"+response.without_repeated);      // e.g. "1,02,890"
                        $('#duplicate').removeClass('shimmer').text(response.duplicate+"/"+response.total);
                        $('#special').removeClass('shimmer').text(response.special+"/"+response.total);
                        $('#notassign').removeClass('shimmer').text(response.service+"/"+response.total);
                        $('#repeated').removeClass('shimmer').text(response.repeated+"/"+response.total);
                        
                        $("#report_table").show();
                        load_datatable(id,0);
                    },
                    error: function(xhr, status, error) {
                                    console.error('AJAX Error:', {
                                        status: status,
                                        error: error,
                                        responseText: xhr.responseText
                                    });
                                
                                }
                });
        },
        error: function (xhr, status, error) {
            console.error("Upload failed:", xhr.responseText);
            alert("Upload failed: " + xhr.responseText);
        }
    });
    
    // Proceed with upload or processing
});

$("#special_tab").on('click',function(){
    load_datatable(id,3);
});

$("#service_tab").on('click',function(){
    load_datatable(id,4);
});

$("#duplicate_tab").on('click',function(){
    load_datatable(id,2);
});
$("#repeated_tab").on('click',function(){
    load_datatable(id,5);
});
$("#success_tab").on('click',function(){
    load_datatable(id,6);
});
    
 $(".import_subscriber").on('click',function(){
    $(".import_subscriber").hide();
    $(".import_subscriber_loading").show();
    
    
    $.ajax({
        url: baseUrl+"/import-subscriber-database-new",
        type: "POST",
        headers: {
            "Authorization": "Bearer " + encrypt
        },
        success: function (response) {
            console.log(response.total);
            
            if(response.total == 0){
                showToast("bg-danger","Subscriber not found!",response.total+ " subscriber import.")
            }else{
                showToast("bg-success","Subscriber Imported!",response.total+ " subscriber import successfully.")
            }
            $(".import_subscriber").show();
         $(".import_subscriber_loading").hide();
        },
        error: function (xhr, status, error) {
            console.error("Upload failed:", xhr.responseText);
            alert("Upload failed: " + xhr.responseText);
        }
    });
}); 
  
  
 
    
    
              function load_datatable(id,type){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#datatable-basic')) {
                    $('#datatable-basic').DataTable().clear().destroy();
                }
                // basic datatable
              $('#datatable-basic').DataTable({
                                                     dom: `
                                <'d-flex justify-content-between align-items-center mb-3'
                                    <'d-flex align-items-center gap-2'lB>
                                    f
                                >
                                rt
                                <'d-flex justify-content-between align-items-center mt-2'
                                    i
                                    p
                                >
                            `, // 'l' is for entries (length menu)
                                buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'],
                                                        language: {
                                                            searchPlaceholder: 'Search...',
                                                            sSearch: '',
                                                        },
                            lengthMenu: [[100, 250, 500, 1000], [100, 250, 500, 1000]],
                            pageLength: 100, // optional: sets default to 100 rows
                            "ajax": {
                                "url": baseUrl+"/import-subscriber-list/"+id+"/"+type, // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "username" },
                                { "data": "password" },
                                { "data": "firstname" },
                                { "data": "lastname" },
                                { "data": "mobile" },
                                { "data": "phone" },
                                { "data": "email" },
                                { "data": "srvid" },
                                { "data": "cnic" },
                                { "data": "address" },
                                { "data": "expiration" },
                                { "data": "status" }
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
                                "targets": 8,
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        let badgeText = '';
                                        let badgecolor = '';
                                        if(row.serviceStatus === 0 && row.service && row.service.srvname){
                                            badgeText = row.service.srvname;
                                            badgecolor = "success";
                                        } else {
                                            badgeText = row.srvid + " Not Found!";
                                            badgecolor = "danger";
                                        }
                                    
                                        return `
                                            <div class="d-flex align-items-center gap-1">
                                                <span class="badge bg-${badgecolor}">${badgeText}</span>
                                            </div>
                                        `;
                                    }
                                },
                                {
                                    "targets": 1,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": true,
                                    "render": function(data, type, row, meta) {
                                        
                                        
                                        let badgeText = '';
                                        let badgecolor = '';
                                        if(row.status === 2){
                                            badgeText = "Duplicate";
                                            badgecolor = "btn-danger";
                                        }else if(row.status === 3){
                                            badgeText = "Special";
                                            badgecolor = "btn-danger";
                                        }else if(row.status === 5){
                                            badgeText = "Repeated";
                                            badgecolor = "btn-danger";
                                        } else {
                                            badgeText = "Avaliabe";
                                            badgecolor = "btn-success";
                                        }
                                        
                                     
                                        return `
                                        <div class="btn-group"><button class="btn ${badgecolor} btn-sm" style="font-size: .65rem;">${row.username}</button><button class="btn ${badgecolor}-light btn-sm" style="font-size: .65rem;">${badgeText}</button></div>
                                            
                                        `;
                                    }
                                    
                                },
                                    {
                                            "targets": 12,
                                            "searchable": true,
                                            "orderable": true,
                                            "render": function(data, type, row, meta) {
                                                let badgeText = '';
                                                let badgeColor = '';
                                        
                                                if (row.status === 2) {
                                                    badgeText = "Duplicate";
                                                    badgeColor = "btn-danger";
                                                } else if (row.status === 3) {
                                                    badgeText = "Special";
                                                    badgeColor = "btn-danger";
                                                }else if (row.status === 5) {
                                                    badgeText = "Skip Repeated Username";
                                                    badgeColor = "btn-danger";
                                                } else if (row.status === 1 && row.serviceStatus === 0) {
                                                    badgeText = "Ready for import";
                                                    badgeColor = "btn-success";
                                                }else if (row.serviceStatus === 1) {
                                                    badgeText = "Service not Assign!";
                                                    badgeColor = "btn-warning";
                                                } else {
                                                    badgeText = "Unknown";
                                                    badgeColor = "btn-secondary";
                                                }
                                        
                                                return `
                                                    <button class="btn ${badgeColor} btn-sm" style="font-size: .65rem;">${badgeText}</button>
                                                `;
                                            
                                                 }
                                    }
                                
                            ],
                            "order": [[0, 'asc']]
                });
              }


    
</script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection
