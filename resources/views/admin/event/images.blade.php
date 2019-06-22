  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Images </h3>
@stop
@section('content')

                
      @if($errors->has('done'))
        <br />

<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{$errors->first('done')}}
  </div>
  <br />
@endif




@if(sizeof($eventImages) >= 1)

@foreach($eventImages as $eventImage)

<div class="col-md-55">
                      <div class="thumbnail">
                        <div class="image view view-first">
                          {{Form::open(['url'=>'/admin/eventImages/'.$eventImage->id ,'method'=>'delete', 'name'=>'delete_form'.$eventImage->id])}}
                                {{csrf_field()}}
                            





                           {{Html::image($eventImage->image,null,['style'=>'width: 100%; display: block;','alt'=>'image' ])}}
                          <div class="mask">
                            <p>Event: {{$eventImage->event['name']}}</p>


                            <div class="tools tools-bottom">
                             
                        
                          <a href="javascript: document.forms['delete_form{{$eventImage->id}}'].submit();"><i class="fa fa-times"></i></a>

                            {{Form::close()}}



                            </div>
                          </div>
                        </div>
                        <div class="caption">
                          <center><p>Created At:{{$eventImage->created_at}}</p></center>
                        </div>
                      </div>
                    </div>



@endForeach

@else
<center>
<h3>
<strong>Sorry, there is no data to show.</strong>
</h3>
</center>
@endIf


<div class="clearfix"></div>
<div>
  <center>{{$eventImages->links()}}</center>

</div>
  
<div class="x_panel">
                <div class="x_title">
                  <h2>Upload New Images</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {{Form::open(['url'=>url('admin/eventImages/'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left', 'enctype' => 'multipart/form-data'])}}
                  {{csrf_field()}}
                 
<input type="file" name="images[]" id="images" class="from-control" required="" multiple="multiple">
<input type="hidden" value="{{$event_id}}" name="event">
<br>
    @if ($errors->has('images'))
        <span class="help-block">
              <strong>{{ $errors->first('images') }}</strong>
        </span>
                              
    @endif

 
<button type="submit" class="btn btn-primary">Add Images</button> 
</form>
                  <br>
                  <br>
                  <br>
                  <br>
                </div>
              </div>
 {{Form::close()}}
       
@stop
<script type="text/javascript">
function submitform()
{
  document.delete_form.submit();
}
</script>



@section('script')
<script type="text/javascript">
  //binds to onchange event of your input field
$('#images').bind('change', function() {
   
var custom_files = []

   for (i = 0; i < this.files.length; i++) { 
     if(this.files[i].size >= 1536000){
       alert('cannot add file greater than 1.5 MB');
         $("#images").val(null);
         break;
     }
}

  


});

</script>
@stop