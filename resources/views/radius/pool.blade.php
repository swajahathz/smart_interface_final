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
                        <h1 class="page-title fw-semibold fs-18 mb-0">POOL CONFIGRATION</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pool List</li>
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
                                    POOL LIST
                                </div>
                                <div>
                                <button type="button" class="btn btn-primary btn-wave btn-sm"  data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8"><i class='bx bx-plus'></i> Add Pool</button>
                                <div class="modal fade" id="modaldemo8" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Create POOL</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="alert-container"></div>
                                                <form id="pool_form">
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Pool Name</label>
                                                        <input type="text" id="name" class="form-control form-control-sm" placeholder="Type Pool Name" required>
                                                        <input type="hidden" id="token" value="{{ $token }}"/>
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
                                                <h6 class="modal-title" id="exampleModalLabel">Update POOL</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="update_pool_form">
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
                                                <th>Pool Name</th>
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


$('#datatable-basic').on('click', '.update', function() {
    $('#update_modal').modal('show');
    $('#updateloadingBtn').show();
    $('#updateBtn').hide();

    

    let id = $(this).data("id");

            $.ajax({
            url: '/update_pool_modal/'+id, // Your API endpoint
            method: 'GET', // Use GET since the route is defined with Route::get
        
            success: function(response) {
                $("#update_modal_body").html(response);
            },
            error: function() {
                Swal.fire("Error!", "An unexpected error occurred.", "error");
            },
            complete: function () {
                // Hide the Loading button and show the Submit button again

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
                    url: baseUrl+'/pooldelete/'+id, // replace with your API URL
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
                        console.log(response);
                        if (response.status === 1) { // Check if status is 1
                            Swal.fire("Deleted!", "Your data has been deleted successfully.", "success");
                            load_datatable();
                        }else if (response.status === 3) { // Check if status is 1
                            Swal.fire(response.message, "error");
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

$('#pool_form').on('submit', function (e) {
            e.preventDefault();


            // Disable all inputs and buttons
          $('#pool_form input, #pool_form button').prop('disabled', true);
            $('#submitBtn').hide();
            $('#loadingBtn').show();

          
            // Prepare form data
            let formData = {
                name: $('#name').val(),
            };

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/pooladd',  // Replace with your API endpoint
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
                        showToast("bg-success","Pool Added.",response.message)
                        $('#modaldemo8').modal('hide');
                        load_datatable();
                        $('#pool_form')[0].reset();
                    } 
                    else if (response.status === 2) {
                        // ALREADY AVALIABLE
                        showAlert(response.message,"warning");

                        // alert(response.message);
                    } 
                    else if (response.status === 501) {
                        //RADIUS SERVER ERROR
                        showAlert(response.message,"danger");
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
                // Hide the Loading button and show the Submit button again

                $('#pool_form input, #pool_form button').prop('disabled', false);
                $('#loadingBtn').hide();
                $('#submitBtn').show();
                 }
            });
});

$('#update_pool_form').on('submit', function (e) {
            e.preventDefault();


            // Disable all inputs and buttons
          $('#update_pool_form input, #update_pool_form button').prop('disabled', true);
            $('#updateBtn').hide();
            $('#updateloadingBtn').show();

            // Prepare form data
            let formData = {
                name: $('#update_name').val(),
            };

            var id = $('#update_id').val();

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/poolupdate/'+id,  // Replace with your API endpoint
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
                        showToast("bg-success","Pool Updated.",response.message)
                        $('#update_modal').modal('hide');
                        load_datatable();
                        $('#pool_form')[0].reset();
                    } 
                    else if (response.status === 2) {
                        // ALREADY AVALIABLE
                        showAlert(response.message,"warning");

                        // alert(response.message);
                    } 
                    else if (response.status === 501) {
                        //RADIUS SERVER ERROR
                        showAlert(response.message,"danger");
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
                // Hide the Loading button and show the Submit button again

                $('#update_pool_form input, #update_pool_form button').prop('disabled', false);
                $('#updateloadingBtn').hide();
                $('#updateBtn').show();
                 }
            });
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
                                "url": baseUrl+"/pool", // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "name" },
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
                                            <button type="button" data-id="${row.pool_id}" class="btn btn-warning btn-sm btn-wave update">Edit</button>
                                            <button type="button" data-id="${row.pool_id}" class="btn btn-danger btn-sm btn-wave alert-confirm">Delete</button>
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
