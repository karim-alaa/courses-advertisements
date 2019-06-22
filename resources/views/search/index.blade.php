@extends('layouts.app')

@section('content')
<!-- Start Banner -->

<div class="inner-banner blog" style="background: url(../user/uploads/2017/08/inner-banner-bg.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="content">
       
          <h2><?php echo sizeof($courses) + sizeof($events)?>
                results found for the keyword: {{$search_keyword}}
           </h2>
          <p class = "cate">
            
            
            </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Banner -->
 
<!-- Start Blog -->


<br/><br/>

<div class="x_content">


                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Courses ({{sizeof($courses)}})</a>
                      </li>
                      <li role="presentation" class="active"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="true">Events ({{sizeof($events)}})</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="home-tab">
                        

                        <div class="container blog-wrapper padding-lg">
  <div class="row"> 
    <!-- Start Left Column -->
    <div class="col-sm-8 blog-left">
      <ul class="blog-listing">
    @if(sizeof($courses) >= 1)
@foreach($courses as $course)
        <li> 

      
                {{Html::image($course->small_image,null,['class'=>'img-responsive', 'style'=>'width: 20%; display: block;','alt'=>'image' ])}}

          <h2>{{$course->name}}</h2>
          <ul class="post-detail">
            <li><span class="icon-date-icon ico"></span><span class="bold">{{$course->created_at}}</span></li>
            <li><span class="icon-chat-icon ico"></span><span class="bold">{{$course->short_disc}}</li>
              
          </ul>
          <?php $event_count = sizeof($course->events) ?>
         <p>@if($event_count >= 3) {{$event_count}} events @else {{$event_count}} event @endIf</p>
          
          <a href="{{url('courses/'.$course->id)}}" class="read-more"><span class="icon-play-icon"></span>Read More</a> </li>
          
          @endForeach
          @else
             <h3>
              <p>
                <strong>Not Found</strong>
                <hr>
                <small>
                  Sorry , no content matched your search request . Please try again with different keywords .</small></p> 
                  </h3>
                  
        @endIf
      
      </ul>
      <ul class="pagination">

      </ul>
    </div>
    <!-- End Left Column --> 
    
    <!-- Start Right Column -->
  
    <div class="col-sm-4">
      <div class="blog-right">
         @if(sizeof($latest_courses) >= 1)
          <div class="widget-wrapper latest-widget"><h4>Recent Courses</h4>            <div class="recent-post">
              <!-- <h3>Recent Posts</h3> -->
              <ul>
                @foreach($latest_courses as $course)
                        <li class="clearfix"> 
                        <a href="{{url('courses/'.$course->id)}}">
                        <div class="img-block">
                          {{Html::image($course->small_image,null,['style'=>'width: 100%; display: block;','alt'=>'image','class'=>'img-responsive' ])}}
                                                </div>
                        <div class="detail">
                            <h4>{{$course->name}}</h4>
                            <p><span class="icon-date-icon ico"></span><span>{{$course->created_at}}</span></p>
                        </div>
                        </a> 
                    </li>
                @endForeach     
                                 
                                    </ul>
            </div>
                </div>
       @endIf
      </div>
    </div>
   
    <!-- End Right Column --> 
    
  </div>
</div>


                      </div>
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content2" aria-labelledby="profile-tab">
                       




<div class="container blog-wrapper padding-lg">
  <div class="row"> 
    <!-- Start Left Column -->
    <div class="col-sm-8 blog-left">
      <ul class="blog-listing">
        @if(sizeof($events) >= 1)
        @foreach($events as $event)
        <li> 

      
                {{Html::image($event->small_image,null,['class'=>'img-responsive', 'style'=>'width: 20%; display: block;','alt'=>'image' ])}}

          <h2>{{$event->name}}</h2>
          <ul class="post-detail">
            <li><span class="icon-date-icon ico"></span><span class="bold">{{$event->created_at}}</span></li>
            <li><span class="icon-chat-icon ico"></span><span class="bold">{{$event->short_disc}}</li>
              
          </ul>
          <?php $event_attendees_count = sizeof($event->event_attendees) ?>
         <p>@if($event_attendees_count >= 3) {{$event_attendees_count}} Attendees @else {{$event_attendees_count}} Attendee @endIf</p>
          
          <a href="{{url('events/'.$event->id)}}" class="read-more"><span class="icon-play-icon"></span>Read More</a> </li>
          
          @endForeach
          @else
             
              <h3>
              <p>
                <strong>Not Found</strong>
                <hr>
                <small>
                  Sorry , no content matched your search request . Please try again with different keywords .</small></p> 
                  </h3>
                  
        @endIf
      
      </ul>
      <ul class="pagination">

      </ul>
    </div>
    <!-- End Left Column --> 
    
    <!-- Start Right Column -->
    
   <div class="col-sm-4">
      <div class="blog-right">
       @if(sizeof($latest_events) >= 1)
          <div class="widget-wrapper latest-widget"><h4>Recent Events</h4>            <div class="recent-post">
              <!-- <h3>Recent Posts</h3> -->
              <ul>
                @foreach($latest_events as $event)
                        <li class="clearfix"> 
                        <a href="{{url('events/'.$event->id)}}">
                        <div class="img-block">
                          {{Html::image($event->small_image,null,['style'=>'width: 100%; display: block;','alt'=>'image','class'=>'img-responsive' ])}}
                                                </div>
                        <div class="detail">
                            <h4>{{$event->name}}</h4>
                            <p><span class="icon-date-icon ico"></span><span>{{$event->created_at}}</span></p>
                        </div>
                        </a> 
                    </li>
                @endForeach     
                                 
                                    </ul>
            </div>
                </div>
          @endIf
      </div>
    </div>

    <!-- End Right Column --> 
    
  </div>
</div>




                       
                      </div>
                      
                    </div>
                  </div>

                </div>



@stop


