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
                       Register
                    </span>
                </div>
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

 <div class="wrap-input100 validate-input m-b-26" data-validate="name is required">
                        <span class="label-input100">name</span>

                                <input id="name" type="text" class="input100" name="name" value="{{ old('name') }}" placeholder="Enter your name"  required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
</div>
                  <div class="wrap-input100 validate-input m-b-26" data-validate="email is required">
                        <span class="label-input100">email</span>
                                <input id="email" type="email" placeholder="Enter your Email" class="input100" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>


<div class="wrap-input100 validate-input m-b-26 {{ $errors->has('phone') ? ' has-error' : '' }}" data-validate="email is required">
                        <span class="label-input100">phone</span>
                      
                                <input id="phone" type="text" placeholder="your phone" class="input100" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                    </div>

      
<div class="wrap-input100 validate-input m-b-26 {{ $errors->has('address') ? ' has-error' : '' }} " data-validate="Address is required">
                        <span class="label-input100">Address</span>


                                       
                            <div class="col-md-12" style="padding: 0">
                                
                                <select name="address" class="form-control" aria-invalid="false" style="border: none; padding: 0">
                                    @if ($addresses)
                                        @foreach ($addresses as $address)
                                            @if(old('address') == $address->id)
                                                <option selected value="{{$address->id}}">{{$address->name}}</option>
                                            @else
                                                <option value="{{$address->id}}">{{$address->name}}</option>
                                             @endif
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



<div class="wrap-input100 validate-input m-b-26 {{ $errors->has('password') ? ' has-error' : '' }} " data-validate="Password is required">
                        <span class="label-input100">Password</span>
                       
                                <input id="password" placeholder="Password" type="password" class="input100" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>

<div class="wrap-input100 validate-input m-b-26" data-validate="Password is required">
                        <span class="label-input100">Confirm Password</span>
                       
                                <input id="password-confirm" placeholder="Password" type="password" class="input100" name="password_confirmation" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                        </div>


                        <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                   
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
