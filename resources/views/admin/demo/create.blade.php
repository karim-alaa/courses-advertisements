  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Create New Free Video &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/freeVideos/'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}
			


                   


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Title <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('title')}}" name = "title" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                        	 @if ($errors->has('title'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Video Link <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('video_link')}}" name = "video_link" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('video_link'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('video_link') }}</strong>
                                    </span>
                              
                              @endif
                        
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