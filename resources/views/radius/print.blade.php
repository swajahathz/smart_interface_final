<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- META DATA -->
		<meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="description" content="{{ $domainSettings['description'] }}">


<meta name="author" content="SmartISPsolutions Team">
<meta name="keywords" content="radius billing system, ISP billing software, smartISPsolutions, free radius manager, internet billing system, PPPoE billing, broadband billing software, ISP management system, bandwidth manager, freeradius laravel, mikrotik billing, ISP automation, radius server GUI, smart isp, hotspot billing system, internet plan management">

        
        <!-- TITLE -->
		<title>{{ $domainSettings['title'] }}</title>

        <!-- FAVICON -->
        <link rel="icon" href="{{ $domainSettings['fav'] }}" type="image/png">

        <!-- BOOTSTRAP CSS -->
	    <link  id="style" href="{{asset('build/assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- ICONS CSS -->
        <link href="{{asset('build/assets/icon-fonts/icons.css')}}" rel="stylesheet">
        
        <!-- APP SCSS -->
        @vite(['resources/sass/app.scss'])


        @include('layouts.components.styles')

        <!-- MAIN JS -->
        <script src="{{asset('build/assets/main.js')}}"></script>

        @yield('styles')
        
     

	</head>

	<body>

<div class="card custom-card" id="invoice_area" style="width:70%;margin:auto;">
    
                                <div class="card-header d-md-flex d-block">
                                    {!! $domainSettings['logo'] !!}
                                </div>
                                <div class="card-body">
                                    <div class="row gy-3">
                                        <div class="col-xl-12">
                                            <div class="row">
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                                    <p class="text-muted mb-2">
                                                        Billing From :
                                                    </p>
                                                    <p class="fw-bold mb-1">
                                                        {{ $admin_info['com_name'] }}
                                                    </p>
                                                    <p class="mb-1 text-muted">
                                                        {{ $admin_info['com_address'] }}
                                                    </p>
                                                    <p class="mb-1 text-muted">
                                                        {{ $admin_info['com_email'] }}
                                                    </p>
                                                    <p class="mb-1 text-muted">
                                                         {{ $admin_info['com_phone'] }}
                                                    </p>
                                                    <p class="mb-1 text-muted">
                                                         {{ $admin_info['com_mobile'] }}
                                                    </p>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 ms-auto mt-sm-0 mt-3">
                                                    
                                                    <p class="text-muted mb-2">
                                                        Billing To : 
                                                    </p>
                                                    <p class="fw-bold mb-1">
                                                       {{$subscriber_info[0]['firstname']}} {{$subscriber_info[0]['lastname']}} ({{$invoice_info['username']}})
                                                    </p>
                                                    <p class="mb-1">
                                                       {{$subscriber_info[0]['address']}}
                                                    </p>
                                                     
                                                    <p class="text-muted mb-2">
                                                        
                                                       
                                                    <!--   <span  class="fw-bold mb-1">Billing To : </span>{{$invoice_info['username']}}-->
                                                    <!--</p>-->
                                                    <!--<p class="text-muted mb-2">-->
                                                       
                                                    <!--   <span  class="fw-bold mb-1">Subscriber : </span>{{$invoice_info['username']}}-->
                                                    <!--</p>-->
                                                    <!--<p class="text-muted mb-2">-->
                                                       
                                                    <!--   <span  class="fw-bold mb-1">address : </span>{{$invoice_info['username']}}-->
                                                    <!--</p>-->
                                                    <!--<p class="text-muted mb-2">-->
                                                       
                                                    <!--   <span  class="fw-bold mb-1">mobile : </span>{{$invoice_info['username']}}-->
                                                    <!--</p>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <p class="fw-semibold text-muted mb-1">Invoice ID :</p>
                                            <p class="fs-15 mb-1">#{{ $tranId }}</p>
                                        </div>
                                        <div class="col-3">
                                            <p class="fw-semibold text-muted mb-1">Renew DateTime :</p>
                                            <p class="fs-15 mb-1">{{$invoice_info['renewDate']}}</p>
                                        </div>
                                        <div class="col-3">
                                            <p class="fw-semibold text-muted mb-1">New Expiration :</p>
                                            <p class="fs-15 mb-1">{{$invoice_info['newExpirationDate']}}</p>
                                        </div>
                                        <div class="col-3">
                                            <p class="fw-semibold text-muted mb-1">Amount :</p>
                                            <p class="fs-16 mb-1 fw-semibold">{{$invoice_info['ownerPrice']}}</p>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="table-responsive">
                                                <table class="table nowrap text-nowrap border mt-4">
                                                    <thead>
                                                        <tr>
                                                            <th>DESCRIPTION</th>
                                                            <th>NEXT EXPIRATION</th>
                                                            <th>MONTH</th>
                                                            <th>PRICE</th>
                                                            <th>TOTAL</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($invoice_ledger_info as $item)
                                                        
                                                        <tr>
                                                            <td>
                                                                <div class="fw-semibold">
                                                                                    {{ Str::replaceFirst('Create Invoice | ', '', $item['particular']) }}

                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-muted">
                                                                        {{ \Carbon\Carbon::parse($invoice_info['newExpirationDate'])->format('d M Y') }}
                                                                    </div>
                                                            </td>
                                                            <td class="product-quantity-container">
                                                               1
                                                            </td>
                                                            <td>
                                                                 {{ $item['credit']}}
                                                            </td>
                                                            <td>
                                                                {{ $item['credit']}}
                                                            </td>
                                                        </tr>
                                                         @endforeach
                                                        
                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td colspan="2">
                                                                <table class="table table-sm text-nowrap mb-0 table-borderless">
                                                                    <tbody>
                                                                 
                                                                        <tr>
                                                                            <th scope="row">
                                                                                <p class="mb-0 fs-14">Total :</p>
                                                                            </th>
                                                                            <td>
                                                                                <p class="mb-0 fw-semibold fs-16 text-success">{{$invoice_info['ownerPrice']}}</p>
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
                                        <div class="col-xl-12">
                                            <div>
                                                <textarea class="form-control form-control-light" id="invoice-note" rows="3">Note: This is a system generated invoice and does not require any signatures.
</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button class="btn btn-sm btn-secondary me-1" onclick="printDiv('invoice_area')">Print<i class="ri-printer-line ms-1 align-middle d-inline-block"></i></button>
                                </div>
                            </div>

	</body>
	<script>
	    function printDiv(divId) {
    var printContents = document.getElementById(divId).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    location.reload(); // Optional: reload to reset JS and state
}
	</script>
</html>


