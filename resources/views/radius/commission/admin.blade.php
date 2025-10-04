@extends('layouts.master')

@section('styles')
 
 <style>
     .shimmer {
  background: linear-gradient(
    to right,
    #f6f7f8 0%,
    #edeef1 20%,
    #f6f7f8 40%,
    #f6f7f8 100%
  );
  background-size: 800px 104px;
  position: relative;
  animation: shimmer 1.5s infinite linear;
  color: transparent;
  border-radius: 4px;
}

@keyframes shimmer {
  0% {
    background-position: -800px 0;
  }
  100% {
    background-position: 800px 0;
  }
}

 </style>
      
@endsection

@section('content')

                <div class="container-fluid">

                    <!-- Start::page-header -->

                    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
                        <!--<div>-->
                        <!--    <p class="fw-semibold fs-18 mb-0">Welcome back, {{ $firstname.' '.$lastname }} !</p>-->
                        <!--    <span class="fs-semibold text-muted">Track your subscriber activity here.</span>-->
                        <!--</div>-->
                        <!--<div class="btn-list mt-md-0 mt-2">-->
                        <!--    <button type="button"  class="btn btn-primary btn-wave">-->
                        <!--        <div id="wallet_balance" style="display:none;margin:0;"></div><span class="spinner-border spinner-border-sm align-middle balance_loading" role="status" aria-hidden="true"></span>-->
                        <!--    </button>-->
                        <!--    <button type="button" class="btn btn-outline-secondary btn-wave" id="pending_commission">-->
                        <!--        <span class="spinner-border spinner-border-sm align-middle balance_loading" role="status" aria-hidden="true"></span>-->
                        <!--    </button>-->
                        <!--</div>-->
                    </div>

                    <!-- End::page-header -->

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12">
                            <div class="row">
                                
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xxl-3 col-lg-3 col-md-3">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">This Month</p>
                                                                    <h4 id="thismonth" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-xxl-3 col-lg-3 col-md-3">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Last Month</p>
                                                                    <h4 id="lastmonth" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-xxl-3 col-lg-3 col-md-3">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">All Time</p>
                                                                    <h4 id="alltime" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-xxl-3 col-lg-3 col-md-3" data-bs-toggle="modal" href="#commission_modal">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                             <p class="text-muted mb-0">Pending Commission</p>
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <h4 id="pending" class="fw-semibold mt-1 fs-20">0</h4>
                                                                <button class="btn btn-success btn-sm collect_commission" style="margin-left:10px;">Collect</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="modal fade" id="commission_modal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h6 class="modal-title" id="exampleModalLabel">Create Invoice</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="col-xl-12 recharge_card">
                                                        <div class="card custom-card">
                                                            <div class="card-body">
                                                            <div class="row gy-3">
                                                                
                                                                <div class="col-xl-12"> <div class="alert-container"></div></div>
                                                                <div class="col-xl-6">
                                                                    
                                                                    <p class="fw-semibold text-muted mb-1">Transaction ID :</p>
                                                                    <p class="fs-15 mb-1">#@php
                                                                                                $tranID = bin2hex(random_bytes(6));
                                                                                            @endphp
                                                                                            
                                                                                            {{ $tranID }}</p>
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <p class="fw-semibold text-muted mb-1">Invoice Date</p>
                                                                    <p class="fs-15 mb-1">{{ $currentDateTime->format('d,M Y') }}</p>
                                                                </div>
                                                                <div class="col-xl-12 commission_card" style="padding: 5px;
    background-color: #f7f7f7;">
                                                                   <p>Note: This action will collect all pending commissions. Any new commissions generated after this time will remain pending.</p>
                                                                </div>
                                                                 <div class="col-xl-12 tran_card_success" style="display:none;height: 50vh;justify-content: center;
                                                                        align-items: center;flex-direction: column;">
        
                                                               <div class="mb-3">
                                                                   <span class="avatar avatar-md avatar-rounded bg-success" style="width: 5rem;height: 5rem;">
                                                                      <i class='bx bx-check' style="    color:rgb(255, 255, 255);font-size: 30px;"></i>
                                                                    </span>
                                                                </div>
                                                               <div style="text-align:center;cursor: pointer;" onclick="location.reload();"><h5>Transaction Successful.</h5><br><i class='bx bx-refresh'></i> Click for Refresh your page.</div>
                                                                
                                                            </div>
                                                            <div class="col-xl-12 tran_card" style="display:none;height: 50vh;justify-content: center;
                                                                        align-items: center;flex-direction: column;">
        
                                                               <div class="mb-3">
                                                                   <span class="avatar avatar-md avatar-rounded bg-warning" style="width: 5rem;height: 5rem;">
                                                                      <i class='bx bx-loader bx-spin' style="    color:rgb(255, 255, 255);font-size: 30px;"></i>
                                                                    </span>
                                                                </div>
                                                               <div>Transaction Processing...</div>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                            <div class="card-footer text-end">
                                                                <button class="btn btn-success collect_commissionBtn" data-receiver="{{ $user_id }}" data-tranId="{{$tranID}}">Collect Commission</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                         @php
                        use Carbon\Carbon;
                    
                        $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
                        $endDate = Carbon::now()->format('Y-m-d');
                    @endphp
                                        
                                        
                                        <div class="col-xxl-12 col-lg-12 col-md-12">
                                            <div class="card custom-card overflow-hidden">
                                               <div class="card-header" style="justify-content: center;">
                                <div class="card-titles d-flex">
                                    <div><label class="form-control">Start Date</label></div>
                                    <div style="margin-right:1rem;"><input type="date" id="sd" class="form-control" value="{{ $startDate }}" /></div>
                                    <div><label class="form-control">End Date</label></div>
                                    <div  style="margin-right:1rem;"><input type="date" id="ed" value="{{ $endDate }}" class="form-control"/></div>
                                    <div><label class="form-control">Status</label></div>
                                    <div  style="margin-right:1rem;"><select id="status" class="form-control"><option value="0">All</option><option value="1">Recevied</option><option value="2">Pending</option></select></div>
                                    <div><button id="searchBtn" class="btn btn-md btn-primary">Search</button></div>
                                </div>
                                
                                
                            </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="card custom-card">
                                                <div class="card-body" id="report_table" style="display:none;">
                                                        <div class="table-responsive">
                                                            <table id="datatable-basic" class="table table-bordered text-nowrap w-100">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>DateTime</th>
                                                                        <th>TranID</th>
                                                                        <th>Owner</th>
                                                                        <th>Subscriber</th>
                                                                        <th>Commission</th>
                                                                        <th>Commission<br>Total</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End::row-1 -->

                </div>

@endsection

@section('scripts')
            <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
            <script src="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
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
        // let encrypt = "";
        var encrypt = 'Bearer ' + '{{$token}}';
        let baseUrl = "{{ config('app.api_base_url') }}";
        let id = "{{ $user_id }}";
        let roles_id = "{{ $roles_id }}";
        
        
        
           $.ajax({
                    url: baseUrl+'/commissiondashboard',
                    method: 'POST',
                    headers: {
                        'Authorization': encrypt
                    },
                    beforeSend: function() {
                        // Show shimmer
                        $('#thismonth').addClass('shimmer').text('Loading...');
                        $('#lastmonth').addClass('shimmer').text('Loading...');
                        $('#alltime').addClass('shimmer').text('Loading...');
                        $('#pending').addClass('shimmer').text('Loading...');
                        
                        
                    },
                    success: function(response) {
                        // Remove shimmer and update values
                        $('#thismonth').removeClass('shimmer').text(response.thismonth);      // e.g. "1,02,890"
                        $('#lastmonth').removeClass('shimmer').text(response.lastmonth);
                        $('#alltime').removeClass('shimmer').text(response.alltime);
                        $('#pending').removeClass('shimmer').text(response.pending);
                    },
                    error: function(xhr, status, error) {
                                    console.error('AJAX Error:', {
                                        status: status,
                                        error: error,
                                        responseText: xhr.responseText
                                    });
                                
                                    // You can also show it on screen or log it for debugging
                                    $('#thismonth').removeClass('shimmer').text('Error: ' + error);
                                    $('#lastmonth').removeClass('shimmer').text('');
                                    $('#alltime').removeClass('shimmer').text('');
                                    $('#pending').removeClass('shimmer').text('');
                                }
                });
        
        
      
        
        
        $("#searchBtn").on('click',function(){
            
            let sd = $("#sd").val();
            let ed = $("#ed").val();
            let status = $("#status").val();
            
             load_datatable(sd,ed,status,1,1);
             
             $("#report_table").show();
            
        });
        

        
        
        
        function load_datatable(sd,ed,status){
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
                                "url": baseUrl+"/commissionreport/"+sd+"/"+ed+"/"+status+"/1/1", // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "date" },
                                { "data": "tranId" },
                                { "data": "user_id_name" },
                                { "data": "username" },
                                { "data": "adminCommission" },
                                { "data": "total_commission_amount" },
                                { "data": "adminCommission" }
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
                                    "searchable": true,
                                    "orderable": true,
                                    "render": function(data, type, row, meta) {
                                    
                                        
                                        return `
                                        <div class="btn-group"><button class="btn btn-primary btn-sm" style="font-size: .65rem;">${row.user_id_name}</button><button class="btn btn-primary-light btn-sm" style="font-size: .65rem;">${row.actype}</button></div>
                                            
                                        `;
                                    }
                                },
                                {
                                    "targets": 2,  // Last column for action buttons
                                    "searchable": true,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return `
                                            <button type="button" class="btn btn-primary-light btn-sm btn-wave update" onclick="navigator.clipboard.writeText('${row.tranId}').then(() => showToast('bg-success', 'Transaction ID Copied.', '${row.tranId}'));">${row.tranId}</button>
                                        `;
                                    }
                                },
                               {
                                        "targets": 7,  // Last column for action buttons
                                        "searchable": false,
                                        "orderable": false,
                                        "render": function(data, type, row, meta) {
                                            if (row.admincStatus === "P") {
                                                return '<button type="button" class="btn btn-success-light btn-sm btn-wave update">RECEIVED</button>';
                                            } else {
                                                return '<button type="button" class="btn btn-danger-light btn-sm btn-wave update">PENDING</button>';
                                            }
                                        }
                                    }
                            ],
                            "order": [[0, 'asc']]
                });
              }
              
              
              
        
        $(".collect_commissionBtn").on('click',function(e){
            
        e.preventDefault();

        let receiver = $(this).attr("data-receiver");
        let TranId = $(this).attr("data-tranId");
        

        
        $('.commission_card').hide();
        $('.tran_card').css('display', 'flex');

       

        $.ajax({
                    url: baseUrl+'/commissioncollect/'+receiver+'/'+TranId,  // Replace with your API endpoint
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': encrypt, // Include token if needed
                        'Accept': 'application/json'
                    },
                    success: function (response) {
                        console.log(response.status);

                        if (response.status === 1) {

                            $('.tran_card').css('display', 'none');
                             $('.tran_card_success').css('display', 'flex');

                            // showToast("bg-success","Topup successfully",response.msg)
                            
                            // Play success sound
                            var audio = new Audio('../sound/success.mp3'); // Change to .mp3 if needed
                            audio.play();

                        }
                        
                        else if (response.status === 0) {
                            //RADIUS SERVER ERROR
                            $('.tran_card').css('display', 'none');
                            showAlert("Bad Transaction "+response.error,"danger");
                            $('.commission_card').show();
                        }
                        
                        },
                        error: function (xhr, status, error) {
                            console.error(status);
                            showAlert('Something Wrong!',"danger");
                        },
                        complete: function () {
                        // Hide the Loading button and show the Submit button again
                        // $('.recharge_card').show();
                        }
                });
   
        });

        </script>

      

       <script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>

       

    
@endsection