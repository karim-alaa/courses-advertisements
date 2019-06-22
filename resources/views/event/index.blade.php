
@extends('layouts.app') 

@section('content')

<div class="qodef-title qodef-standard-type qodef-preload-background qodef-has-background qodef-has-parallax-background qodef-content-left-alignment qodef-animation-right-left qodef-title-image-not-responsive" style="height:350px;background-image:url('{{url($event->big_image)}}');" data-height="350" data-background-width=&quot;1920&quot;>
        <div class="qodef-title-image"><img src="{{url($event->big_image)}}" alt="&nbsp;" /> </div>
        <div class="qodef-title-holder" >
            <div class="qodef-container clearfix">
                <div class="qodef-container-inner">
                    <div class="qodef-title-subtitle-holder" style="">
                        <div class="qodef-title-subtitle-holder-inner">
                                                        <h1 ><span>{{$event->name}}</span></h1>
                                                                    <span class="qodef-subtitle" ><span>{{$event->short_disc}}</span></span>
                                                                                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@if($errors->has('done'))
<br>
<div class="alert alert-success">
  <div class="qodef-message  " style="background-color: #20a8a1">
  <div class="qodef-message-inner">
        <a href="#" class="qodef-close">
      <i class="q_font_elegant_icon icon_close" style="color: #ffffff"></i>
    </a>
    <div class="qodef-message-text-holder">
      <div class="qodef-message-text">
        <div class="qodef-message-text-inner">
          <p></p>
<h6><span style="color: #ffffff;">{{$errors->first('done')}}</span></h6>
<p>       </p></div>
      </div>
    </div>
  </div>
</div>
  </div>
<br>
@endif



<div class="qodef-container">
  

      <div class="qodef-container-inner clearfix" style="padding-top: 80px" >
<div itemscope itemtype="http://schema.org/Product" id="product-1102" class="post-1102 product type-product status-publish has-post-thumbnail product_cat-electronics product_cat-gadgets product_tag-black product_tag-camera product_tag-mobile first instock shipping-taxable purchasable product-type-simple">
<div class="qodef-single-product-images">
  <div class="images">
    <a href="../../wp-content/uploads/2015/10/s-digital-camera.jpg" itemprop="image" class="woocommerce-main-image zoom" title="Digital Camera" data-rel="prettyPhoto[product-gallery]">
      <img width="600" height="600" src="{{url($event->small_image)}}" alt="image" title="Digital Camera" sizes="(max-width: 600px) 100vw, 600px">
    </a>  



    </div>
</div>



<div class="qodef-single-product-summary">
    <div class="summary entry-summary">
      <h2 itemprop="name" class="qodef-single-product-title">{{$event->name}}</h2>
      
      <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">

  <meta itemprop="price" content="95">
  <meta itemprop="priceCurrency" content="USD">
  <link itemprop="availability" href="http://schema.org/InStock">

</div>
<div itemprop="description">
  <p>{{$event->course['short_disc']}} 
    <br> {{$event->course['name']}} 
    <br> {{$event->short_disc}} 
    <br><span>Date </span> {{$event->date}} 
    <br>Doctor: {{$event->doctor->user['name']}}
    <br>Address: {{$event->address['name']}}, {{$event->address_details}}
    <br>Capacity: {{$event->capacity}} 
    <br>Free Places: {{$eventAttendees}}/{{$event->capacity}}

    <br>Type: <?php if($event->is_online)echo "Online"; else echo "Offline"; ?><br>
    <br>
    @if($event->price > 0)
     <br><span>COURSE FEE:</span> {{$event->price}} 
       @endIf

    <br>

    <div class="qodef-el">
      <div class="qodef-slide-buttons-holder">
        <a href="{{$event->page_link}}" target="_self" class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon">
            <span class="qodef-btn-text">Go Link</span>
        <span class="qodef-btn-text-icon"><i class="qodef-icon-simple-line-icon icon-link "></i></span>
    </a>   
      </div>
    </div>


 
    
@if(null != Auth::user() and !$event->is_online)
      @if(Auth::user()->role_id == 1)
<br>
      <div class="qodef-el">
      <div class="qodef-slide-buttons-holder">
        <a href="{{url('/events/apply/'.$event->id)}}" target="_self" class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon">
            <span class="qodef-btn-text">Apply Now</span>
        <span class="qodef-btn-text-icon"><i class="qodef-icon-simple-line-icon icon-briefcase "></i></span>
    </a>   
      </div>
    </div>
      @endIf
     @elseif(null == Auth::user())
      Login To Register
         <br>
      <div class="qodef-el">
      <div class="qodef-slide-buttons-holder">
        <a href="{{url('/login')}}" target="_self" class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon">
            <span class="qodef-btn-text">Login</span>
        <span class="qodef-btn-text-icon"><i class="qodef-icon-simple-line-icon icon-briefcase "></i></span>
    </a>   
      </div>
    </div>

  <br>
      <div class="qodef-el">
      <div class="qodef-slide-buttons-holder">
        <a href="{{url('/register')}}" target="_self" class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon">
            <span class="qodef-btn-text">Register</span>
        <span class="qodef-btn-text-icon"><i class="qodef-icon-simple-line-icon icon-briefcase"></i></span>
    </a>   
      </div>
    </div>
      
     

@endIf
     
</p>
<div class="clearfix"></div>


</div>
</div>
</div>



@stop