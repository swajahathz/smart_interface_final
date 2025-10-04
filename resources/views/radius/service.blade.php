@php
    $page_name = "SERVICE";
    $page_name_small = "Service";
    $attribute_name = "service";
@endphp
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
                        <h1 class="page-title fw-semibold fs-18 mb-0">{{ $page_name }} CONFIGRATION</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $page_name_small }} Name List</li>
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
                                    {{ $page_name }} LIST
                                </div>
                                <div>
                                <button type="button" class="btn btn-primary btn-wave btn-sm"  data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8"><i class='bx bx-plus'></i> Add {{$page_name_small}}</button>
                                <div class="modal fade" id="modaldemo8" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Create {{ $page_name_small }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="alert-container"></div>
                                                <form id="{{ $attribute_name}}_form">
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">{{ $page_name_small}} Name</label>
                                                        <input type="text" id="srvname" class="form-control form-control-sm" placeholder="Type {{$page_name_small}} Name" required>
                                                        <input type="hidden" id="token" value="{{ $token }}"/>
                                                    </div>
                                                    

                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">IP POOL</label>
                                                            <select class="form-select" data-trigger name="ippool" id="ippool">
                                                                <option value="">Select IP POOL</option>
                                                              
                                                                        @if(is_array($pool) && count($pool) > 0)
                                                                            @foreach($pool as $item)
                                                                                <option value="{{ $item['pool_id'] }}">{{ $item['name'] }}</option>
                                                                            @endforeach
                                                                        @else
                                                                            <p>No services available.</p>
                                                                        @endif
                                                            </select>
                                                    </div>
                                                    
                                                    
                                                    <div class="mb-3">
                                                        <label for="recipient-name"
                                                            class="col-form-label">POLICY</label>
                                                            <select class="form-select" data-trigger name="policy" id="policy">
                                                                <option value="">Select Policy</option>
                                                              
                                                                        @if(is_array($policy) && count($policy) > 0)
                                                                            @foreach($policy as $item)
                                                                                <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                                                
                                                                                
                                                                            @endforeach
                                                                        @else
                                                                            <option value="0">No Policy</option>
                                                                        @endif
                                                                        <option value="0">No Policy</option>
                                                            </select>
                                                    </div>

                                            

                                                    <div class="input-group mb-3">
                                                            <button type="button" class="btn btn-success">Download Speed</button>
                                                            <button type="button"
                                                                class="btn btn-success dropdown-toggle dropdown-toggle-split"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                <span class="visually-hidden">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                            @for ($value = 1; $value <= 100; $value += ($value < 10 ? 9 : 10))
                                                                <li class="dropdown-item" style="cursor:pointer;" data-speed="{{ $value }}" onclick="downspeed()">{{ $value }} MB</li>
                                                                <hr class="dropdown-divider">
                                                            @endfor

                                                            </ul>
                                                            <input type="number" name="downspeed" class="form-control downspeed" placeholder="Type custom speed in KB"
                                                                aria-label="Text input with segmented dropdown button" required>
                                                        </div>
                                                    

                                                    <div class="input-group mb-3">
                                                        <button type="button" class="btn btn-danger">Upload Speed</button>
                                                        <button type="button"
                                                            class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span class="visually-hidden">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                        @for ($value = 1; $value <= 100; $value += ($value < 10 ? 9 : 10))
                                                        <li class="dropdown-item" style="cursor:pointer;" data-speed="{{ $value }}" onclick="upspeed()">{{ $value }} MB</li>
                                                            <hr class="dropdown-divider">
                                                        @endfor

                                                        </ul>
                                                        <input type="number" name="upspeed" class="form-control upspeed" placeholder="Type custom speed in KB"
                                                            aria-label="Text input with segmented dropdown button" required>
                                                    </div>
                                                    <div class="row">
                                                        <div class="mb-3 col-8">
                                                            <label for="recipient-name"
                                                                class="col-form-label">Package Type</label>
                                                                <select class="form-select" data-trigger name="recharge_type" id="recharge_type">
                                                                    <option value="">Select type</option>
                                                                            <option value="0">Add Month (Fix Price)</option>
                                                                            <option value="1">Add Days (Fix Price)</option>
                                                                            <option value="2">Add Month (Per Day Price)</option>
                                                                            <option value="4">Billing Cycle (Fix Date)</option>
                                                                </select>
                                                        </div>
                                                        <div class="mb-2  col-4">
                                                        <label for="recipient-name"
                                                            class="col-form-label billing_qty" id="">Qty</label>
                                                        <input type="number" name="qty" id="qty" class="form-control form-control" value="1">
                                                       
                                                    </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        
                                                    
                                                    
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Price</label>
                                                        <input type="number" name="price" id="price" class="form-control form-control-sm" value="0.00">
                                                       
                                                    </div>
                                                    
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Srb. Tax</label>
                                                        <input type="number" name="srb" id="srb" class="form-control form-control-sm" value="0.00">
                                                       
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Adv. Tax</label>
                                                        <input type="number" name="adv" id="adv" class="form-control form-control-sm" value="0.00">
                                                       
                                                    </div>
                                                                                        
                                                    </div>
                                                    
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Description</label>
                                                        <input type="text" name="desc" id="desc" class="form-control form-control-sm" placeholder="Type Description" required>
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
                                                <h6 class="modal-title" id="exampleModalLabel">Update {{$page_name_small}}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="update_{{$attribute_name}}_form">
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
                                
                                <div class="modal fade" id="timer_modal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Bandwidth timer</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-header">
                                                <div class="row w-100">
                                                    <div class="col-6">
                                                        <label>Start Time</label>
                                                        <input type="text" class="form-control" name="starttimer" id="starttimer" value="00:00:00" />
                                                         <input type="hidden" class="form-control" name="srvidtimer" id="srvidtimer" />
                                                    </div>
                                                    <div class="col-6">
                                                        <label>End Time</label>
                                                        <input type="text" class="form-control" name="endtimer" id="endtimer" value="24:00:00"/>
                                                    </div>
                                                    <div class="col-12 mt-2 w-100">
                                                        <select class="form-control w-100" name="groupnametimer" id="groupnametimer">
                                                                <option value="">Select Policy</option>
                                                              
                                                                        @if(is_array($policy) && count($policy) > 0)
                                                                            @foreach($policy as $item)
                                                                                <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                                                                
                                                                                
                                                                            @endforeach
                                                                        @else
                                                                            <option value="0">No Policy</option>
                                                                        @endif
                                                            </select>
                                                    </div>
                                                    <div class="col-12 mt-2">
                                                        <button class="btn btn-primary w-100 timersubmit">Submit</button>
                                                        <button class="btn btn-primary-light w-100" id="timerloadingBtn2"  style="display: none;" type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm align-middle" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Group Name</th>
                                                         <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="timerlist"></tbody>
                                            </table>
                                             </div>
                                             
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <!--<button type="submit" class="btn btn-primary" id="updateBtn">Update</button>-->
                                                <button class="btn btn-primary-light" id="timerloadingBtn"  style="display: none;" type="button" disabled>
                                                    <span class="spinner-border spinner-border-sm align-middle" role="status"
                                                        aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                            </div>
                                            
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
                                                <th>{{$page_name_small}} ID</th>
                                                <th>{{$page_name_small}} Name</th>
                                                <th>Descrition</th>
                                                <th>Dl</th>
                                                <th>Ul</th>
                                                <th>IP Pool</th>
                                                <th>Assigned</th>
                                                <th>Subs. T | A | E</th>
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
    function downspeed() {

        var downspeed = $(event.target).data("speed");
        $(".downspeed").val(downspeed * 1024);       
    }

    function upspeed() {

var upspeed = $(event.target).data("speed");
$(".upspeed").val(upspeed * 1024);       
}
</script>
        

<script>
let encrypt = $('#token').val();
let baseUrl = "{{ config('app.api_base_url') }}";

$(document).on("click", ".deletetimer", function () {
    let id = $(this).data('id');
    let srvid = $(this).data('srvid');
     $.ajax({
                url: baseUrl + '/timedelete/'+id,
                type: "POST",
                headers: {
                    'Authorization': 'Bearer ' + encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function(response) {
                    timerlist(srvid);
                    Swal.fire("Deleted!", "Your timer deleted successfully.", "success");
                },
                error: function (xhr) {
                    alert("Error occurred: " + xhr.status);
                    console.log(xhr.responseText);
                }
            });
})

$(document).on('change', '#recharge_type, #update_recharge_type', function() {
    let type = $(this).val();

    if (type === "4") {
        $(".billing_qty").text("Date (1 to 28)");
    } else {
        $(".billing_qty").text("Qty");
    }
});


$(".timersubmit").on('click',function(){
    
    
    let starttime = $("#starttimer").val();
    let endtime = $("#endtimer").val();
    let srvidtimer = $("#srvidtimer").val();
    let groupnametimer = $("#groupnametimer").val();
    
    if (!groupnametimer) {
    alert("Please select group name.");
    $("#groupnametimer").focus();
    return false;
        
    }
    $('#timerloadingBtn2').show();
    $('.timersubmit').hide();
               $.ajax({
                url: baseUrl + '/timeadd',
                type: "POST",
                data: JSON.stringify({
        starttime: starttime,
        endtime: endtime,
        srvid: srvidtimer,
        groupname: groupnametimer
    }),
    contentType: "application/json",
                headers: {
                    'Authorization': 'Bearer ' + encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function(response) {
                    timerlist(srvidtimer); // refresh list
                    $('#timerloadingBtn2').hide();
                    $('.timersubmit').show();
                    Swal.fire("Timer added!", "Your timer successfully added.", "success");
                },
                error: function (xhr) {
                    alert("Error occurred: " + xhr.status);
                    console.log(xhr.responseText);
                    $('#timerloadingBtn2').hide();
                }
            });



    
    
    
});

$('#datatable-basic').on('click', '.timer', function() {
    $('#timer_modal').modal('show');
    $('#timerloadingBtn').show();
    // $('#updateBtn').hide();
$("#timerlist").html("");
    

    let id = $(this).data("id");
    
   $("#srvidtimer").val(id);

        timerlist(id);

            
});

function timerlist(srvid){
    $.ajax({
            url: baseUrl+'/timer/'+srvid, // replace with your API URL
                    method: 'get',
                    data: {
                        // Add any necessary data here
                    },
                    contentType: 'application/json',
                    headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                    success: function(response) {
                        if(response.status != 0){
                            let html = "";
                            response.forEach(function(item, index) {
                            html += `
                                <tr>
                                    <td>${index + 1}</td>   <!-- serial number -->
                                    <td>${item.starttime}</td>
                                    <td>${item.endtime}</td>
                                    <td>${item.groupname}</td>
                                    <td><button class="btn btn-danger-light btn-sm deletetimer" data-id="${item.id}" data-srvid="${item.srvid}">X</button></td>
                                </tr>
                            `;
                        });
                            
                            $("#timerlist").html(html);
                        }else{
                            $("#timerlist").html("");
                        }
                            
                            
                            
            },
            error: function() {
                Swal.fire("Error!", "An unexpected error occurred.", "error");
            },
            complete: function () {
                // Hide the Loading button and show the Submit button again

                $('#timerloadingBtn').hide();
                 }
        });
}

$('#datatable-basic').on('click', '.update', function() {
    $('#update_modal').modal('show');
    $('#updateloadingBtn').show();
    $('#updateBtn').hide();

    

    let id = $(this).data("id");

  

            $.ajax({
            url: '/update_service_modal/'+id, // Your API endpoint
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
                    url: baseUrl+'/servicedelete/'+id, // replace with your API URL
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
                        }if (response.status === 3) { // Check if status is 1
                            Swal.fire(response.message, "error");
                        }
                    },
                    error: function() {
                        Swal.fire("Error!", "An unexpected error occurred.", "error");
                    }
                });
            }
        });
    
});


// INSERT DATA
$('#{{$attribute_name}}_form').on('submit', function (e) {
            e.preventDefault();


            // Disable all inputs and buttons
          $('#{{$attribute_name}}_form input, #{{$attribute_name}}_form button').prop('disabled', true);
            $('#submitBtn').hide();
            $('#loadingBtn').show();

          
            // Prepare form data
            let formData = {
                srvname: $('#srvname').val(),
                descr: $('#desc').val(),
                pool_id: $('#ippool').val(),
                policy_id: $('#policy').val(),
                downrate: $('.downspeed').val(),
                uprate: $('.upspeed').val(),
                basePrice: $('#price').val(),
                srbTax: $('#srb').val(),
                advTax: $('#adv').val(),
                recharge_type: $("#recharge_type").val(),
                qty: $("#qty").val(),
            
            };
            
             // Get pool_id first
            let pool_id = $('#ippool').val();
            
            let policy_id = $('#policy').val();
            
            let recharge_type = $('#recharge_type').val();
            
                     // Validation
            if (pool_id === "" || pool_id === null) {
                showAlert("Please select a valid IP Pool", "warning");
                
                // Re-enable the form
                $('#{{$attribute_name}}_form input, #{{$attribute_name}}_form button').prop('disabled', false);
                $('#submitBtn').show();
                $('#loadingBtn').hide();
                
                return;
            } else if(policy_id === "" || policy_id === null){
                
                 showAlert("Select No Policy if not", "warning");
                
                // Re-enable the form
                $('#{{$attribute_name}}_form input, #{{$attribute_name}}_form button').prop('disabled', false);
                $('#submitBtn').show();
                $('#loadingBtn').hide();
                
                return;
                
            } else if(recharge_type === "" || recharge_type === null){
                
                 showAlert("Please select recharge type", "warning");
                
                // Re-enable the form
                $('#{{$attribute_name}}_form input, #{{$attribute_name}}_form button').prop('disabled', false);
                $('#submitBtn').show();
                $('#loadingBtn').hide();
                
                return;
                
            }



            // Send AJAX request
            $.ajax({
                url: baseUrl+'/serviceadd',  // Replace with your API endpoint
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
                        showToast("bg-success","Service Added.",response.message)
                        $('#modaldemo8').modal('hide');
                        load_datatable();
                        // $('#{{$attribute_name}}_form')[0].reset();

                        $('#srvname').val("");
                        $('#desc').val("");
                        // $('#ippool').val("");
                        $('.downspeed').val("");
                       $('.upspeed').val("");
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

                $('#{{$attribute_name}}_form input, #{{$attribute_name}}_form button').prop('disabled', false);
                $('#loadingBtn').hide();
                $('#submitBtn').show();
                 }
            });
});

$('#update_service_form').on('submit', function (e) {
            e.preventDefault();


            // Disable all inputs and buttons
          $('#update_{{$attribute_name}}_form input, #update_{{$attribute_name}}_form button').prop('disabled', true);
            $('#updateBtn').hide();
            $('#updateloadingBtn').show();

            // Prepare form data
            let formData = {
                srvname: $('#update_srvname').val(),
                descr: $('#update_desc').val(),
                downrate: $('#update_downspeed').val(),
                uprate: $('#update_upspeed').val(),
                custattr: $('#update_attribute').val(),
                pool_id: $('#update_ippool').val(),
                policy_id: $('#update_policy').val(),
                basePrice: $('#update_price').val(),
                srbTax: $('#update_srb').val(),
                advTax: $('#update_adv').val(),
                recharge_type: $('#update_recharge_type').val(),
                qty: $('#update_qty').val(),
               qouta_limit: $('#update_qouta_limit').val(),
                qouta_enable: $('input[name="qouta_enable"]:checked').val(),
            };

            var id = $('#update_id').val();

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/serviceupdate/'+id,  // Replace with your API endpoint
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
                        showToast("bg-success","{{$page_name}} Updated.",response.message)
                        $('#update_modal').modal('hide');
                        load_datatable();
                        $('#{{$attribute_name}}_form')[0].reset();
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

                $('#update_{{$attribute_name}}_form input, #update_{{$attribute_name}}_form button').prop('disabled', false);
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
                                "url": baseUrl+"/service", // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "srvid" },
                                { "data": "srvname" },
                                { "data": "descr" },
                                { "data": "downrate" },
                                { "data": "uprate" },
                                { "data": "pool.name" },
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
                                    "targets": -1,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                //   
                                  
                                  let buttons = '';
                                        
                                         if (row.totaluser == 0) {
                                            buttons += `
                                            <button type="button" data-id="${row.srvid}" class="btn btn-warning btn-sm btn-wave timer">Timer</button>
                                            <button type="button" data-id="${row.srvid}" class="btn btn-warning btn-sm btn-wave update">Edit</button>
                                                <button type="button" data-id="${row.srvid}" class="btn btn-danger btn-sm btn-wave alert-confirm">Delete</button>
                                            `;
                                        }else{
                                            buttons += `
                                            <button type="button" data-id="${row.srvid}" class="btn btn-warning btn-sm btn-wave timer">Timer</button>
                                            <button type="button" data-id="${row.srvid}" class="btn btn-warning btn-sm btn-wave update">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm btn-wave disabled">Delete</button>
                                            `;
                                        }
                                        
                                        return buttons;
                                    },
                                    "createdCell": function(td, cellData, rowData, row, col) {
        $(td).css('text-align', 'center');     // Example: inline style
        $(td).addClass('custom-action-cell');  // Example: custom class
    }
                                },
                                {
                                    "targets": 8,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                  
                                   let buttons = `
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary-light btn-sm btn-wave">${row.totaluser}</button>
                                                <button type="button" class="btn btn-success-light btn-sm btn-wave">${row.totalactiveuser}</button>
                                                <button type="button" class="btn btn-danger-light btn-sm btn-wave">${row.totalexpireuser}</button>
                                            </div>
                                            
                                        `;
                                        return buttons;
                                        
                                        
                                    },
                                    "createdCell": function(td, cellData, rowData, row, col) {
        $(td).css('text-align', 'center');     // Example: inline style
        $(td).addClass('custom-action-cell');  // Example: custom class
    }
                                },
                                {
                                    "targets": 7,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                  
                                   let buttons = `
                                            <button type="button" class="btn btn-info-light btn-sm btn-wave">${row.totalassign}</button>
                                            
                                        `;
                                        return buttons;
                                        
                                        
                                    },
                                    "createdCell": function(td, cellData, rowData, row, col) {
        $(td).css('text-align', 'center');     // Example: inline style
        $(td).addClass('custom-action-cell');  // Example: custom class
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
