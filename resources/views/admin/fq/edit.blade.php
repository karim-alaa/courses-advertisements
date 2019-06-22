  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Edit  Frequency Question &nbsp</h3>
@stop
@section('content')
                      <div class="x_content">
                  <br />

                
                  {{Form::open(['url'=>url('admin/fq/'.$fq->id),'method'=>'put','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}




                      
                    
                    <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Question</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="question" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">@if(null !== old('question')){{old('question')}}@else {{$fq->question}} @endIf</textarea>
                     @if ($errors->has('question'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
                </div>

                   

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Answer</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <textarea name="answer" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;">@if(null !== old('answer')){{old('answer')}}@else {{$fq->answer}} @endIf</textarea>
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


