  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Admins &nbsp</h3><a href="{{url('admin/admins/create')}}"  class="btn btn-round btn-default"> New</a>
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



@if(sizeof($admins) >=1)
<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Active</th>
                        <th>Created At</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
    @foreach($admins as $admin)
      @if($admin->id != Auth::user()->id)
                   
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>{{$admin->name}}</td>
                       
                        <td>{{$admin->email}}</td>

                        <td><?php echo ($admin->active)?'Yes':'No'; ?></td>

                        <td>{{$admin->created_at}}</td>
                    
                    
                        <td>

                            @if($admin->active)
                          
                          <a href="{{url('admin/admins/deactivate/'.$admin->id.'')}}" title="Deactivate Admin" class="btn btn-success"><span class="fa fa-thumbs-o-up"></span> </a> 

                          @else

                          <a href="{{url('admin/admins/active/'.$admin->id.'')}}" title="Active Admin" class="btn btn-danger"><span class="fa fa-thumbs-o-down"></span> </a> 

                          @endIf

                          {{Form::open(['url'=>'/admin/admins/'.$admin->id ,'method'=>'delete','style'=>'display:inline-block;'])}}
                          {{csrf_field()}}
                             <button data-toggle="confirmation"  title = "Delete" type="submit" class="btn btn-danger " style="margin-bottom: -32px;"> <i class="fa fa-trash">
                            </i></button>
                            {{Form::close()}}
                        </td>
                      </tr>
        @endIf

    @endForeach
    </tbody>
                  </table>
@else
<center>
<h3>
<strong>Sorry, there is no data to show.</strong>
</h3>
</center>
@endIf
@endsection






