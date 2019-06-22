  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Create New Admin &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/admins/'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left'])}}
                  {{csrf_field()}}
					

                   


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
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">E-mail<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="{{old('email')}}" id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="email">
                         @if ($errors->has('email'))
                                	<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                              @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="password">
                         @if ($errors->has('password'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                              @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password<span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input  id="middle-name" class="form-control col-md-7 col-xs-12" type="password" name="confirm_password">
                         @if ($errors->has('confirm_password'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
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