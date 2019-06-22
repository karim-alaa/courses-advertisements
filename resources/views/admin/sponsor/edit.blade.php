  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Edit Sponsor Info &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/sponsors/'.$sponsor->id),'method'=>'put','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}



                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Old Image
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       {{Html::image($sponsor->image,null,['style'=>'width: 30%; display: block;','alt'=>'image' ])}}

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
                        <input value="@if(null !== old('name')){{old('name')}}@else {{$sponsor->name}} @endIf" name = "name" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('name'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Url Link <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="@if(null !== old('url_link')){{old('url_link')}}@else {{$sponsor->url_link}} @endIf" name = "url_link" type="text" id="first-name" class="form-control col-md-7 col-xs-12">
                           @if ($errors->has('url_link'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('url_link') }}</strong>
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