  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Courses &nbsp</h3><a href="{{url('admin/courses/create')}}"  class="btn btn-round btn-default"> New</a>
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


@if(sizeof($courses) >= 1)
    @foreach($courses as $course)
                    <div class="col-xs-12 animated fadeInUp">
                      <div class="well profile_view">
                        <div class="col-sm-12" style="margin-bottom:20px;">

                          <div class="right col-xs-3 text-center">

                            <img src="{{ asset($course->small_image) }}" alt="" class="img-square img-responsive">
                            <small>{{$course->created_at}}</small>
                          </div>
<div class="col-xs-9">
   <h3 class="brief">{{$course->name}} </i></h3>
<div class="x_content">

                  <table class="table">
                    <thead>
                      <tr>
                        <th> Home</th>
                        <th> Slide</th>
                        <th>Short Description</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>@if ($course->home_visible == 1) Yes @else No @endIf</td>
                        <td>@if ($course->slide_visible == 1) Yes @else No @endIf</td>
                        <td>{{$course->short_disc}} </td>
                        

                      </tr>
                    </tbody>
                  </table>

                </div>  
</div>
                          
                        </div>
                              <div class="col-xs-12 bottom text-center">
          <div class="clearfix"></div>

                          <div class="col-xs-12  emphasis">

<a data-name = "{{$course->name}}" data-full_disc="{{$course->full_disc}}" data-toggle="modal" href="#message" class="show-message">
                            <button type="button" class="btn btn-primary"> <i class="fa fa-file" style="display: inline-block;">
                            </i> Full Description </button></a>

                            <a href="{{url('admin/courses/'.$course->id.'/edit')}}">
                            <button type="button" class="btn btn-primary"> <i class="fa fa-edit" style="display: inline-block;">
                            </i> Edit </button></a>



                            <a href="{{$course->page_link}}" target="_blank">
                            <button type="button" class="btn btn-default"> <i class="fa fa-send" style="display: inline-block;">
                            </i> Page Link </button></a>


                    






                            {{Form::open(['url'=>'/admin/courses/'.$course->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
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
                   var full_disc = $(this).data('full_disc');
                   
                   $(".modal-body").html( full_disc );
                   $(".modal-title").html("Full Description Of " + name  );
                   // As pointed out in comments, 
                   // it is superfluous to have to manually call the modal.
                   // $('#show-message').modal('show');
                });
               </script>
  @stop