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
                        <div>
                            <p class="fw-semibold fs-18 mb-0">Welcome back, {{ $firstname.' '.$lastname }} !</p>
                            <span class="fs-semibold text-muted">Track your subscriber activity here.</span>
                        </div>
                        <div class="btn-list mt-md-0 mt-2">
                            <button type="button"  class="btn btn-primary btn-wave">
                                <div id="wallet_balance" style="display:none;margin:0;"></div><span class="spinner-border spinner-border-sm align-middle balance_loading" role="status" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-wave" id="pending_commission" onclick="window.location.href='commission'">
                                <span class="spinner-border spinner-border-sm align-middle balance_loading" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>

                    <!-- End::page-header -->

                    <!-- Start::row-1 -->
                    <div class="row">
                        <div class="col-xxl-9 col-xl-9">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card custom-card crm-highlight-card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <div class="fw-semibold fs-16 text-fixed-white mb-2">Your recharge target</div>
                                                            <span class="d-block fs-11 text-fixed-white"><span class="op-7">You have so far charged</span> <span class="fw-semibold text-warning">48%</span> <span class="op-7">of your subscribers this month compared to your active subscribers.</span>.</span>
                                                        </div>
                                                        <div>
                                                            <div id="crm-main"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="card custom-card">
                                            <div class="card-header  justify-content-between">
                                                <div class="card-title">
                                                    Recent Topups
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                   
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled crm-top-deals mb-0" id="recent-topups-list">
                                                    
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="row">
                                        
                                        <div class="col-xxl-3 col-lg-3 col-md-3">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Total</p>
                                                                    <h4 id="totalValue" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="subscriber">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                    <p  id="percentageValue" class="mb-0 text-primary fw-semibold">40%</p>
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
                                                                    <p class="text-muted mb-0">Active</p>
                                                                    <h4 id="activeValue" class="fw-semibold mt-1 fs-20 shimmer">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="subscriber">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                    <p class="mb-0 text-success fw-semibold">60%</p>
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
                                                                    <p class="text-muted mb-0">Expire</p>
                                                                    <h4 id="expireValue" class="fw-semibold mt-1 fs-20 shimmer">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="subscriber">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                    <p class="mb-0 text-success fw-semibold">10%</p>
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
                                                                    <p class="text-muted mb-0">Disable</p>
                                                                    <h4 id="disableValue" class="fw-semibold mt-1 fs-20 shimmer">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="subscriber">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                    <p class="mb-0 text-success fw-semibold">2%</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                         <div class="col-xxl-6 col-lg-6 col-md-6">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Expire in 3 Days</p>
                                                                    <h4 id="expire3Value" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="subscriber/upcomingexpire/list">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                    <p  id="3daysamount" class="mb-0 text-primary fw-semibold">0</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-xxl-6 col-lg-6 col-md-6">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body" style="padding:1rem;"> 
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        
                                                        <div class="flex-fill">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Expire in 5 Days</p>
                                                                    <h4 id="expire5Value" class="fw-semibold mt-1 fs-20">0</h4>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-between mt-1">
                                                                <div>
                                                                    <a class="text-primary fs-11" href="subscriber/upcomingexpire/list">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                                <div class="text-end">
                                                                    <p id="5daysamount" class="mb-0 text-primary fw-semibold">0</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xxl-6 col-lg-6 col-md-6">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        <div>
                                                            <span class="avatar avatar-md avatar-rounded bg-primary">
                                                                <i class="ti ti-wallet fs-16"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-fill ms-3">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Topup Send</p>
                                                                    <h4 id="thismonthtopup" class="fw-semibold mt-1 fs-16">0</h4>
                                                                </div>
                                                                <div>
                                                                    <a class="text-primary fs-11" href="/topup/invoices">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6 col-lg-6 col-md-6">
                                            <div class="card custom-card overflow-hidden">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-top justify-content-between">
                                                        <div>
                                                            <span class="avatar avatar-md avatar-rounded bg-secondary">
                                                                <i class="ti ti-wallet fs-16"></i>
                                                            </span>
                                                        </div>
                                                        <div class="flex-fill ms-3">
                                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                                <div>
                                                                    <p class="text-muted mb-0">Last Month</p>
                                                                    <h4 id="lastmonthtopup" class="fw-semibold mt-1 fs-16">0</h4>
                                                                </div>
                                                                <div>
                                                                    <a class="text-primary fs-11" href="/topup/invoices">View All<i class="ti ti-arrow-narrow-right ms-1 fw-semibold d-inline-block"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<div class="col-xl-12">-->
                                        <!--    <div class="card custom-card">-->
                                        <!--        <div class="card-header justify-content-between">-->
                                        <!--            <div class="card-title">-->
                                        <!--                Revenue Analytics-->
                                        <!--            </div>-->
                                                    <!--<div class="dropdown">-->
                                                    <!--    <a href="javascript:void(0);" class="p-2 fs-12 text-muted" data-bs-toggle="dropdown"-->
                                                    <!--        aria-expanded="false">-->
                                                    <!--        View All<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>-->
                                                    <!--    </a>-->
                                                    <!--    <ul class="dropdown-menu" role="menu">-->
                                                    <!--        <li><a class="dropdown-item" href="javascript:void(0);">Today</a></li>-->
                                                    <!--        <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>-->
                                                    <!--        <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>-->
                                                    <!--    </ul>-->
                                                    <!--</div>-->
                                        <!--        </div>-->
                                        <!--        <div class="card-body">-->
                                        <!--            <div class="content-wrapper">-->
                                        <!--                <div id="crm-revenue-analytics"></div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-12 col-xl-6">
                                            <div class="card custom-card">
                                                <div class="card-header justify-content-between">
                                                    <div class="card-title">
                                                        Online Subscribers
                                                    </div>
                                                    <div class="dropdown">
                                                        <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-sm btn-light refresh">
                                                            <i class="bx bx-refresh fs-15"></i>
                                                        </a>
                                                        <!--<ul class="dropdown-menu">-->
                                                        <!--    <li><a class="dropdown-item" href="javascript:void(0);">Week</a></li>-->
                                                        <!--    <li><a class="dropdown-item" href="javascript:void(0);">Month</a></li>-->
                                                        <!--    <li><a class="dropdown-item" href="javascript:void(0);">Year</a></li>-->
                                                        <!--</ul>-->
                                                    </div>
                                                </div>
                                                <div class="card-body p-0 overflow-hidden">
                                                    <div class="leads-source-chart d-flex align-items-center justify-content-center">
                                                        <canvas id="leads-source2" class="chartjs-chart w-100 p-4"></canvas>
                                                        <div class="lead-source-value">
                                                            <span class="spinner-border spinner-border-md align-middle spinner" role="status" aria-hidden="true"></span>
                                                            <div class="online_area" style="display:none;">
                                                            <span class="d-block fs-14">Total</span>
                                                            <span id="totalOnline" class="d-block fs-25 fw-bold">0</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="/subscriber/online">
                                                    <div class="row row-cols-12 border-top border-block-start-dashed">
                                                        <div class="col p-0">
                                                            <div class="ps-4 py-3 pe-3 text-center border-end border-inline-end-dashed">
                                                                <span class="text-muted fs-11 mb-1 crm-lead-legend mobile d-inline-block">Active
                                                                </span>
                                                                <span class="spinner-border spinner-border-sm align-middle spinner" role="status" aria-hidden="true"></span>
                                                                <div class="online_area" style="display:none;"><span  id="totalActive" class="fs-14 fw-semibold">1,624</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col p-0">
                                                            <div class="p-3 text-center border-end border-inline-end-dashed">
                                                                <span class="text-muted fs-11 mb-1 crm-lead-legend desktop d-inline-block">Expire
                                                                </span>
                                                                <span class="spinner-border spinner-border-sm align-middle spinner" role="status" aria-hidden="true"></span>
                                                                <div class="online_area" style="display:none;"><span  id="totalExpire" class="fs-14 fw-semibold">1,267</span></div>
                                                            </div>
                                                        </div>
                                                        <div class="col p-0">
                                                            <div class="p-3 text-center border-end border-inline-end-dashed">
                                                                <span class="text-muted fs-11 mb-1 crm-lead-legend laptop d-inline-block">Disable
                                                                </span>
                                                                <span class="spinner-border spinner-border-sm align-middle spinner" role="status" aria-hidden="true"></span>
                                                                <div class="online_area" style="display:none;"><span  id="totalDisable" class="fs-14 fw-semibold">1,153</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col p-0">
                                                            <div class="p-3 text-center">
                                                                <span class="text-muted fs-11 mb-1 crm-lead-legend tablet d-inline-block">Offline
                                                                </span>
                                                                <span class="spinner-border spinner-border-sm align-middle spinner" role="status" aria-hidden="true"></span>
                                                                <div class="online_area" style="display:none;"><span  id="totalOffline" class="fs-14 fw-semibold">679</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-12 col-xl-6">
                                            <div class="card custom-card">
                                                <div class="card-header justify-content-between">
                                                    <div class="card-title">
                                                        Service Wise Subscriber
                                                    </div>
                                                    <!--<div class="dropdown">-->
                                                        <!--<a href="javascript:void(0);" class="p-2 fs-12 text-muted" data-bs-toggle="dropdown" aria-expanded="false">-->
                                                        <!--    View All<i class="ri-arrow-down-s-line align-middle ms-1 d-inline-block"></i>-->
                                                        <!--</a>-->
                                                        <!--<ul class="dropdown-menu" role="menu">-->
                                                        <!--    <li><a class="dropdown-item" href="javascript:void(0);">Today</a></li>-->
                                                        <!--    <li><a class="dropdown-item" href="javascript:void(0);">This Week</a></li>-->
                                                        <!--    <li><a class="dropdown-item" href="javascript:void(0);">Last Week</a></li>-->
                                                        <!--</ul>-->
                                                    <!--</div>-->
                                                </div>
                                                <!--<div class="card-body">-->
                                                <!--    <div class="d-flex align-items-center mb-3">-->
                                                <!--        <h4 class="fw-bold mb-0">4,289</h4>-->
                                                <!--        <div class="ms-2">-->
                                                <!--            <span class="text-muted ms-1">Total Active subscriber</span>-->
                                                <!--        </div>-->
                                                <!--    </div>-->
                                                <!--    <div class="progress-stacked progress-animate progress-xs mb-4">-->
                                                <!--        <div class="progress-bar" role="progressbar" style="width: 21%" aria-valuenow="21" aria-valuemin="0" aria-valuemax="100"></div>-->
                                                <!--        <div class="progress-bar bg-info" role="progressbar" style="width: 26%" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></div>-->
                                                <!--        <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>-->
                                                <!--        <div class="progress-bar bg-success" role="progressbar" style="width: 18%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>-->
                                                <!--    </div>-->
                                                <!--    <ul class="list-unstyled mb-0 pt-2 crm-deals-status">-->
                                                <!--        <li class="primary">-->
                                                <!--            <div class="d-flex align-items-center justify-content-between">-->
                                                <!--                <div>10 Mbps</div>-->
                                                <!--                <div class="fs-12 text-muted">987 active</div>-->
                                                <!--            </div>-->
                                                <!--        </li>-->
                                                <!--    </ul>-->
                                                <!--</div>-->
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
            
            
        <!-- APEX CHARTS JS -->
        <script src="{{asset('build/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <!-- CHARTJS CHART JS -->
        <script src="{{asset('build/assets/libs/chart.js/chart.min.js')}}"></script>

        <script>
        // let encrypt = "";
        var encrypt = 'Bearer ' + '{{$token}}';
        let baseUrl = "{{ config('app.api_base_url') }}";
        let id = "{{ $user_id }}";
        let roles_id = "{{ $roles_id }}";
        
       

            $.ajax({
                    url: baseUrl+'/dashboardinfo/'+roles_id,
                    method: 'GET',
                    headers: {
                        'Authorization': encrypt
                    },
                    beforeSend: function() {
                        // Show shimmer
                        $('#totalValue').addClass('shimmer').text('Loading...');
                        $('#activeValue').addClass('shimmer').text('Loading...');
                        $('#expireValue').addClass('shimmer').text('Loading...');
                        $('#disableValue').addClass('shimmer').text('Loading...');
                        $('#thismonthtopup').addClass('shimmer').text('Loading...');
                        $('#lastmonthtopup').addClass('shimmer').text('Loading...');
                        $('#expire3Value').addClass('shimmer').text('Loading...');
                        $('#expire5Value').addClass('shimmer').text('Loading...');
                        
                        
                    },
                    success: function(response) {
                        
                        $(".balance_loading").hide();
                        $('#wallet_balance').show();
                        // Remove shimmer and update values
                        $('#totalValue').removeClass('shimmer').text(response.total_users);      // e.g. "1,02,890"
                        $('#activeValue').removeClass('shimmer').text(response.active_users);
                        $('#expireValue').removeClass('shimmer').text(response.expired_users);
                        $('#disableValue').removeClass('shimmer').text(response.disabled_users);
                        $('#thismonthtopup').removeClass('shimmer').text(response.thismonthtopup);
                        $('#lastmonthtopup').removeClass('shimmer').text(response.lastmonthtopup);
                        $('#wallet_balance').removeClass('shimmer').text("Wallet "+response.balance);
                        $('#pending_commission').removeClass('shimmer').text("Commission "+response.commission);
                        $('#expire3Value').removeClass('shimmer').text(response.upcomingexpire3days);
                        $('#expire5Value').removeClass('shimmer').text(response.upcomingexpire5days);
                        $('#3daysamount').removeClass('shimmer').text(response.upcomingExpire3Days_amount);
                        $('#5daysamount').removeClass('shimmer').text(response.upcomingExpire5Days_amount);
                        
                    },
                    error: function(xhr, status, error) {
                                    console.error('AJAX Error:', {
                                        status: status,
                                        error: error,
                                        responseText: xhr.responseText
                                    });
                                
                                    // You can also show it on screen or log it for debugging
                                    $('#totalValue').removeClass('shimmer').text('Error: ' + error);
                                    $('#activeValue').removeClass('shimmer').text('');
                                    $('#expireValue').removeClass('shimmer').text('');
                                    $('#disableValue').removeClass('shimmer').text('');
                                    $('#thismonthtopup').removeClass('shimmer').text('');
                                    $('#lastmonthtopup').removeClass('shimmer').text('');
                                }
                });
                
                
                
                
                
                function animateCount(el, start, end, duration) {
                        let range = end - start;
                        let current = start;
                        let increment = range / (duration / 20); // change every 20ms
                        let timer = setInterval(function () {
                            current += increment;
                            if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
                                current = end;
                                clearInterval(timer);
                            }
                            el.textContent = Math.floor(current);
                        }, 20);
                    }
                    
              
                
                

                function updateValueViaAjax() {
                    
                      let currentValue = 0; // initial value shown
                    
                            $.ajax({
                            url: baseUrl+'/subscriber_online_count_main_total/'+id+'/'+roles_id,
                            method: 'GET',
                            headers: {
                                'Authorization': encrypt
                            },
                                 beforeSend: function() {
                                $('.spinner').show();
                                $('.online_area').hide();
                                
                                $('.spinner1').show();
                                $('.online_area1').hide();
                                // Show shimmer
                                // $('#totalValue').addClass('shimmer').text('Loading...');
                            },
                            success: function(response) {
                                // Remove shimmer and update values
                                $('.spinner').hide();
                                $('.online_area').show();
                                $('.spinner1').hide();
                                $('.online_area1').show();
                                   animateCount(document.getElementById('totalOnline'), currentValue, response.total_online.total_online, 1000);
                                animateCount(document.getElementById('totalActive'), currentValue, response.total_online.active_users, 1000);
                                animateCount(document.getElementById('totalExpire'), currentValue, response.total_online.expire_users, 1000);
                                animateCount(document.getElementById('totalDisable'), currentValue, response.total_online.disabled_users, 1000);
                                animateCount(document.getElementById('totalOffline'), currentValue, response.total_online.offline_users, 1000);
                                
                               var total = response.total_online.active_users;
                                 var offline = response.total_online.offline_users;
                                 var expire = response.total_online.expire_users;
                                 var disable = response.total_online.disabled_users;
                        
                        
                                 graph(total,expire,disable,offline);
                            },
                            error: function() {
                                $('.online_area').text('Error');
                                
                                 $('.online_area').text('Error');
                                 $('.online_area1').text('Error');
                            }
                        });
                }
                
                updateValueViaAjax();
                
                
                $(".refresh").on('click',function(){
                    updateValueViaAjax();
                });
                
                
                
                $.ajax({
                    url: baseUrl+'/manager/last5invoice/'+id,
                    method: 'POST',
                    headers: {
                        'Authorization': encrypt // Replace `encrypt` with your actual token variable
                    },
                    beforeSend: function() {
                        $('#recent-topups-list').html('<li>Loading...</li>');
                    },
                    success: function(response) {
                        
                        let html = '';
                        response.forEach(function(item) {
                            html += `
                                <li>
                                    <div class="d-flex align-items-top flex-wrap">
                                        <div class="me-2">
                                            <span class="avatar avatar-sm avatar-rounded bg-primary-transparent fw-semibold">
                                                TS
                                            </span>
                                        </div>
                                        <div class="flex-fill">
                                            <p class="fw-semibold mb-0">${item.recevierName}</p>
                                            <span class="text-muted fs-12">${item.datetime}</span>
                                        </div>
                                        <div class="fw-semibold fs-15">${item.amount}</div>
                                    </div>
                                </li>
                            `;
                        });
                        $('#recent-topups-list').html(html);
                    },
                    error: function(xhr) {
                        $('#recent-topups-list').html('<li>Error loading data.</li>');
                    }
                });
                
                       function graph(total,active,expire,disable){
                    
                     var ctx = document.getElementById('leads-source2');
      
      
                              var primaryColor = getComputedStyle(document.documentElement).getPropertyValue('--primary-color').trim();
                
                                var myChart = new Chart(ctx, {
                                    type: 'doughnut', // ya bar, line
                                    data: {
                                        datasets: [{
                                            data: [total, active, expire, disable],
                                            backgroundColor: [primaryColor, "#23B7E5", "#FFB11F", "#00CE94"]
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        maintainAspectRatio: false,
                                        cutout: '90%'
                                    }
                });
                    
                }

        </script>

      


       

    
@endsection