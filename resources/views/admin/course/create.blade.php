  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Create New Course &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/courses/'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}
					<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Small Image <span class="required">*</span>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Big Image <span class="required">*</span>
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
                        <input value="{{old('name')}}" name = "name" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                        	 @if ($errors->has('name'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>
                      
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Video ID<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('video')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="video">
                         @if ($errors->has('video'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                              @endif
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Page Link<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('page_link')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="page_link">
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
                    <textarea name="short_disc" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">{{old('short_disc')}}</textarea>
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
                    <textarea name="full_disc" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">{{old('full_disc')}}</textarea>
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


                <input @if(null !== old('home_visible') ) checked @endIf name="home_visible" id="home_visible" type="checkbox" value="home_visible">
             
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_visible">Slide Visible</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">


                <input @if(null !== old('slide_visible') ) checked @endIf name="slide_visible" id="slide_visible" type="checkbox" value="slide_visible">
             
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


<!--1024000-->
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