  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Edit Event Info &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/events/'.$event->id),'method'=>'put','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}




                           

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Old small Image
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       {{Html::image($event->small_image,null,['style'=>'width: 30%; display: block;','alt'=>'image' ])}}

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
                       {{Html::image($event->big_image,null,['style'=>'width: 30%; display: block;','alt'=>'image' ])}}

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
                        <input value="@if(null !== old('name')){{old('name')}}@else {{$event->name}} @endIf" name = "name" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('name'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Price <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('price')){{old('price')}}@else {{$event->price}} @endIf" name = "price" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('price'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Capacity <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('capacity')){{old('capacity')}}@else {{$event->capacity}} @endIf" name = "capacity" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('capacity'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>



                    
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Page Link <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('page_link')){{old('page_link')}}@else {{$event->page_link}} @endIf" name = "page_link" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('page_link'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('page_link') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>




                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Date <span class="required">*</span>
                      </label>
                     
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('date')){{old('date')}} @else{{$event->date}}@endIf" name="date" type="date" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('date'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>


                     <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="address" class="form-control">
                    @if ($addresses)
                        <?php if(null !== old('address') ) $value = old('address'); else $value = $event->address['id']; ?>
                        @foreach ($addresses as $address)
                            @if($value == $address->id)
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Doctor <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="doctor" class="form-control">
                    @if ($doctors)
                        <?php if(null !== old('doctor') ) $value = old('doctor'); else $value = $event->doctor['id']; ?>
                        @foreach ($doctors as $doctor)
                            @if($value == $doctor->id)
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Course <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="course" class="form-control">
                    @if ($courses)
                        <?php if(null !== old('course') ) $value = old('course'); else $value = $event->course['id']; ?>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Address Details <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('address_details')){{old('address_details')}}@else {{$event->address_details}} @endIf" name = "address_details" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('address_details'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('address_details') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>


                      


          <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Short Description</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="short_disc" class="form-control" style="width: 100%; resize: horizontal; height: 87px;">@if(null !== old('short_disc')){!!old('short_disc')!!}@else{{ $event->short_disc }}@endIf</textarea>
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


                <input name="home_visible" id="home_visible" type="checkbox" value="home_visible"@if ($event->home_visible == 1) checked @endif>
       
             
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="is_online">Is Online</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">


                <input name="is_online" id="is_online" type="checkbox" value="is_online"@if ($event->is_online == 1) checked @endif>
       
             
                  </div>
                </div>


<!--
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slide_visible">Slide Visible</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">


               <input name="slide_visible" id="slide_visible" type="checkbox" value="slide_visible"@if ($event->slide_visible == 1) checked @endif>
             
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