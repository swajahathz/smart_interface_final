@extends('layouts.master')

@section('styles')
 
        <!-- GLIGHTBOX CSS -->
        <link rel="stylesheet" href="{{asset('build/assets/libs/glightbox/css/glightbox.min.css')}}">
      
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
                        <h1 class="page-title fw-semibold fs-18 mb-0">Profile</h1>
                        <div class="ms-md-1 ms-0">
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- Page Header Close -->

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xxl-4 col-xl-12">
                            <div class="card custom-card overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="d-sm-flex align-items-top p-4 border-bottom-0 main-profile-cover">
                                        <div>
                                            <span class="avatar avatar-xxl avatar-rounded online me-3">
                                                <img src="{{asset('build/assets/images/faces/9.png')}}" alt="">
                                            </span>
                                        </div>
                                        <div class="flex-fill main-profile-info">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6 class="fw-semibold mb-1 text-fixed-white">{{ ucwords($manager['managername']) }}</h6>
                                                
                                                @if($manager['enablemanager'] == 1)
    <button class="btn btn-sm btn-success btn-wave waves-effect">Active</button>
@elseif($manager['enablemanager'] == 0)
    <button class="btn btn-sm btn-danger btn-wave waves-effect">Disable</button>
@endif
                                                
                                                
                                            </div>
                                            <p class="mb-1 text-muted text-fixed-white op-7">{{ ucwords($manager['firstname']) }}
 {{ ucwords($manager['lastname']) }}
</p>
                                            <p class="fs-12 text-fixed-white mb-4 op-5">
                                                <span><i class="ri-map-pin-line me-1 align-middle"></i>{{ ucwords($manager['address']) }}
</span> 
                                            </p>
                                            <div class="d-flex mb-0">
                                                <div class="me-4">
                                                    <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">{{ ucwords($manager['balance']) }}
</p>
                                                    <p class="mb-0 fs-11 op-5 text-fixed-white">Wallet Balance</p>
                                                </div>
                                                <!--<div class="me-4">-->
                                                <!--    <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">12</p>-->
                                                <!--    <p class="mb-0 fs-11 op-5 text-fixed-white">Services</p>-->
                                                <!--</div>-->
                                                <!--<div class="me-4">-->
                                                <!--    <p class="fw-bold fs-20 text-fixed-white text-shadow mb-0">128</p>-->
                                                <!--    <p class="mb-0 fs-11 op-5 text-fixed-white">Following</p>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        .profile_boxs{
                                                background-color: #fffffffc;
    color: black;
    border: 1px dotted #c8cefb;
    border-radius: 5px;
    padding: 10px 10px;
                                        }
                                    </style>
                                    <div class="border-bottom border-block-end-dashed d-flex justify-content-evenly" style="background-color: #f4f7ff;padding: 5px 0;">
                                        <div class="profile_boxs">
                                            <h6 class="fw-semibold mb-1">{{ $total_service }}</h6>
                                            <p class="mb-1 text-muted op-7">Services</p>
                                        </div>
                                        <div class="profile_boxs">
                                            <h6 class="fw-semibold mb-1">{{ $total_users }}</h6>
                                            <p class="mb-1 text-muted op-7">Subscriber</p>
                                        </div>
                                        <div class="profile_boxs">
                                            <h6 class="fw-semibold mb-1 ">{{ $total_sd }}</h6>
                                            <p class="mb-1 text-muted op-7">SubDealer</p>
                                        </div>
                                    </div>
                                    <div class="p-4 border-bottom border-block-end-dashed">
                                        <p class="fs-15 mb-2 me-4 fw-semibold">Contact Information :</p>
                                        <div class="text-muted">
                                            <p class="mb-2">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                                    <i class="ri-mail-line align-middle fs-14"></i>
                                                </span>
                                                {{ $manager['email'] }}

                                            </p>
                                            <p class="mb-2">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                                    <i class="ri-phone-line align-middle fs-14"></i>
                                                </span>
                                                {{ $manager['mobile'] }}
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted"style="margin-left:20px;">
                                                    <i class="ri-whatsapp-line align-middle fs-14"></i>
                                                </span>
                                                {{ $manager['phone'] }}
                                            </p>
                                            <p class="mb-0">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light text-muted">
                                                    <i class="ri-map-pin-line align-middle fs-14"></i>
                                                </span>
                                                {{ $manager['address'] }}
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="p-4 border-bottom border-block-end-dashed d-flex align-items-center">
                                        
                                        <div class="btn-group">
                                            <button class="btn btn-primary-light btn-sm" style="font-size: .65rem;">Account Type</button>
                                                <button class="btn btn-primary btn-sm" style="font-size: .65rem;">@if($manager['roles_id'] == 2)
                                                            Admin
                                                        @elseif($manager['roles_id'] == 3)
                                                            Franchise
                                                        @elseif($manager['roles_id'] == 4)
                                                            Dealer
                                                        @elseif($manager['roles_id'] == 5)
                                                            Subdealer
                                                        @elseif($manager['roles_id'] == 6)
                                                            Junior Dealer
                                                        @endif</button>
                                                
                                        </div>
                                        <!--<div class="btn-group" style="margin-left:5px;">-->
                                        <!--        <button class="btn btn-secondary btn-sm" style="font-size: .65rem;">Superadmin</button>-->
                                        <!--        <button class="btn btn-secondary-light btn-sm" style="font-size: .65rem;">Created By</button>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card custom-card">
                                        <div class="card-body p-0">
                                            <div class="p-3 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                                                <div>
                                                    <ul class="nav nav-tabs mb-0 tab-style-6 justify-content-start" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="activity-tab" data-bs-toggle="tab"
                                                                data-bs-target="#activity-tab-pane" type="button" role="tab"
                                                                aria-controls="activity-tab-pane" aria-selected="true"><i
                                                                    class="bx bx bxs-user-detail me-1 align-middle d-inline-block"></i>Profile</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="posts-tab" data-bs-toggle="tab"
                                                                data-bs-target="#posts-tab-pane" type="button" role="tab"
                                                                aria-controls="posts-tab-pane" aria-selected="false"><i
                                                                    class="bx bx-purchase-tag me-1 align-middle d-inline-block"></i>Services</button>
                                                        </li>
                                                        <!--<li class="nav-item" role="presentation">-->
                                                        <!--    <button class="nav-link" id="followers-tab" data-bs-toggle="tab"-->
                                                        <!--        data-bs-target="#followers-tab-pane" type="button" role="tab"-->
                                                        <!--        aria-controls="followers-tab-pane" aria-selected="false"><i-->
                                                        <!--            class="bx bx-universal-access me-1 align-middle d-inline-block"></i>Subscriber</button>-->
                                                        <!--</li>-->
                                                        <!--<li class="nav-item" role="presentation">-->
                                                        <!--    <button class="nav-link" id="gallery-tab" data-bs-toggle="tab"-->
                                                        <!--        data-bs-target="#gallery-tab-pane" type="button" role="tab"-->
                                                        <!--        aria-controls="gallery-tab-pane" aria-selected="false"><i-->
                                                        <!--            class="bx bx-wallet me-1 align-middle d-inline-block"></i>Topup</button>-->
                                                        <!--</li>-->
                                                    </ul>
                                                </div>   
                                                <!--<div>-->
                                                <!--    <button class="btn btn-danger-light">Change Password</button>-->
                                                <!--</div> -->
                                            </div>
                                            <div class="p-3">
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane show active fade p-0 border-0" id="activity-tab-pane"
                                                        role="tabpanel" aria-labelledby="activity-tab" tabindex="0">
                                                        <form id="subscriber_form" method="POST">
                                                        <div class="row gy-4 mb-4">
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" name="m" class="form-control" value="{{ $manager['managername'] }}" disabled>
                                                                                <div class="input-group-text">Managername</div>
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                         <div class="input-group">
                                                                                <div class="input-group-text">Password</div>
                                                                                <input type="password" class="form-control" id="password" value="{{ $manager['token'] }}" placeholder="Type your password Min 8" required>
                                                                                <button class="btn btn-light" type="button" onclick="createpassword('password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" id="firstname" value="{{ $manager['firstname'] }}" placeholder="Type firstname" disabled>
                                                                                <input type="hidden" class="form-control" id="user_id" value="{{ $manager['user_id'] }}" required>
                                                                                <input type="hidden" class="form-control" id="token" value="{{$token}}" disabled>
                                                                                <div class="input-group-text">Firstname</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <!-- <div class="input-group-text"><i class="ri-smartphone-line"></i></div> -->
                                                                                <input type="text" class="form-control" id="lastname" value="{{ $manager['lastname'] }}" placeholder="Type lastname"  disabled>
                                                                                <div class="input-group-text">Lastname</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-12">
                                                                        <!-- <label for="address" class="form-label">Address</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-map-pin-user-fill"></i></div>
                                                                                <input type="text" class="form-control" id="address" value="{{ $manager['address'] }}" placeholder="Type address" disabled>
                                                                                <div class="input-group-text">Address</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="mobile" class="form-label">Mobile</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-smartphone-line"></i></div>
                                                                                <input type="number" class="form-control" id="mobile" value="{{ $manager['mobile'] }}" placeholder="9X XXX XXXXXXX" disabled>
                                                                                <div class="input-group-text">Mobile</div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-whatsapp-line"></i></div>
                                                                                <input type="number" class="form-control" id="phone" value="{{ $manager['phone'] }}" placeholder="9X XXX XXXXXXX" disabled>
                                                                                <div class="input-group-text">Whatsapp</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-mail-line"></i></div>
                                                                                <input type="text" class="form-control" id="email" value="{{ $manager['email'] }}" placeholder="abc@gmail.com" disabled>
                                                                                <div class="input-group-text">Email</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!-- <label for="phone" class="form-label">Whatsapp</label> -->
                                                                        <div class="input-group">
                                                                                <div class="input-group-text"><i class="ri-mail-line"></i></div>
                                                                                <input type="text" class="form-control" id="cnic" value="{{ $manager['cnic'] }}" placeholder="Type national id card #" disabled>
                                                                                <div class="input-group-text">ID Card</div>
                                                                                
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-12">
                                                                        <label for="job-description" class="form-label">Description :</label>
                                                                        <textarea class="form-control" id="remarks" rows="2"  disabled>{{ $manager['remarks'] }}</textarea>
                                                                    </div>
                                                                </div>
                                                                  <button type="submit" id="submitBtn" href="javascript:void(0);" class="btn btn-primary-light btn-wave waves-effect waves-light" style="width:100%;">
                                                                                Update Password
                                                                            </button>
                                                                            <button class="btn btn-primary-light loadingBtn" style="display:none;width:100%;" type="button" disabled="">
                                                                                <span class="spinner-border spinner-border-sm align-middle" role="status" aria-hidden="true"></span>
                                                                                Loading...
                                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade p-0 border-0" id="posts-tab-pane"
                                                        role="tabpanel" aria-labelledby="posts-tab" tabindex="0">
                                                        <div class="table-responsive">
                                                                    <table id="datatable" class="table table-bordered text-nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <td>#</td>
                                                                    <td>Service Name</td>
                                                                    <td>Price</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade p-0 border-0" id="followers-tab-pane"
                                                        role="tabpanel" aria-labelledby="followers-tab" tabindex="0">
                                                        <div class="row">
                                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                                <div class="card custom-card shadow-none border">
                                                                    <div class="card-body p-4">
                                                                        <div class="text-center">
                                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                                <img src="{{asset('build/assets/images/faces/2.jpg')}}" alt="">
                                                                            </span>
                                                                            <div class="mt-2">
                                                                                <p class="mb-0 fw-semibold">Samantha May</p>
                                                                                <p class="fs-12 op-7 mb-1 text-muted">samanthamay2912@gmail.com</p>
                                                                                <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-center">
                                                                        <div class="btn-list">
                                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                                <div class="card custom-card shadow-none border">
                                                                    <div class="card-body p-4">
                                                                        <div class="text-center">
                                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                                <img src="{{asset('build/assets/images/faces/15.jpg')}}" alt="">
                                                                            </span>
                                                                            <div class="mt-2">
                                                                                <p class="mb-0 fw-semibold">Andrew Garfield</p>
                                                                                <p class="fs-12 op-7 mb-1 text-muted">andrewgarfield98@gmail.com</p>
                                                                                <span class="badge bg-success-transparent rounded-pill">Team Lead</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-center">
                                                                        <div class="btn-list">
                                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                                <div class="card custom-card shadow-none border">
                                                                    <div class="card-body p-4">
                                                                        <div class="text-center">
                                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                                <img src="{{asset('build/assets/images/faces/5.jpg')}}" alt="">
                                                                            </span>
                                                                            <div class="mt-2">
                                                                                <p class="mb-0 fw-semibold">Jessica Cashew</p>
                                                                                <p class="fs-12 op-7 mb-1 text-muted">jessicacashew143@gmail.com</p>
                                                                                <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-center">
                                                                        <div class="btn-list">
                                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                                <div class="card custom-card shadow-none border">
                                                                    <div class="card-body p-4">
                                                                        <div class="text-center">
                                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                                <img src="{{asset('build/assets/images/faces/11.jpg')}}" alt="">
                                                                            </span>
                                                                            <div class="mt-2">
                                                                                <p class="mb-0 fw-semibold">Simon Cowan</p>
                                                                                <p class="fs-12 op-7 mb-1 text-muted">jessicacashew143@gmail.com</p>
                                                                                <span class="badge bg-warning-transparent rounded-pill">Team Manager</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-center">
                                                                        <div class="btn-list">
                                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                                <div class="card custom-card shadow-none border">
                                                                    <div class="card-body p-4">
                                                                        <div class="text-center">
                                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                                <img src="{{asset('build/assets/images/faces/7.jpg')}}" alt="">
                                                                            </span>
                                                                            <div class="mt-2">
                                                                                <p class="mb-0 fw-semibold">Amanda nunes</p>
                                                                                <p class="fs-12 op-7 mb-1 text-muted">amandanunes45@gmail.com</p>
                                                                                <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-center">
                                                                        <div class="btn-list">
                                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                                <div class="card custom-card shadow-none border">
                                                                    <div class="card-body p-4">
                                                                        <div class="text-center">
                                                                            <span class="avatar avatar-xl avatar-rounded">
                                                                                <img src="{{asset('build/assets/images/faces/12.jpg')}}" alt="">
                                                                            </span>
                                                                            <div class="mt-2">
                                                                                <p class="mb-0 fw-semibold">Mahira Hose</p>
                                                                                <p class="fs-12 op-7 mb-1 text-muted">mahirahose9456@gmail.com</p>
                                                                                <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer text-center">
                                                                        <div class="btn-list">
                                                                            <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                            <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="text-center mt-4">
                                                                    <button class="btn btn-primary-light btn-wave">Show All</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade p-0 border-0" id="gallery-tab-pane"
                                                        role="tabpanel" aria-labelledby="gallery-tab" tabindex="0">
                                                        <div class="row">
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-40.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-40.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-41.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-41.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-42.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-42.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-43.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-43.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-44.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-44.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-45.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-45.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-46.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-46.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-60.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-60.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-26.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-26.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-32.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-32.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-30.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-30.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                                <a href="{{asset('build/assets/images/media/media-31.jpg')}}" class="glightbox card" data-gallery="gallery1">
                                                                    <img src="{{asset('build/assets/images/media/media-31.jpg')}}" alt="image" >
                                                                </a>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="text-center mt-4">
                                                                    <button class="btn btn-primary-light btn-wave">Show All</button>
                                                                </div>
                                                            </div>
                                                        </div>
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

        <!-- GLIGHTBOX JS -->
        <script src="{{asset('build/assets/libs/glightbox/js/glightbox.min.js')}}"></script>
        
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

        <!-- INTERNAL PROFILE JS -->
        <!--@vite('resources/assets/js/profile.js')-->
        <script>
        
              let encrypt = "{{ $token }}";
            let baseUrl = "{{ config('app.api_base_url') }}";
        
        
        
        
        
            $('#subscriber_form').on('submit', function (e) {
                    e.preventDefault();


            // Disable all inputs and buttons
          $('#subscriber_form input, #subscriber_form button').prop('disabled', true);
            $('#submitBtn').hide();
            $('.loadingBtn').show();

          
            // Prepare form data
            let formData = {
               
                token: $('#password').val(),
            };

            var manager_id = $('#user_id').val();

            // Send AJAX request
            $.ajax({
                url: baseUrl+'/managerpasswordupdate',  // Replace with your API endpoint
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



$("#posts-tab").on('click',function(){
    load_datatable();
});

              function load_datatable(){
// Destroy the existing DataTable instance (if exists)
                if ($.fn.dataTable.isDataTable('#datatable')) {
                    $('#datatable').DataTable().clear().destroy();
                }
                // basic datatable
              $('#datatable').DataTable({
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                            },
                            "pageLength": 10,
                            "ajax": {
                                "url": baseUrl+"/service_list", // Replace with your API URL
                                "type": "POST",
                                "dataSrc": "", // Adjust based on your API response format, e.g., "data" if necessary
                                "beforeSend": function(xhr) {
                                    xhr.setRequestHeader("Authorization", "Bearer "+encrypt); // Replace YOUR_TOKEN with the actual token
                                }
                            },
                            "columns": [
                                { "data": null },  // For serial number
                                { "data": "service.srvname" },
                                { "data": "total_price" }
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
        </script>
        <script src="{{ asset('js/function/showalert.js') }}"></script>
        <script src="{{ asset('js/function/toast.js') }}"></script>

     <!-- SHOW PASSWORD JS -->
        <script src="https://ns.networld.pk/build/assets/show-password.js"></script>
@endsection