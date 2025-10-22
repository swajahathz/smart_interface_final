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
                        <h1 class="page-title fw-semibold fs-18 mb-0">UPCOMING EXPIRE SUBSCRIBER</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Upcoming Expire Subscriber</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->
                   

                <!-- Start::row-1 -->
                <div class="row">
                     @php
                        use Carbon\Carbon;
                    
                        $startDate = Carbon::now()->format('Y-m-d');
                        $endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
                    @endphp
                    
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header" style="justify-content: center;">
                                <div class="card-titles d-flex">
                                     <div><label class="form-control">TYPE</label></div>
                                    <div  style="margin-right:1rem;"><select id="type" class="form-control"><option value="1">3 Days Expire</option><option value="2">5 days Expire</option><option value="3">7 Days Expire</option><option value="4">By Date</option></select></div>
                                    <div class="date_select" style="display:none;"><label class="form-control">Start Date</label></div>
                                    <div class="date_select" style="margin-right:1rem;display:none;"><input type="date" id="sd" class="form-control" value="{{ $startDate }}" /></div>
                                    <div class="date_select" style="display:none;"><label class="form-control">End Date</label></div>
                                    <div class="date_select" style="margin-right:1rem; display:none;"><input type="date" id="ed" value="{{ $endDate }}" class="form-control"/></div>
                                   
                                    <div class="date_select" style="display:none;"><button id="searchBtn" class="btn btn-md btn-primary">Search</button></div>
                                </div>
                                
                                
                            </div>
                            <div class="">
                            
                                <div>
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



                              
                            
                            </div>
                                    
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="resultTable" class="mb-3"></div>
                                    <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                 <th>#</th>
                                                <th>User</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                                <th>Service</th>
                                                <th>Expiration</th>
                                                <th>Amount</th>
                                                <th>Need Topup</th>
                                                <th>Action</th>
                                                <th><input type="checkbox" id="checkAl"></th>
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

$("#type").on('change',function(){
    let type = $("#type").val();
    document.getElementById("resultTable").innerHTML = "";
    
    if(type != 4){
        load_datatable(type);
    }else{
        
        $(".date_select").show();
        
    }
})

$("#searchBtn").on('click',function(){
    let type = $("#type").val();
    let sd = $("#sd").val();
    let ed = $("#ed").val();
    
    load_datatable(type,sd,ed);
})

    load_datatable(1);
              function load_datatable(types,sd,ed){
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
                            `, // 'B' is for Buttons
                                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print',
                                        {
                                            text: 'Bulk Charge',
                                            className: 'btn btn-primary', // optional styling class
                                            attr: {
                                                id: 'myCustomBtn' // custom ID for JavaScript control
                                            }
                                        }
                                    ],
                                pageLength: 10,
                                ajax: {
                                    url: baseUrl + "/subscriberupcomingexpire",
                                    type: "POST",
                                    contentType: "application/json", // Ensure it's sent as JSON
                                    dataSrc: "", // Adjust based on your API response, use "data" if needed
                                    data: function(d) {
                                        const type = types; // Assume you have a dropdown/input for `type`
                                        const payload = {
                                            type: parseInt(type)
                                        };
                            
                                        // Conditionally include date range
                                        if (payload.type === 4) {
                                            payload.startdate = sd;
                                            payload.enddate = ed;
                                        }
                            
                                        return JSON.stringify(payload); // Send as raw JSON
                                    },
                                    beforeSend: function(xhr) {
                                        xhr.setRequestHeader("Authorization", "Bearer " + encrypt);
                                    }
                                },
                                columns: [
                                    { "data": null },  // For serial number
                                { "data": "username","searchable": true },
                                { "data": "address","searchable": true },
                                { "data": "mobile","searchable": true },
                                { "data": null},
                                { "data": null },
                                { "data": "totalPrice" },
                                { "data": "total_card_amount" },
                                { "data": null },
                                { "data": null }
                                ],
                                columnDefs: [
                                    {
                                        targets: 0,
                                        searchable: false,
                                        orderable: false,
                                        render: function(data, type, row, meta) {
                                            return meta.row + 1;
                                        }
                                    },
                                {
                                    "targets": 5,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": true,
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
                                        const types = row.status === 'active' ? 'Left' : 'ago';
                                        
                                        return `
                                        <div class="btn-group"><button class="btn ${badgeClass} btn-sm" style="font-size: .65rem;">${row.expiration}</button><button class="btn ${badgeClass}-light btn-sm" style="font-size: .65rem;">${result} ${types}</button></div>
                                            
                                        `;
                                    }
                                },
                                {
                                    "targets": 4,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            <button type="button" class="btn btn-primary-light btn-sm btn-wave" style="font-size: .65rem;">${row.srvid.srvname}</button>
                                        `;
                                    }
                                },
                                {
                                    "targets": 2,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            ${row.address}
                                        `;
                                    
                                    },
                                    "createdCell": function(td, cellData, rowData, row, col) {
        $(td).css('white-space', 'normal');     // Example: inline style
        $(td).addClass('custom-action-cell');  // Example: custom class
    }
                                },
                                {
                                    "targets": 1,  // Last column for action buttons
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
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
                                                                <p class="fw-semibold mb-0 d-flex align-items-center"><a href="/subscriber_info/${row.username}"> ${row.firstname} ${row.lastname}</a></p>
                                                                <p class="fs-12 text-muted mb-0">${row.username}</p>
                                                            </div>
                                                        </div>
                                        `;
                                    }
                                },
                                    {
                                        targets: 1,
                                        searchable: true,
                                        orderable: false,
                                        render: function(data, type, row, meta) {
                                          const initials = (
  (row.firstname?.charAt(0) || '') + 
  (row.lastname?.charAt(0) || '')
).toUpperCase();
                                            const ed = row.subscriber_enable === 1 ? 'bg-success-transparent' : 'bg-danger-transparent';
                                            return `
                                                <div class="d-flex">
                                                    <div class="lh-1">
                                                        <span class="avatar avatar-sm avatar-rounded ${ed} fw-semibold">${initials}</span>
                                                    </div>
                                                    <div class="ms-2">
                                                        <p class="fw-semibold mb-0 d-flex align-items-center">
                                                            <a href="/subscriber_info/${row.username}">${row.firstname} ${row.lastname}</a>
                                                        </p>
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
                                        return `
                                             <div class="btn-list">
                                                            <a href="/subscriber_info/${row.username}" class="btn btn-sm btn-warning-light btn-icon"><i class="ri-eye-line"></i></a>
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
                                             <input type="checkbox" id="checkItem" name="check[]" value="${row.username}">
                                        `;
                                    }
                                }
                                ],
                                order: [[0, 'asc']]
                            });

              }
              
              
              $("#checkAl").click(function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
		});



     $(document).on('click', '#myCustomBtn', function(){
            
                 $("#myCustomBtn").html('<span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>');
            
            
                let selectedUsernames = [];
            
                // Loop through each checked checkbox with name="check[]"
                $("input[name='check[]']:checked").each(function () {
                    selectedUsernames.push($(this).val());
                });
            
                // Show alert with selected usernames
                if (selectedUsernames.length > 0) {
                                let usernames = selectedUsernames;
                    
                                $.ajax({
                                    url: baseUrl+'/bulk-charge-subscriber-add', // Replace with your actual URL
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
                                         $("#myCustomBtn").hide();
                                          let html = `<h4>${response.message}</h4>`;

    // ✅ Success Table
    if (response.success.length > 0) {
        html += `
            <h5 style="color: green;">Transaction Successfull (${response.success.length})</h5>
            <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%; margin-bottom: 20px;">
                <thead>
                    <tr style="background-color: #e0ffe0;">
                        <th>Username</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
        `;
        response.success.forEach(entry => {
            html += `
                <tr>
                    <td>${entry.username}</td>
                    <td>${entry.reason}</td>
                </tr>
            `;
        });

        html += `
                </tbody>
            </table>
        `;
    }

    // ❌ Failed Table
    if (response.failed.length > 0) {
        html += `
            <h5 style="color: red;">Transaction Failed (${response.failed.length})</h5>
            <table border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr style="background-color: #ffe0e0;">
                        <th>Username</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
        `;
        response.failed.forEach(entry => {
            html += `
                <tr>
                    <td>${entry.username}</td>
                    <td>${entry.reason}</td>
                </tr>
            `;
        });

        html += `
                </tbody>
            </table>
        `;
    }

    // Display the content inside the div
    document.getElementById("resultTable").innerHTML = html;
                                    },
                                    error: function (xhr) {
                                        console.error("Error:", xhr.responseJSON);
                                        alert("Error: " + xhr.responseJSON.message);
                                    }
                                });
                            
                } else {
                    alert("No user selected.");
                     $("#myCustomBtn").html('Bulk Charge');
                }
                
        });   
                
                
            


    
</script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection
