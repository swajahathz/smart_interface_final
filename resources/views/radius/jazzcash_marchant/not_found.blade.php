@extends('layouts.custom-master')

@section('styles')
 
      
@endsection

@section('content')

@section('error-body')
<body>
@endsection

        <div class="page error-bg" id="particles-js">
            <div class="error-page">
                <div class="container">
                    <div class="text-center p-5 my-auto">
                        <div class="row align-items-center justify-content-center h-100">
                            <div class="col-xl-7">
                                <p class="error-text mb-sm-0 mb-4" style="padding-bottom: 10px;">Incorrect Information</p>
                                <p class="fs-18 fw-semibold mb-3">The page you are looking for is not available.</p>
                                <div class="row justify-content-center mb-5">
                                    <div class="col-xl-6">
                                        <p class="mb-0 op-7">This is not a safe place for you. The page you’re looking for doesn’t exist. Please go back to the home page.</p>
                                    </div>
                                   <a href="{{ route('portal') }}" class="btn btn-danger mt-3">Login Page</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

        <!-- PARTICLES JS  -->
        <script src="{{asset('build/assets/libs/particles.js/particles.js')}}"></script>

        <!-- ERROR JS -->
        @vite('resources/assets/js/error.js')
    
@endsection