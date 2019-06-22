  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">FQs &nbsp</h3><a href="{{url('admin/fq/create')}}"  class="btn btn-round btn-default"> New</a>
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

<?php  $index = 1; ?>
@if(sizeof($fqs) >= 1)
    @foreach($fqs as $fq)
    
                    <div class="col-xs-12 animated fadeInUp">
                      <div class="well profile_view">
                        <div class="col-sm-12" style="margin-bottom:20px;">

                          
                        <div class="col-xs-9">
                           <h3 class="brief"><?php echo '(Q'.$index.'.) '; $index+=1; ?>{{$fq->question}} <small>created at: {{$fq->created_at}}</small></h3>
                            
                         </div>
                         <br/>
                        <div class="x_content">
                          <h2>A. {{$fq->answer}}</h2>
                        </div>

                          
                              <div class="col-xs-12 right text-center">
      


                            <a href="{{url('admin/fq/'.$fq->id.'/edit')}}">
                            <button type="button" class="btn btn-primary"> <i class="fa fa-edit" style="display: inline-block;">
                            </i> Edit </button></a>





                            {{Form::open(['url'=>'/admin/fq/'.$fq->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
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