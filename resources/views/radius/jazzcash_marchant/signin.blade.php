@extends('layouts.custom-master')

@section('styles')
 
      
@endsection

@section('content')

@section('error-body')
<body>
@endsection

        <div class="container">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <!-- <div class="my-5 d-flex justify-content-center">
                        <a href="{{url('index')}}">
                            <img src="{{asset('build/assets/images/brand-logos/desktop-logo.png')}}" alt="logo" class="desktop-logo">
                            <img src="{{asset('build/assets/images/brand-logos/desktop-dark.png')}}" alt="logo" class="desktop-dark">
                        </a>
                    </div> -->
                    <!-- Display Error Messages -->
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                    <form id="loginForm">
                        <div class="card custom-card">
                            <div class="card-body p-5">
                                <p class="h5 fw-semibold mb-2 text-center">USER PORTAL</p>
                                <!-- <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back Jhon !</p> -->
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signin-username" class="form-label text-default">UserID</label>
                                        <input type="text" id="userid" class="form-control form-control-lg" placeholder="userid" required>
                                    </div>
                                    <div class="col-xl-12 mb-2">
                                        <label for="signin-password" class="form-label text-default d-block">Password</label>
                                        <div class="input-group">
                                            <input  name="password" type="password" class="form-control form-control-lg" id="password" placeholder="password" required>
                                       
                                        </div>
                                        <div class="mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                                    Remember password ?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 d-grid mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                                    </div>
                                    
                                   @if(session('error2'))
                                        <div class="alert alert-danger text-center">
                                            {{ session('error2') }} Invalid Attempts.
                                        </div>
                                    @endif
                                    @if(request()->cookie('block_start'))
    <div class="alert alert-danger text-center">
        Too many invalid attempts. Please wait <span id="timer"></span>
    </div>


@endif

                                </div>
                                
                                <!-- <div class="btn-list text-center">
                                    <button class="btn btn-icon btn-light">
                                        <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                                    </button>
                                    <button class="btn btn-icon btn-light">
                                        <i class="ri-google-line fw-bold text-dark op-7"></i>
                                    </button>
                                    <button class="btn btn-icon btn-light">
                                        <i class="ri-twitter-line fw-bold text-dark op-7"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('scripts')
    <script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Stop normal form submission


      // Get values
      const username = document.getElementById("userid").value.trim();
      const password = document.getElementById("password").value.trim();


      // Create URL dynamically
      const url = `/jazzcash/invoice/${encodeURIComponent(username)}/${encodeURIComponent(password)}`;

      // Redirect user
      window.location.href = url;
    });
  </script>

        <!-- SHOW PASSWORD JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection