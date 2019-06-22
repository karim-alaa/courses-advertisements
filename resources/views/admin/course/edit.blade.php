  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Edit Course Info &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/courses/'.$course->id),'method'=>'put','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}




                           

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Old small Image
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       {{Html::image($course->small_image,null,['style'=>'width: 30%; display: block;','alt'=>'image' ])}}

                      </div>
                    </div>


          <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"> Image <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="small_image" name="small_image" class="">
                        @if ($errors->has('small_image'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('small_image') }}</strong>
                                    </span>
                              
                              @endif

                      </div>
                    </div>



                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Old Big Image
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       {{Html::image($course->big_image,null,['style'=>'width: 30%; display: block;','alt'=>'image' ])}}

                      </div>
                    </div>


          <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"> Image <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="big_image" name="big_image" class="">
                        @if ($errors->has('big_image'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('big_image') }}</strong>
                                    </span>
                              
                              @endif

                      </div>
                    </div>


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('name')){{old('name')}}@else {{$course->name}} @endIf" name = "name" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('name'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Video ID <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('video')){{old('video')}}@else {{$course->video}} @endIf" name = "video" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('video'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>



                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Page Link <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('page_link')){{old('page_link')}}@else {{$course->page_link}} @endIf" name = "page_link" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('page_link'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('page_link') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>


                      


          <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Short Description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="short_disc" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">@if(null !== old('short_disc')){{old('short_disc')}}@else {{$course->short_disc}} @endIf</textarea>
                     @if ($errors->has('short_disc'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('short_disc') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Full Description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="full_disc" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">@if(null !== old('full_disc')){{old('full_disc')}}@else {{$course->full_disc}} @endIf</textarea>
                     @if ($errors->has('full_disc'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('full_disc') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>


                  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="home_visible">Home Visible</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">


                <input name="home_visible" id="home_visible" type="checkbox" value="home_visible"@if ($course->home_visible == 1) checked @endif>
       
             
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_visible">Slide Visible</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">


               <input name="slide_visible" id="slide_visible" type="checkbox" value="slide_visible"@if ($course->slide_visible == 1) checked @endif>
             
                  </div>
                </div>


                

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
 {{Form::close()}}



                 </div>
@stop



@section('script')
<script type="text/javascript">
  //binds to onchange event of your input field
$('#small_image').bind('change', function() {

  if(this.files[0].size >= 1536000){
    alert('cannot add file greater than 1.5 MB');
      $("#small_image").val(null);
    }
  
    
});


$('#big_image').bind('change', function() {

  if(this.files[0].size >= 1536000){
    alert('cannot add file greater than 1.5 MB');
      $("#big_image").val(null);
    }
  
    
});
</script>
@stop