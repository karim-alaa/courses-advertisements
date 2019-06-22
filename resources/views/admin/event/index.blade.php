  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Events &nbsp</h3><a href="{{url('admin/events/create')}}"  class="btn btn-round btn-default"> New</a>

       

@stop

@section('search')


              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  {{Form::open(['url'=>url('admin/events/search'),'method'=>'post','id'=>'demo-form2','data-parsley-validate','data-parsley-validate','class'=>'form-horizontal form-label-left'])}}
                  {{csrf_field()}}
                <div class="input-group">
                  <input type="text" name="keyword" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go!</button>
                        </span>
                   {{Form::close()}}
                </div>
              </div>
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

@if(sizeof($events) >= 1)
     @foreach($events as $event)
                    <div class="col-xs-12 animated fadeInUp">
                      <div class="well profile_view">
                        <div class="col-sm-12" style="margin-bottom:20px;">

                          <div class="right col-xs-3 text-center">

                            <img src="{{ asset($event->small_image) }}" alt="" class="img-square img-responsive">
                            <small>{{$event->created_at}}</small>
                          </div>
<div class="col-xs-9">
   <h3 class="brief">{{$event->name}} </i></h3>
<div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                          <th> Address   </th>
                          <th> Confirmed </th>
                          <th> Capacity  </th>
                          <th> Price     </th>
                          <th> Date     </th>
                          <th> Doctor    </th>
                          <th> Course    </th>
                          <th> Type    </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{$event->address['name']}}</td>
                        <td>{{$event->confirmed}}</td>
                        
                        <td>{{$event->capacity}}</td>
                        <td>{{$event->price}}</td>
                        <td>{{$event->date}}</td>
                        <td>{{$event->doctor->user['name']}}</td>
                        <td>{{$event->course['name']}}</td>
                        <td><?php if($event->is_online)echo "Online"; else echo "Offline"; ?></td>


                      </tr>
                    </tbody>
                  </table>

                </div>  
</div>
                          
                        </div>
                              <div class="col-xs-12 bottom text-center">
          <div class="clearfix"></div>

                          <div class="col-xs-12  emphasis">

<a data-name = "{{$event->name}}" data-short_disc="{{$event->short_disc}}" data-toggle="modal" href="#message" class="show-message">
                            <button type="button" class="btn btn-success"> <i class="fa fa-file" style="display: inline-block;">
                            </i>  Description </button></a>

                            <a href="{{url('admin/events/'.$event->id.'/edit')}}">
                            <button type="button" class="btn btn-primary"> <i class="fa fa-edit" style="display: inline-block;">
                            </i> Edit </button></a>

                            <a href="{{$event->page_link}}" target="_blank">
                            <button type="button" class="btn btn-default"> <i class="fa fa-send" style="display: inline-block;">
                            </i> Page Link </button></a>




                            <a href="{{url('admin/events/images/'.$event->id.'')}}">
                            <button type="button" class="btn btn-primary"> <i class="fa fa-image" style="display: inline-block;">
                            </i> Album </button></a>




                            <a href="{{url('admin/events/attendees/'.$event->id)}}">
                            <button type="button" class="btn btn-primary"> <i class="fa fa-users" style="display: inline-block;">
                            </i> Attendees </button></a>




                            {{Form::open(['url'=>'/admin/events/'.$event->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
                            {{csrf_field()}}
                             <button data-toggle="confirmation"  type="submit" class="btn btn-danger" style="margin-bottom: -32px;"> <i class="fa fa-trash">
                            </i> Delete </button>
                            {{Form::close()}}

                          </div>
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
                  
                   var short_disc = $(this).data('short_disc');
                   
                   $(".modal-body").html(short_disc);
                   $(".modal-title").html("Full Description Of " + name  );
                   // As pointed out in comments, 
                   // it is superfluous to have to manually call the modal.
                   // $('#show-message').modal('show');
                });
               </script>
  @stop