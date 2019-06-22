     @extends('layouts.app') 

    @section('content')

    <div class="qodef-slider">
        <div class="qodef-slider-inner">
          <div id="qodef-home-main-slider" data-qodef_responsive_graphic_coefficients="1,1,0.8,0.7,0.6,0.5,0.4" data-qodef_responsive_title_coefficients="1,0.8,0.73,0.7,0.6,0.5,0.4" data-qodef_responsive_subtitle_coefficients="1,1,0.8,0.7,0.6,0.5,0.4" data-qodef_responsive_text_coefficients="1,1,0.8,0.7,0.6,0.5,0.4" data-qodef_responsive_button_coefficients="1,1,0.8,0.7,0.6,0.5,0.4" class="carousel slide  qodef-full-screen   qodef-auto-start    qodef-slider-thumbs qodef-in-progress" data-slide_animation_timeout="6000" data-parallax="yes" style="height: 588px;"><div class="qodef-slider-preloader" style="height: 588px; display: none;"><div class="qodef-st-loader"><div class="qodef-st-loader1"><div class="pulse"></div></div></div></div><div class="carousel-inner skrollable skrollable-between" style="height: 100%; transform: translateY(0px); display: block;" data-start="transform: translateY(0px);" data-1440="transform: translateY(-500px);">

    @foreach($courses_slide as $course)

                            <div class="item light  qodef-content-vertical-middle " style="padding-top: 0px; height: 588px;">
                              <div class="qodef-image" style="background-image:url('{{$course->big_image}}')">
                              </div>
                            <div class="qodef-slider-content-outer" style="opacity: 1;">
                              <div class="qodef-slider-content left skrollable skrollable-between" data-0=" opacity: 1;   " data-300=" opacity: 0;  " style="opacity: 1;">
                                <div class="qodef-slider-content-inner one_by_one from_bottom" style="width:77%; position:relative; ">
                                  <div class="qodef-text one_by_one from_bottom " style="">
                                  <div class="qodef-el">
                                    <h2 class="qodef-slide-title" style="font-size: 72px; line-height: 78px; letter-spacing: 0px; margin-bottom: 18px;">

                                      <span>{{$course->name}}<br>Course</span>
                                    </h2></div>
                                    <div class="qodef-el">
                                      <h3 class="qodef-slide-text" style="font-size: 24px; line-height: 35px; letter-spacing: 0px;">
                                      <span>{{$course->short_disc }} </span>
                                    </h3>
                                    </div>

                                    <div class="qodef-el">
                                      <div class="qodef-slide-buttons-holder">
                                        <a class="qodef-btn-hover-animation qodef-btn qodef-btn-medium qodef-btn-solid" href="{{url('/courses/'.$course->id)}}" target="_self" style="font-size: 13px; line-height: 56px; letter-spacing: 1px; padding: 0px 35px;">
                                          <span class="qodef-animation-overlay"></span>
                                          <span class="qodef-btn-text">Know More</span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
    @endforeach


    @foreach($events_slide as $event_slide)

                            <div class="item light  qodef-content-vertical-middle " style="padding-top: 0px; height: 588px;">
                              <div class="qodef-image" style="background-image:url('{{$event_slide->big_image}}')">
                              </div>
                            <div class="qodef-slider-content-outer" style="opacity: 1;">
                              <div class="qodef-slider-content left skrollable skrollable-between" data-0=" opacity: 1;   " data-300=" opacity: 0;  " style="opacity: 1;">
                                <div class="qodef-slider-content-inner one_by_one from_bottom" style="width:77%; position:relative; ">
                                  <div class="qodef-text one_by_one from_bottom " style="">
                                  <div class="qodef-el">
                                    <h2 class="qodef-slide-title" style="font-size: 72px; line-height: 78px; letter-spacing: 0px; margin-bottom: 18px;">

                                      <span>{{$event_slide->name}}<br>Course</span>
                                    </h2></div>
                                    <div class="qodef-el">
                                      <h3 class="qodef-slide-text" style="font-size: 24px; line-height: 35px; letter-spacing: 0px;">
                                      <span>{{$event_slide->short_disc }} </span>
                                    </h3>
                                    </div>

                                    <div class="qodef-el">
                                      <div class="qodef-slide-buttons-holder">
                                        <a class="qodef-btn-hover-animation qodef-btn qodef-btn-medium qodef-btn-solid" href="{{url('/events/'.$event_slide->id)}}" target="_self" style="font-size: 13px; line-height: 56px; letter-spacing: 1px; padding: 0px 35px;">
                                          <span class="qodef-animation-overlay"></span>
                                          <span class="qodef-btn-text">Know More</span>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
    @endforeach

                          </div>

                          <ol class="carousel-indicators skrollable skrollable-between" data-start="opacity: 1;" data-300="opacity:0;" style="opacity: 1; display: block;">
                          
                          <?php
                          $i=0; 
                          foreach ($courses_slide as $course) {
                            if ($i==0) 
                             echo '<li data-target="#qodef-home-main-slider" data-slide-to="0" class="active"></li>';
                            else
                              echo '<li data-target="#qodef-home-main-slider" data-slide-to="'.$i.'" class=""></li>';

                            $i++;
                          }
                          foreach ($events_slide as $event_slide) {
                            if ($i==0) 
                             echo '<li data-target="#qodef-home-main-slider" data-slide-to="0" class="active"></li>';
                            else
                              echo '<li data-target="#qodef-home-main-slider" data-slide-to="'.$i.'" class=""></li>';
                            $i++;
                          }
                           ?>
                           
                          </ol>
                          
                          <div class="qodef-controls-holder">
                                <a class="left carousel-control skrollable skrollable-between" style="padding-top: 100px; opacity: 1;" href="#qodef-home-main-slider" data-slide="prev" data-start="opacity: 1;" data-300="opacity:0;">

                                  <span class="qodef-thumb-holder">
                                    <span class="img" style="display: block;">
                                      <img src="{{url('user/wp-content/uploads/2015/11/home-main-slide-1.jpg')}}">
                                    </span>
                                  </span>

                                  <span class="qodef-prev-nav"><span class="fa fa-chevron-left"></span></span>
                                </a>

                                <a class="right carousel-control skrollable skrollable-between" style="padding-top: 100px; opacity: 1;" href="#qodef-home-main-slider" data-slide="next" data-start="opacity: 1;" data-300="opacity:0;">

                                  <span class="qodef-thumb-holder">
                                    <span class="img" style="display: block;">
                                      <img src="{{url('user/wp-content/uploads/2015/11/home-main-slide-3.jpg')}}">
                                    </span>
                                  </span>

                                  <span class="qodef-next-nav">
                                      <span class="fa fa-chevron-right"></span>
                                  </span>
                                  </a>
                              </div>
                  </div>    
          </div>
      </div>


    @if($errors->has('done'))
            <br />
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      {{$errors->first('done')}}
      </div>
      <br />
    @endif

    <div class="qodef-full-width">
      <div class="qodef-full-width-inner">
        <div class="vc_row wpb_row vc_row-fluid qodef-section qodef-content-aligment-left " style="">
          <div class="clearfix qodef-full-section-inner">
            <div class="wpb_column vc_column_container vc_col-sm-12">
              <div class="vc_column-inner ">
              <div class="wpb_wrapper">
                <div id="qodef-particles" class="auto" style="background-color: #f8f8f8; padding:20px 0;" data-particles-density="high" data-particles-color="#c1c1c1" data-particles-opacity="1" data-particles-size="3" data-speed="2" data-show-lines="yes" data-line-length="100">
                  <div id="qodef-p-particles-container">
                    <canvas class="particles-js-canvas-el" width="1349" height="505" style="width: 100%; height: 100%;"></canvas>
                  </div>
                    <div class="qodef-p-content">
                      <div class="qodef-elements-holder qodef-two-columns qodef-responsive-mode-1024 qodef-one-column-alignment-left">
                        <div class="qodef-elements-holder-item qodef-vertical-alignment-top qodef-horizontal-alignment-left">
                          <div class="qodef-elements-holder-item-inner">
                            <div class="qodef-elements-holder-item-content qodef-elements-holder-custom-988431" style="padding: 90px 0px 50px 0px">
                                    <style type="text/css" data-type="qodef-elements-custom-padding">
                                        @media only screen and (min-width: 1280px) and (max-width: 1600px) {
                                  .qodef-elements-holder .qodef-elements-holder-item-content.qodef-elements-holder-custom-988431 {
                                    padding:  !important;
                                  }
                                }
                                                  @media only screen and (min-width: 1024px) and (max-width: 1280px) {
                                    .qodef-elements-holder .qodef-elements-holder-item-content.qodef-elements-holder-custom-988431 {
                                      padding:  !important;
                                    }
                                  }
                                                @media only screen and (min-width: 768px) and (max-width: 1024px) {
                                  .qodef-elements-holder .qodef-elements-holder-item-content.qodef-elements-holder-custom-988431 {
                                    padding:  !important;
                                  }
                                }
                                                @media only screen and (min-width: 600px) and (max-width: 768px) {
                                  .qodef-elements-holder .qodef-elements-holder-item-content.qodef-elements-holder-custom-988431 {
                                    padding:  !important;
                                  }
                                }
                                                @media only screen and (min-width: 480px) and (max-width: 600px) {
                                  .qodef-elements-holder .qodef-elements-holder-item-content.qodef-elements-holder-custom-988431 {
                                    padding:  !important;
                                  }
                                }
                                                @media only screen and (max-width: 480px) {
                                  .qodef-elements-holder .qodef-elements-holder-item-content.qodef-elements-holder-custom-988431 {
                                    padding: 90px 0px 50px 0px !important;
                                  }
                                }

                                .vc_custom_1445938553835 {
                                                              padding-top: 2% !important;
                                                              padding-right: 2% !important;
                                                              padding-bottom: 2% !important;
                                                              padding-left: 2% !important;
                                                          }
                                        </style>
                
      <div class="wpb_text_column wpb_content_element ">
        <div class="wpb_wrapper">
          <h2>MDS STORY</h2>
        </div>
      </div>
    <div class="vc_empty_space" style="height: 20px">
      <span class="vc_empty_space_inner"></span>
    </div>
      <div class="wpb_text_column wpb_content_element ">
        <div class="wpb_wrapper">
          <h4>{{$about->short_disc}}</h4>
        </div>
      </div>

      <div class="vc_empty_space" style="height: 43px">
        <span class="vc_empty_space_inner"></span>
      </div>
        <a href="{{url('/about')}}" target="_self" class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon">
                <span class="qodef-btn-text">Know More</span>
            <span class="qodef-btn-text-icon"><i class="qodef-icon-simple-line-icon icon-rocket "></i></span>
        </a>    
    </div>
      </div>
    </div>
      <div class="qodef-elements-holder-item qodef-vertical-alignment-middle qodef-horizontal-alignment-right">
        <div class="qodef-elements-holder-item-inner">
          <div class="qodef-elements-holder-item-content qodef-elements-holder-custom-738768" style="padding: 48px 0px 0px 0px">
                  
        <div class="wpb_single_image wpb_content_element vc_align_right  wpb_animate_when_almost_visible wpb_bottom-to-top wpb_start_animation">
       <div class="video-block">
                  <iframe width="650" height="400" src="https://www.youtube.com/embed/{{$config->intro_video}}" allowfullscreen></iframe>
                          </div>
                         </div>
                       </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="vc_row wpb_row vc_row-fluid qodef-section qodef-content-aligment-left" style="">
      <div class="clearfix qodef-full-section-inner"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="qodef-fullwidth-slider-holder"><div class="qodef-fullwidth-slider-slides">
     
     @foreach($courses as $course)
    <div class="qodef-fullwidth-slider-item" style="background-image: url('{{url($course->big_image)}}')">
        <div class="qodef-fullwidth-slider-item-image-holder-wrapper">
            <span class="qodef-fullwidth-slider-item-image-holder">
                <img src="{{url($course->big_image)}}"/>
            </span>
        </div>
        <div class="qodef-fullwidth-slider-item-content-holder">
            <div class="qodef-fullwidth-slider-item-content-holder-inner">
                <div class="qodef-fullwidth-slider-item-content-wrapper">
                    <div class="qodef-fullwidth-slider-item-wrapper-inner">
                        <div class="qodef-fullwidth-slider-item-elements-holder">
                            <div class="qodef-fullwidth-slider-item-title">
                                <h2>{{$course->name}}</h2>
                            </div>
                            <div class="qodef-fullwidth-slider-item-subtitle">
                                <h4>{!!$course->short_disc!!}</h4>
                            </div>
                            <div class="qodef-fullwidth-slider-item-button">
                                  <a href="#" target="_self"  class="qodef-btn qodef-btn-medium qodef-btn-solid qodef-btn-icon"  >        
                                    <span class="qodef-btn-text">Know More</span>    
                                    <span class="qodef-btn-text-icon"><i class="qodef-icon-simple-line-icon icon-mouse qodef-icon-element" ></i></span>
                                  </a>                            
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div></div></div></div></div></div></div>



    @if(sizeof($events) > 0)

    <div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445506120301 qodef-content-aligment-center" style=""><div class="clearfix qodef-full-section-inner">

      <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
          <div class="wpb_wrapper">
            <div class="wpb_text_column wpb_content_element ">
              <div class="wpb_wrapper">
                <h2>MDS COURCES</h2>
                  </div>
                 </div>
                  <div class="vc_empty_space" style="height: 22px">
                    <span class="vc_empty_space_inner"></span>
                  </div>
                  <div class="wpb_text_column wpb_content_element ">
                    <div class="wpb_wrapper">
                      <h4>Be In Touch</h4>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
     


    <!-- Start Courses-->
    <div class="qodef-full-width">
    <div class="qodef-full-width-inner">
                <div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445938553835 qodef-content-aligment-left" style=""><div class="clearfix qodef-full-section-inner"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="woocommerce columns-4">
          
          <ul class="products clearfix">
        @foreach($events as $event)
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
          </ul>

          
          </div></div></div></div></div></div>
                  </div>
    </div>  

    <!-- End Courses-->
    @endIf








    @if(sizeof($doctors) > 0)
    <div id="mds_team">
      <div class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445414169321 qodef-content-aligment-center" style=""><div class="clearfix qodef-full-section-inner">

      <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
          <div class="wpb_wrapper">
            <div class="wpb_text_column wpb_content_element ">
              <div class="wpb_wrapper">
                <h2>OUR Doctors</h2>
                  </div>
                 </div>
                  <div class="vc_empty_space" style="height: 22px">
                    <span class="vc_empty_space_inner"></span>
                  </div>
                  <div class="wpb_text_column wpb_content_element ">
                    <div class="wpb_wrapper">
                      <h4>MDS GREAT Doctors</h4>
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
    </div>


    @endForeach

    </div>
    </div>
    </div>
    @endIf







 @if(sizeof($team) > 0)
    <div id="mds_team">
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

     @foreach($team as $member)
      <div class="wpb_column vc_column_container vc_col-sm-6 vc_col-lg-3 vc_col-md-6">
        <div class="vc_column-inner ">
          <div class="wpb_wrapper">
            <div class="qodef-team main-info-below-image">
              <div class="qodef-team-inner">
                <div class="qodef-team-image">
                  <img src="{{url($member->image)}}" alt="qodef-team-image">
                    <div class="qodef-team-position-holder">
                      <div class="qodef-circle-animate"></div>
                        <div class="qodef-team-position-icon">
                          <span class="qodef-icon-shortcode circle ">
                           <i class="menu_icon icon-user fa" style=""></i>
                          </span>
                        </div>
                        <h6 class="q_team_position">{{$member->job_title}}</h6>
                    </div>
                  </div>
                <div class="qodef-team-info">
                  <div class="qodef-team-title-holder">
                    <h5 class="qodef-team-name">{{$member->name}}</h5>
                  </div>
                
              </div>
            </div>
          </div>
          <div class="vc_empty_space" style="height: 40px"><span class="vc_empty_space_inner"></span></div>
         </div>
        </div>
      </div>
    </div>


    @endForeach

    </div>
    </div>
    </div>
    @endIf



















    @if(sizeof($randomImages) > 0)
    <section id="" class="wpb_row vg_fixed campus-tour padding-lg "  ><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner vc_custom_1504165473051"><div class="wpb_wrapper">    <h2><span>Our campus have a lot to offer for our students</span> TAKE A TOUR</h2>
    <ul class="gallery clearfix">
      @foreach($randomImages as $image)
        <li>
        <div class="overlay">
            <h3>Course: {{$image->event['course']['name']}}</h3>
          <p>Event: {{$image->event['name']}}</p>
          
              
                <a title = "Go to event" href="{{url('/events/'.$image->event['id'])}}" class="more"><span class="icon-gallery-more-arrow"></span></a> </div>
              <figure>

                {{Html::image($image->image,null,['style'=>'width: 100%; display: block;','alt'=>'image', 'class'=>'img-responsive', 'title'=>$image->event['name'] ])}}
              </figure>
            </li>
        @endForeach

      </ul>
    </div></div></div></section>

    @endIf









    @if(null !== $sponsors)

    <section id="" class="wpb_row vg_fixed logos "  ><div class="container"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">    <ul class="owl-carousel clearfix">
              
    @foreach($sponsors as $sponsor)
              <li><a title="{{$sponsor->name}}" target="_blank" href="{{$sponsor->url_link}}"> {{Html::image($sponsor->image,null,['style'=>'width: 65%; display: block;','alt'=>'image', 'class'=>'img-responsive', 'title'=>$sponsor->title ])}}</a></li>
    @endForeach
            </ul>
    </div></div></div></div></section>
    @endIf




    <div data-qodef-parallax-speed="0.5" class="vc_row wpb_row vc_row-fluid qodef-section vc_custom_1445345084553 qodef-content-aligment-left qodef-parallax-section-holder qodef-parallax-section-holder-touch-disabled" style=" padding: 20px 0; background-image: url(&quot;images/site/parallax-2-home-main.jpg&quot;); background-position: 50% 50px;"><div class="clearfix qodef-full-section-inner" >
      <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
        <div class="wpb_wrapper">
      <div class="wpb_text_column wpb_content_element ">
        <div class="wpb_wrapper">
          <h2 style="text-align: center;"><span style="color: #ffffff;">
          Testimonials </span></h2>

        </div>
      </div>
    <div class="vc_empty_space" style="height: 16px"><span class="vc_empty_space_inner"></span></div>

      <div class="wpb_text_column wpb_content_element ">
        <div class="wpb_wrapper">
          <h4 style="text-align: center;"><span style="color: #dbdbdb;">
            we are happy with your feedback 
          </span></h4>

        </div>
      </div>

    <div class="vc_empty_space" style="height: 76px">
      <span class="vc_empty_space_inner"></span>
    </div>


    <div class="qodef-testimonials-holder qodef-grid-section clearfix">
      <div class="qodef-testimonials qodef-section-inner transparent cards_carousel"  data-layout ="cards_carousel">

        <?php
        $i = 0;
          foreach ($randomTestimonials as $randomTestimonial) 
          {

               if ($i == 0)
               {
               echo '<div class="qodef-testimonials-slider-item">';
               }
            echo '<div id="qodef-testimonials" class="qodef-testimonial-content">
            <div class="qodef-testimonial-content-inner">
              <div class="qodef-testimonial-text-holder">
                <div class="qodef-testimonial-text-inner">
                  <p class="qodef-testimonial-title">
                  &quot;'.$randomTestimonial->testimonial.'&quot;          
                  </p>
            </div>
          </div>
          <div class="qodef-testimonial-info-holder">
            <div class="qodef-testimonial-image-holder">
              <img width="56" height="56" src="'.$randomTestimonial->image.'" class="attachment-71 size-71 wp-post-image" alt="a" />       
            </div>
          <div class = "qodef-testimonial-author">
            <p class="qodef-testimonial-author-text"><span>'.$randomTestimonial->name.'</span>
            <span class="qodef-testimonials-job">'.$randomTestimonial->address['name'].'</span>
            </p>
          </div>
        </div>
        </div>
      </div>';

      if ($i==2)
     {
      echo '</div>';
      $i=0;
     }

    $i++;
          }
        ?>

      

    </div>
      <div class="owl-buttons">
        <div class="owl-prev"><span class="qodef-prev-icon"><i class="fa fa-chevron-left"></i></span>
        </div>
        <div class="owl-next"><span class="qodef-next-icon"><i class="fa fa-chevron-right"></i></span>
        </div>
      </div>
    </div>


    </div>
  </div>
  </div>
  </div>
  </div>
      
      </div>
    </div>






    @stop