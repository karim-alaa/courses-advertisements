  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Sponsors &nbsp</h3><a href="{{url('admin/sponsors/create')}}"  class="btn btn-round btn-default"> New</a>
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


@if(sizeof($sponsors) >= 1)  
@foreach($sponsors as $sponsor)

<div class="col-md-55">
                      <div class="thumbnail">
                        <div class="image view view-first">
                          {{Form::open(['url'=>'/admin/sponsors/'.$sponsor->id ,'method'=>'delete', 'name'=>'delete_form'.$sponsor->id])}}
                                {{csrf_field()}}
                            

                           {{Html::image($sponsor->image,null,['style'=>'width: 100%; display: block;','alt'=>'image' ])}}
                          <div class="mask">
                            <p>{{$sponsor->name}}</p>


                            <div class="tools tools-bottom">
                              <a target="_blank" href="{{$sponsor->url_link}}"><i class="fa fa-link"></i></a>
                              <a href="{{url('/admin/sponsors/'.$sponsor->id.'/edit')}}"><i class="fa fa-pencil"></i></a>
                        
                          <a href="javascript: document.forms['delete_form{{$sponsor->id}}'].submit();"><i class="fa fa-times"></i></a>

                            {{Form::close()}}



                            </div>
                          </div>
                        </div>
                        <div class="caption">
                          <center><p>{{$sponsor->name}}</p></center>
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
@stop
<script type="text/javascript">
function submitform()
{
  document.delete_form.submit();
}
</script>

