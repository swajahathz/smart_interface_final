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
                        <h1 class="page-title fw-semibold fs-18 mb-0">Bug Logs</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bug Logs</li>
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
                                    BUG LOGS LIST
                                </div>
                                <div>
                                      <button class="btn btn-danger btn-sm" id="refresh"> Refresh</button>
                                <div class="modal fade" id="modaldemo8" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Create NAS</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="alert-container"></div>
                                                <form id="nas_form">
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">NAS Name</label>
                                                        <input type="text" id="name" class="form-control form-control-sm" placeholder="Type NAS Name" required>
                                                        <input type="hidden" id="token" value="{{ $token }}"/>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">NAS IP</label>
                                                        <input type="text" id="serverip" class="form-control form-control-sm" placeholder="192.XXX.XXX.XXX" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Secret</label>
                                                        <input type="text" id="secret" class="form-control form-control-sm" placeholder="*********" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Description</label>
                                                        <input type="text" id="description" class="form-control form-control-sm" required>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                                <button class="btn btn-primary-light" id="loadingBtn"  style="display: none;" type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm align-middle" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="update_modal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Update NAS</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="update_nas_form">
                                            <div id="update_modal_body"></div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                                                <button class="btn btn-primary-light" id="updateloadingBtn"  style="display: none;" type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm align-middle" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                            </div>
                                            </form>
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
                                                <th>Pass</th>
                                                <th>Reply</th>
                                                <th>Reason</th>
                                                <th>Mac</th>
                                                <th>Authdate</th>
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
let encrypt = $('#token').val();
let baseUrl = "{{ config('app.api_base_url') }}";
let user_id = "{{$user_id}}";


    $("#refresh").on('click',function(){
        load_datatable();
    });

    load_datatable();
              function load_datatable(){
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
                                "url": baseUrl+"/bad_logs/"+user_id, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "username",
                                
                                    "render": function (data, type, row) {
                                        return `<a href="subscriber_info/${row.username}" class"text-success">${row.username}</a>`;
                                    }
                                        
                                    },
                                { "data": "pass"},
                                { "data": "reply"},
                                { "data": null },
                                { "data": "mac" },
                                { "data": "authdate" },
                                {
                                    "data": "type",
                                    "render": function (data, type, row) {
                                      if (data === "Wrong Password.") {
                                            return `<button data-pass="${row.pass}" data-subscriber="${row.username}" class="btn btn-danger btn-sm logs_change_pass">Set Password</button>`;
                                        } else if (data === "Account Expired") {
                                            return `<a href="subscriber_info/${row.username}" class="btn btn-danger btn-sm openRechargeTab" data-bs-target="#recharge">Recharge Account</a>`;

                                        } else {
                                            return data; // show text normally if not "Wrong Password." or "Account Expired"
                                        }
                                    }
                                }
                                
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
                                    "targets": 4,  // Last column for action buttons
                                    "searchable": true,
                                    "orderable": true,
                                    "render": function(data, type, row, meta) {
                                        return `
                                           <div class="d-flex align-items-center gap-1">
                                                ${row.type ? `<button type="button" class="btn btn-warning btn-sm btn-wave" style="font-size: .65rem;">${row.type}</button>` : ''}
                                            </div>
                                        `;
                                    }
                                }
                            ],
                            "order": [[0, 'asc']],
                            drawCallback: function(settings) {
                            
                        }
                });
              }
              
           
        $(document).on('click', '.logs_change_pass', function() {
    let subscriber = $(this).data('subscriber');
    let pass = String($(this).data('pass'));
    
    changepass(subscriber,pass);
});


function changepass(subscriber_id,pass){
    
     // Prepare form data
    let formData = {
              password: pass,
           };

 
    $.ajax({
                url: baseUrl+'/subscriberpasswordupdatebyname/'+subscriber_id,  // Replace with your API endpoint
                type: 'POST',
                data: JSON.stringify(formData),
                contentType: 'application/json',
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    console.log(response.status);

                    if (response.status === 1) {
                        showToast("bg-success","Password Updated.",response.message)
                        
                      load_datatable();
                        // $('#subscriber_form')[0].reset();

                    }
                    else if (response.status === 501) {
                        //RADIUS SERVER ERROR
                        // showAlert(response.message,"danger");
                        $('#changePassword').modal('hide');
                        showToast("bg-danger","Server error. ",response.message)
                    }
                    else if (response.status === 500) {
                        //RADIUS SERVER ERROR
                        showAlert(response.message,"danger");
                    }
                    else if (response.status === 404) {
                        //RADIUS SERVER ERROR
                        showAlert(response.message,"danger");
                    }
                    
                    
                },
                error: function (xhr, status, error) {
                    console.error(status);
                    showAlert('Something Wrong!',"danger");
                },
                complete: function () {
                 }
            });
    
}
              
    
</script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection
