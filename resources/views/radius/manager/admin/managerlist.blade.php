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

                <div class="container-fluid">

                    <!-- Page Header -->
                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <h1 class="page-title fw-semibold fs-18 mb-0">MANAGERS</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Admin Manager List</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->
                   

                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title">
                                   ALL ADMIN MANAGER LIST
                                </div>
                                <div>
                                 @if ($roles_id == 1)
                                    <button class="btn btn-primary btn-wave btn-sm" onclick="load_manager(2,{{$user_id}},{{$roles_id}});">Admin</button>
                                @elseif ($roles_id == 2)
                                    <button class="btn btn-primary btn-wave btn-sm" onclick='load_manager(3,{{$user_id}},{{$roles_id}});'>Franchise</button>
                                    <button class="btn btn-primary btn-wave btn-sm" onclick="load_manager(4,{{$user_id}},{{$roles_id}});">Dealer</button>
                                    <button class="btn btn-primary btn-wave btn-sm" onclick="load_manager(5,{{$user_id}},{{$roles_id}});">SubDealer</button>
                                    <!--<button class="btn btn-primary btn-wave btn-sm" onclick="load_manager(6,{{$user_id}},{{$roles_id}});">JuniorDealer</button>-->
                                @endif   
                                
                                
                              </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="loadingGif" style="display:none;"><img src="/build/assets/images/jump2.gif"></div>
                                    <table id="manager_table" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Manager</th>
                                                <th>Owned By</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Mobile</th>
                                                <th>Balance</th>
                                                <th>Ref. ID</th>
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
        
        let encrypt = "{{ $token }}";
        let baseUrl = "{{ config('app.api_base_url') }}";
        let loginby = "{{ $user_name }}";
        
        
        // DELETE FUNCTION
$('#manager_table').on('click', '.alert-confirm', function() {
   
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
                let typeid = $(this).data("typeid");
                $.ajax({
                    url: baseUrl+'/managerdelete/'+id, // replace with your API URL
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
                            load_manager(typeid);
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
       let roles_id = {{ $roles_id }};
        let user_id = {{ $user_id }};
    
       load_manager(3, user_id,roles_id);
        
        function load_manager(id,user_id,req_id){
            
            let manager_type = "";
            
            
                 if (id === 3) {
                    manager_type = "admin_name";
                }

                if (id === 4) {
                    manager_type = "franchise_name";
                }
                if (id === 5) {
                    manager_type = "dealer_name";
                }
            
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#manager_table')) {
                    $('#manager_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#manager_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/users/"+id+"/"+user_id+"/"+req_id, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "managername",
                                "render": function(data, type, row, meta) {
                                        return `
                                            <a href="/manager/profile/${row.managername}" style="font-weight: 700;">${row.managername}</a>
                                        `;
                                    }
                                    
                                },
                                { "data": manager_type },
                                { "data": "firstname" },
                                { "data": "lastname" },
                                { "data": "mobile" },
                                { "data": "balance",
                                "render": function(data, type, row, meta) {
                                        return `
                                            <button class="btn btn-sm btn-warning-light"><span style="font-size: medium;
    font-weight: 900;">${row.balance}</span></button>
                                        `;
                                    }
                                },
                                { "data": "ref_id" },
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
                                    "targets": -1,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            <div class="btn-list">
                                             <button class="btn btn-sm btn-danger-light jump" data-user="${row.managername}">Jump</button>
                                                            <a href="/manager/profile/${row.managername}"class="btn btn-sm btn-warning-light btn-icon"><i class="ri-eye-line"></i></a>
                                                            <button class="btn btn-sm btn-danger-light btn-icon alert-confirm" data-id="${row.user_id}" data-typeid="${id}"><i class="ri-delete-bin-line"></i></button>
                                                        </div>
                                        `;
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }  
              
              
             $('#manager_table').on('click', '.jump', function(){
                 
                 
                 let user = $(this).data("user");
                 
                     $.ajax({
                            url: '/jump',
                            method: 'POST',
                            data: {
                                username: user,
                                loginby: loginby,
                            },
                            success: function(response) {
                                console.log(response);
                               if(response === "1"){
                                     // Show loading GIF
                                            $(".loadingGif").show(); // Make sure this ID exists in your HTML
                                    
                                            // Wait for 1 second, then redirect
                                            setTimeout(function() {
                                                window.location.href = "/dashboard";
                                            }, 1000);
                               }
                               else if(response === "2"){
                                   alert("Incorrect Password");
                               }
                            },
                            error: function(xhr) {
                                console.error(xhr.responseText);
                            }
                        });
             })
              
            //   <button class="btn btn-sm btn-danger-light btn-icon alert-confirm" data-id="${row.user_id}" data-typeid="${id}"><i class="ri-delete-bin-line"></i></button>
        </script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection