  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Contacts</h3>
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
@if(sizeof($contacts) >= 1)
<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Jop Title</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Date</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php $i = 1; ?>
    @foreach($contacts as $contact)
                  
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td>{{$contact->fname.' '.$contact->lname}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->job_title}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>{{$contact->company}}</td>
                        <td>{{$contact->created_at}}</td>
                        <td>

                          <input type="hidden" name="message_{{$contact->id}}" value="{{$contact->message}}">
                          <a style="display: inline-block;" title="Message" data-name = "{{$contact->fname.' '.$contact->lname}}" data-message="{{$contact->message}}" data-toggle="modal" href="#message" class="show-message btn btn-primary"><span class="glyphicon glyphicon-file"></span> </a> 

                          {{Form::open(['url'=>'/admin/contacts/'.$contact->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
                          {{csrf_field()}}
                             <button data-toggle="confirmation"  title = "Delete" type="submit" class="btn btn-danger " style="margin-bottom: -32px;"> <i class="fa fa-trash">
                            </i></button>
                            {{Form::close()}}
                        </td>
                      </tr>

    @endForeach
    </tbody>
                  </table>

                 <center>  {{ $contacts->links() }} </center> 
@else
<center>
<h3>
<strong>Sorry, there is no data to show.</strong>
</h3>
</center>
@endIf
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