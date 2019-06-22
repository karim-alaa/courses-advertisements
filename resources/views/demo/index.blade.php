
@extends('layouts.app') 

@section('content')
<div class="qodef-title qodef-standard-type qodef-preload-background qodef-has-background qodef-has-parallax-background qodef-content-left-alignment qodef-animation-right-left qodef-title-image-not-responsive" style="height:350px;background-image:url({{url('images/site/blog-title.jpg')}});" data-height="350" data-background-width=&quot;1920&quot;>
        <div class="qodef-title-image"><img src="{{url('user/wp-content/uploads/2015/10/blog-title.jpg')}}" alt="&nbsp;" /> </div>
        <div class="qodef-title-holder" >
            <div class="qodef-container clearfix">
                <div class="qodef-container-inner">
                    <div class="qodef-title-subtitle-holder" style="">
                        <div class="qodef-title-subtitle-holder-inner">
                                                        <h1 ><span>MDS VIDEOS</span></h1>
                                                                    <span class="qodef-subtitle" ><span>Free Videos </span></span>
                                                                                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



	@if(sizeof($demos) > 0)
@foreach($demos as $demo)
<div class="qodef-separator-holder clearfix  qodef-separator-center">
	<div class="qodef-separator" style="border-color: #b2b2b2;width: 100%;border-width: 4px;margin-top: 0px;margin-bottom: 15px"></div>
</div>
<article id="post-934" class="post-934 post type-post status-publish format-standard has-post-thumbnail hentry category-innovation category-optimization category-sustainable tag-potential tag-project tag-social ">
	<div class="qodef-post-content" style="  height: 30em;">
		<div class="qodef-post-text">
			<div class="qodef-post-text-inner">
		
					<div class="qodef-blog-standard-info-holder" style=" margin: auto;
    width: 50%;">
					<h2 class="qodef-post-title">
	<a href="#" title="New Apps – Fresh Ideas">{{$demo->title}}</a>
</h2>					<div class="qodef-post-info">

  			</div>
		</div>
		</div>
	</div>

			<div class="qodef-post-image"  style=" margin: auto;
    width: 50%;
    height: 100%;
    padding: 10px;">
				<object  style =" width: 100% ; height:100% " 
data="https://www.youtube.com/embed/{{$demo->video_link}}">
</object>

	</div>

</article>


<div>
	<center>
<div><h1><strong></strong></h1></div>
</center>
<div class="modal-body">
          <div class="video-block">
          </div>
        </div>
</div>
<br><br><br>

@endForeach
@else
<center><h2>Sorry, There Is No Free Video Available Now</h2></center>
@endIf





@stop