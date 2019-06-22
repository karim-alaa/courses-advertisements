  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Create New Frequency Question &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/fq/'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left'])}}
                  {{csrf_field()}}
					

                   


                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Question <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="question">{{old('question')}}</textarea>
                        	 @if ($errors->has('question'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                              
                              @endif
                        
                      </div>
                    </div>
                      
                    
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Answer <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="answer">{{old('answer')}}</textarea>
                         @if ($errors->has('answer'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
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