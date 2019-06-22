  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Create New Team Member &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/team/'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}
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
                        <input value="{{old('name')}}" name = "name" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                        	 @if ($errors->has('name'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              
                              @endif
                        
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
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">email<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('email')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="email" name="email">
                         @if ($errors->has('email'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                              
                              @endif
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">job_title</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('job_title')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="job_title">
                         @if ($errors->has('job_title'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('job_title') }}</strong>
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

  if(this.files[0].size >= 1536000){
    alert('cannot add file greater than 1.5 MB');
      $("#image").val(null);
    }
  
    
});
</script>
@stop