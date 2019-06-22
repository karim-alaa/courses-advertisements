  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Create New Event &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

@if(sizeof($courses) >= 1)


@if(sizeof($doctors) >= 1)


                  {{Form::open(['url'=>url('admin/events/'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Course <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="course" class="form-control">
                    @if ($courses)

                        @foreach ($courses as $course)
                            @if(old('course') == $course->id)
                                <option selected value="{{$course->id}}">{{$course->name}}</option>
                            @else
                                <option value="{{$course->id}}">{{$course->name}}</option>
                             @endif
                        @endforeach
           
        
                    @endif
                    
                </select>
                      </div>
                    </div>

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Doctor <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="doctor" class="form-control">
                    @if ($doctors)

                        @foreach ($doctors as $doctor)
                            @if(old('doctor') == $doctor->id)
                                <option selected value="{{$doctor->id}}">{{$doctor->user['name']}}</option>
                            @else
                                <option value="{{$doctor->id}}">{{$doctor->user['name']}}</option>
                             @endif
                        @endforeach
           
        
                    @endif
                    
                </select>
                      </div>
                    </div>


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">address <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="address" class="form-control">
                    @if ($addresses)

                        @foreach ($addresses as $address)
                            @if(old('address') == $address->id)
                                <option selected value="{{$address->id}}">{{$address->name}}</option>
                            @else
                                <option value="{{$address->id}}">{{$address->name}}</option>
                             @endif
                        @endforeach
           
        
                    @endif
                    
                </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address Details<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('address_details')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="address_details" name="address_details">
                         @if ($errors->has('address_details'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('address_details') }}</strong>
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
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Start Date<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('date')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="date" name="date">
                         @if ($errors->has('date'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                              
                              @endif
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('price')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="price">
                         @if ($errors->has('price'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                              
                              @endif
                      </div>
                    </div>


                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Capacity</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('capacity')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="capacity">
                         @if ($errors->has('capacity'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="home_visible">Home Visible</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">


                <input @if(null !== old('home_visible') ) checked @endIf name="home_visible" id="home_visible" type="checkbox" value="home_visible">
             
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_online">Is Online</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">


                <input @if(null !== old('is_online') ) checked @endIf name="is_online" id="is_online" type="checkbox" value="is_online">
             
                  </div>
                </div>
<!-- keep it hidden, may be need to update
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_visible">Slide Visible</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">


                <input @if(null !== old('slide_visible') ) checked @endIf name="slide_visible" id="slide_visible" type="checkbox" value="slide_visible">
             
                  </div>
                </div>

-->      
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
 {{Form::close()}}


@else
<center>
<h3>
<strong>Please add at least one doctor to be able to create event.</strong>
</h3>
</center>
@endIf


@else
<center>
<h3>
<strong>Please add at least one course to be able to create event.</strong>
</h3>
</center>
@endIf

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