@extends('layouts.master')

@section('styles')
 
      
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
                        <h1 class="page-title fw-semibold fs-18 mb-0">CREATE SUBSCRIBER</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Create Subscriber</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start::row -->
                    <div class="row">
                        <div class="col-xxl-9 col-xl-8">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Create New Subscriber
                                    </div>                       
                                </div>
                                
                                <form id="subscriber_form" method="POST">
                                <div class="card-body">
                                <div class="alert-container"></div>
                                    <div class="row gy-4 mb-4"> 
                                        <div class="col-xl-6">
                                            <label for="username" class="form-label">Username</label>
                                            <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-user-line"></i></div>
                                                    <input type="text" class="form-control" id="username" placeholder="Type unique username" required>
                                                    <input type="hidden" class="form-control" id="token" value="{{$token}}" required>
                                                </div>
                                            
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-lock-line"></i></div>
                                                    <input type="password" class="form-control" id="password" placeholder="Type password" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                            <div class="input-group">
                                                    <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                    <input type="text" class="form-control" id="firstname" placeholder="Type firstname" required>
                                                    <div class="input-group-text">Firstname</div>
                                                </div>
                                        </div><div class="col-xl-6">
                                            <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                            <div class="input-group">
                                                    <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                    <input type="text" class="form-control" id="lastname" placeholder="Type lastname" required>
                                                    <div class="input-group-text">Lastname</div>
                                                </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <!-- <label for="address" class="form-label">Address</label> -->
                                            <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-map-pin-user-fill"></i></div>
                                                    <input type="text" class="form-control" id="address" placeholder="Type address" required>
                                                    <div class="input-group-text">Address</div>
                                                </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                            <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-smartphone-line"></i></div>
                                                    <input type="number" class="form-control" id="mobile" placeholder="9X XXX XXXXXXX" required>
                                                    <div class="input-group-text">Mobile</div>
                                                </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                            <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-whatsapp-line"></i></div>
                                                    <input type="number" class="form-control" id="phone" placeholder="9X XXX XXXXXXX" required>
                                                    <div class="input-group-text">Whatsapp</div>
                                                    
                                                </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                            <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-mail-line"></i></div>
                                                    <input type="text" class="form-control" id="email" placeholder="abc@gmail.com" required>
                                                    <div class="input-group-text">Email</div>
                                                    
                                                </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                            <div class="input-group">
                                                    <div class="input-group-text"><i class="ri-mail-line"></i></div>
                                                    <input type="text" class="form-control" id="cnic" placeholder="Type national id card #" required>
                                                    <div class="input-group-text">ID Card</div>
                                                    
                                                </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <label class="form-label">Service</label> 
                                            <select class="form-control" data-trigger name="service" id="service">
                                                <option value="" selected disabled>Select Service</option>
                                              
                                                @if(is_array($service) && count($service) > 0)
                                                    @foreach($service as $item)
                                                        <option value="{{ $item['srvid'] }}">{{ $item['service']['srvname'] }}</option>
                                                    @endforeach
                                                @else
                                                    <p>No services available.</p>
                                                @endif
                                            </select>
                                        </div> 
                                        <div class="col-xl-12">
                                            <label for="job-description" class="form-label">Description :</label>
                                            <textarea class="form-control" id="remarks" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                                <button type="submit" id="submitBtn" href="javascript:void(0);" class="btn btn-primary btn-wave waves-effect waves-light">
                                                    <i class="bi bi-plus-circle"></i> Create Subscriber
                                                </button>
                                                <button class="btn btn-primary-light" id="loadingBtn" style="display:none;" type="button" disabled="">
                                                    <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
                                                    Loading...
                                                </button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4">
                          
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Subscriber Details</div>
                                </div>
                                <div class="card-body">
                                    <div class="row gy-3">
                                    <div>
                                                    <h4 class="fw-bold mb-0 d-flex align-items-center"><a href="javascript:void(0);"> <span id="firstname_info">Firstname</span> <span id="lastname_info">Lastname</span> <i class="bi bi-check-circle-fill text-success fs-16" data-bs-toggle="tooltip" aria-label="Verified candidate" data-bs-original-title="Verified candidate"></i></a></h4>
                                                    <a href="javascript:void(0);" class="fw-semibold"><i class="ri-user-line me-1"></i> <span id="username_info">Username</span></a>
                                                   
                                                    <div class="d-flex fs-14 mt-3">
                                                        <div>
                                                            <p class="mb-1"><i class="ri-smartphone-line"></i> <span id="mobile_info">03XX XXXXXXXX</span> </p>
                                                        </div>
                                                        <div style="margin-left: 10px;">
                                                            <p class="mb-1"> <i class="ri-whatsapp-line me-2"></i><span id="whatsapp_info">03XX XXXXXXXX</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex fs-14">
                                                        <div>
                                                            <p class="mb-1"><i class="ri-mail-line me-2"></i>Email: <span id="email_info">Email@gmail.com</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex fs-14">
                                                        <div>
                                                            <p class="mb-1"><i class="ri-file-list-line  me-2"></i>ID Card: <span id="cnic_info">XXXX XXXXXXXX XXXXX</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex fs-14">
                                                        <div>
                                                            <p class="mb-1"><i class="bi bi-geo-alt me-2"></i>Address: <span id="address_info">Address</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex fs-14">
                                                        <div>
                                                            <p class="mb-1"><i class="bi bi-geo-alt me-2"></i>Remarks: <span id="remarks_info">Remarks about subscriber.</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="popular-tags">
                                                        <a href="javascript:void(0);" class="badge rounded-pill bg-info-transparent">Created On</a>
                                                        <a href="javascript:void(0);" class="badge rounded-pill bg-danger-transparent"><i class="bi bi-clock me-1"></i> {{$currentDateTime}}</a>
                                                    </div>
                                                </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End::row- -->

                </div>

@endsection

@section('scripts')
<!-- JQUERY JS -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    
        <!-- DATE & TIME PICKER JS -->
        <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>

        <script>
            let encrypt = $('#token').val();
            let baseUrl = "{{ config('app.api_base_url') }}";


            $("#mobile").on('keyup', function(){
                var mobile = $("#mobile").val();
                $("#mobile_info").html(mobile);
            });
            $("#phone").on('keyup', function(){
                var whatsapp = $("#phone").val();
                $("#whatsapp_info").html(whatsapp);
            });

            $("#username").on('keyup', function(){
                var username = $("#username").val();
                $("#username_info").html(username);
            });

            $("#firstname").on('keyup', function(){
                var firstname = $("#firstname").val();
                $("#firstname_info").html(firstname);
            });
            $("#lastname").on('keyup', function(){
                var lastname = $("#lastname").val();
                $("#lastname_info").html(lastname);
            });
            $("#address").on('keyup', function(){
                var address = $("#address").val();
                $("#address_info").html(address);
            });
            $("#email").on('keyup', function(){
                var email = $("#email").val();
                $("#email_info").html(email);
            });
            $("#cnic").on('keyup', function(){
                var cnic = $("#cnic").val();
                $("#cnic_info").html(cnic);
            });
            $("#description").on('keyup', function(){
                var description = $("#description").val();
                $("#remarks_info").html(description);
            });



            // INSERT DATA
$('#subscriber_form').on('submit', function (e) {
            e.preventDefault();


            // Disable all inputs and buttons
          $('#subscriber_form input, #subscriber_form button').prop('disabled', true);
            $('#submitBtn').hide();
            $('#loadingBtn').show();

          
            // Prepare form data
            let formData = {
                username: $('#username').val(),
                password: $('#password').val(),
                firstname: $('#firstname').val(),
                lastname: $('#lastname').val(),
                address: $('#address').val(),
                mobile: $('#mobile').val(),
                phone: $('#phone').val(),
                email: $('#email').val(),
                cnic: $('#cnic').val(),
                srvid: $('#service').val(),
                remarks: $('#remarks').val(),
            };

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/subscriberadd',  // Replace with your API endpoint
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
                        showToast("bg-success","Subscriber Added.",response.message)
                        $('#subscriber_form')[0].reset();

                        setTimeout(function() {
                            window.location.href = "/subscriber"; // Replace with your desired URL
                        }, 2000);

                    }
                    else if (response.status === 2) {
                        // ALREADY AVALIABLE
                        showToast("bg-warning","Already Available. ",response.message)

                        // alert(response.message);
                    } 
                    else if (response.status === 501) {
                        //RADIUS SERVER ERROR
                        // showAlert(response.message,"danger");
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
                // Hide the Loading button and show the Submit button again

                $('#subscriber_form input, #subscriber_form button').prop('disabled', false);
                $('#loadingBtn').hide();
                $('#submitBtn').show();
                 }
            });
});

        </script>
        
        <!-- JOB POST JS -->
        <!-- @vite('resources/assets/js/jobs-post.js') -->

        <script src="{{ asset('js/function/showalert.js') }}"></script>
        <script src="{{ asset('js/function/toast.js') }}"></script>
@endsection