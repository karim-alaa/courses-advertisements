@extends('layouts.app') 

@section('content')




<div class="inner-banner contact" style="background: url(../user/uploads/2017/08/inner-banner-bg.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-lg-9">
        <div class="content">
          <h1>Contact Us</h1>
        </div>
      </div>
        <div class="col-sm-4 col-lg-3"> 
          <a href="#" class="apply-online clearfix">
            
            <div class="arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
          </a>
        </div>
      <!-- </div> -->
    </div>
  </div>
</div>

<!-- <section class="testimonial-outer padding-lg"> -->
<section id="" class="wpb_row vg_fixed form-wrapper padding-lg "  ><div class="container"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div role="form" class="wpcf7" id="wpcf7-f133-p128-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>

<div style="display: none;">
<input type="hidden" name="_wpcf7" value="133" />
<input type="hidden" name="_wpcf7_version" value="4.9" />
<input type="hidden" name="_wpcf7_locale" value="en_US" />
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f133-p128-o1" />
<input type="hidden" name="_wpcf7_container_post" value="128" />
</div>

 {{Form::open(['url'=>url('contact/'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left wpcf7-form'])}}
                  {{csrf_field()}}

<div class="row input-row">
<div class="col-sm-6">
     <span class="wpcf7-form-control-wrap first_name"><input type="text" name="first_name" value="{{old('first_name')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="First Name" /></span>
      @if ($errors->has('first_name'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                              
                              @endif
  </div>
<div class="col-sm-6">
     <span class="wpcf7-form-control-wrap last_name"><input type="text" name="last_name" value="{{old('last_name')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Last Name" /></span>
      @if ($errors->has('last_name'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                              
                              @endif
  </div>
</div>
<div class="row input-row">
<div class="col-sm-6">
     <span class="wpcf7-form-control-wrap company"><input type="text" name="company" value="{{old('company')}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Company" /></span>
      @if ($errors->has('company'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                              
                              @endif
   </div>
<div class="col-sm-6">
      <span class="wpcf7-form-control-wrap phone_number"><input type="text" name="phone_number" value="{{old('phone_number')}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Phone Number" /></span>
       @if ($errors->has('phone_number'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                              
                              @endif
   </div>
</div>
<div class="row input-row">
<div class="col-sm-6">
      <span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" value="{{old('email')}}" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Business Email" /></span>
       @if ($errors->has('email'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                              
                              @endif
    </div>
<div class="col-sm-6">
      <span class="wpcf7-form-control-wrap job_title"><input type="text" name="job_title" value="{{old('job_title')}}" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Job Title" /></span>
       @if ($errors->has('job_title'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('job_title') }}</strong>
                                    </span>
                              
                              @endif
    </div>
</div>
<div class="row input-row">
  
   <div class="col-sm-12">
      <span class="wpcf7-form-control-wrap phone_number"><textarea  name= "message" class="wpcf7-form-control wpcf7-text">@if(null !== old('message')) {{old('message')}} @else Your Message @endIf</textarea> </span>
       @if ($errors->has('message'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                              
                              @endif
   </div>
</div>
<div class="row submit-cus">
<div class="col-sm-12">
      <input type="submit" value="Apply Now" class="wpcf7-form-control btn"><br>
      <span class="icon-more-icon"></span><p></p>
<div class="msg"></div></div>
</div>
{{Form::close()}}


<div class="wpcf7-response-output wpcf7-display-none"></div></form></div></div></div></div></div></section>

<a name="map"></a>
<section id="" class="wpb_row vg_fixed google-map "  ><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1502248379266"><div class="wpb_wrapper"><div id="map"></div>

  

<div class="container">
    <div class="contact-detail">
      <div class="address">
        <div class="inner">
          <h3>Master Key</h3>
          <p>{{$config->location}}</p>
        </div>
        
        <div class="inner">
          <h3>phones</h3>@if(sizeof($config->phones) >= 1)
          <p>
       
          <?php

          $size = sizeof($config->phones)-1;
          for ($i=0; $i <= $size; $i++) { 
            if($i === $size)
              echo $config->phones[$i]->phone;
            else
              echo $config->phones[$i]->phone . ', ';
          }

          ?>
          </p>
          @else
          <p>Currently, No Phone Number </p>
          @endIf
        
        </div>
        
        <div class="inner">{{$config->email}}</div>
      </div>
      <div class="contact-bottom">
        <ul class="follow-us clearfix">
                  <li><a   target="_blank" href="{{$config->face}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a target="_blank"  href="{{$config->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a  target="_blank" href="{{$config->linked}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a  target="_blank" href="{{$config->youtube}}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                  </ul>
      </div>
    </div>
</div>


</div></div></div></section>

<section id="" class="wpb_row vg_fixed our-impotance have-question padding-lg "  ><div class="container">
</div></section>
<!-- </section> -->
@stop

@section('script')
<script type="text/javascript">
jQuery(document).ready(function($) {   
    var $ = jQuery.noConflict();
    (function($) {
    "use strict";

    var mapId = $('#map');
    if (mapId.length > 0) {
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {

            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 11,
                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.6700, -73.9400), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                    "featureType": "road",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "poi",
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }, {
                    "featureType": "transit",
                    "elementType": "labels.text",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.6700, -73.9400),
                map: map,
                icon: "../user/uploads/2017/08/map-ico.png",
                title: 'Snazzy!'
            });
        }
    }
})(jQuery);
});


  function initMap() {
        var myLatLng = {lat:30.117402, lng: 31.253993};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }

</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAz-1fd5BgtC8ym9_L1kKZg3pajRT4d2tE&callback=initMap">
    </script>
@stop