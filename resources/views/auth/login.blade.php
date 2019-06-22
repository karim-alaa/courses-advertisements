@extends('layouts.blank')

@section('style')

<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{url('images/icon/logo-icon.png')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('form_l/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('form_l/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('form_l/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('form_l/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{url('form_l/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('form_l/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('form_l/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{url('form_l/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{url('form_l/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('form_l/css/main.css')}}">
<!--===============================================================================================-->
@endsection

@section('content')
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url({{url('form_l/images/bg-01.jpg')}});">
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>
  <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <div class="wrap-input100 validate-input m-b-26 {{ $errors->has('email') ? ' has-error' : '' }}" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input id="email" type="email" class="input100" name="email" placeholder="Enter username" value="{{ old('email') }}" required autofocus>
                        <span class="focus-input100"></span>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>

                    <div class="wrap-input100 validate-input m-b-18 {{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Password is required">
                        <span class="label-input100">Password</span>

                           <input id="password" type="password" class="input100" placeholder="Enter password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                @if ($errors->has('active'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('active') }}</strong>
                                    </span>
                                @endif

                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" id="check" style="" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="{{ route('password.request') }}" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


    
@section('script')
<!--===============================================================================================-->
    <script src="{{url('form_l/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{url('form_l/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{url('form_l/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{url('form_l/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{url('form_l/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{url('form_l/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{url('form_l/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{url('form_l/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{url('form_l/js/main.js')}}"></script>

    @endsection