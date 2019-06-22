  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Edit About Us Tap &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

      @if($errors->has('done'))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{$errors->first('done')}}
  </div>
@endif

                  {{Form::open(['url'=>url('admin/abouts/'.$about->id),'method'=>'PUT','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}
                

                    <div class="form-group">

          
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Previous Image
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          {{Html::image($about->image,null,['class'=>'img-square profile_img'])}}

                      </div>
                    </div>
                    
					<div class="form-group">

					
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Small Image <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="file" id="image" name="image" class="">
                        @if ($errors->has('image'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                              
                              @endif

                      </div>
                    </div>


              


                  
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Video Link<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{$about->video}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="video">
                         @if ($errors->has('video'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                              @endif
                      </div>
                    </div>

                  
					<div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Short Description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="short_disc" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">{{$about->short_disc}}</textarea>
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
                    <textarea name="full_disc" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">{{$about->full_disc}}</textarea>
                     @if ($errors->has('full_disc'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('full_disc') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>

         
             
              

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                       
                        <button type="submit" class="btn btn-success">Save Changes</button>
                      </div>
                    </div>
 {{Form::close()}}
</div>

       
@stop



@section('script')
<script type="text/javascript">
  //binds to onchange event of your input field
$('#image').bind('change', function() {

  if(this.files[0].size >= 1536000){
    alert('cannot add file greater than 1.5 MB');
      $("#image").val(null);
    }
  
    
});
</script>
@stop