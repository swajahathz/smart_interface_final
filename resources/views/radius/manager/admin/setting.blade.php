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
                        <h1 class="page-title fw-semibold fs-18 mb-0">General Settings</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Setting</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->
                   

                <!-- Start::row-1 -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card custom-card">
                                <!--<div class="card-header">-->
                                <!--    <div class="card-title">-->
                                <!--        Vertical alignment with links-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-2" style="background-color: #edededa6;padding: 10px;">
                                            <nav class="nav nav-tabs flex-column nav-style-5" role="tablist">
                                                
                                                <a class="nav-link active" data-bs-toggle="tab" role="tab"
                                                    aria-current="page" href="#serversetting" aria-selected="true"><i
                                                        class="ri-home-smile-line me-2 align-middle d-inline-block"></i>Server Settings</a>
                                                        
                                              
                                        
                                            </nav>
                                        </div>
                                        <div class="col-xl-10">
                                            <div class="tab-content mt-2 mt-xl-0">
                                                
                                                <div class="tab-pane show active text-muted" id="serversetting"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="permission" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                                <label>Mac Lock</label>
                                                                            </div>
                                                                            
                                                                            <div class="form-check form-switch mb-2">
                                                                                <input class="form-check-input" id="updatemac" type="checkbox" role="switch" @if($setting['setting'][0]['mac_binding_enabled'] == 1) checked
                                                                    @endif>
                                                                            </div>
                                                                        </div>
                                                                        </th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>
                                                                        <div class="d-flex justify-content-between">
                                                                            <!--<div>-->
                                                                            <!--    <label>Service Change</label>-->
                                                                            <!--</div>-->
                                                                            
                                                                            <!--<div class="form-check form-switch mb-2">-->
                                                                            <!--    <input class="form-check-input" id="edit_service" type="checkbox" role="switch">-->
                                                                            <!--</div>-->
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
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
$("#updatemac").on('change', function () {
                // Get the current state of the checkbox
                $('.loadingBtn').show();
                const isChecked = this.checked;
                let value;
                

                if (isChecked) {
                    value = 1;
                } else {
                    value = 0;
                }
                

                         $.ajax({
                            url: baseUrl+'/setting/1/'+value,  // Replace with your API endpoint
                            type: 'GET',
                            headers: {
                                'Authorization': 'Bearer '+ encrypt, // Include token if needed
                                'Accept': 'application/json'
                            },
                        success: function (response) {

                            if (response.status === 1) {

                                if(response.status === 1){
                                    showToast("bg-success","Mac Policy",response.msg)
                                }
                                
                                // $('#subscriber_form')[0].reset();

                            }
                            else if (response.status === 501) {
                                //RADIUS SERVER ERROR
                                showToast("bg-danger","Server error. ",response.msg)
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
                            $('.loadingBtn').hide();
                        }
                    });
            });
            
            
            
            
            
            //  SIGNLE PAGE LOAD
         
const urlKey = '/setting';
const currentTabId = Math.random().toString(36).substr(2, 9);

function checkTab() {
    const stored = JSON.parse(localStorage.getItem(urlKey) || '{}');
    if (stored.tabId && stored.tabId !== currentTabId) {
        // Existing tab already open
        window.close(); // ya window ko redirect kar do
        return false;
    }
    localStorage.setItem(urlKey, JSON.stringify({ tabId: currentTabId }));
    return true;
}

// Tab unload (close / refresh) par lock release
window.addEventListener('beforeunload', () => {
    const stored = JSON.parse(localStorage.getItem(urlKey) || '{}');
    if (stored.tabId === currentTabId) {
        localStorage.removeItem(urlKey);
    }
});

// Agar already open tab me user aaya, focus karne ka option
window.addEventListener('storage', (e) => {
    if (e.key === urlKey) {
        const newVal = JSON.parse(e.newValue || '{}');
        if (newVal.tabId !== currentTabId) {
            window.close(); // ya redirect
        }
    }
});

checkTab();

        </script>
<script src="{{ asset('js/function/showalert.js') }}"></script>
<script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection