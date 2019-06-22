  @extends('layouts.admin') 
  @section('header')   

<h3  style="display: inline-block;">Users &nbsp</h3>
<div style="clear: both;"></div>
<a style="display: inline-block; float: left;" data-toggle="modal" data-target="#exampleModalCenterActive" class="btn btn-round btn-primary">
 Send Message To Active Users
</a>

<a style="display: inline-block; float: left; " data-toggle="confirmation" data-toggle="modal" data-target="#exampleModalCenterDeactivated" class="btn btn-round btn-danger"> Send Message To Deactivated Users</a>
<div style="clear: both;"></div>

@stop
@section('content')

         

      @if($errors->has('done'))
       <br />
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{$errors->first('done')}}
  </div>


        @if($errors->has('error'))
       <br />
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{$errors->first('error')}}
  </div>
  @endif
  <br />
@endif



@if(sizeof($users) >=1)
<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Active</th>
                        <th>Created At</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
    @foreach($users as $user)
      @if($user->id != Auth::user()->id)
                   
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>{{$user->name}}</td>
                       
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address['name']}}</td>
                        <td><?php echo ($user->active)?'Yes':'No'; ?></td>

                        <td>{{$user->created_at}}</td>
                    
                        <td >

                           @if($user->active)
                          
                          <a href="{{url('admin/users/deactivate/'.$user->id.'')}}" title="Deactivate User" class="btn btn-success"><span class="fa fa-thumbs-o-up"></span> </a> 

                          @else

                          <a href="{{url('admin/users/active/'.$user->id.'')}}" title="Active User" class="btn btn-danger"><span class="fa fa-thumbs-o-down"></span> </a> 

                          @endIf



                          @if($user->notifiable == 1 )
                          
                          <a href="{{url('admin/users/'.$user->id.'/ignore')}}" title="Ignore" class="btn btn-success"><span class="fa fa-bell"></span> </a> 

                          @else

                          <a href="{{url('admin/users/'.$user->id.'/notify')}}" title="Notify" class="btn btn-danger"><span class="fa fa-bell-slash"></span> </a> 

                          @endIf


                          {{Form::open(['url'=>'/admin/users/'.$user->id ,'method'=>'delete','style'=>'display:inline-block;'])}}
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
                  <center>  {{ $users->links() }} </center> 
@else
<center>
<h3>
<strong>Sorry, there is no data to show.</strong>
</h3>
</center>
@endIf





<!-- Modal -->
<div class="modal fade" id="exampleModalCenterActive" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Send Message To Active Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {{Form::open(['url'=>url('admin/users/send/mail/1'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left'])}}
                  {{csrf_field()}}

<label class="control-label-left col-md-3 col-sm-3 col-xs-12">Subject</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <input name="subject" class=" form-control" />
                     @if ($errors->has('subject'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                              
                              @endif
                  </div>

                  <label class="control-label-left col-md-3 col-sm-3 col-xs-12">Message</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea name="message" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;"></textarea>
                     @if ($errors->has('message'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-close">
                            </i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-send">
                            </i> Send</button>
      </div>

      {{Form::close()}}
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenterDeactivated" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Send Message To Deactivated Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         {{Form::open(['url'=>url('admin/users/send/mail/0'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left'])}}
                  {{csrf_field()}}

<label class="control-label-left col-md-3 col-sm-3 col-xs-12">Subject</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <input name="subject" class=" form-control" />
                     @if ($errors->has('subject'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                              
                              @endif
                  </div>

                  <label class="control-label-left col-md-3 col-sm-3 col-xs-12">Message</label>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea name="message" class=" form-control" style="width: 100%; resize: horizontal; height: 87px;"></textarea>
                     @if ($errors->has('message'))
                                  <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                              
                              @endif
                  </div>
               
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-close">
                            </i> Close</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-send">
                            </i> Send</button>
      </div>

      {{Form::close()}}
    </div>
  </div>
</div>








@endsection












