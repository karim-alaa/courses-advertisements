  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Demos &nbsp</h3><a href="{{url('admin/freeVideos/create')}}"  class="btn btn-round btn-default"> New</a>
@stop
@section('content')

                  <br />

      @if($errors->has('done'))
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{$errors->first('done')}}
  </div>
@endif
<br />


@if(sizeof($demos) >= 1)
@foreach($demos as $demo)
  <div class="col-md-6 col-sm-6 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                         
                          
                          <div class="right col-xs-5 text-center">

                           
                            <object width="450" height="450" 
                                  data="https://www.youtube.com/embed/{{$demo->video_link}}">
                            </object>


                          </div>
                        </div>
                        <div class="clearfix"></div>
                              <div class="col-xs-12 bottom text-center">
                          <div class="clearfix"></div>

                          <div class="col-xs-12  emphasis">
                            <h2>
                          <strong>
                            {{$demo->title}}
                          </strong>
                          </h2>
                            {{Form::open(['url'=>'/admin/freeVideos/'.$demo->id ,'method'=>'delete', ])}}
                            {{csrf_field()}}
                             <button data-toggle="confirmation"  type="submit" class="tn btn-danger btn-xs" > <i class="fa fa-trash">
                            </i> Delete </button>
                            {{Form::close()}}

                          </div>
                        </div>
                      </div>
                    </div>




@endForeach
<div class="clearfix"></div>
<div>
     <center>{{$demos->links()}}</center>  

</div>

@else
<center>
<h3>
<strong>Sorry, there is no data to show.</strong>
</h3>
</center>
@endIf

@stop

<script type="text/javascript">
function submitform()
{
  document.delete_form.submit();
}
</script>

