  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Testimonials &nbsp</h3><a href="{{url('admin/testimonials/create')}}"  class="btn btn-round btn-default"> New</a>
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
  
@if(sizeof($testimonials) >= 1)
<table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
    @foreach($testimonials as $testimonial)
                   
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td>{{$testimonial->name}}</td>
                       
                        <td>{{$testimonial->title}}</td>
                    
                        <td> {{Html::image($testimonial->image,null,['style'=>'width: 30%; display: block;','alt'=>'image' ])}}</td>
                      
                        <td> {{$testimonial->address['name']}}</td>
                         <td> {{$testimonial->created_at}}</td>
                        <td>

                          <input type="hidden" name="testimonial_{{$testimonial->id}}" value="{{$testimonial->testimonial}}">
                          <a style="display: inline-block;" title="Message" data-name = "{{$testimonial->name}}" data-testimonial="{{$testimonial->testimonial}}" data-toggle="modal" href="#message" class="show-message btn btn-success"><span class="glyphicon glyphicon-file"></span> </a> 

                          <a href="{{url('admin/testimonials/'.$testimonial->id.'/edit')}}">
                            <button type="button" class="btn btn-primary"> <i class="fa fa-edit" style="display: inline-block;">
                            </i></button></a>

                          {{Form::open(['url'=>'/admin/testimonials/'.$testimonial->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
                          {{csrf_field()}}
                          
                             <button data-toggle="confirmation"  title = "Delete" type="submit" class="btn btn-danger" style="margin-bottom: -32px;"> <i class="fa fa-trash">
                            </i></button>
<a href=""></a>
                      
                           
                            {{Form::close()}}

                      

                        </td>
                      </tr>

    @endForeach
    </tbody>
                  </table>
</div>
<div class="clearfix"></div>
<div>
                 <center>    {{ $testimonials->links() }} </center> 


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
                   var testimonial = $(this).data('testimonial');
                   $(".modal-body").html( testimonial );
                   $(".modal-title").html("Testimonial from " + name );
                   // As pointed out in comments, 
                   // it is superfluous to have to manually call the modal.
                   // $('#show-message').modal('show');
                });
               </script>

<script type="text/javascript">
  

</script>


@stop



