@extends('layouts.master')

@section('styles')

  
          <!-- SWEETALERTS CSS -->
          <link rel="stylesheet" href="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.css')}}">

<!-- DataTables CSS -->
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
                        <h1 class="page-title fw-semibold fs-18 mb-0">1 Bill Invoice List</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">1 Bill Invoice List</li>
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
                                    INVOICE LIST
                                </div>
                                <div>
                                <button type="button" class="btn btn-primary btn-wave btn-sm"  data-bs-effect="effect-flip-vertical" data-bs-toggle="modal" href="#modaldemo8"><i class='bx bx-plus'></i> Create Invoice</button>
                                <div class="modal fade" id="modaldemo8" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Create Invoice</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="alert-container"></div>
                                               
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Amount</label>
                                                        <input type="amount" id="amount" class="form-control form-control-sm" placeholder="type amount" required>
                                                        <input type="hidden" id="token" value="{{ $token }}"/>
                                                    </div>
                                                  
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button class="btn btn-primary" id="submitBtn">Submit</button>
                                                <button class="btn btn-primary-light" id="loadingBtn"  style="display: none;" type="button" disabled>
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
                                                <th>1 Bill ID</th>
                                                <th>Create Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Bank</th>
                                                <th>Paid Date</th>
                                                <th>Paid Amount</th>
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

<!-- DataTables + Plugins -->
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
let encrypt = '{{$token}}';
let baseUrl = "{{ config('app.api_base_url') }}";
let user_id = "{{$user_id}}";
let user_name = "{{$user_name}}";

$("#submitBtn").on('click', function() {
    let amount = $("#amount").val();

    // Convert to number
    let numAmount = parseFloat(amount);

    if (!amount || isNaN(numAmount) || numAmount <= 0) {
        alert("Please type a valid amount");
        return;
    } else {
        $("#submitBtn").hide();
        $("#loadingBtn").show();

        $.ajax({
            url: "https://partner.alburakinternet.net.pk/api/newradiusapi/1link.php",
            type: "POST",
            data: {
                amount: amount,
                create_by: user_name,   // make sure user_name is defined in JS
                create_inv: 1
            },
            success: function(response) {
                console.log("Success:", response);
                $("#submitBtn").show();
                $("#loadingBtn").hide();
                $("#modaldemo8").modal('hide');
                
                loadtable();
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("Something went wrong. Please try again.");
                $("#submitBtn").show();
                $("#loadingBtn").hide();
            }
        });
    }
});
loadtable();
function loadtable(){
       if ($.fn.dataTable.isDataTable('#datatable-basic')) {
                    $('#datatable-basic').DataTable().clear().destroy();
                }
                
                
    $('#datatable-basic').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": "https://partner.alburakinternet.net.pk/api/newradiusapi/1linklist.php?id="+user_name, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": ""
                            },
                            "columns": [
                                 { 
            data: null,
            orderable: false, // serial pe sorting nahi hogi
            render: function (data, type, row, meta) {
                // meta.row = current row index (0 se start hota hai)
                // meta.settings._iDisplayStart = current page ka start index
                return meta.row + 1 + meta.settings._iDisplayStart;
            }
        },
                                { "data": "inv_id",
         render: function(data, type, row, meta) {
                                        return `
                                          101030${row.inv_id}
                                        `;
                                    }},
                                { "data": "invoice_create_date" },
                                { "data": "amount" },
                                  { 
        "data": "bill_status",
        render: function(data, type, row, meta) {
            if (row.bill_status == 1) {
                return `<button class="btn btn-success btn-sm">Paid</button>`;
            } else {
                return `<button class="btn btn-danger btn-sm">Non-Paid</button>`;
            }
        }
    },
                                { "data": "paid_bank" },
                                { "data": "invoice_paid_date" },
                                { "data": "amount_paid" }
                            ],
                            "order": [[0, 'asc']],
                           
                });

}



          
              
    
</script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection
