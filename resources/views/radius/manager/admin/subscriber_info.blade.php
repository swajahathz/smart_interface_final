@extends('layouts.master')


@section('styles')
 <!-- SWEETALERTS CSS -->
          <link rel="stylesheet" href="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.css')}}">

        <!-- PRISM CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">
      
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
                    <div class="d-md-flex d-block align-items-center justify-content-between my-2 page-header-breadcrumb">
                        <!-- <h1 class="page-title fw-semibold fs-18 mb-0">SUBSCRIBER</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Subscriber</li>
                                </ol>
                            </nav>
                        </div> -->
                    </div>
                    <!-- Page Header Close -->
                    
                    <div class="row">
                            <div class="col-xl-12">
                                <div class="card custom-card">
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap align-items-top justify-content-between gap-2">
                                            <div>
                                                <div class="d-flex flex-wrap gap-2">
                                                    <div>
                                                        <span class="avatar avatar-rounded avatar-lg" style="width: 5rem;
                                                                                            height: 5rem;">
                                                            <img src="{{asset('build/assets/images/user.jpg')}}" alt="">
                                                        </span>
                                                        
                                                    </div> 
                                                    <div>
                                                        <h5 class="fw-bold mb-0 d-flex align-items-center"><a href="javascript:void(0);"><span id="firstname_info">{{ ucfirst($subscriber[0]['firstname']) }}</span> <span id="lastname_info">{{ ucfirst($subscriber[0]['lastname']) }}</span></a></h5>
                                                        
                                                        <div class="d-flex fs-14 mt-2">
                                                            <div>
                                                                <p class="mb-0" style="font-size:12px;">Username: <span id="username_info">{{ $subscriber[0]['username'] }}</span></p>
                                                                <p class="mb-2" style="font-size:12px;">Expiration: <span id="mobile_info">{{$subscriber[0]['expiration']}}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="popular-tags d-flex">
                                                            
                                                            <div>
                                                                @if(!empty($subscriber) && isset($subscriber[0]['status']))
                                                                  @if($subscriber[0]['status'] == 'active')
                                                                      <a href="javascript:void(0);" class="badge rounded-pill bg-success-transparent">Active</a>
                                                                  @else
                                                                      <a href="javascript:void(0);" class="badge rounded-pill bg-danger-transparent">Expired</a>
                                                                  @endif
                                                              @else
                                                                  <p>Status information is not available.</p>
                                                              @endif
                                                              
                                                              
                                                            </div>
                                                            
                                                            <div><a href="javascript:void(0);"  class="badge rounded-pill bg-danger offline_button" style="display:none;">Offline</a></div>
                                                            
                                                              
                                                              <div class="online_status">
                                                              
                                                             @if(!empty($subscriber) && isset($subscriber[0]['status']))
                                                      @if($subscriber[0]['onlinestatus'] == 1)
                                                          <a href="javascript:void(0);"  class="badge rounded-pill bg-success">Online</a> <a href="javascript:void(0);"  class="badge bg-success-transparent" id="time-difference"></a>
                                                          
                                                           <a href="javascript:void(0);"  class="badge rounded-pill bg-danger" id="kick" data-username="{{ $subscriber[0]['username'] }}" data-nas="{{ $subscriber[0]['nas'] }}">Kick</a>
                                                           <span class="spinner-border spinner-border-sm align-middle kick_loading" style="display:none;" role="status" aria-hidden="true"></span> 
                                                           
                                                           
                                                      @elseif($subscriber[0]['onlinestatus'] == 0)
                                                          <a href="javascript:void(0);"  class="badge rounded-pill bg-danger">Offline</a>
                                                      @endif
                                                  @else
                                                  <a href="javascript:void(0);" class="badge rounded-pill bg-danger-transparent">{{$subscriber[0]['onlinestatus']}}</a>
                                                  @endif
                                                  </div>
                                                  
                                                  
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-check form-switch mb-2">
                                                            <input class="form-check-input" id="enable_subscriber" type="checkbox" role="switch"
                                                                id="switch-primary"@if($subscriber[0]['subscriber_enable'] == 1) checked
                                                                    @endif>
                                                        </div>
                                                        
                                                        
                                                        
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="d-flex">
                                                 <div class="card custom-card overflow-hidden">
                                                    <div class="card-body" style="padding: .6rem;">
                                                         <div class="flex-grow-1 ms-2 me-2">
                                                                <p class="mb-0"><b>Allowed</b></p>
                                                                <h4 style="color: #686868;
                                                                font-weight: 600;
                                                                text-shadow: 1px 1px 1px #b5b4b4;font-size: large;white-space: nowrap;" id="allowed_usage">
                                                                                                                        0 GB                                </h4>
                                                         </div>
                                                     </div>
                                                </div>
                                                 <div class="card custom-card overflow-hidden">
                                                    <div class="card-body" style="padding: .6rem;">
                                                         <div class="flex-grow-1 ms-2 me-2">
                                                                <p class="mb-0 text-success"><b>Used</b></p>
                                                                <h4 style="color: #686868;
                                                                font-weight: 600;
                                                                text-shadow: 1px 1px 1px #b5b4b4;font-size: large;white-space: nowrap;" id="used_usage">
                                                                   
                                                                                                                        0 GB                                </h4>
                                                         </div>
                                                     </div>
                                                </div>
                                                 <div class="card custom-card overflow-hidden">
                                                    <div class="card-body" style="padding: .6rem;">
                                                         <div class="flex-grow-1 ms-2 me-2">
                                                                <p class="mb-0 text-danger" style="white-space: nowrap;"><b>Remaining</b></p>
                                                                <h4 style="color: #686868;
                                                                font-weight: 600;
                                                                text-shadow: 1px 1px 1px #b5b4b4;font-size: large;white-space: nowrap;" id="remaining_usage">
                                                                                                                        0 GB                                </h4>
                                                         </div>
                                                     </div>
                                                </div>
                                                
                                                    
                                                   
                                                    
                                                    
                                                    
                                                   
                                            </div>
                                        </div>
                                        <hr style="border-color:#d3cccc;">
                                        
                                        <div style="white-space: nowrap; 
    overflow-x: auto;">
                                        <button class="btn btn-primary btn-sm" onclick="location.reload();">
  <i class='bx bx-refresh fs-15'></i>
</button>

@if($subscriber[0]['onlinestatus'] == 1)
                                                          <button class="btn btn-danger btn-sm" id="realtime" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Realtime</button>
                                                      @endif
                                        
                                       
                                        <button data-bs-toggle="modal"
                                                        data-bs-target="#changePassword" class="btn btn-primary btn-raised-shadow btn-wave btn-sm">Change Password</button>
                                                        <button  data-bs-toggle="modal"
                                      data-bs-target="#changeService" class="btn btn-orange btn-raised-shadow btn-wave btn-sm">Change Service</button>
                                      
                                      
                                      @if($permission['perm_ExpireEdit'] == 1)
                                      
                                        <button  data-bs-toggle="modal"
                                        data-bs-target="#change_expire" class="btn btn-success btn-raised-shadow btn-wave btn-sm">Change Expire</button>
                                      @endif
                                      
                                      <button  data-bs-toggle="modal"
                                        data-bs-target="#change_owner" class="btn btn-success btn-raised-shadow btn-wave btn-sm" id="changeOwnerBtn">Change Owner</button>
                                      
                                      <button id="sync" class="btn btn-danger btn-raised-shadow btn-wave btn-sm">Sync</button>
                                      
                                      
                                    @if(request()->getHost() == "portal.citylinkscommunications.com")
                                        <a href="/jazz/inv/{{ $subscriber[0]['username'] }}/{{ $subscriber[0]['password'] }}" target="_blank" class="btn btn-danger btn-sm">JazzCash Invoice</a>
                                    @endif
                                      
                                      
                                      <button data-username="{{ $subscriber[0]['username'] }}" id="closesession" class="btn btn-danger btn-raised-shadow btn-wave btn-sm">Close Session</button>
                                    <span class="spinner-border spinner-border-sm align-middle closesession_loading" style="display:none;" role="status" aria-hidden="true"></span> 
                                      </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
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
                                                    aria-current="page" href="#home-vertical-link" aria-selected="true"><i
                                                        class="ri-home-smile-line me-2 align-middle d-inline-block"></i>Edit Info</a>
                                                 @if ($roles_id == 2)
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#addons" id="addons_btn"  data-username="{{ $subscriber[0]['username'] }}" aria-selected="false"><i
                                                        class="ri-archive-drawer-line me-2 align-middle d-inline-block"></i>Addons </a>
                                                        
                                                          <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#extras" id="extras_btn"  data-username="{{ $subscriber[0]['username'] }}" aria-selected="false"><i
                                                        class="ri-contacts-book-2-line me-2 align-middle d-inline-block"></i>Extras</a>
                                                  @endif      
                                                <!--<a class="nav-link" data-bs-toggle="tab" role="tab"-->
                                                <!--aria-current="page" href="#usage-vertical-link" aria-selected="false"><i-->
                                                <!--        class="ri-archive-drawer-line me-2 align-middle d-inline-block"></i>Usage Analytics</a>-->
                                                        
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                    aria-current="page" href="#recharge" aria-selected="true"><i
                                                        class="ri-home-smile-line me-2 align-middle d-inline-block"></i>Recharge</a>
                                                        
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                    aria-current="page" href="#adddays" aria-selected="true"><i
                                                        class="ri-home-smile-line me-2 align-middle d-inline-block"></i>Add Days</a>
                                                        
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#ledger" id="ledger_btn"  data-username="{{ $subscriber[0]['username'] }}" aria-selected="false"><i
                                                        class="ri-bank-line me-2 align-middle d-inline-block"></i>Ledger</a>
                                                        
                                                        <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#invoice" id="invoice_btn"  data-username="{{ $subscriber[0]['username'] }}" aria-selected="false"><i
                                                        class="ri-bank-line me-2 align-middle d-inline-block"></i>Invoices</a>
                                                        
                                                      
                                                        
                                                        <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#session" id="session_btn" data-username="{{ $subscriber[0]['username'] }}" aria-selected="false"><i
                                                        class="ri-contacts-book-2-line me-2 align-middle d-inline-block"></i>Sessions</a>
                                                        
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#auth_logs" id="auth_logs_btn"  data-username="{{ $subscriber[0]['username'] }}" aria-selected="false"><i
                                                        class="ri-contacts-book-2-line me-2 align-middle d-inline-block"></i>Logs</a>
                                                        
                                                        <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#activity" id="activity_btn"  data-username="{{ $subscriber[0]['username'] }}" aria-selected="false"><i
                                                        class="ri-contacts-book-2-line me-2 align-middle d-inline-block"></i>Activity</a>
                                            </nav>
                                        </div>
                                        <div class="col-xl-10">
                                            <div class="tab-content mt-2 mt-xl-0">
                                                <div class="tab-pane show active text-muted" id="home-vertical-link"
                                                    role="tabpanel" style="padding:0;">
                                            
                                                    <form id="subscriber_form" method="POST">
                                                            <div class="card-body" style="padding:10px;">
                                                            <div class="alert-container"></div>
                                                                <div class="row gy-4 mb-4">
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" value="{{ $subscriber[0]['username'] }}" style="background-color:#1e3fb32e;" readonly>
                                                                                <div class="input-group-text">Username</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text"  id="srvname" class="form-control" value="{{$subscriber[0]['srvid']['srvname']}}"  style="background-color:#1e3fb32e;" readonly>
                                                                                <div class="input-group-text">Service</div>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" value="{{ $subscriber[0]['staticIp'] }}" style="background-color:#1e3fb32e;" readonly>
                                                                                <div class="input-group-text">Static IP</div>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <div class="btn btn-danger-light btn-sm" data-username="{{ $subscriber[0]['username'] }}" id="clear_mac">Clear Mac</div>
                                                                                <input type="text" class="form-control" id="mac" value="{{ $subscriber[0]['macss'] }}" style="background-color:#1e3fb32e;" readonly>
                                                                                <div class="input-group-text">Mac Address</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" value=" {{ \Carbon\Carbon::parse($subscriber[0]['created_at'])->format('d M Y, h:i A') }}
 " style="background-color:#1e3fb32e;" readonly>
                                                                                <div class="input-group-text">Created On</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" value=" {{ $subscriber[0]['owner']['managername'] }}
 " style="background-color:#1e3fb32e;" readonly>
                                                                                <div class="input-group-text">Owner</div>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" id="firstname" value="{{ $subscriber[0]['firstname'] }}" placeholder="Type firstname" required>
                                                                                <input type="hidden" class="form-control" id="subscriber_id" value="{{ $subscriber[0]['subscriber_id'] }}" required>
                                                                                <input type="hidden" class="form-control" id="token" value="{{$token}}" required>
                                                                                <div class="input-group-text">Firstname</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" id="lastname" value="{{ $subscriber[0]['lastname'] }}" placeholder="Type lastname" required>
                                                                                <div class="input-group-text">Lastname</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-12">
                                                                        <!-- <label for="address" class="form-label">Address</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-map-pin-user-fill"></i></div>
                                                                                <input type="text" class="form-control" id="address" value="{{ $subscriber[0]['address'] }}" placeholder="Type address" required>
                                                                                <div class="input-group-text">Address</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-smartphone-line"></i></div>
                                                                                <input type="number" class="form-control" id="mobile" value="{{ $subscriber[0]['mobile'] }}" placeholder="9X XXX XXXXXXX" required>
                                                                                <div class="input-group-text">Mobile</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-whatsapp-line"></i></div>
                                                                                <input type="number" class="form-control" id="phone" value="{{ $subscriber[0]['phone'] }}" placeholder="9X XXX XXXXXXX" required>
                                                                                <div class="input-group-text">Whatsapp</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-mail-line"></i></div>
                                                                                <input type="text" class="form-control" id="email" value="{{ $subscriber[0]['email'] }}" placeholder="abc@gmail.com" required>
                                                                                <div class="input-group-text">Email</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-mail-line"></i></div>
                                                                                <input type="text" class="form-control" id="cnic" value="{{ $subscriber[0]['cnic'] }}" placeholder="Type national id card #" required>
                                                                                <div class="input-group-text">ID Card</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-12">
                                                                        <label for="job-description" class="form-label">Description :</label>
                                                                        <textarea class="form-control" id="remarks" rows="2">{{ $subscriber[0]['remarks'] }}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-end pt-0">
                                                                            <button type="submit" id="submitBtn" href="javascript:void(0);" class="btn btn-primary btn-wave waves-effect waves-light" style="width:100%;">
                                                                                Update
                                                                            </button>
                                                                            <button class="btn btn-primary-light loadingBtn" style="display:none;" type="button" disabled="" style="width:100%;">
                                                                                <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
                                                                                Loading...
                                                                            </button>
                                                            </div>
                                                            </form>
                                                </div>
                                                <div class="tab-pane text-muted" id="addons"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <button class="btn btn-primary-light btn-sm mb-5" style="width:100%;" data-bs-toggle="modal" href="#modaldemo8">Add Addon</button>
                                                         <div class="modal fade" id="modaldemo8" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Create Addon</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="alert-container"></div>
                                                <form id="addon_form">
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Username</label>
                                                        <input type="text" class="form-control form-control-sm" value="{{ $subscriber[0]['username']}}" readonly>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Addon type</label>
                                                        <input type="text" id="name" class="form-control form-control-sm" value="Static IP" readonly required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Price</label>
                                                        <input type="text" id="addonPrice" class="form-control form-control-sm" value="0.00" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">IP Address</label>
                                                        <input type="text" id="staticip" class="form-control form-control-sm" placeholder="192.XXX.XXX.XXX" required>
                                                    </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="addonsubmitBtn">Submit</button>
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
                                                        <table id="addons_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Addon Name</th>
                                                                    <th>Price</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>

                                                <div class="tab-pane text-muted" id="recharge"
                                                    role="tabpanel" style="padding:5px;">
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
                                                    <div class="col-xl-12 recharge_card">
                                                        <div class="card custom-card">
                                                        <div class="card-body">
                                                            <div class="row gy-3">
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Transaction ID :</p>
                                                                    <p class="fs-15 mb-1">#@php
                                                                            $tranID = bin2hex(random_bytes(6));
                                                                        @endphp
                                                                        
                                                                        {{ $tranID }}{{$daysAdded}}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Renew Date :</p>
                                                                    <p class="fs-15 mb-1">{{ $currentDateTime->format('d,M Y') }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Last Expire :</p>
                                                                    <p class="fs-15 mb-1">{{$subscriber[0]['expiration']}}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">New Expire :</p>
                                                                    <p class="fs-16 mb-1 fw-semibold">{{ $new_expiration }}</span></p>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table nowrap text-nowrap border mt-4">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Type</th>
                                                                                    <th>DESCRIPTION</th>
                                                                                    <th>QUANTITY</th>
                                                                                    <th>TOTAL</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="fw-semibold">
                                                                                            Card Recharge
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="text-muted">
                                                                                            Service: {{ $subscriber[0]['srvid']['srvname']}}
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="product-quantity-container">
                                                                                        @if ($recharge_type == 4)
                                                                                            {{ $daysAdded }}
                                                                                        @else
                                                                                            1
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>@if ($recharge_type == 0)
                                                                                            {{ $subscriber[0]['card_amount'] }}
                                                                                        @endif
                                                                                        @if ($recharge_type == 1)
                                                                                            {{ $subscriber[0]['card_amount'] }}
                                                                                        @endif
                                                                                        @if ($recharge_type == 2)
                                                                                        {{ number_format($subscriber[0]['card_amount'] / 30 * $daysAdded, 2) }}
                                                                                        @endif
                                                                                        @if ($recharge_type == 4)
                                                                                            @if ($fullamount == 0)
                                                                                                {{ number_format($subscriber[0]['card_amount'] / 30 * $daysAdded, 2) }}
                                                                                            @else
                                                                                                 {{ $subscriber[0]['card_amount'] }}
                                                                                            @endif
                                                                                    @endif
                                                                                    </td>
                                                                                </tr>
                                                                                @if ($subscriber[0]['addons'] == 1)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="fw-semibold">
                                                                                                Addons
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="text-muted">
                                                                                                Static IP
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="product-quantity-container">
                                                                                            1
                                                                                        </td>
                                                                                        <td>
                                                                                           @if ($recharge_type == 2)
                                                                                                {{ number_format(($subscriber[0]['addonsPrice'] / 30) * $daysAdded, 2) }}
                                                                                                @endif
                                                                                        @if ($recharge_type == 4)
                                                                                        {{ number_format($subscriber[0]['addonsPrice'] / 30 * $daysAdded, 2) }}
                                                                                            @else
                                                                                                {{ $subscriber[0]['addonsPrice'] }}
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endif
                                                                                <tr>
                                                                                    <td colspan="2"></td>
                                                                                    <td colspan="2">
                                                                                        <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                                                            <tbody>
                                                                                                @if ($subscriber[0]['discount'] > 0)
                                                                                                    <tr>
                                                                                                        <th scope="row">
                                                                                                            <p class="mb-0 fs-14">Discount :</p>
                                                                                                        </th>
                                                                                                        <td>
                                                                                                            <p class="mb-0 fw-semibold fs-16 text-danger">
                                                                                                                
                                                                                                              -  @if ($recharge_type == 2)
                                                                                                                        {{ number_format(($subscriber[0]['discount'] / 30) * $daysAdded) }}
                                                                                                                         @elseif ($recharge_type == 4)
                                                                                                                                 @if ($fullamount == 0)
                                                                                                                                {{ number_format($subscriber[0]['discount'] / 30 * $daysAdded) }}
                                                                                                                            @else
                                                                                                                                 {{ $subscriber[0]['discount']}}
                                                                                                                            @endif
                                                                                                            
                                                                                                                    @else
                                                                                                                        {{ $subscriber[0]['discount']}}
                                                                                                                    @endif
                                                                                                                </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                                
                                                                                                @if ($subscriber[0]['extra_charges'] > 0)
                                                                                                    <tr>
                                                                                                        <th scope="row">
                                                                                                            <p class="mb-0 fs-14">Other Charges :</p>
                                                                                                        </th>
                                                                                                        <td>
                                                                                                            <p class="mb-0 fw-semibold fs-16 text-success">
                                                                                                                
                                                                                                                @if ($recharge_type == 2)
                                                                                                                        {{ number_format(($subscriber[0]['extra_charges'] / 30) * $daysAdded) }}
                                                                                                                         @elseif($recharge_type == 4)
                                                                                                                                 @if ($fullamount == 0)
                                                                                                                                {{ number_format($subscriber[0]['extra_charges'] / 30 * $daysAdded) }}
                                                                                                                            @else
                                                                                                                                 {{ $subscriber[0]['extra_charges']}}
                                                                                                                            @endif
                                                                                                            
                                                                                                                    @else
                                                                                                                        {{ $subscriber[0]['extra_charges']}}
                                                                                                                    @endif
                                                                                                                </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                                <tr>
                                                                                                    <th scope="row">
                                                                                                        <p class="mb-0 fs-14">Total :</p>
                                                                                                    </th>
                                                                                                    <td>
                                                                                                        <p class="mb-0 fw-semibold fs-16 text-success">
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            
                                                                                                            @if ($recharge_type == 2)
    {{ number_format((($subscriber[0]['totalPrice'] - $subscriber[0]['discount'] + $subscriber[0]['extra_charges']) / 30) * $daysAdded, 2) }}

@elseif ($recharge_type == 4)
    @if ($fullamount == 0)
        {{ number_format((($subscriber[0]['totalPrice'] - $subscriber[0]['discount'] + $subscriber[0]['extra_charges']) / 30) * $daysAdded, 2) }}
    @else
        {{ number_format($subscriber[0]['totalPrice'] - $subscriber[0]['discount'] + $subscriber[0]['extra_charges'], 2) }}
    @endif

@else
    {{ number_format($subscriber[0]['totalPrice'] - $subscriber[0]['discount'] + $subscriber[0]['extra_charges'], 2) }}
@endif

                                                                                                                     
                                                                                                                     
                                                                                                                     
                                                                                                                     
                                                                                                           
                                                                                                            </p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-xl-12">
                                                                    <div>
                                                                        <label for="invoice-note" class="form-label">Note:</label>
                                                                        <textarea class="form-control form-control-light" id="invoice-note" rows="3">Once the invoice has been verified by the accounts payable team and recorded, the only task left is to send it for approval before releasing the payment</textarea>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-end">
                                                            <button class="btn btn-success recharge" data-username="{{ $subscriber[0]['username'] }}" data-tranId="{{$tranID}}">Recharge Submit</button>
                                                        </div>
                                                    </div>
                                                     </div>
                                                    
                                                    
                                                </div>
                                                
                                                <div class="tab-pane text-muted" id="adddays"
                                                    role="tabpanel" style="padding:5px;">
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
                                                    <div class="col-xl-12 recharge_card">
                                                        <div class="card custom-card">
                                                      <div class="card-header d-md-flex d-block">
                                                            <div class="h5 mb-0 d-sm-flex d-bllock align-items-center">
                                                                <div class="ms-0 mt-sm-0 mt-2">
                                                                    <div class="h6 fw-semibold mb-0">Recharge Type : <span class="text-primary">Add Days</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto mt-md-0 mt-2 d-flex">
                                                                <div><label class="form-control">SELECT</label></div>
                                                                <select name="days" id="days" class="form-control">
                                                                    @for ($i = 1; $i <= 30; $i++)
                                                                        <option value="{{ $i }}" {{ $i == 1 ? 'selected' : '' }}>
                                                                            {{ $i }} Day{{ $i > 1 ? 's' : '' }}
                                                                        </option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row gy-3">
                                                                <!-- <div class="col-xl-12">
                                                                    <div class="row">
                                                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                                            <p class="text-muted mb-2">
                                                                                Billing From :
                                                                            </p>
                                                                            <p class="fw-bold mb-1">
                                                                                SPRUKO TECHNOLOGIES
                                                                            </p>
                                                                            <p class="mb-1 text-muted">
                                                                                Mig-1-11,Manroe street
                                                                            </p>
                                                                            <p class="mb-1 text-muted">
                                                                                Georgetown,Washington D.C,USA,200071
                                                                            </p>
                                                                            <p class="mb-1 text-muted">
                                                                                sprukotrust.ynex@gmail.com
                                                                            </p>
                                                                            <p class="mb-1 text-muted">
                                                                                (555) 555-1234
                                                                            </p>
                                                                            <p class="text-muted">For more information check for <a href="javascript:void(0);" class="text-primary fw-semibold"><u>GSTIN</u></a> Details.</p>
                                                                        </div>
                                                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3">
                                                                            <p class="text-muted mb-2">
                                                                                Billing To :
                                                                            </p>
                                                                            <p class="fw-bold mb-1">
                                                                                Json Taylor
                                                                            </p>
                                                                            <p class="text-muted mb-1">
                                                                                Lig-22-1,20 Covington Place
                                                                            </p>
                                                                            <p class="text-muted mb-1">
                                                                                New Castle,de, United States,19320
                                                                            </p>
                                                                            <p class="text-muted mb-1">
                                                                                jsontaylor2134@gmail.com
                                                                            </p>
                                                                            <p class="text-muted">
                                                                                +1 202-918-2132
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Transaction ID :</p>
                                                                    <p class="fs-15 mb-1">#@php
                                                                            $tranID = bin2hex(random_bytes(6));
                                                                        @endphp
                                                                        
                                                                        {{ $tranID }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Renew Date :</p>
                                                                    <p class="fs-15 mb-1">{{ $currentDateTime->format('d,M Y') }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Last Expire :</p>
                                                                    <p class="fs-15 mb-1">{{$subscriber[0]['expiration']}}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">New Expire :</p>
                                                                    <p class="fs-16 mb-1 fw-semibold" id="newexpiration">{{ $new_expiration }}</span></p>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table nowrap text-nowrap border mt-4">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Type</th>
                                                                                    <th>DESCRIPTION</th>
                                                                                    <th>QUANTITY</th>
                                                                                    <th>TOTAL</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="fw-semibold">
                                                                                            Card Recharge
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="text-muted">
                                                                                            Service: {{ $subscriber[0]['srvid']['srvname']}}
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="product-quantity-container quantity">
                                                                                        1
                                                                                    </td>
                                                                                    <td id="perdaycardvalue">{{ number_format($subscriber[0]['card_amount'] / 30, 2) }}
                                                                                    </td>
                                                                                </tr>
                                                                                @if ($subscriber[0]['addons'] == 1)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="fw-semibold">
                                                                                                Addons
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <div class="text-muted">
                                                                                                Static IP
                                                                                            </div>
                                                                                        </td>
                                                                                        <td class="product-quantity-container quantity">
                                                                                            1
                                                                                        </td>
                                                                                        <td id="perdayaddonvalue">
                                                                                           {{ number_format(($subscriber[0]['addonsPrice'] / 30), 2) }}
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endif
                                                                                <tr>
                                                                                    <td colspan="2"></td>
                                                                                    <td colspan="2">
                                                                                        <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                                                            <tbody>
                                                                                                @if ($subscriber[0]['discount'] > 0)
                                                                                                    <tr>
                                                                                                     
                                                                                                        <th scope="row">
                                                                                                            <p class="mb-0 fs-14">Discount :</p>
                                                                                                        </th>
                                                                                                        <td>
                                                                                                            <p class="mb-0 fw-semibold fs-16 text-danger" id="discounttotalvalue">
                                                                                                              - {{ number_format(($subscriber[0]['discount'] / 30), 2) }}
                                                                                                                </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                                @if ($subscriber[0]['extra_charges'] > 0)
                                                                                                    <tr>
                                                                                                     
                                                                                                        <th scope="row">
                                                                                                            <p class="mb-0 fs-14">Other Charges :</p>
                                                                                                        </th>
                                                                                                        <td>
                                                                                                            <p class="mb-0 fw-semibold fs-16 text-success" id="extra_chargestotalvalue">
                                                                                                                {{ number_format(($subscriber[0]['extra_charges'] / 30), 2) }}
                                                                                                                </p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                @endif
                                                                                                <tr>
                                                                                                     
                                                                                                    <th scope="row">
                                                                                                        <p class="mb-0 fs-14">Total :</p>
                                                                                                    </th>
                                                                                                    <td>
                                                                                                        <p class="mb-0 fw-semibold fs-16 text-success" id="perdaytotalvalue">
                                                                                                            {{ number_format(($subscriber[0]['totalPrice'] - $subscriber[0]['discount'] + $subscriber[0]['extra_charges'] / 30), 2) }}
                                                                                                            </p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-xl-12">
                                                                    <div>
                                                                        <label for="invoice-note" class="form-label">Note:</label>
                                                                        <textarea class="form-control form-control-light" id="invoice-note" rows="3">Once the invoice has been verified by the accounts payable team and recorded, the only task left is to send it for approval before releasing the payment</textarea>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-end">
                                                            <button class="btn btn-success addDaysBtn" data-username="{{ $subscriber[0]['username'] }}" data-tranId="{{$tranID}}">Submit</button>
                                                        </div>
                                                    </div>
                                                     </div>
                                                    
                                                    
                                                </div>

                                                
                                                
                                                <div class="tab-pane text-muted" id="ledger"
                                                    role="tabpanel" style="padding:5px;">
                                                    <div id="invoice_area"></div>
                                                    
                                                    <div class="table-responsive">
                                                        <table id="ledger_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>TranID</th>
                                                                    <th>Particular</th>
                                                                    <th>Debit</th>
                                                                    <th>Credit</th>
                                                                    <th>Balance</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                <div class="tab-pane text-muted" id="invoice"
                                                    role="tabpanel" style="padding:5px;">
                                                    <div class="refund_invoice"></div>
                                                    
                                                    <div class="table-responsive">
                                                        <table id="invoice_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>TranID</th>
                                                                    <th>InvType</th>
                                                                    <th>Expiration</th>
                                                                    <th>Data</th>
                                                                    <!--<th>Validity</th>-->
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                <div class="tab-pane text-muted" id="session"
                                                    role="tabpanel"  style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="session_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Start</th>
                                                                    <th>End</th>
                                                                    <th>Duration</th>
                                                                    <th>Download</th>
                                                                    <th>Upload</th>
                                                                    <th>IP</th>
                                                                    <th>Nas</th>
                                                                    <th>Mac</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                                
                                                </div>
                                                
                                                <div class="tab-pane text-muted" id="auth_logs"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="auth_logs_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Auth Date</th>
                                                                    <th>Pass</th>
                                                                    <th>Reply</th>
                                                                    <th>Reason</th>
                                                                    <th>Nas</th>
                                                                    <th>Mac</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                
                                                <div class="tab-pane text-muted" id="activity"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="activity_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Date</th>
                                                                    <th>Activiy</th>
                                                                    <th>Action By</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                 <div class="tab-pane text-muted" id="extras"
                                                    role="tabpanel" style="padding:0;">
                                            
                                                    <form id="extras_form" method="POST">
                                                            <div class="card-body" style="padding:10px;">
                                                            <div class="alert-container"></div>
                                                                <div class="row gy-4 mb-4">
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="number" class="form-control" id="discount" value="{{ $subscriber[0]['discount'] }}" >
                                                                                <div class="input-group-text">Discount</div>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                              <input type="number" class="form-control" id="extra_charges" value="{{ $subscriber[0]['extra_charges'] }}" >
                                                                                <div class="input-group-text">Extra Charges</div>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-end pt-0">
                                                                            <button type="submit" id="extrassubmitBtn" href="javascript:void(0);" class="btn btn-primary btn-wave waves-effect waves-light" style="width:100%;">
                                                                                Update
                                                                            </button>
                                                                            <button class="btn btn-primary-light loadingBtn" style="display:none;" type="button" disabled="" style="width:100%;">
                                                                                <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
                                                                                Loading...
                                                                            </button>
                                                            </div>
                                                            </form>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <!-- Start::row -->
               
                        
                        
                       <div class="modal fade" id="changePassword" tabindex="-1"
                                                        aria-labelledby="changePasswordLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="changePasswordLabel">Change Password
                                                                    </h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="input-group mb-3">
                                                                        <div class="input-group-text"><i class="ri-lock-password-line"></i></div>
                                                                        <input type="text" id="passwordValue" class="form-control" id="mobile" value="{{ $subscriber[0]['password'] }}" min="1" required>
                                                                        
                                                                    </div>
                                                                    <div class="d-grid gap-2 mb-4">
                                                                        <button class="btn btn-primary btn-sm" id="change_password">Change</button>
                                                                        <button class="btn btn-primary-light loadingBtn" style="display:none;" type="button" disabled="">
                                                                            <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
                                                                            Loading...
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                      <div class="modal fade" id="changeService" tabindex="-1"
                                                        aria-labelledby="changePasswordLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="changePasswordLabel">Change Service
                                                                    </h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <select class="form-control" data-trigger name="service" id="service">
                                                                        <option value="{{$subscriber[0]['srvid']['srvid']}}" selected disabled>{{$subscriber[0]['srvid']['srvname']}}</option>
                                                                        @foreach ($service as $item)
                                                                        <option value="{{ $item['srvid'] }}" class="sr">{{ $item['service']['srvname'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <div class="d-grid gap-2 mb-4">
                                                                        <button class="btn btn-primary btn-sm" id="change_service">Change</button>
                                                                        <button class="btn btn-primary-light loadingBtn" style="display:none;" type="button" disabled="">
                                                                            <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
                                                                            Loading...
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                
                                                
                    <div class="modal fade" id="change_owner" tabindex="-1"
                                                        aria-labelledby="changePasswordLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="changePasswordLabel">Change Owner
                                                                    </h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label class="mb-2">Select owner</label>
                                                                    <input type="hidden" id="sub_id" value="{{ $subscriber[0]['subscriber_id'] }}"/>
                                                                    <select class="form-select mb-4" name="ownername" id="ownername">
                                                                        
                                                                    </select>
                                                                    
                                                                    <div class="d-grid gap-2 mb-4">
                                                                        <button class="btn btn-primary btn-sm" id="changeOwnerSubmit">Change</button>
                                                                        <button class="btn btn-primary-light loadingBtn" style="display:none;" type="button" disabled="">
                                                                            <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
                                                                            Loading...
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                
                                                
                                                
                     <div class="modal fade" id="change_expire" tabindex="-1"
                                                        aria-labelledby="changePasswordLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title" id="changePasswordLabel">Change Expire
                                                                    </h6>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                @php
                                                                use Carbon\Carbon;
                                                            
                                                                $endDate = Carbon::now()->format('Y-m-d');
                                                            @endphp
                                                                <div class="modal-body">
                                                                    <input type="date" id="expire_date" class="form-control mb-4"  value="{{ $endDate }}"/>
                                                                    <div class="d-grid gap-2 mb-4">
                                                                        <button class="btn btn-primary btn-sm" id="change_expireBtn">Update</button>
                                                                        <button class="btn btn-primary-light loadingBtn" style="display:none;" type="button" disabled="">
                                                                            <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
                                                                            Loading...
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                 
               
                    <!--End::row- -->

                </div>




 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                                        aria-labelledby="offcanvasRightLabel1">
                                        <div class="offcanvas-header border-bottom border-block-end-dashed">
                                            <h5 class="offcanvas-title" id="offcanvasRightLabel1">Realtime Status
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body p-0">
                                            
                                             <div id="echart-gauge-basic" class="echart-charts" style="left: -70px;top:-30px;"></div>
                                             
                                             <div style="width:220px;height:auto;position: relative;top: -250px;right: -200px;"><div id="echart-gauge-basic2" class="echart-charts" style=""></div></div>
                                             
                                            <!-- <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">-->
                                            <!--    <input type="checkbox" class="btn-check" id="btncheck1">-->
                                            <!--    <label class="btn btn-outline-primary" for="btncheck1">Download</label>-->
                                            
                                            <!--    <input type="checkbox" class="btn-check" id="btncheck3">-->
                                            <!--    <label class="btn btn-outline-primary" for="btncheck3">Upload</label>-->
                                            <!--</div>-->
                                            
                                            <div class="row" style="padding:20px;position: relative;top: -340px;">
                                                <div class="col-6" style="background-color: #f7f7f7; padding: 5px;border-right: 3px solid white;border-bottom: 3px solid white;">
                                                    <div class="me-2 d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded bg-danger-transparent text-danger"><i class='bx bx-down-arrow-alt bx-fade-down fs-16' ></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="fs-18 mb-0 text-danger fw-semibold" id="realtime_download">0.00 MB</p>
                                                            <span class="text-muted fs-11" id="usageText">USAGE </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6" style="background-color: #f7f7f7; padding: 5px;border-bottom: 3px solid white;">
                                                    
                                                    <div class="me-3 d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded bg-success-transparent text-success"><i class='bx bx-up-arrow-alt bx-fade-up fs-16' ></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="fs-18 mb-0 text-success fw-semibold" id="realtime_upload">0.00 MB</p>
                                                            <span class="text-muted fs-11" id="usageText2">USAGE </span>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                         
                                                
                                                <div class="col-6" style="background-color: #f7f7f7; padding: 5px;border-right: 3px solid white;border-bottom: 3px solid white;">
                                                     <div class="me-3 d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded bg-secondary-transparent text-secondary"><i class='bx bx-timer bx-flashing fs-16' ></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="fs-13 mb-0 fw-semibold" id="time-difference2"></p>
                                                            <span class="text-muted fs-12">START BEFORE</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6" style="background-color: #f7f7f7; padding: 5px;border-bottom: 3px solid white;">
                                                     <div class="me-3 d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded bg-secondary-transparent text-secondary"><i class='bx bx-purchase-tag-alt fs-16'></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="fs-13 mb-0 fw-semibold">{{$subscriber[0]['srvid']['srvname']}}</p>
                                                            <span class="text-muted fs-12">SERVICE</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6" style="background-color: #f7f7f7; padding: 5px;border-right: 3px solid white; border-bottom: 3px solid white;">
                                                    <div class="me-5 d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded bg-primary-transparent text-primary"><i class='bx bx-globe fs-16' ></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="fs-13 mb-0 text-primary fw-semibold" id="realtime_ip">{{$subscriber[0]['ipaddress']}}</p>
                                                            <span class="text-muted fs-12">IP ADDRESS</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6" style="background-color: #f7f7f7; padding: 5px;border-bottom: 3px solid white;">
                                                     <div class="me-3 d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded bg-primary-transparent text-primary"><i class='fe fe-airplay fs-16'></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="fs-13 mb-0 text-primary fw-semibold" id="realtime_mac">{{$subscriber[0]['mac']}}</p>
                                                            <span class="text-muted fs-12">MAC</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                            <!--<div class="row">-->
                                            <!--                        <div class="col-xl-12">-->
                                                                        
                                                                       
                                                                       
                                            <!--                                <div class="card-body" style="padding:0;">-->
                                            <!--                                    <div class="row">-->
                                            <!--                                        <div class="col-xl-6"></div>-->
                                            <!--                                        <div class="col-xl-6"></div>-->
                                            <!--                                    </div>-->
                                                                                
                                            <!--                                </div>-->
                                            <!--                        </div>-->
                                                                 
                                            <!--                    </div>-->
                                        </div>
                                    </div>
@endsection

@section('scripts')
<!-- JQUERY JS -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
 <!-- ECHARTS JS -->
        <script src="{{asset('build/assets/libs/echarts/echarts.min.js')}}"></script>
        
        <!-- PRISM JS -->
        <!--<script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>-->

    <!--vite('resources/assets/js/prism-custom.js')-->
        <!-- DATE & TIME PICKER JS -->
        <!--<script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>-->
         <!-- SWEETALERTS JS -->
        <script src="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        
        
           <!-- DATATABLES CDN JS -->
           <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>-->
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

        <script>
            let encrypt = $('#token').val();
            let baseUrl = "{{ config('app.api_base_url') }}";
            let nas = "{{$subscriber[0]['nas']}}";
            let username = "{{$subscriber[0]['username_radacct']}}";
            let u = "{{$subscriber[0]['username']}}";
            let host = "{{ request()->getHost() }}";
            
            
            
            $(document).on("click", ".refund", function() {
                let tranId = $(this).attr("data-tranId");
                
                $.ajax({
                            url: '/refund_modal/'+tranId,  // Replace with your API endpoint
                            type: 'get',
                            success: function (response) {
                                $(".refund_invoice").html(response);
                            }
                            
                });
            })


$("#enable_subscriber").on('change', function () {
                // Get the current state of the checkbox
                $('.loadingBtn').show();
                var subscriber_id = $('#subscriber_id').val();
                const isChecked = this.checked;

                 // Declare formData outside the if-else block
                    let formData;

                if (isChecked) {
                    formData = {
                        subscriber_enable: 1,
                    };
                } else {
                    formData = {
                        subscriber_enable: 0,
                    };
                }
                

                        $.ajax({
                        url: baseUrl+'/subscriberenableupdate/'+subscriber_id,  // Replace with your API endpoint
                        type: 'POST',
                        data: JSON.stringify(formData),
                        contentType: 'application/json',
                        headers: {
                            'Authorization': 'Bearer '+ encrypt, // Include token if needed
                            'Accept': 'application/json'
                        },
                        success: function (response) {

                            if (response.status === 1) {

                                if(response.subscriber === 1){
                                    showToast("bg-success","Subscriber Enabled.",response.message)
                                }else{
                                    showToast("bg-warning","Subscriber Disabled.","Subscriber successfully disabled.")
                                }
                                
                                // $('#subscriber_form')[0].reset();

                            }
                            else if (response.status === 501) {
                                //RADIUS SERVER ERROR
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
                            $('.loadingBtn').hide();
                        }
                    });
            });
            
            
            
// Kick id
$("#kick").on('click',function(e){
    e.preventDefault();
    
    let kickUsername = $(this).attr("data-username");
    let nas = $(this).attr("data-nas");
    $('.kick_loading').show();
    
     // Send AJAX request
            $.ajax({
                url: baseUrl+'/subscriber/kick/'+kickUsername+'/'+nas,  // Replace with your API endpoint
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    console.log(response.status);

                    if (response.status === 1) {
                        showToast("bg-success","Subscriber Disconnected.",response.message)
                        // $('#subscriber_form')[0].reset();
                        $('.online_status').hide();
                         $('.offline_button').show();
                        
                        
                        

                    }
                    else if (response.status === 0) {
                        // ALREADY AVALIABLE
                        showToast("bg-warning","Subscriber Not Online. ",response.message)

                        // alert(response.message);
                    } 
                    else if (response.status === 501) {
                        //RADIUS SERVER ERROR
                        // showAlert(response.message,"danger");
                        showToast("bg-danger","Server error. ",response.message)
                    }
                    
                    
                },
                error: function (xhr, status, error) {
                    console.error(status);
                    showAlert('Something Wrong!',"danger");
                },
                complete: function () {
                // Hide the Loading button and show the Submit button again
                $('.kick_loading').hide();
                 }
            });
    
});

// Kick id
$("#closesession").on('click',function(e){
    e.preventDefault();
    
    let sessionUsername = $(this).attr("data-username");
    $('.closesession_loading').show();
    
     // Send AJAX request
            $.ajax({
                url: baseUrl+'/sessionclosesingle/'+sessionUsername+'/1',  // Replace with your API endpoint
                type: 'get',
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    console.log(response.status);

                    if (response.status === 1) {
                        showToast("bg-success","Subscriber Session Closed.",response.message)
                        // $('#subscriber_form')[0].reset();
                        $('.online_status').hide();
                        $('#closesession').hide();
                         $('.offline_button').show();
                         $("#realtime").hide();
                        
                        
                        

                    }
                    else if (response.status === 0) {
                        // ALREADY AVALIABLE
                        showToast("bg-warning","Subscriber Not Found Refresh. ",response.message)

                        // alert(response.message);
                    } 
                    else if (response.status === 501) {
                        //RADIUS SERVER ERROR
                        // showAlert(response.message,"danger");
                        showToast("bg-danger","Server error. ",response.message)
                    }
                    
                    
                },
                error: function (xhr, status, error) {
                    console.error(status);
                    showAlert('Something Wrong!',"danger");
                },
                complete: function () {
                // Hide the Loading button and show the Submit button again
                $('.closesession_loading').hide();
                 }
            });
    
});

            // INSERT DATA
$('#subscriber_form').on('submit', function (e) {
            e.preventDefault();


            // Disable all inputs and buttons
          $('#subscriber_form input, #subscriber_form button').prop('disabled', true);
            

          
            // Prepare form data
            let formData = {
               
                firstname: $('#firstname').val(),
                lastname: $('#lastname').val(),
                address: $('#address').val(),
                mobile: $('#mobile').val(),
                phone: $('#phone').val(),
                email: $('#email').val(),
                cnic: $('#cnic').val(),
                remarks: $('#remarks').val(),
            };

            var subscriber_id = $('#subscriber_id').val();

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/subscriberupdate/'+subscriber_id,  // Replace with your API endpoint
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
                        showToast("bg-success","Subscriber Updated.",response.message)
                        // $('#subscriber_form')[0].reset();

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
                $('.loadingBtn').hide();
                $('#submitBtn').show();
                 }
            });
});


            // INSERT DATA
$('#extras_form').on('submit', function (e) {
            e.preventDefault();


            // Disable all inputs and buttons
          $('#extras_form input, #extras_form button').prop('disabled', true);
            

          
            // Prepare form data
            let formData = {
               
                discount: $('#discount').val(),
                extra_charges: $('#extra_charges').val(),
            };

            var subscriber_id = $('#subscriber_id').val();

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/subscriberextrasupdate/'+subscriber_id,  // Replace with your API endpoint
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
                        showToast("bg-success","Subscriber Updated.",response.message)
                        // $('#subscriber_form')[0].reset();

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

                $('#extras_form input, #extras_form button').prop('disabled', false);
                $('.loadingBtn').hide();
                $('#extrassubmitBtn').show();
                 }
            });
});


$("#sync").on('click',function(){
   
   let userid = '{{ $subscriber[0]['username'] }}';
   
       $.ajax({
                url: baseUrl+'/subscribersync/'+userid,  // Replace with your API endpoint
                type: 'POST',
                contentType: 'application/json',
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    
                    if (response.status === 1) {
                        showToast("bg-success","Subscriber Synced.",response.message)
                        // $('#subscriber_form')[0].reset();

                    }
                    
                }
       });
   
    
});

function load_session(id){
    // Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#session_table')) {
                    $('#session_table').DataTable().clear().destroy();
                }
                // basic datatable
              $('#session_table').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/sessionsingle/"+id, // Replace with your API URL
                                "type": "GET",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "acctstarttime" },
                                { "data": "acctstoptime" },
                                { "data": "duration" },
                                { "data": "upload" },
                                { "data": "download" },
                                { "data": "framedipaddress" },
                                { "data": "nasipaddress" },
                                { "data": "callingstationid" }
                            ],
                            "columnDefs": [
                                {
                                    "targets": 0,  // Target the first column for serial number
                                    "searchable": false,
                                    "orderable": false,
                                    "render": function(data, type, row, meta) {
                                        return meta.row + 1; // Generate serial number based on row index
                                    }
                                }
                            ],
                            "order": [[0, 'asc']]
                });
              }
              
$(document).on('click', '.logs_change_pass', function(e) {    
    e.preventDefault();

    var subscriber_id = "{{ $subscriber[0]['subscriber_id'] }}";
    var pass = String($(this).data('pass')); // ✅ convert to string

    changepass(subscriber_id,pass);
}); 


$("#change_password").on('click',function(e){
    e.preventDefault();
    
    var subscriber_id = $('#subscriber_id').val();
    var pass = $('#passwordValue').val();

    $('#change_password').hide();
    $('.loadingBtn').show();


    changepass(subscriber_id,pass);
   

});

function changepass(subscriber_id,pass){
    
     // Prepare form data
    let formData = {
              password: pass,
           };

 
    $.ajax({
                url: baseUrl+'/subscriberpasswordupdate/'+subscriber_id,  // Replace with your API endpoint
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
                        $('#changePassword').modal('hide');
                        $('#changepasswordvalue').html(pass);
                        showToast("bg-success","Password Updated.",response.message)
                        
                        load_auth_log(subscriber_id);
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
                // Hide the Loading button and show the Submit button again

                $('#subscriber_form input, #subscriber_form button').prop('disabled', false);
                $('.loadingBtn').hide();
                $('#change_password').show();
                 }
            });
    
}


$("#changeOwnerBtn").on('click',function(){
     $.ajax({
                url: baseUrl+'/manager/hierarchy',  // Replace with your API endpoint
                type: 'GET',
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    console.log(response);
                    
                    let currentowner = "{{$subscriber[0]['owner']['managername']}}";
                    let currentownerId = "{{$subscriber[0]['owner_id']}}";
                    
                  let ownerSelect = $('#ownername');
                    ownerSelect.empty(); // Remove old options
                    ownerSelect.append('<option value="'+currentownerId+'">'+currentowner+'</option>');
            
                    $.each(response, function (index, item) {
                        ownerSelect.append('<option value="' + item.user_id + '">' + item.managername + ' | ' + item.actype +'</option>');
                    });
                    
                    
                },
                error: function (xhr, status, error) {
                    console.error(status);
                    showAlert('Something Wrong!',"danger");
                },
                complete: function () {
                 }
            });
});


$("#change_expireBtn").on('click',function(e){
    e.preventDefault();
    
    var subscriber_id = $('#subscriber_id').val();

    $('#change_expireBtn').hide();
    $('.loadingBtn').show();

    // Prepare form data
    let formData = {
              expiration: $('#expire_date').val(),
           };

    $.ajax({
                url: baseUrl+'/subscriberexpirationupdate/'+subscriber_id,  // Replace with your API endpoint
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
                        $('#change_expire').modal('hide');
                        showToast("bg-success","Expire Date Updated.",response.message)
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
                // Hide the Loading button and show the Submit button again

                $('.loadingBtn').hide();
                $('#change_expireBtn').show();
                 }
            });

});

$("#change_service").on('click',function(e){
    e.preventDefault();
    
    var subscriber_id = $('#subscriber_id').val();

    $('#change_service').hide();
    $('.loadingBtn').show();

    // Prepare form data
    let formData = {
              srvid: $('#service').val(),
           };

    var srvid = $('#service').val();
    $.ajax({
                url: baseUrl+'/subscribersrvidupdate/'+subscriber_id,  // Replace with your API endpoint
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

                        $("#srvname").html(response.srvname);
                        $('#changeService').modal('hide');
                        // $('#changepasswordvalue').html(pass);
                        showToast("bg-success","Service Updated.",response.message)
                        // $('#subscriber_form')[0].reset();

                    }else if (response.status === 5) {

                        $('#changeService').modal('hide');
                        showToast("bg-warning","Not Allowed!.",response.message)
                        // $('#subscriber_form')[0].reset();

                    }
                    else if (response.status === 501) {
                        //RADIUS SERVER ERROR
                        // showAlert(response.message,"danger");
                        $('#changeService').modal('hide');
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
                $('.loadingBtn').hide();
                $('#change_service').show();
                 }
            });

});




// ONLINE TIME FUNCTION

    // Laravel se pass ki gai start time
    var onlineStartTime = "{{ $subscriber[0]['onlinestarttime'] ?? '' }}";

    // Start time ko JavaScript Date object mein convert karna
    var startTime = onlineStartTime ? new Date(onlineStartTime) : null;

    function updateTimeDifference() {
        // Ab ka time
        var currentTime = new Date();

        // Difference in milliseconds
        var difference = currentTime - startTime;

        // Calculate time components
        var seconds = Math.floor(difference / 1000);
        var minutes = Math.floor(seconds / 60);
        var hours = Math.floor(minutes / 60);
        var days = Math.floor(hours / 24);

        // Remaining time
        seconds = seconds % 60;
        minutes = minutes % 60;
        hours = hours % 24;

        // Create short-form output
        let displayText = "";
        if (days > 0) displayText += `${days}d `;
        if (hours > 0 || days > 0) displayText += `${hours}h `;
        if (minutes > 0 || hours > 0 || days > 0) displayText += `${minutes}m `;
        displayText += `${seconds}s`;

        // Update the display
        document.getElementById('time-difference').innerText = displayText.trim();
        document.getElementById('time-difference2').innerText = displayText.trim();
    }

    if (startTime) {
    // Update every second
    setInterval(updateTimeDifference, 1000);
    }
    
    
    $(".recharge").on('click',function(e){
        e.preventDefault();

        let rechrageUsername = $(this).attr("data-username"); 
        let rechargeTranId = $(this).attr("data-tranId");
        
        let expireCheck = "{{$subscriber[0]['status']}}";
        let onlineCheck = "{{$subscriber[0]['onlinestatus']}}";

        $('.recharge_card').hide();
        $('.tran_card').css('display', 'flex');
        
      
        

        $.ajax({
                    url: baseUrl+'/cardrecharge/'+rechrageUsername+'/'+rechargeTranId,  // Replace with your API endpoint
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer '+ encrypt, // Include token if needed
                        'Accept': 'application/json'
                    },
                    success: function (response) {
                        console.log(response.status);

                        if (response.status === 1) {

                            $('.tran_card').css('display', 'none');
                             $('.tran_card_success').css('display', 'flex');

                            showToast("bg-success","Recharged Subscriber",response.msg)
                            
                            // Play success sound
                            var audio = new Audio('/sound/success.mp3'); // Change to .mp3 if needed
                            audio.play();
                            
                              if(expireCheck === "expired"){
                                    if(onlineCheck === "1"){
                                        let kickUsername1 = "{{ $subscriber[0]['username'] }}";
                                        let kickNas = "{{ $subscriber[0]['nas'] }}";
                                        
                                        $('.kick_loading').show();
    
                                         // Send AJAX request
                                                $.ajax({
                                                    url: baseUrl+'/subscriber/kick/'+kickUsername1+'/'+kickNas,  // Replace with your API endpoint
                                                    type: 'POST',
                                                    headers: {
                                                        'Authorization': 'Bearer '+ encrypt, // Include token if needed
                                                        'Accept': 'application/json'
                                                    },
                                                    success: function (response) {
                                                        console.log(response.status);
                                    
                                                        if (response.status === 1) {
                                                            showToast("bg-success","Subscriber Disconnected.",response.message)
                                                            // $('#subscriber_form')[0].reset();
                                                            $('.online_status').hide();
                                                             $('.offline_button').show();
                                                            
                                                            
                                                            
                                    
                                                        }
                                                        else if (response.status === 0) {
                                                            // ALREADY AVALIABLE
                                                            showToast("bg-warning","Subscriber Not Online. ",response.message)
                                    
                                                            // alert(response.message);
                                                        } 
                                                        else if (response.status === 501) {
                                                            //RADIUS SERVER ERROR
                                                            // showAlert(response.message,"danger");
                                                            showToast("bg-danger","Server error. ",response.message)
                                                        }
                                                        
                                                        
                                                    },
                                                    error: function (xhr, status, error) {
                                                        console.error(status);
                                                        showAlert('Something Wrong!',"danger");
                                                    },
                                                    complete: function () {
                                                    // Hide the Loading button and show the Submit button again
                                                    $('.kick_loading').hide();
                                                     }
                                                });
                                    }
                                }

                        }
                        else if (response.status === 501) {
                            //RADIUS SERVER ERROR
                            // showAlert(response.message,"danger");
                            $('#changeService').modal('hide');
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
                        else if (response.status === 0) {
                            //RADIUS SERVER ERROR
                            $('.tran_card').css('display', 'none');
                            showToast("bg-danger","Bad Transaction",response.error)
                            $('.recharge_card').show();
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
    })
    
     $(".addDaysBtn").on('click',function(e){
        e.preventDefault();

        let rechrageUsername = $(this).attr("data-username"); 
        let rechargeTranId = $(this).attr("data-tranId");
        let days_count = $("#days").val();

        $('.recharge_card').hide();
        $('.tran_card').css('display', 'flex');

        $.ajax({
                    url: baseUrl+'/cardrechargeadddays/'+rechrageUsername+'/'+rechargeTranId+'/'+days_count,  // Replace with your API endpoint
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer '+ encrypt, // Include token if needed
                        'Accept': 'application/json'
                    },
                    success: function (response) {
                        console.log(response.status);

                        if (response.status === 1) {

                            $('.tran_card').css('display', 'none');
                             $('.tran_card_success').css('display', 'flex');

                            showToast("bg-success","Recharged Subscriber",response.msg)
                            
                            // Play success sound
                            var audio = new Audio('/sound/success.mp3'); // Change to .mp3 if needed
                            audio.play();

                        }
                        else if (response.status === 501) {
                            //RADIUS SERVER ERROR
                            // showAlert(response.message,"danger");
                            $('#changeService').modal('hide');
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
                        else if (response.status === 0) {
                            //RADIUS SERVER ERROR
                            $('.tran_card').css('display', 'none');
                            showToast("bg-danger","Bad Transaction",response.error)
                            $('.recharge_card').show();
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
    })
    
    
   
    function formatBytes(bytes) {
                const sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
                if (bytes === 0 || bytes === null) return '0 B';
                const i = Math.floor(Math.log(bytes) / Math.log(1024));
                const result = (bytes / Math.pow(1024, i)).toFixed(2); // 2 decimal places
                return `${result} ${sizes[i]}`;
            }

// Replace this value with the server-rendered value
    const bytes = {{ $subscriber[0]['download'] }};
    const bytes2 = {{ $subscriber[0]['upload'] }};
    document.getElementById('usageText').innerText = 'USAGE ' + formatBytes(bytes);
    document.getElementById('usageText2').innerText = 'USAGE ' + formatBytes(bytes2);
    
    
    
    
    
    
    
  $(document).ready(function () {
        let cardAmount = {{ $subscriber[0]['card_amount'] }};
        let addonAmount = {{ $subscriber[0]['addonsPrice'] }};
        let totalAmount = {{ $subscriber[0]['totalPrice'] }};
        let discountAmount = {{ $subscriber[0]['discount'] }};
        let extra_chargesAmount = {{ $subscriber[0]['extra_charges'] }};
         let originalExpiration = new Date("{{ $subscriber[0]['expiration'] }}");
        let now = new Date();

        // Base date decide: agar expiry nikal gayi to today otherwise original
        let baseDate = (originalExpiration < now) ? now : originalExpiration;

        function updateExpiration(days) {
            // Clone baseDate
            let newDate = new Date(baseDate.getTime());
            newDate.setDate(newDate.getDate() + days);

            // Format -> 06 May 2027 12:00
            let options = { day: '2-digit', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' };
            let formatted = newDate.toLocaleString('en-GB', options).replace(',', '');

            $("#newexpiration").text(formatted);
        }

        $("#days").on('change', function () {
            let days = $(this).val();
            let perDay = cardAmount / 30;
            let perDay2 = addonAmount / 30;
            let perDay3 = totalAmount / 30;
            let perDay4 = discountAmount / 30;
            let perDay5 = extra_chargesAmount / 30;
            
            
            
            
            let totalcardvalue = (perDay * days).toFixed(2);
            let totaladdonvalue = (perDay2 * days).toFixed(2);
            let totalamountvalue = (perDay3 * days).toFixed(2);
            let discountamountvalue = (perDay4 * days).toFixed(2);
            let extra_chargesamountvalue = (perDay5 * days).toFixed(2);
            
     

let add = (parseFloat(totalamountvalue)  - parseFloat(discountamountvalue) + parseFloat(extra_chargesamountvalue)).toFixed(2);


            $("#perdaycardvalue").html(totalcardvalue);
            $("#perdayaddonvalue").html(totaladdonvalue);
            $("#discounttotalvalue").html(discountamountvalue);
            $("#extra_chargestotalvalue").html(extra_chargesamountvalue);
            $("#perdaytotalvalue").html(add);
            $(".quantity").html(days+" Days");
            
            updateExpiration(days);
        });
    });
    
      $(document).ready(function () {
        function parseDate(str) {
            // Force parse "YYYY-MM-DD HH:mm:ss" as local
            let parts = str.split(/[- :]/);
            return new Date(parts[0], parts[1] - 1, parts[2], parts[3], parts[4], parts[5]);
        }

        function formatDate(date) {
            const months = [
                "Jan","Feb","Mar","Apr","May","Jun",
                "Jul","Aug","Sep","Oct","Nov","Dec"
            ];

            let day = String(date.getDate()).padStart(2, '0');
            let month = months[date.getMonth()];
            let year = date.getFullYear();

            let hour = String(date.getHours()).padStart(2, '0');
            let minute = String(date.getMinutes()).padStart(2, '0');

            return `${day} ${month} ${year} ${hour}:${minute}`;
        }

        let expirationStr = "{{ $subscriber[0]['expiration'] }}";
        let expiration = parseDate(expirationStr);
        let now = new Date();

        let baseDate = (expiration < now) ? now : expiration;

        $("#days").on('change', function () {
            let days = parseInt($(this).val());
            let newDate = new Date(baseDate.getTime());
            newDate.setDate(newDate.getDate() + days);

            $("#newexpiration").text(formatDate(newDate));
        });

        // Default run
        $("#days").trigger('change');
    });
    
    $("#clear_mac").on('click',function(){
        
        var u = $(this).data('username');
         $.ajax({
                    url: baseUrl+'/subscribermacdelete/'+u,  // Replace with your API endpoint
                    type: 'get',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer '+ encrypt, // Include token if needed
                        'Accept': 'application/json'
                    },
                    success: function (response) {
                        if(response.status === 1){
                            $("#mac").val("Mac Cleared");
                        }
                    }
                    
         });
        
    });
    
    $(document).on('click', '.openRechargeTab', function (e) {
    e.preventDefault();

    var target = $(this).data('bs-target') || $(this).attr('href');

    // Find the original tab trigger (using href)
    var tabTrigger = document.querySelector(`[href="${target}"][data-bs-toggle="tab"]`);

    if (tabTrigger) {
        var tab = new bootstrap.Tab(tabTrigger);
        tab.show();
    } else {
        console.error("Tab trigger not found for:", target);
    }
});
    
    
    $("#changeOwnerSubmit").on('click',function(){
       let sub_id = $("#sub_id").val();
       let owner_id = $("#ownername").val();
        $.ajax({
                    url: baseUrl+'/subscriberownerupdate/'+sub_id+'/'+owner_id,  // Replace with your API endpoint
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer '+ encrypt, // Include token if needed
                        'Accept': 'application/json'
                    },
                    success: function (response) {
                        if(response.status === 1){
                            $('#change_owner').modal('hide');
                            showToast("bg-success","Owner Changed",response.message);
                            
                            setTimeout(function () {
            window.location.reload();
        }, 1000); // refresh after 1 second
                        }
                    }
                    
         });
        
    });
    
    let usage_u = "{{ $subscriber[0]['username'] }}";
    
    $.ajax({
                    url: baseUrl+'/usagesingle/'+usage_u,  // Replace with your API endpoint
                    type: 'get',
                    contentType: 'application/json',
                    headers: {
                        'Authorization': 'Bearer '+ encrypt, // Include token if needed
                        'Accept': 'application/json'
                    },
                    success: function (response) {
                        
                        console.log(response.allowed);
                        
                      let allowed = parseFloat(((response.allowed || 0) / 1024).toFixed(1));
let usage = parseFloat(((response.usage || 0) / 1024).toFixed(1));
let remaining = parseFloat(((response.remaining || 0) / 1024).toFixed(1));
                       
                            
                          $("#allowed_usage").text(allowed+" GB");
                            $("#used_usage").text(usage+ " GB");
                            $("#remaining_usage").text(remaining+" GB");
                          
                        
                    }
                    
         });
        

    
        </script>
        
        <script>
// const basePathKey = 'subscriber_info_tab';
// const currentTabId = Math.random().toString(36).substr(2, 9);
// const currentUrl = window.location.pathname;

// // BroadcastChannel create karo
// const channel = new BroadcastChannel('subscriber_info_channel');

// // function: claim tab
// function claimTab() {
//     const stored = JSON.parse(localStorage.getItem(basePathKey) || '{}');

//     if (stored.tabId && stored.tabId !== currentTabId) {
//         // dusri tab already owner → usse notify karo ki nayi URL load karni hai
//         channel.postMessage({ type: 'load-new-url', url: currentUrl });
//         // aur current tab close ya redirect
//         alert("Multi user tab not allowed.")
//         window.close(); // ya window ko redirect kar do
//         return false;
//     }

//     // ye tab ab owner
//     localStorage.setItem(basePathKey, JSON.stringify({ tabId: currentTabId, timestamp: Date.now(), url: currentUrl }));
//     return true;
// }

// // receive messages from other tabs
// channel.onmessage = (ev) => {
//     const data = ev.data;
//     if (data.type === 'load-new-url') {
//         if (window.location.pathname !== data.url) {
//             // existing tab ko update karo
//             window.location.href = data.url; // ya AJAX load kar do content
//         }
//     }
// }

// // release lock on close/refresh
// window.addEventListener('beforeunload', () => {
//     const stored = JSON.parse(localStorage.getItem(basePathKey) || '{}');
//     if (stored.tabId === currentTabId) {
//         localStorage.removeItem(basePathKey);
//     }
// });

// // run claim
// claimTab();
</script>

        
 @php
                        $apiUrll = config('app.api_base_url');
                    @endphp
                    
                    @if ($apiUrll === 'https://smartradapi.alburakinternet.net.pk/api')
                       <script src="{{ asset('js/subscriber_speed_graph_bra2s.js?v=1.0.18') }}"></script>
                    @else
                        <script src="{{ asset('js/subscriber_speed_graph.js?v=1.0.16') }}"></script>
                    @endif
        
        <script src="{{ asset('js/subscriber_admin.js?v=1.0.0.10') }}"></script>
        <script src="{{ asset('js/function/showalert.js') }}"></script>
        <script src="{{ asset('js/function/toast.js') }}"></script>
        
@endsection

