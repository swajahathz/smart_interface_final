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
                        <h1 class="page-title fw-semibold fs-18 mb-0">RECHARGE INVOICES</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Recharge Invoices</li>
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
                    
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header" style="justify-content: center;">
                                <div class="card-titles d-flex">
                                    <div><label class="form-control">Start Date</label></div>
                                    <div style="margin-right:1rem;"><input type="date" id="sd" class="form-control" value="{{ $startDate }}" /></div>
                                    <div><label class="form-control">End Date</label></div>
                                    <div  style="margin-right:1rem;"><input type="date" id="ed" value="{{ $endDate }}" class="form-control"/></div>
                                    <div><button id="searchBtn" class="btn btn-md btn-primary">Search</button></div>
                                </div>
                                
                                
                            </div>
                            <div class="card-body" id="report_table" style="display:none;">
                                <div class="table-responsive">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Renew Date</th>
                                                <th>TranID</th>
                                                <th>Subscriber</th>
                                                <th>FullName</th>
                                                <th>Last Exp.</th>
                                                <th>New Exp.</th>
                                                <th>Type</th>
                                                <th>Service</th>
                                                <th>Duration</th>
                                                <th>Price</th>
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



$("#searchBtn").on('click',function(){
    
    let sd = $("#sd").val();
    let ed = $("#ed").val();
    let type = $("#type").val();
    
    $("#report_table").show();
    
    load_datatable(id,sd,ed,type);
    
});


    
    
    
    
              function load_datatable(id,sd,ed,type){
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
                            lengthMenu: [[25, 50, 500, 1000], [25, 50, 500, 1000]],
                            pageLength: 25, // optional: sets default to 100 rows
                            "ajax": {
                                "url": baseUrl+"/rechargeinvoice/"+id+"/"+sd+"/"+ed, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "datetime" },
                                { "data": "tranID" },
                                { "data": "username" },
                                { "data": "firstname" },
                                { "data": "lastExpirationDate" },
                                { "data": "newExpirationDate" },
                                { "data": "Invtype" },
                                { "data": "srvname" },
                                { "data": "recharge_type" },
                                { "data": "ownerPrice" },
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
                                    "targets": 2,  // Last column for action buttons
                                    "searchable": true,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            <button type="button" class="btn btn-primary-light btn-sm btn-wave update">${row.tranID}</button>
                                        `;
                                    }
                                },
                                {
                                    "targets": 3,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            
                                            
                                            <div class="d-flex">
                                         
                                                            <div class="ms-2">
                                                            <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <a href="/subscriber_info/${row.username}" class="text-primary fw-semibold">${row.subscriber.username}</a>
                                                            </div>
                                                        </div>
                                        `;
                                    }
                                },
                                {
                                    "targets": 4,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            
                                            
                                            <div class="d-flex">
                                         
                                                            <div class="ms-2">
                                                            <p class="fw-semibold mb-0 d-flex align-items-center"><a href="/subscriber_info/${row.username}">  ${(row.firstname ?? '')} ${(row.subscriber?.lastname ?? '')}</a></p>
                                                            </div>
                                                        </div>
                                        `;
                                    }
                                },
                                {
                                    "targets": 7,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            <button type="button" class="btn btn-success-light btn-sm btn-wave update">${row.invType}</button>
                                        `;
                                    }
                                },
                                {
                                     
    
    
                                    "targets": 9,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                         let rechargeLabel = '';
    if (row.recharge_type == 0) {
        rechargeLabel = 'Days';
    } else if (row.recharge_type == 1) {
        rechargeLabel = 'Days';
    } else if (row.recharge_type == 2) {
        rechargeLabel = 'Days';
    }
                                        return `
                                        <div class="btn-group"><button class="btn btn-success btn-sm" style="font-size: .65rem;">${rechargeLabel}</button><button class="btn btn-success-light btn-sm" style="font-size: .65rem;">${row.qty}</button></div>
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
