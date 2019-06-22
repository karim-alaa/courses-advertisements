@extends('layouts.app') 

@section('content')



<div class="inner-banner blog" 
        style="background: url(../wp-content/uploads/2017/08/inner-banner-bg.jpg)"  >

  <div class="container">

    <div class="row">

      <div class="col-sm-12">

        <div class="content">

          <h1>Gallery</h1>

<p>Random Images From Our Courses</p>

        </div>

      </div>

    </div>

  </div>

</div>

 <?php  
     $images_count = 0;
      foreach ($courses as $course) {
                foreach ($course->images as $image) {
                  $images_count += 1;
                }
     } ?>

@if($images_count  > 0)
<section class="campus-tour padding-lg"> 

  

  <!-- gallery filter -->

  <div class="container text-center">

    <div class="isotopeFilters">

      <ul class="gallery-filter clearfix">
     <li class="active"><a href="#" data-filter="*">All</a></li>
    

     
      	@foreach($courses as $course)
   
        
          <li><a href="#" data-filter=".{{$course->id}}">{{$course->name}}</a></li>

          @endForeach

      </ul>

    </div>

  </div>

  <!-- end filter -->

  <ul class="gallery clearfix isotopeContainer">
  	@foreach($courses as $course)

  
      @foreach($course->images as $image)
  
    <li class="isotopeSelector classes {{$course->id}} ">

      
      <div class="overlay">

        <h3>{{$image->event_name}}</h3>

        

        

        
        <a href="{{url('/events/'.$image->event_id)}}" title="Go To Events" class="more"><span class="icon-gallery-more-arrow"></span></a>

        </div>


      <figure title="{{$image->event_name}}">
      	{{Html::image($image->url,null,['style'=>'width: 100%; display: block;','alt'=>'image' ])}}
      </figure>
      
      
    </li>
      @endForeach
    @endForeach



  
  </ul>




</section>


    @else
    <center><h2>Sorry, There Is No Images Now.</h2></center><br><br><br>
    @endIf
  
@stop