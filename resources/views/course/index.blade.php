
@extends('layouts.app') 

@section('content')

<div class="qodef-title qodef-standard-type qodef-preload-background qodef-has-background qodef-has-parallax-background qodef-content-left-alignment qodef-animation-right-left qodef-title-image-not-responsive" style="height:350px;background-image:url('{{url($course->big_image)}}');" data-height="350" data-background-width=&quot;1920&quot;>
        <div class="qodef-title-image"><img src="{{url($course->big_image)}}" alt="&nbsp;" /> </div>
        <div class="qodef-title-holder" >
            <div class="qodef-container clearfix">
                <div class="qodef-container-inner">
                    <div class="qodef-title-subtitle-holder" style="">
                        <div class="qodef-title-subtitle-holder-inner">
                         <h1 ><span>{{$course->name}}</span></h1>
                         <span class="qodef-subtitle" >
                         <span>{{$course->short_disc}}</span>
                         </span>       
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="qodef-container">
  

      <div class="qodef-container-inner clearfix" style="padding-top: 80px" >
<div itemscope itemtype="http://schema.org/Product" id="product-1102" class="post-1102 product type-product status-publish has-post-thumbnail product_cat-electronics product_cat-gadgets product_tag-black product_tag-camera product_tag-mobile first instock shipping-taxable purchasable product-type-simple">
<div class="qodef-single-product-images">
  <div class="images">
    <a href="../../wp-content/uploads/2015/10/s-digital-camera.jpg" itemprop="image" class="woocommerce-main-image zoom" title="Digital Camera" data-rel="prettyPhoto[product-gallery]">
      <img width="600" height="600" src="{{url($course->small_image)}}" alt="image" title="Digital Camera" sizes="(max-width: 600px) 100vw, 600px">
    </a>  



    </div>
</div>



<div class="qodef-single-product-summary">
    <div class="summary entry-summary">
      <h2 itemprop="name" class="qodef-single-product-title">{{$course->name}}</h2><div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">

  <meta itemprop="price" content="95">
  <meta itemprop="priceCurrency" content="USD">
  <link itemprop="availability" href="http://schema.org/InStock">

</div>
<div itemprop="description">
  <p>{!!$course->full_disc!!}</p>
</div>
    </div><!-- .summary -->
  </div>


<div  class="clearfix"></div>

@if(sizeof($course->events) >= 1)
<div class="qodef-separator-holder clearfix  qodef-separator-center">
  <div class="qodef-separator" style="border-color: #b2b2b2;width: 100%;border-width: 6px;margin-top: 0px;margin-bottom: 15px"></div>
</div>

<center><h2>Register Now</h2></center>

<div class="qodef-separator-holder clearfix  qodef-separator-center">
  <div class="qodef-separator" style="border-color: #b2b2b2;width: 100%;border-width: 6px;margin-top: 5px;margin-bottom: 15px"></div>
</div>

</div>
<div class="qodef-full-width">
<div class="qodef-full-width-inner">
            <div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445938553835 qodef-content-aligment-left" style=""><div class="clearfix qodef-full-section-inner"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="woocommerce columns-4">
              
 <ul class="products clearfix">
@foreach($course->events as $event)
<li class="post-1106 product type-product status-publish has-post-thumbnail product_cat-headphones product_tag-app product_tag-headphones product_tag-white last instock shipping-taxable purchasable product-type-simple" style="">

  <a href="{{url('events/'.$event->id)}}" class="woocommerce-LoopProduct-link">
    
    <img width="550" height="550" src="{{url($event->small_image)}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="image" title="3 In One Lux Router" 
    sizes="(max-width: 550px) 100vw, 550px">

  </a>
  <div class="qodef-woocommerce-product-info-holder">
    <a href="{{url('events/'.$event->id)}}" class="woocommerce-LoopProduct-link">
    <div class="qodef-woocommerce-product-list-info">
      <h6 class="qodef-product-list-product-title">{{$event->name}}</h6>
   
    </div>
    </a>
    <div class="qodef-woocommerce-product-list-button-holder">
      <a href="{{url('events/'.$event->id)}}" class="woocommerce-LoopProduct-link"></a>
      <div class="qodef-woocommerce-product-list-details-button-holder">
      <a href="{{url('events/'.$event->id)}}" class="woocommerce-LoopProduct-link"></a>
      <a href="{{url('events/'.$event->id)}}" target="_self" class="qodef-btn qodef-btn-medium qodef-btn-default single_view_product_button alt" rel="nofollow">        
          <span class="qodef-btn-text">Details</span>   
          <span class="qodef-btn-text-icon"></span></a>  
        </div>
    </div>
  </div>
</li>   
@endForeach
</ul>      </div></div></div></div></div></div>
              </div>
</div> 
@else
@endIf

</div>


</div>

</div>


@stop