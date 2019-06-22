@extends('layouts.app') 

@section('content')


 <div class="qodef-title qodef-standard-type qodef-preload-background qodef-has-background qodef-has-parallax-background qodef-content-left-alignment qodef-animation-no qodef-title-image-not-responsive" style="height:350px;background-image:url({{url('images/site/About-us-Title.jpg')}});" data-height="350" data-background-width=&quot;1920&quot;>
        <div class="qodef-title-image">
          <img src="{{url('user/wp-content/uploads/2015/10/About-us-Title.jpg')}}" alt="&nbsp;" />
           </div>
        <div class="qodef-title-holder" >
            <div class="qodef-container clearfix">
                <div class="qodef-container-inner">
                    <div class="qodef-title-subtitle-holder" style="">
                        <div class="qodef-title-subtitle-holder-inner">
                                                        <h1 ><span>Our Story</span></h1>
                                                                    <span class="qodef-subtitle" ><span>Lorem ipsum dolor sit</span></span>
                                                                                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445506120301 qodef-content-aligment-center qodef-grid-section" style=""><div class="clearfix qodef-section-inner"><div class="qodef-section-inner-margin clearfix"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
  <div class="wpb_text_column wpb_content_element ">
    <div class="wpb_wrapper">
      <h2>Create Your Own Genuine Web Masterpiece</h2>

    </div>
  </div>
<div class="vc_empty_space" style="height: 15px"><span class="vc_empty_space_inner"></span></div>

  <div class="wpb_text_column wpb_content_element ">
    <div class="wpb_wrapper">
      <h4> </h4>

    </div>
  </div>
</div></div></div></div></div></div>


<div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445526449001 qodef-content-aligment-left qodef-grid-section" style=""><div class="clearfix qodef-section-inner"><div class="qodef-section-inner-margin clearfix"><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-5 vc_col-md-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="vc_empty_space" style="height: 4px"><span class="vc_empty_space_inner"></span></div>

  <div class="wpb_single_image wpb_content_element vc_align_left">
    
    <figure class="wpb_wrapper vc_figure">
      <div class="vc_single_image-wrapper   vc_box_border_grey"><img width="600" height="604" src="{{url($about->image)}}" sizes="(max-width: 600px) 100vw, 600px"></div>
    </figure>
  </div>
<div class="vc_empty_space" style="height: 40px"><span class="vc_empty_space_inner"></span></div>
</div></div></div><div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-7 vc_col-md-12"><div class="vc_column-inner "><div class="wpb_wrapper">

<div class="vc_empty_space" style="height: 25px"><span class="vc_empty_space_inner"></span></div>

  <div class="wpb_text_column wpb_content_element ">
    <div class="wpb_wrapper">
      <h4>{{$about->full_disc}}</h4>

    </div>
  </div>
</div></div></div></div></div>
</div>

<div class="qodef-separator-holder clearfix  qodef-separator-center">
  <div class="qodef-separator" style="border-color: #b2b2b2;width: 100%;border-width: 4px;margin-top: 0px;margin-bottom: 15px"></div>
</div>

<article id="post-934" class="post-934 post type-post status-publish format-standard has-post-thumbnail hentry category-innovation category-optimization category-sustainable tag-potential tag-project tag-social ">
  <div class="qodef-post-content" style="  height: 40em;">
<div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445414169321 qodef-content-aligment-center" style=""><div class="clearfix qodef-full-section-inner">

    </div>
</div>
      <div class="qodef-post-image"  style=" margin: auto;
    width: 80%;
    height: 90%;
    padding: 10px;">
        <object  style =" width: 100% ; height:100% " 
data="https://www.youtube.com/embed/{{$about->video}}">
</object>

  </div>

</article>

<div class="clearfix"></div>
<div class="qodef-separator-holder clearfix  qodef-separator-center">
  <div class="qodef-separator" style="border-color: #b2b2b2;width: 100%;border-width: 4px;margin-top: 0px;margin-bottom: 15px"></div>
</div>


@if(sizeof($doctors) > 0)
<div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445414169321 qodef-content-aligment-center" style=""><div class="clearfix qodef-full-section-inner">

  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner ">
      <div class="wpb_wrapper">
        <div class="wpb_text_column wpb_content_element ">
          <div class="wpb_wrapper">
            <h2>MEET OUR TEAM</h2>
              </div>
             </div>
              <div class="vc_empty_space" style="height: 22px">
                <span class="vc_empty_space_inner"></span>
              </div>
              <div class="wpb_text_column wpb_content_element ">
                <div class="wpb_wrapper">
                  <h4>MDS GREAT TEAM</h4>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445414638610 qodef-content-aligment-center qodef-grid-section" style=""><div class="clearfix qodef-section-inner"><div class="qodef-section-inner-margin clearfix">

 @foreach($doctors as $doctor)
  <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-3 vc_col-md-6">
    <div class="vc_column-inner ">
      <div class="wpb_wrapper">
        <div class="qodef-team main-info-below-image">
          <div class="qodef-team-inner">
            <div class="qodef-team-image">
              <img src="{{url($doctor->user['image'])}}" alt="qodef-team-image">
                <div class="qodef-team-position-holder">
                  <div class="qodef-circle-animate"></div>
                    <div class="qodef-team-position-icon">
                      <span class="qodef-icon-shortcode circle ">
                       <i class="menu_icon icon-user fa" style=""></i>
                      </span>
                    </div>
                    <h6 class="q_team_position">{{$doctor->user['job_title']}}</h6>
                </div>
              </div>
            <div class="qodef-team-info">
              <div class="qodef-team-title-holder">
                <h5 class="qodef-team-name">{{$doctor->user['name']}}</h5>
              </div>
            <div class="qodef-team-text">
              <div class="qodef-team-text-inner">
                <div class="qodef-team-description">
                  <p>{{$doctor->doctor_text}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="vc_empty_space" style="height: 40px"><span class="vc_empty_space_inner"></span></div>
     </div>
    </div>
  </div>
@endForeach

</div>
</div>
</div>
@endIf



@stop
