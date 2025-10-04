@extends('layouts.master')

@section('styles')

  
          <!-- SWEETALERTS CSS -->
          <link rel="stylesheet" href="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.css')}}">


        <!-- DATA TABLES CSS -->
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
                        <h1 class="page-title fw-semibold fs-18 mb-0">SUBSCRIBER</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Subscriber</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->
                   

                <!-- Start::row-1 -->
                <div class="row">
                    
                    <div class="col-xl-12">
                        <div class="card custom-card">
                             <div class="card-header">
                                <div class="card-titles" style="width: 100%;">
                                    <div class="row">
                                               <div class="col-sm-12 col-md-4 col-xl-4 mb-3 d-flex">
                                                   <div><label class="form-control">Manager</label></div>
                                                    <div  style="margin-right:1rem;">
                                                        <select id="manager" class="form-control">
                                                           
                                                            @if(is_array($manager) && count($manager) > 0)
                                                                    @foreach($manager as $item)
                                                                        <option value="{{ $item['user_id'] }}">{{ $item['managername'] }} | {{ $item['actype'] }} | <b>{{ $item['totaluser'] }} Subscriber</b></option>
                                                                    @endforeach
                                                                @else
                                                                    <p>No Manager available.</p>
                                                                @endif
                                                                 <option value="2">All</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-xl-2 mb-3 mb-3 d-flex">
                                                        <div><label class="form-control">Status</label></div>
                                                        <select id="status" class="form-control">
                                                            <option value="1">All</option>
                                                            <option value="3">Active</option>
                                                            <option value="2">Expire</option>
                                                        </select>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-xl-2 mb-3 mb-3 d-flex">
                                                     <div><label class="form-control">Subscriber</label></div>
                                                    <select id="subscriber" class="form-control">
                                                        <option value="1">All</option>
                                                        <option value="3">Enable</option>
                                                        <option value="2">Disable</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-xl-2 mb-3 mb-3 d-flex">
                                                    <div><label class="form-control">Service</label></div>
                                                    <select id="service" class="form-control">
                                                        <option value="0">All</option>
                                                        @if(is_array($service) && count($service) > 0)
                                                                @foreach($service as $item)
                                                                    <option value="{{ $item['srvid'] }}">{{ $item['service']['srvname'] }}</option>
                                                                @endforeach
                                                            @else
                                                                <p>No services available.</p>
                                                            @endif
                                                    </select>
                                                </div>
                                                <div class="col-sm-12 col-md-2 col-xl-2 mb-3 mb-3">
                                                    <button id="searchBtn" class="btn btn-md btn-primary w-100" style="">Search</button>
                                                    <div>
                                        
                                                     </div>
                                                </div>
                                    </div>
                                    <!--<div><label class="form-control">Select Manager</label></div>-->
                                    <!--<div  style="margin-right:1rem;">-->
                                        
                                    <!--</div>-->
                                    <!--<div><label class="form-control">Status</label></div>-->
                                    <!--<div  style="margin-right:1rem;">-->
                                        
                                    <!--</div>-->
                                    <!--<div><label class="form-control">Subscriber</label></div>-->
                                    <!--<div  style="margin-right:1rem;">-->
                                        
                                    <!--</div>-->
                                    <!-- <div><label class="form-control">Service</label></div>-->
                                    <!--<div  style="margin-right:1rem;">-->
                                        
                                    <!--</div>-->
                                    <!--<div>-->
                                        
                                    <!--</div>-->
                                </div>
                                
                                
                            </div>
                          
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Owner</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                                <th>Phone</th>
                                                <th>Cnic</th>
                                                <th>Service</th>
                                                <th>Expiration</th>
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
let encrypt = '{{ $token }}';
let baseUrl = "{{ config('app.api_base_url') }}";


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

// DELETE FUNCTION
$('#datatable-basic').on('click', '.alert-confirm', function() {
   
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(e => {
            if (e.isConfirmed) {
                // Perform AJAX request here

                let id = $(this).data("id");
                $.ajax({
                    url: baseUrl+'/subscriberdelete/'+id, // replace with your API URL
                    method: 'POST',
                    data: {
                        // Add any necessary data here
                    },
                    contentType: 'application/json',
                    headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                    success: function(response) {
                        if (response.status === 1) { // Check if status is 1
                            Swal.fire("Deleted!", "Your data has been deleted successfully.", "success");
                            load_datatable();
                        } else {
                            Swal.fire("Error!", "There was an issue deleting the data.", "error");
                        }
                    },
                    error: function() {
                        Swal.fire("Error!", "An unexpected error occurred.", "error");
                    }
                });
            }
        });
    
});

$("#searchBtn").on('click',function(){
    
    let manager = $("#manager").val();
    let status = $("#status").val();
    let subscriber = $("#subscriber").val();
    let service = $("#service").val();
    
    load_datatable(manager,status,subscriber,service);
    
});

    load_datatable(1,1,1,0);
              function load_datatable(manager,status,subscriber,service){
// Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#datatable-basic')) {
                    $('#datatable-basic').DataTable().clear().destroy();
                }
                // basic datatable
                        $('#datatable-basic').DataTable({
    processing: true,
    serverSide: true,
    pageLength: 10,
     colReorder: true,
    "stateSave": true,
     dom: 'Bfrtip',  
    buttons: [   
        "copy", "excel",
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
        url: baseUrl+"/subscriber_ajax/"+manager+"/"+status+"/"+subscriber+"/"+service,
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
        { 
            data: "username",   // sorting/searching ke liye bind
            render: function(data, type, row, meta) {
                // Agar sorting ya searching ka request hai, to plain value return karo
                if (type === 'sort' || type === 'filter') {
                    return data;
                }

                const initials = (
                  (row.firstname?.charAt(0) || '') + 
                  (row.lastname?.charAt(0) || '')
                ).toUpperCase();

                const ed = row.subscriber_enable === 1 ? 'bg-success-transparent' : 'bg-danger-transparent';

                return `
                    <div class="d-flex">
                        <div class="lh-1">
                            <span class="avatar avatar-sm avatar-rounded ${ed} fw-semibold">
                                ${initials}
                            </span>
                        </div>
                        <div class="ms-2">
                            <p class="fw-semibold mb-0 d-flex align-items-center">
                                <a href="/subscriber_info/${row.username}">
                                    ${row.firstname} ${row.lastname ? row.lastname : ''}
                                </a>
                            </p>
                            <p class="fs-12 text-muted mb-0">${row.username}</p>
                        </div>
                    </div>
                `;
            }
        },
        { data: "owner.managername",
         render: function(data, type, row, meta) {
                                        const oClass = row.subscriber_enable === 1 ? '<span class="badge bg-success-transparent">Enable</span>' : '<span class="badge bg-danger-transparent">Disable</span>';
                                        // return `
                                        //     <span class="badge ${badgeClass}" style="font-size:1em;">${row.expiration}</span>
                                        // `;
                                        return `
                                           <div class="d-flex align-items-center gap-1">
                                                            
                                                                 <span class="badge bg-warning">${row.owner.managername}</span>
                                                        </div>
                                        `;
                                    }},
        { data: "address"},
        { data: "mobile"},
        { data: "phone"},
        { data: "cnic"},
        { data: "srvid.srvname",
            "render": function(data, type, row, meta) {
                                        return `
                                            <button type="button" class="btn btn-primary-light btn-sm btn-wave" style="font-size: .65rem;">${row.srvid.srvname}</button>
                                        `;
                                    }
        },
        { data: "expiration",
        render: function(data, type, row, meta) {
                                        
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
                                        const types = row.status === 'active' ? 'Left' : 'ago';
                                        
                                        return `
                                        <div class="btn-group"><button class="btn ${badgeClass} btn-sm" style="font-size: .65rem;">${row.expiration}</button><button class="btn ${badgeClass}-light btn-sm" style="font-size: .65rem;">${result} ${types}</button></div>
                                            
                                        `;
                                    }},
                                    {
                                        data:null,
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
              
              
                 $("#checkAl").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
		});


  $(document).on('click', '#bulkdelete', function(){
            
                 $("#bulkdelete").html('<span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>');
            
            
                let selectedUsernames = [];
            
                // Loop through each checked checkbox with name="check[]"
                $("input[name='check[]']:checked").each(function () {
                    selectedUsernames.push($(this).val());
                });
            
                // Show alert with selected usernames
                if (selectedUsernames.length > 0) {
                                let usernames = selectedUsernames;
                    
                                $.ajax({
                                    url: baseUrl+'/subscriberbulkdelete', // Replace with your actual URL
                                    type: 'POST',
                                    headers: {
                                        'Authorization':  "Bearer " + encrypt, // Replace with actual token
                                        'Accept': 'application/json'
                                    },
                                    contentType: 'application/json',
                                    data: JSON.stringify({
                                        usernames: usernames
                                    }),
                                    success: function (response) {
                                        // console.log("Success:", response);
                                         $("#bulkdelete").hide();
                                         load_datatable(1,1,1,0);
                                        //  $("#bulkdelete").html('Bulk Delete');
                                    },
                                    error: function (xhr) {
                                        console.error("Error:", xhr.responseJSON);
                                        alert("Error: " + xhr.responseJSON.message);
                                    }
                                });
                            
                } else {
                    alert("No user selected.");
                     $("#bulkdelete").html('Bulk Delete');
                }
                
        });   
          
    
</script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection
