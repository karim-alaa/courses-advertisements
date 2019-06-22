  @extends('layouts.admin') 
  @section('header')   


     {{Html::style('admin/css/tags/dist/bootstrap-tagsinput.css')}}
   
     {{Html::style('admin/css/tags/assets/app.css')}}






<h3  style="display: inline-block;">Edit Configurations &nbsp</h3>
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

                  {{Form::open(['url'=>url('admin/configs/'.$config->id),'method'=>'PUT','id'=>'config_form','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left'])}}
                  {{csrf_field()}}
                

                   
                    
     


              


                  
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Intro Video Link</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('intro_video')) {{old('intro_video')}} @elseIf(null !== $config->intro_video){{$config->intro_video}}@endIf" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="intro_video">
                         @if ($errors->has('intro_video'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('intro_video') }}</strong>
                                    </span>
                              @endif
                      </div>
                    </div>

                  
          <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Email</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="email" class=" form-control" value="{{$config->email}}" />
                     @if ($errors->has('email'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>

                

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Courses Number</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input onkeypress='validate(event)' name="courses_number" type="numebr" class=" form-control" value="{{$config->courses_number}}" />
                     @if ($errors->has('courses_number'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('courses_number') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Events Number</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input onkeypress='validate(event)' name="events_number" class=" form-control" type="numebr" value="{{$config->events_number}}" />
                     @if ($errors->has('events_number'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('events_number') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>



                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Students Number</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input onkeypress='validate(event)' name="students_number" class=" form-control" type="numebr" value="{{$config->students_number}}" />
                     @if ($errors->has('students_number'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('students_number') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>

                  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Satisfied Students percentage</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input onkeypress='validate(event)' name="satisfied_students" class=" form-control" type="numebr" value="{{$config->satisfied_students}}" />
                     @if ($errors->has('satisfied_students'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('satisfied_students') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Address - Location</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="location" class=" form-control" type="text" value="{{$config->location}}" />
                     @if ($errors->has('location'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Phones</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text"  name="phones[]" id="phones" value="{{$phones}}" data-role="tagsinput" />
                    
                     @if ($errors->has('phones'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('phones') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Youtube Link</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="youtube" class=" form-control" type="text" value="{{$config->youtube}}">
                     @if ($errors->has('youtube'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Facebook Link</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="facebook" class=" form-control" type="text" value="{{$config->face}}">
                     @if ($errors->has('facebook'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Instagram Link</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="insta" class=" form-control" type="text" value="{{$config->insta}}">
                     @if ($errors->has('insta'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('insta') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Twitter Link</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="twitter" class=" form-control" type="text" value="{{$config->twitter}}">
                     @if ($errors->has('twitter'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">LinkedIn Link</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input name="linked" class=" form-control" type="text" value="{{$config->linked}}">
                     @if ($errors->has('linked'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('linked') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>




         
             
              

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
             {{Form::close()}}           
                        <button type="submit" form="config_form" class="btn btn-success">Save Changes</button>
                      </div>
                    </div>

</div>

       
@stop



@section('script')
<script type="text/javascript">
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script> 

<script type="text/javascript">
                  
                </script> 


</script>



  
    {{Html::script('admin/js/tags/dist/bootstrap-tagsinput.min.js')}}
    {{Html::script('admin/js/tags/dist/bootstrap-tagsinput/bootstrap-tagsinput-angular.min.js')}}
    {{Html::script('admin/js/tags/assets/app.js')}}
    {{Html::script('admin/js/tags/assets/app_bs3.js')}}



@stop