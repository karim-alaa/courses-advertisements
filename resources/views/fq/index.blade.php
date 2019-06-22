@extends('layouts.app') 

@section('content')

 <div class="qodef-title qodef-standard-type qodef-preload-background qodef-has-background qodef-has-parallax-background qodef-content-left-alignment qodef-animation-no qodef-title-image-not-responsive" style="height:350px;background-image:url({{url('images/site/faq_title.jpg')}});" data-height="350" data-background-width=&quot;1920&quot;>
        <div class="qodef-title-image"><img src="{{url('user/wp-content/uploads/2015/10/faq_title.jpg')}}" alt="&nbsp;" /> </div>
        <div class="qodef-title-holder" >
            <div class="qodef-container clearfix">
                <div class="qodef-container-inner">
                    <div class="qodef-title-subtitle-holder" style="">
                        <div class="qodef-title-subtitle-holder-inner">
                                                        <h1 ><span>FAQ</span></h1>
                                                                    <span class="qodef-subtitle" ><span>The Most Frequent Questions</span></span>
                                                                                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="qodef-full-width">
<div class="qodef-full-width-inner">
<div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445506120301 qodef-content-aligment-center qodef-grid-section" style=""><div class="clearfix qodef-section-inner"><div class="qodef-section-inner-margin clearfix"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
  <div class="wpb_text_column wpb_content_element ">
    <div class="wpb_wrapper">
      <h2>Create Your Own Genuine Web Masterpiece</h2>

    </div>
  </div>
<div class="vc_empty_space"  style="height: 20px" ><span class="vc_empty_space_inner"></span></div>

  <div class="wpb_text_column wpb_content_element ">
    <div class="wpb_wrapper">
      <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam</h4>

    </div>
  </div>
</div></div></div></div></div></div>
</div></div>


  @foreach($fqs as $fq)

<div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445505819326 qodef-content-aligment-left qodef-grid-section" style="">
  <div class="clearfix qodef-section-inner">
    <div class="qodef-section-inner-margin clearfix">
      <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
          <div class="wpb_wrapper">
            <div class="qodef-accordion-holder clearfix qodef-toggle qodef-boxed ">
    <h6 class="clearfix qodef-title-holder" >
  <span class="qodef-accordion-mark qodef-left-mark">
    <span class="qodef-accordion-mark-icon">
      <span class="icon_plus"></span>
      <span class="icon_minus-06"></span>
    </span>
  </span>
  <span class="qodef-tab-title">
    <span class="qodef-tab-title-inner">
      {{$fq->question}} ?   </span>
  </span>
</h6>
<div class="qodef-accordion-content">
  <div class="qodef-accordion-content-inner">
    
  <div class="wpb_text_column wpb_content_element ">
    <div class="wpb_wrapper">
      <p>{!!$fq->answer!!}.</p>

    </div>
  </div>
<div class="vc_empty_space"  style="height: 40px" ><span class="vc_empty_space_inner"></span></div>
  </div>
</div>
</div>
</div></div></div></div></div></div>

  @endForeach




    
  
@stop