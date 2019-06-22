  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Subscribes</h3>
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



<div>

@if(sizeof($subscribes) >= 1)


<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
    @foreach($subscribes as $subscribe)
                   <?php $i = 1; ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>{{$subscribe->email}}</td>
                        <td>{{$subscribe->created_at}}</td>
                        <td>@if(null !== $subscribe->updated_at){{$subscribe->updated_at}}@else Never @endIf</td>
                        <td>


                          
                          @if($subscribe->notifiable == 1 )
                          
                          <a href="{{url('admin/subscribes/'.$subscribe->id.'/ignore')}}" title="Ignore" class="btn btn-success"><span class="fa fa-bell"></span> </a> 

                          @else

                          <a href="{{url('admin/subscribes/'.$subscribe->id.'/notify')}}" title="Notify" class="btn btn-danger"><span class="fa fa-bell-slash"></span> </a> 

                          @endIf

                          {{Form::open(['url'=>'/admin/subscribes/'.$subscribe->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
                          {{csrf_field()}}
                             <button data-toggle="confirmation"  title = "Delete" type="submit" class="btn btn-danger " style="margin-bottom: -32px;"> <i class="fa fa-trash">
                            </i></button>
                            {{Form::close()}}
                        </td>
                      </tr>

    @endForeach
    </tbody>
                  </table>
</div>

<div class="clearfix"></div>
<div>
              <center>    {{ $subscribes->links() }}  </center>



@else
<center>
<h3>
<strong>Sorry, there is no data to show.</strong>
</h3>
</center>
@endIf

</div>
  
@stop
