@extends('layouts.master')


@section('styles')

        <!-- PRISM CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/prismjs/themes/prism-coy.min.css')}}">
        
         <!-- SWEETALERTS CSS -->
          <link rel="stylesheet" href="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.css')}}">
      
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

<div class="modal fade" id="update_modal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="exampleModalLabel">Update Commission</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="alert-container"></div>
                                            <form id="commission_update_form">
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Service ID</label>
                                                        <input type="text" name="update_srvid" id="update_srvid" value="" class="form-control form-control-sm" readonly>
                                                    </div>
                                                
                                                    <div class="mb-2">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Commission</label>
                                                        <input type="text" name="update_commission" id="update_commission" value="" class="form-control form-control-sm" placeholder="Type Commmission" required>
                                                         <input type="hidden"  name="update_user_id" id="update_user_id" value="">
                                                    </div>
                                                
                                            </div>
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
                                                        <h5 class="fw-bold mb-0 d-flex align-items-center"><a href="javascript:void(0);"><span id="firstname_info">{{ ucfirst($manager['firstname']) }}</span> <span id="lastname_info">{{ ucfirst($manager['lastname']) }}</span></a></h5>
                                                        
                                                        <div class="d-flex fs-14 mt-2">
                                                            <div>
                                                                <p class="mb-0" style="font-size:12px;">Managername: <span id="username_info">{{ $manager['managername'] }}</span></p>
                                                                <p class="mb-2" style="font-size:12px;">Balance: <span id="mobile_info">{{$manager['balance']}}</span></p>
                                                            </div>
                                                        </div>
                                                        <div class="popular-tags">
                                                    
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-check form-switch mb-2">
                                                            <input class="form-check-input" id="enable_subscriber" type="checkbox" role="switch"
                                                                id="switch-primary"@if($manager['enablemanager'] == 1) checked
                                                                    @endif>
                                                        </div>
                                                        
                                                        
                                                        
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="d-flex">
                                                <div class="flex-grow-1 ms-2 me-2">
                                                        <p class="mb-0"><b>Invoice Amount</b></p>
                                                        <h4 style="color: #686868;
    font-weight: 600;
    text-shadow: 1px 1px 1px #b5b4b4;">
                                                            0                                </h4>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 ms-2 me-2">
                                                        <p class="mb-0"><b>Total Paid</b></p>
                                                        <h4 style="color: #686868;
    font-weight: 600;
    text-shadow: 1px 1px 1px #b5b4b4;">
                                                            0                               </h4>
                                                    </div>
                                                    
                                                    <div class="flex-grow-1 ms-2 me-2">
                                                        <p class="mb-0 text-danger"><b>Due Amount</b></p>
                                                        <h4 class="text-danger" style="
    font-weight: 600;
    text-shadow: 1px 1px 1px #b5b4b4;">
                                                            0                                </h4>
                                                    </div>
                                                    
                                                   
                                            </div>
                                        </div>
                                        <hr style="border-color:#d3cccc;">
                                        
                                        <div style="white-space: nowrap; 
    overflow-x: auto;">
                                            <button class="btn btn-primary btn-sm" onclick="location.reload();">
  <i class='bx bx-refresh fs-15'></i>
</button>

<button id="syncall" class="btn btn-danger btn-raised-shadow btn-wave btn-sm">Sync all <span class="spinner-border spinner-border-sm align-middle sync_loading" style="display:none;" role="status" aria-hidden="true"></span> </button>
                                        <!--<button class="btn btn-primary btn-sm" type="button" data-bs-toggle="offcanvas"-->
                                        <!--data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Realtime Subscriber</button>-->
                                       
                                        
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
                                                        
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#subscriber" id="subscriber_btn"  data-userId="{{ $manager['user_id'] }}"  data-username="{{ $manager['managername'] }}" aria-selected="false"><i
                                                        class="ri-bank-line me-2 align-middle d-inline-block"></i>Subscriber</a>
                                                        
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#service" id="service_btn"  data-userId="{{ $manager['user_id'] }}" data-rolesId="{{ $manager['roles_id'] }}" aria-selected="false"><i
                                                        class="ri-bank-line me-2 align-middle d-inline-block"></i>Service</a>
                                                        
                                                        
                                                @if ($manager['roles_id'] == 3)
                                                                        <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                    aria-current="page" href="#recharge" aria-selected="true"><i
                                                        class="ri-home-smile-line me-2 align-middle d-inline-block"></i>Topup</a>
                                                <a class="nav-link" style="color:red;" data-bs-toggle="tab" role="tab"
                                                    aria-current="page" href="#reverse_recharge" aria-selected="true"><i
                                                        class="ri-home-smile-line me-2 align-middle d-inline-block"></i>Reverse Topup</a>
                                                                    @endif
                                                        
                                                
                                                        
                                               
                                                        
                                                    <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#invoice" id="invoice_btn"  data-username="{{ $manager['user_id'] }}" aria-selected="false"><i
                                                        class="ri-bank-line me-2 align-middle d-inline-block"></i>Topup Invoices</a>       
                                                        
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#ledger" id="ledger_btn"  data-username="{{ $manager['user_id'] }}" aria-selected="false"><i
                                                        class="ri-bank-line me-2 align-middle d-inline-block"></i>Wallet Ledger</a>
                                                        
                                                 <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#managerledger" id="managerledger_btn"  data-username="{{ $manager['user_id'] }}" aria-selected="false"><i
                                                        class="ri-bank-line me-2 align-middle d-inline-block"></i>Manager Ledger</a> 
                                                        
                                                <a class="nav-link" data-bs-toggle="tab" role="tab"
                                                aria-current="page" href="#permission" id="permission_btn"  data-username="{{ $manager['user_id'] }}" aria-selected="false"><i
                                                        class="ri-bank-line me-2 align-middle d-inline-block"></i>Permissions</a>
                                                        
                                                        
                                                <!--        <a class="nav-link" data-bs-toggle="tab" role="tab"-->
                                                <!--aria-current="page" href="#session" id="session_btn" data-username="{{ $manager['managername'] }}" aria-selected="false"><i-->
                                                <!--        class="ri-contacts-book-2-line me-2 align-middle d-inline-block"></i>Sessions</a>-->
                                                        
                                                <!--        <a class="nav-link" data-bs-toggle="tab" role="tab"-->
                                                <!--aria-current="page" href="#activity" id="activity_btn"  data-username="{{ $manager['managername'] }}" aria-selected="false"><i-->
                                                <!--        class="ri-contacts-book-2-line me-2 align-middle d-inline-block"></i>Activity</a>-->
                                            </nav>
                                        </div>
                                        <div class="col-xl-10">
                                            <div class="tab-content mt-2 mt-xl-0">
                                                <div class="tab-pane show active text-muted" id="home-vertical-link"
                                                    role="tabpanel" style="border: 0;">
                                                    <form id="subscriber_form" method="POST">
                                                            <div class="card-body" style="padding:0;">
                                                            <div class="alert-container"></div>
                                                                <div class="row gy-4 mb-4">
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" value="{{ $manager['managername'] }}" readonly required>
                                                                                <div class="input-group-text">Managername</div>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" id="password" value="{{ $manager['token'] }}" placeholder="Type your password Min 8" required>
                                                                                <div class="input-group-text">Password</div>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" id="firstname" value="{{ $manager['firstname'] }}" placeholder="Type firstname" required>
                                                                                <input type="hidden" class="form-control" id="user_id" value="{{ $manager['user_id'] }}" required>
                                                                                <input type="hidden" class="form-control" id="token" value="{{$token}}" required>
                                                                                <div class="input-group-text">Firstname</div>
                                                                            </div>
                                                                    </div><div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" id="lastname" value="{{ $manager['lastname'] }}" placeholder="Type lastname" required>
                                                                                <div class="input-group-text">Lastname</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-12">
                                                                        <!-- <label for="address" class="form-label">Address</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-map-pin-user-fill"></i></div>
                                                                                <input type="text" class="form-control" id="address" value="{{ $manager['address'] }}" placeholder="Type address" required>
                                                                                <div class="input-group-text">Address</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-smartphone-line"></i></div>
                                                                                <input type="number" class="form-control" id="mobile" value="{{ $manager['mobile'] }}" placeholder="9X XXX XXXXXXX" required>
                                                                                <div class="input-group-text">Mobile</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-whatsapp-line"></i></div>
                                                                                <input type="number" class="form-control" id="phone" value="{{ $manager['phone'] }}" placeholder="9X XXX XXXXXXX" required>
                                                                                <div class="input-group-text">Whatsapp</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-mail-line"></i></div>
                                                                                <input type="text" class="form-control" id="email" value="{{ $manager['email'] }}" placeholder="abc@gmail.com" required>
                                                                                <div class="input-group-text">Email</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                     <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-mail-line"></i></div>
                                                                                <input type="text" class="form-control" id="cnic" value="{{ $manager['cnic'] }}" placeholder="Type national id card #" required>
                                                                                <div class="input-group-text">ID Card</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                                <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                                <div class="input-group">
                                                                                        <input type="text" class="form-control" id="ref_id" value="{{ $manager['ref_id'] }}">
                                                                                        <div class="input-group-text">Ref. ID</div>
                                                                                        
                                                                                    </div>
                                                                            </div>
                                                                     @php
                                                                            $apiUrll = config('app.api_base_url');
                                                                        @endphp
                                                                        
                                                                        @if ($apiUrll === 'https://rdsapi.atozsofts.com/api')
                                                                        
                                                                           
                                                                            <div class="col-xl-6">
                                                                                <div class="input-group">
                                                                                    <select id="cty_id" class="form-control">
                                                                                        <option value="{{ $manager['cty_id']['cty_id'] ?? '' }}">{{ $manager['cty_id']['name'] ?? 'Not Set' }}</option>

                                                                                        @if(is_array($city) && count($city) > 0)
                                                                                                @foreach($city as $item)
                                                                                                    <option value="{{ $item['cty_id'] }}">{{ $item['name'] }}</option>
                                                                                                @endforeach
                                                                                            @else
                                                                                                <p>No city available.</p>
                                                                                            @endif
                                                                                    </select>
                                                                                    <div class="input-group-text">City</div>
                                                                                     </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="input-group">
                                                                                    <select id="aggr_id" class="form-control">
                                                                                        <option value="{{ $manager['aggr_id']['cty_id'] ?? '' }}">{{ $manager['aggr_id']['name'] ?? 'Not Set' }}</option>
                                                                                        @if(is_array($city) && count($city) > 0)
                                                                                                @foreach($city as $item)
                                                                                                    <option value="{{ $item['cty_id'] }}">{{ $item['name'] }}</option>
                                                                                                @endforeach
                                                                                            @else
                                                                                                <p>No city available.</p>
                                                                                            @endif
                                                                                    </select>
                                                                                    <div class="input-group-text">Aggregation</div>
                                                                                     </div>
                                                                            </div>
                                                                            <div class="col-xl-6">
                                                                                <div class="input-group">
                                                                                    <select id="dplc_id" class="form-control">
                                                                                        <option value="{{ $manager['dplc_id']['id'] ?? '' }}">{{ $manager['dplc_id']['dplc_name'] ?? 'Not Set' }}</option>
                                                                                        @if(is_array($dplc) && count($dplc) > 0)
                                                                                                @foreach($dplc as $item)
                                                                                                    <option value="{{ $item['id'] }}">{{ $item['dplc_name'] }}</option>
                                                                                                @endforeach
                                                                                            @else
                                                                                                <p>No dplc available.</p>
                                                                                            @endif
                                                                                    </select>
                                                                                    <div class="input-group-text">DPLC</div>
                                                                                     </div>
                                                                            </div>
                                                                        @endif
                                                                   
                                                                   <div class="col-xl-12">
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control" id="vlan" value="{{ $manager['vlan'] }}" placeholder="Leave blank for disable.  Example 401, 402, 403">
                                                                                    <div class="input-group-text">VLAN ALLOWED</div>
                                                                                     </div>
                                                                            </div>
                                                                    <div class="col-xl-12">
                                                                        <label for="job-description" class="form-label">Description :</label>
                                                                        <textarea class="form-control" id="remarks" rows="2">{{ $manager['remarks'] }}</textarea>
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
                                                
                                                <div class="tab-pane text-muted" id="service"
                                                    role="tabpanel" style="border: 0;">
                                                    @if ((int)$roles_id === (int)$manager['roles_id'] - 1)
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label class="form-label">Unused Services</label>
                                                                <select id="serviceDropdown" id="srvid" class="form-select">
                                                                    <option value="">Select Service</option>
                                                                </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label class="form-label">Set Commission</label>
                                                            <input type="number" class="form-control" id="commission_amount" value="0">
                                                            <input type="hidden" id="userid" value="{{ $manager['user_id'] }}">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label class="form-label">Action</label>
                                                           <button class="btn btn-primary btn-wave waves-effect waves-light assign" style="width: 100%;">Assign</button>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    
                                                    <div class="table-responsive mt-3">
                                                        <table id="service_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Service</th>
                                                                    @if ($manager['roles_id'] == 3)
                                                                        <th>A.Price</th>
                                                                    @elseif ($manager['roles_id'] == 4)
                                                                        <th>F.Price</th>
                                                                    @elseif ($manager['roles_id'] == 5)
                                                                        <th>D.Price</th>
                                                                    @elseif ($manager['roles_id'] == 6)
                                                                        <th>SD.Price</th>
                                                                    @endif
                                                                    <th>Commission</th>
                                                                    @if ($manager['roles_id'] == 3)
                                                                        <th>F.Price</th>
                                                                    @elseif ($manager['roles_id'] == 4)
                                                                        <th>D.Price</th>
                                                                    @elseif ($manager['roles_id'] == 5)
                                                                        <th>SD.Price</th>
                                                                    @elseif ($manager['roles_id'] == 6)
                                                                        <th>JD.Price</th>
                                                                    @endif
                                                                    <th>T.Users</th>
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
                                                        <!-- <div class="card-header d-md-flex d-block">
                                                            <div class="h5 mb-0 d-sm-flex d-bllock align-items-center">
                                                                <div class="avatar avatar-sm">
                                                                    <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="">
                                                                </div>
                                                                <div class="ms-sm-2 ms-0 mt-sm-0 mt-2">
                                                                    <div class="h6 fw-semibold mb-0">SHOPPING INVOICE : <span class="text-primary">#8140-2099</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto mt-md-0 mt-2">
                                                                <button class="btn btn-sm btn-secondary me-1" onclick="javascript:window.print();">Print<i class="ri-printer-line ms-1 align-middle d-inline-block"></i></button>
                                                                <button class="btn btn-sm btn-primary">Save As PDF<i class="ri-file-pdf-line ms-1 align-middle d-inline-block"></i></button>
                                                            </div>
                                                        </div> -->
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
                                                                <div class="col-xl-12"> <div class="alert-container"></div></div>
                                                                <div class="col-xl-3">
                                                                    
                                                                    <p class="fw-semibold text-muted mb-1">Transaction ID :</p>
                                                                    <p class="fs-15 mb-1">#@php
    $tranID = bin2hex(random_bytes(6));
@endphp

{{ $tranID }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Date :</p>
                                                                    <p class="fs-15 mb-1">{{ $currentDateTime->format('d,M Y') }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Sender :</p>
                                                                    <p class="fs-15 mb-1">{{ $user_name }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Receiver :</p>
                                                                    <p class="fs-16 mb-1 fw-semibold">{{ $manager['managername'] }}</p>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table nowrap text-nowrap border mt-4">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Type</th>
                                                                                    <th>Remarks</th>
                                                                                    <th>Payment Type</th>
                                                                                    <th>Amount</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="fw-semibold">
                                                                                            TOPUP
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="text-muted">
                                                                                            <input type="text" class="form-control" id="topup_remarks" placeholder="Type Remarks.." required>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td class="product-quantity-container">
                                                                                        <select class="form-control" name="payment_type" id="payment_type">
                                                                                                <option value="" selected disabled>Select Type..</option>
                                                                                                <option>Cash</option>
                                                                                                <option>Online Transfer</option>
                                                                                                <option>Cheque</option>
                                                                                            </select>
                                                                                    </td>
                                                                                    <td>
                                                                                       <input type="number" class="form-control" id="topup_amount" placeholder="0.00" required>
                                                                                    </td>
                                                                                </tr>
                                                                              
                                                                                <tr>
                                                                                    <td colspan="2"></td>
                                                                                    <td colspan="2">
                                                                                        <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">
                                                                                                        <p class="mb-0 fs-14">Total :</p>
                                                                                                    </th>
                                                                                                    <td>
                                                                                                        <p class="mb-0 fw-semibold fs-16 text-success topup_amount_total">0.00</p>
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
                                                            <button class="btn btn-success topup_send" data-sender="{{ $user_id }}" data-receiver="{{ $manager['user_id'] }}" data-tranId="{{$tranID}}">Topup Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                    
                                                </div>
                                                
                                                
                                                <div class="tab-pane text-muted" id="reverse_recharge"
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
                                                        <!-- <div class="card-header d-md-flex d-block">
                                                            <div class="h5 mb-0 d-sm-flex d-bllock align-items-center">
                                                                <div class="avatar avatar-sm">
                                                                    <img src="{{asset('build/assets/images/brand-logos/toggle-logo.png')}}" alt="">
                                                                </div>
                                                                <div class="ms-sm-2 ms-0 mt-sm-0 mt-2">
                                                                    <div class="h6 fw-semibold mb-0">SHOPPING INVOICE : <span class="text-primary">#8140-2099</span></div>
                                                                </div>
                                                            </div>
                                                            <div class="ms-auto mt-md-0 mt-2">
                                                                <button class="btn btn-sm btn-secondary me-1" onclick="javascript:window.print();">Print<i class="ri-printer-line ms-1 align-middle d-inline-block"></i></button>
                                                                <button class="btn btn-sm btn-primary">Save As PDF<i class="ri-file-pdf-line ms-1 align-middle d-inline-block"></i></button>
                                                            </div>
                                                        </div> -->
                                                        <div class="card-body">
                                                            <div class="row gy-3" style="background-color: #ffd5d58f;
    border-radius: 10px;">
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
                                                                <div class="col-xl-12"> <div class="alert-container"></div></div>
                                                                <div class="col-xl-3">
                                                                    
                                                                    <p class="fw-semibold text-muted mb-1">Transaction ID :</p>
                                                                    <p class="fs-15 mb-1">#@php
    $tranID = bin2hex(random_bytes(6));
@endphp

{{ $tranID }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Date :</p>
                                                                    <p class="fs-15 mb-1">{{ $currentDateTime->format('d,M Y') }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Action By :</p>
                                                                    <p class="fs-15 mb-1">{{ $user_name }}</p>
                                                                </div>
                                                                <div class="col-xl-3">
                                                                    <p class="fw-semibold text-muted mb-1">Reverse From :</p>
                                                                    <p class="fs-16 mb-1 fw-semibold">{{ $manager['managername'] }}</p>
                                                                </div>
                                                                <div class="col-xl-12">
                                                                    <div class="table-responsive">
                                                                        <table class="table nowrap text-nowrap border mt-4">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Type</th>
                                                                                    <th>Remarks</th>
                                                                                    <th>Amount</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="fw-semibold">
                                                                                            REVERSE TOPUP
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="text-muted">
                                                                                            <input type="text" class="form-control" id="refund_remarks" placeholder="Type Remarks.." required>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                       <input type="number" class="form-control" id="refund_amount" placeholder="0.00" required>
                                                                                    </td>
                                                                                </tr>
                                                                              
                                                                                <tr>
                                                                                    <td colspan="2"></td>
                                                                                    <td colspan="2">
                                                                                        <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <th scope="row">
                                                                                                        <p class="mb-0 fs-14">Total :</p>
                                                                                                    </th>
                                                                                                    <td>
                                                                                                        <p class="mb-0 fw-semibold fs-16 text-success topup_amount_total">0.00</p>
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
                                                            <button class="btn btn-danger topup_reverse" data-sender="{{ $manager['user_id'] }}" data-receiver="{{ $user_id }}" data-tranId="{{$tranID}}">Reverse Topup Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                    
                                                </div>
                                                
                                                <div class="tab-pane text-muted" id="managerledger"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="managerledger_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>TranID</th>
                                                                    <th>DateTime</th>
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

                                                
                                                
                                                <div class="tab-pane text-muted" id="ledger"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="ledger_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>TranID</th>
                                                                    <th>DateTime</th>
                                                                    <th>Particular</th>
                                                                    <th>Type</th>
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
                                                
                                                <div class="tab-pane text-muted" id="subscriber"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="subscriber_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Username</th>
                                                                    <th>Address</th>
                                                                    <th>Mobile</th>
                                                                    <th>Service</th>
                                                                    <th>Expiration</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                                <div class="tab-pane text-muted" id="invoice"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="invoice_table" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>TranID</th>
                                                                    <th>DateTime</th>
                                                                    <th>Type</th>
                                                                    <th>Payment Type</th>
                                                                    <th>Amount</th>
                                                                    <th>Remarks</th>
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
                                                
                                                <div class="tab-pane text-muted" id="permission"
                                                    role="tabpanel" style="padding:5px;">
                                                    
                                                    <div class="table-responsive">
                                                        <table id="permission" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                                <label>Update Subscriber</label>
                                                                            </div>
                                                                            
                                                                            <div class="form-check form-switch mb-2">
                                                                                <input class="form-check-input" id="edit_updateSubscriber" type="checkbox" role="switch" @if($permission['perm_updateSubscriber'] == 1) checked
                                                                    @endif>
                                                                            </div>
                                                                        </div>
                                                                        </th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                                <label>Recharge Subscriber</label>
                                                                            </div>
                                                                            
                                                                            <div class="form-check form-switch mb-2">
                                                                                <input class="form-check-input" id="edit_CardRecharge" type="checkbox" role="switch" @if($permission['perm_CardRecharge'] == 1) checked
                                                                    @endif>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                                <label>Add Days</label>
                                                                            </div>
                                                                            
                                                                            <div class="form-check form-switch mb-2">
                                                                                <input class="form-check-input" id="edit_AddDays" type="checkbox" role="switch" @if($permission['perm_AddDays'] == 1) checked
                                                                    @endif>
                                                                            </div>
                                                                        </div>
                                                                        </th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                                <label>Edit Expire</label>
                                                                            </div>
                                                                            
                                                                            <div class="form-check form-switch mb-2">
                                                                                <input class="form-check-input" id="edit_expire" type="checkbox" role="switch" @if($permission['perm_ExpireEdit'] == 1) checked
                                                                    @endif>
                                                                            </div>
                                                                        </div>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                                <label>Expire Service Change</label>
                                                                            </div>
                                                                            
                                                                            <div class="form-check form-switch mb-2">
                                                                                <input class="form-check-input" id="edit_expireservicechng" type="checkbox" role="switch" @if($permission['perm_ExpireServiceChng'] == 1) checked
                                                                    @endif>
                                                                            </div>
                                                                        </div>
                                                                        </th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                                <label>Active Service Change</label>
                                                                            </div>
                                                                            
                                                                            <div class="form-check form-switch mb-2">
                                                                                <input class="form-check-input" id="edit_service" type="checkbox" role="switch" @if($permission['perm_RolesEdit'] == 1) checked
                                                                    @endif>
                                                                            </div>
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
                                                                        <input type="text" id="passwordValue" class="form-control" id="mobile" value="" min="1" required>
                                                                        
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
                                                    <div class="me-5 d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded bg-danger-transparent text-danger"><i class='bx bx-down-arrow-alt bx-fade-down fs-16' ></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="fs-18 mb-0 text-danger fw-semibold">2.5 GB</p>
                                                            <span class="text-muted fs-11">USAGE 2.5 GB</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6" style="background-color: #f7f7f7; padding: 5px;border-bottom: 3px solid white;">
                                                    
                                                    <div class="me-3 d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-rounded bg-success-transparent text-success"><i class='bx bx-up-arrow-alt bx-fade-up fs-16' ></i></span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="fs-18 mb-0 text-success fw-semibold">50 MB</p>
                                                            <span class="text-muted fs-11">USAGE 2.5 GB</span>
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
                                                            <p class="fs-13 mb-0 fw-semibold">15 Mbps</p>
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
                                                            <p class="fs-13 mb-0 text-primary fw-semibold">192.168.1.3</p>
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
                                                            <p class="fs-13 mb-0 text-primary fw-semibold">df:df:se:er:rr</p>
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
        <script src="{{asset('build/assets/libs/prismjs/prism.js')}}"></script>

    <!--vite('resources/assets/js/prism-custom.js')-->
        <!-- DATE & TIME PICKER JS -->
        <script src="{{asset('build/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
        
         <!-- SWEETALERTS JS -->
        <script src="{{asset('build/assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
        
        
        
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
            let managers_name  = "{{ $manager['managername'] }}";
            
            
            
            
            
            
        // DELETE FUNCTION
$('#service_table').on('click', '.alert-confirm', function() {
   
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, unassign it!"
        }).then(e => {
            if (e.isConfirmed) {
                // Perform AJAX request here

                let manager_id = $(this).data("user_id");
                let srv_id = $(this).data("srv_id");
                
                
                
                $.ajax({
                    url: baseUrl+'/unassignservicemanager/'+manager_id+'/'+srv_id, // replace with your API URL
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
                        if (response.status === "1") { // Check if status is 1
                            Swal.fire("Unassigned!", "Your service has been unassign successfully.", "success");
                             load_service(manager_id,{{ $manager['roles_id'] }});
                        } else {
                            Swal.fire("Error!", "There was an issue unassign service.", "error");
                        }
                    },
                    error: function() {
                        Swal.fire("Error!", "An unexpected error occurred.", "error");
                    }
                });
            }
        });
    
});


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
        
                    // INSERT DATA
        $('#subscriber_form').on('submit', function (e) {
                    e.preventDefault();


            // Disable all inputs and buttons
          $('#subscriber_form input, #subscriber_form button').prop('disabled', true);
            $('#submitBtn').hide();
            $('.loadingBtn').show();

          
            // Prepare form data
            let formData = {
               
               
                firstname: $('#firstname').val(),
                token: $('#password').val(),
                lastname: $('#lastname').val(),
                address: $('#address').val(),
                mobile: $('#mobile').val(),
                phone: $('#phone').val(),
                email: $('#email').val(),
                cnic: $('#cnic').val(),
                remarks: $('#remarks').val(),
                cty_id: $('#cty_id').val(),
                dplc_id: $('#dplc_id').val(),
                aggr_id: $('#aggr_id').val(),
                ref_id: $('#ref_id').val(),
                vlan: $('#vlan').val(),
            };
            
            
         

            var manager_id = $('#user_id').val();

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/managerupdate/'+manager_id,  // Replace with your API endpoint
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
                        showToast("bg-success","Manager Updated.",response.message)
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


$('#service_table').on('click', '.update', function() {
    
    
     let manager_id = $(this).data("user_id");
     let srv_id = $(this).data("srv_id");
      let commission = $(this).data("commission");
         $('#update_modal').modal('show');
    
        $("#update_commission").val(commission);
        $("#update_srvid").val(srv_id);
        $("#update_user_id").val(manager_id);
        
        
        
    
    
    
});

$("#commission_update_form").on('submit',function(e){
     e.preventDefault();
    $('#updateloadingBtn').show();
    $('#updateBtn').hide();
    
    
     
    
            let user_id = $('#update_user_id').val();
            
         const roles_id = '{{$roles_id}}';
        let updatename = '';
        
        switch (parseInt(roles_id)) {
            case 2:
                updatename = 'admin';
                break;
            case 3:
                updatename = 'franchise';
                break;
            case 4:
                updatename = 'dealer';
                break;
            case 5:
                updatename = 'subdealer';
                break;
            default:
                updatename = 'unknown';
        }
        
         // Prepare form data
           // Create the form data object
            let formData = {
                [updatename + 'Commission']: $('#update_commission').val(),
                srvid: $('#update_srvid').val(),
                user_id: $('#update_user_id').val(),
            };
        
            $.ajax({
                url: baseUrl+'/assignserviceupdate'+updatename,  // Replace with your API endpoint
                type: 'POST',
                data: JSON.stringify(formData),
                contentType: 'application/json',
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    console.log(response.status);

                    if (response.status === "1") {
                        showToast("bg-success","Commission Updated.",response.message)
                        load_service(user_id,"{{ $manager['roles_id'] }}");
                        // $('#subscriber_form')[0].reset();

                    }
                    else if (response.status === 2) {
                        // ALREADY AVALIABLE
                        showToast("bg-warning","Already Available. ",response.message)

                        // alert(response.message);
                    } else if (response.status === 3) {
                        //RADIUS SERVER ERROR
                        // showAlert(response.message,"danger");
                        showToast("bg-warning","Warrning. ",response.message)
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
                    
                         $('#update_modal').modal('hide');
                         $('#updateloadingBtn').hide();
                        $('#updateBtn').show();
                 }
            });
    
});


    $("#topup_amount").on('keyup',function(){
        
        let topup_amount = $('#topup_amount').val();
        $('.topup_amount_total').text(topup_amount+".00");
    })
    
    $(".topup_send").on('click',function(e){
        e.preventDefault();

        let sender = $(this).attr("data-sender");
        let receiver = $(this).attr("data-receiver");
        let TranId = $(this).attr("data-tranId");
        
        let topup_remarks = $('#topup_remarks').val();
        if (!topup_remarks.trim()) {
            topup_remarks = "Topup";
        }
        let payment_type = $('#payment_type').val();
        let topup_amount = $('#topup_amount').val();
        
        
     
        if(!payment_type){
            showAlert('Please select anyone payment type!',"warning");
            return;
        } else if(!topup_amount || topup_amount < 1){
            showAlert('Please type correct amount!',"warning");
            return;
        }
        
        $('.recharge_card').hide();
        $('.tran_card').css('display', 'flex');

        

        $.ajax({
                    url: baseUrl+'/topup/'+sender+'/'+receiver+'/'+topup_amount+'/'+TranId+'/'+payment_type+'/'+topup_remarks,  // Replace with your API endpoint
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

                            showToast("bg-success","Topup successfully",response.msg)
                            
                            // Play success sound
                            var audio = new Audio('/sound/success.mp3'); // Change to .mp3 if needed
                            audio.play();

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
    
     $(".topup_reverse").on('click',function(e){
        e.preventDefault();

        let sender = $(this).attr("data-sender");
        let receiver = $(this).attr("data-receiver");
        let TranId = $(this).attr("data-tranId");
        
        let topup_remarks = $('#refund_remarks').val();
        if (!topup_remarks.trim()) {
            topup_remarks = "Refund";
        }
        let payment_type = "Cash";
        let topup_amount = $('#refund_amount').val();
        
        
     
        if(!payment_type){
            showAlert('Please select anyone payment type!',"warning");
            return;
        } else if(!topup_amount || topup_amount < 1){
            showAlert('Please type correct amount!',"warning");
            return;
        }
        
        $('.recharge_card').hide();
        $('.tran_card').css('display', 'flex');

        

        $.ajax({
                    url: baseUrl+'/topuprefund/'+sender+'/'+receiver+'/'+topup_amount+'/'+TranId+'/'+payment_type+'/'+topup_remarks,  // Replace with your API endpoint
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

                            showToast("bg-success","Topup successfully",response.msg)
                            
                            // Play success sound
                            var audio = new Audio('/sound/success.mp3'); // Change to .mp3 if needed
                            audio.play();

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
    

    // Move from Admin to Manager
    $(".assign").click(function () {
        let dropdown = document.getElementById("serviceDropdown");
        let selectedValue = dropdown.value;
        
        let commission_amount = $("#commission_amount").val();
        let userid = $("#userid").val();
        
        $('.assign').hide();
        $.ajax({
                url: baseUrl+'/assignservicemanager',  // Replace with your API endpoint
                type: 'POST',
                data: {user_id:userid,commission:commission_amount,srvid:selectedValue},
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    console.log(response.status);

                    if (response.status === "1") {
                        // $('#changepasswordvalue').html(pass);
                        load_service(userid,"{{ $manager['roles_id'] }}");
                        load_withoutassingservice(userid);
                        $("#commission_amount").val(0);
                        showToast("bg-success","Service Assigned.",response.message);
                        // $('#subscriber_form')[0].reset();

                    }
                    else if (response.status === 2) {
                        //RADIUS SERVER ERROR
                        // showAlert(response.message,"danger");
                        load_withoutassingservice(userid);
                        showToast("bg-danger","Already Assigned. ",response.message)
                    }else if (response.status === 3) {
                        //RADIUS SERVER ERROR
                        // showAlert(response.message,"danger");
                        showToast("bg-warning","Warrning. ",response.message)
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
                // $('.loadingBtn').hide();
                $('.assign').show();
                 }
            });
        
        
    });

    // Move from Manager to Admin
    $("#remove").click(function () {
        $("#managerPackages option:selected").each(function () {
            $("#adminPackages").append($(this));
        });
    });
    
    $("#edit_updateSubscriber").on('change', function () {
                // Get the current state of the checkbox
                $('.loadingBtn').show();
                const isChecked = this.checked;

                 // Declare formData outside the if-else block
                    let formData;

                if (isChecked) {
                    formData = {
                        perm_updateSubscriber: 1,
                    };
                } else {
                    formData = {
                        perm_updateSubscriber: 0,
                    };
                }
                

                         $.ajax({
                            url: baseUrl+'/manager/permission/'+managers_name+'/4',  // Replace with your API endpoint
                            type: 'POST',
                             data: JSON.stringify(formData),
                            contentType: 'application/json',
                            headers: {
                                'Authorization': 'Bearer '+ encrypt, // Include token if needed
                                'Accept': 'application/json'
                            },
                        success: function (response) {

                            if (response.status === 1) {

                                if(response.status === 1){
                                    showToast("bg-success","Permission Update",response.message)
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
            
    $("#edit_AddDays").on('change', function () {
                // Get the current state of the checkbox
                $('.loadingBtn').show();
                const isChecked = this.checked;

                 // Declare formData outside the if-else block
                    let formData;

                if (isChecked) {
                    formData = {
                        perm_AddDays: 1,
                    };
                } else {
                    formData = {
                        perm_AddDays: 0,
                    };
                }
                

                         $.ajax({
                            url: baseUrl+'/manager/permission/'+managers_name+'/5',  // Replace with your API endpoint
                            type: 'POST',
                             data: JSON.stringify(formData),
                            contentType: 'application/json',
                            headers: {
                                'Authorization': 'Bearer '+ encrypt, // Include token if needed
                                'Accept': 'application/json'
                            },
                        success: function (response) {

                            if (response.status === 1) {

                                if(response.status === 1){
                                    showToast("bg-success","Permission Update",response.message)
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
    
     $("#edit_CardRecharge").on('change', function () {
                // Get the current state of the checkbox
                $('.loadingBtn').show();
                const isChecked = this.checked;

                 // Declare formData outside the if-else block
                    let formData;

                if (isChecked) {
                    formData = {
                        perm_CardRecharge: 1,
                    };
                } else {
                    formData = {
                        perm_CardRecharge: 0,
                    };
                }
                

                         $.ajax({
                            url: baseUrl+'/manager/permission/'+managers_name+'/3',  // Replace with your API endpoint
                            type: 'POST',
                             data: JSON.stringify(formData),
                            contentType: 'application/json',
                            headers: {
                                'Authorization': 'Bearer '+ encrypt, // Include token if needed
                                'Accept': 'application/json'
                            },
                        success: function (response) {

                            if (response.status === 1) {

                                if(response.status === 1){
                                    showToast("bg-success","Permission Update",response.message)
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
            
    $("#edit_expireservicechng").on('change', function () {
                // Get the current state of the checkbox
                $('.loadingBtn').show();
                const isChecked = this.checked;

                 // Declare formData outside the if-else block
                    let formData;

                if (isChecked) {
                    formData = {
                        perm_ExpireServiceChng: 1,
                    };
                } else {
                    formData = {
                        perm_ExpireServiceChng: 0,
                    };
                }
                

                         $.ajax({
                            url: baseUrl+'/manager/permission/'+managers_name+'/6',  // Replace with your API endpoint
                            type: 'POST',
                             data: JSON.stringify(formData),
                            contentType: 'application/json',
                            headers: {
                                'Authorization': 'Bearer '+ encrypt, // Include token if needed
                                'Accept': 'application/json'
                            },
                        success: function (response) {

                            if (response.status === 1) {

                                if(response.status === 1){
                                    showToast("bg-success","Permission Update",response.message)
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
    
    $("#edit_service").on('change', function () {
                // Get the current state of the checkbox
                $('.loadingBtn').show();
                const isChecked = this.checked;

                 // Declare formData outside the if-else block
                    let formData;

                if (isChecked) {
                    formData = {
                        perm_RolesEdit: 1,
                    };
                } else {
                    formData = {
                        perm_RolesEdit: 0,
                    };
                }
                

                         $.ajax({
                            url: baseUrl+'/manager/permission/'+managers_name+'/2',  // Replace with your API endpoint
                            type: 'POST',
                             data: JSON.stringify(formData),
                            contentType: 'application/json',
                            headers: {
                                'Authorization': 'Bearer '+ encrypt, // Include token if needed
                                'Accept': 'application/json'
                            },
                        success: function (response) {

                            if (response.status === 1) {

                                if(response.status === 1){
                                    showToast("bg-success","Permission Update",response.message)
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
    
    
    $("#edit_expire").on('change', function () {
                // Get the current state of the checkbox
                $('.loadingBtn').show();
                const isChecked = this.checked;

                 // Declare formData outside the if-else block
                    let formData;

                if (isChecked) {
                    formData = {
                        perm_ExpireEdit: 1,
                    };
                } else {
                    formData = {
                        perm_ExpireEdit: 0,
                    };
                }
                

                         $.ajax({
                            url: baseUrl+'/manager/permission/'+managers_name+'/1',  // Replace with your API endpoint
                            type: 'POST',
                             data: JSON.stringify(formData),
                            contentType: 'application/json',
                            headers: {
                                'Authorization': 'Bearer '+ encrypt, // Include token if needed
                                'Accept': 'application/json'
                            },
                        success: function (response) {

                            if (response.status === 1) {

                                if(response.status === 1){
                                    showToast("bg-success","Permission Update",response.message)
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
            
            
            $("#syncall").on('click',function(){
                
                
            $(".sync_loading").show();
            showToast("bg-success","Subscriber Synced.","Subscriber sync successfully")
            $(".sync_loading").hide();
   
        let userid = '{{ $manager['user_id'] }}';
   
       $.ajax({
                url: baseUrl+'/subscribersyncbulk/'+userid,  // Replace with your API endpoint
                type: 'POST',
                contentType: 'application/json',
                headers: {
                    'Authorization': 'Bearer '+ encrypt, // Include token if needed
                    'Accept': 'application/json'
                },
                success: function (response) {
                    
                    if (response.status === 1) {
                        // $(".sync_loading").hide();
                        showToast("bg-success","Subscriber Synced.",response.message)
                        // $('#subscriber_form')[0].reset();

                    }
                    
                }
       });
   
    
});
</script>

         <script src="{{ asset('js/subscriber_speed_graph.js') }}"></script>
        <script src="{{ asset('js/manager.js?v=1.0.0.2') }}"></script>
        <script src="{{ asset('js/function/showalert.js') }}"></script>
        <script src="{{ asset('js/function/toast.js') }}"></script>
@endsection

