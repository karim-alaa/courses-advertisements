  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Attendees</h3>
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



<div>

@if(sizeof($attendees) >= 1)


<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Applied At</th>
                        <th>Confirmed</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
    @foreach($attendees as $attendee)
                   <?php $i = 1; ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>{{$attendee->user['name']}}</td>
                        <td>{{$attendee->user['email']}}</td>
                        <td>{{$attendee->user->address['name']}}</td>
                        <td>{{$attendee->user['phone']}}</td>
                        <td>{{$attendee->created_at}}</td>
                        <td>@if($attendee->confirmed == 1) Yes @else No @endIf</td>
                        <td>


                          
                          @if($attendee->confirmed == 1)
                          
                          <a href="{{url('admin/attendees/'.$attendee->id.'/unconfirm')}}" title="Remove Confirmation" class="btn btn-success"><span class="fa fa-thumbs-o-up"></span> </a> 

                          @else

                          <a href="{{url('admin/attendees/'.$attendee->id.'/confirm')}}" title="Confirm" class="btn btn-danger"><span class="fa fa-thumbs-o-down"></span> </a> 

                          @endIf

                          {{Form::open(['url'=>'/admin/attendees/'.$attendee->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
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
              <center>    {{ $attendees->links() }}  </center>



@else
<center>
<h3>
<strong>Sorry, there is no data to show.</strong>
</h3>
</center>
@endIf

</div>
  
@stop


@section('script')

<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Message</h4>
            </div>
            <div class="modal-body">
             

              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
               
            </div>
        </div>
    </div>
</div>


 <script type="text/javascript">
                 
                $(document).on("click", ".show-message", function () {
                   var name = $(this).data('name');
                   var message = $(this).data('message');
                   $(".modal-body").html( message );
                   $(".modal-title").html("Message from " + name );
                   // As pointed out in comments, 
                   // it is superfluous to have to manually call the modal.
                   // $('#show-message').modal('show');
                });
               </script>
@stop