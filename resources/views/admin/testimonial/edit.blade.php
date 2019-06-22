  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Edit Testimonial Info &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/testimonials/'.$testimonial->id),'method'=>'put','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}



                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Old Image
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       {{Html::image($testimonial->image,null,['style'=>'width: 30%; display: block;','alt'=>'image' ])}}

                      </div>
                    </div>


          <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image"> Image <span class="required">*</span>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('name')){{old('name')}}@else {{$testimonial->name}} @endIf" name = "name" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('name'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('title')){{old('title')}}@else {{$testimonial->title}} @endIf" name = "title" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('title'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>


                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">address <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="address" class="form-control">
                    @if ($addresses)
                        <?php if(null !== old('address')) $value = old('address'); else $value = $testimonial->address['id']; ?>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Testimonial</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="testimonial" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">@if(null !== old('testimonial')){{old('testimonial')}}@else {{$testimonial->testimonial}} @endIf</textarea>
                     @if ($errors->has('testimonial'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('testimonial') }}</strong>
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



@section('script')
<script type="text/javascript">
  //binds to onchange event of your input field
$('#image').bind('change', function() {

  if(this.files[0].size >= 2048000){
    alert('cannot add file greater than 2 MB');
      $("#image").val(null);
    }
  
    
});
</script>
@stop