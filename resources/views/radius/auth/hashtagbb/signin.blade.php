@extends('layouts.custom-master')

@section('styles')
 
      
@endsection

@section('content')

@section('error-body')

  
  <body style="margin:0; height:100vh; overflow:hidden; position:relative;">

  <div style="
    position:absolute;
    top:0; left:0;
    width:100%; height:100%;
    overflow:hidden; /* scroll prevent */
    z-index:-1;
  ">
    <div style="
      width:100%; height:100%;
      background: url('/build/assets/images/hashtagback.jpg') center/cover no-repeat;
     
      animation: zoomEffect 20s infinite alternate;
    "></div>
  </div>
  
   <style>
    @keyframes zoomEffect {
      0%   { transform: scale(1); }
      100% { transform: scale(1.1); } /* zoom in */
    }
  </style>

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
                
                    <form action="{{ route('signin_function') }}" method="POST">
                    @csrf
                        <div class="card custom-card" style="background-color:#00000094;">
                            <div class="card-body p-5">
                              
                               <div class="mb-4" style="text-align:center;">{!! $domainSettings['logo'] !!}</div>
                               
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
                                <!-- <p class="mb-4 text-muted op-7 fw-normal text-center">Welcome back Jhon !</p> -->
                                <!--<p class="h5 fw-semibold mb-2 text-center">Sign In</p>-->
                                <div class="row gy-3">
                                    <div class="col-xl-12">
                                        <label for="signin-username" class="form-label text-default">Username</label>
                                        <input type="text" name="name" class="form-control form-control-lg" id="signin-username" placeholder="username" required>
                                    </div>
                                    <div class="col-xl-12 mb-2">
                                        <label for="signin-password" class="form-label text-default d-block">Password</label>
                                        <div class="input-group">
                                            <input  name="password" type="password" class="form-control form-control-lg" id="signin-password" placeholder="password" required>
                                            <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
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
                                        <button type="submit" class="btn btn-lg btn-primary" id="loginBtn">Sign In</button>
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
                                    
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function () {
                                                // Laravel se timestamp le lo
                                                let blockStart = {{ request()->cookie('block_start') }};
                                                let blockDuration = 5 * 60; // 5 minutes (300 sec)
                                    
                                                // Abhi ka current time (seconds me)
                                                let now = Math.floor(Date.now() / 1000);
                                    
                                                // Kitna time remaining hai
                                                let remaining = blockDuration - (now - blockStart);
                                    
                                                // Agar already expire ho gaya to kuch na karo
                                                if (remaining <= 0) return;
                                    
                                                // Login button disable kar do
                                                let loginBtn = document.querySelector("#loginBtn");
                                                if (loginBtn) {
                                                    loginBtn.disabled = true;
                                                }
                                    
                                                let timerEl = document.getElementById("timer");
                                    
                                                function updateTimer() {
                                                    if (remaining <= 0) {
                                                        if (loginBtn) loginBtn.disabled = false;
                                                        timerEl.innerHTML = "0:00";
                                                        return;
                                                    }
                                    
                                                    let minutes = Math.floor(remaining / 60);
                                                    let seconds = remaining % 60;
                                                    timerEl.innerHTML = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
                                    
                                                    remaining--;
                                                    setTimeout(updateTimer, 1000);
                                                }
                                    
                                                updateTimer();
                                            });
                                        </script>
                                    @endif
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
       

@endsection

@section('scripts')

        <!-- SHOW PASSWORD JS -->
        <script src="{{asset('build/assets/show-password.js')}}"></script>

@endsection