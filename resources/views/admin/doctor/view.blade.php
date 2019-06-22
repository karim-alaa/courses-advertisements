  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Doctors &nbsp</h3><a href="{{url('admin/doctors/create')}}"  class="btn btn-round btn-default"> New</a>
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


@if(sizeof($doctors) >= 1)
    @foreach($doctors as $doctor)
                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>{{$doctor->user['job_title']}}</i></h4>
                          <div class="left col-xs-7">
                            <h2>{{$doctor->user['name']}}</h2>
                            <ul class="list-unstyled">
                              
                              <li><i class="fa  fa-map-marker"></i> <strong>Address:</strong> {{$doctor->user->address['name']}} </li>
                              <li><i class="fa fa-phone"></i> <strong>phone: </strong>{{$doctor->user['phone']}}</li>

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">

                            <img src="{{ asset($doctor->user['image']) }}" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                              <div class="col-xs-12 bottom text-center">
          <div class="clearfix"></div>

                          <div class="col-xs-12  emphasis">
                            <a href="{{url('admin/doctors/'.$doctor->id.'/edit')}}">
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-edit" style="display: inline-block;">
                            </i> Edit </button></a>


                            {{Form::open(['url'=>'/admin/doctors/'.$doctor->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
                            {{csrf_field()}}
                             <button data-toggle="confirmation"  type="submit" class="btn btn-danger btn-xs" style="margin-bottom: -32px;"> <i class="fa fa-trash">
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
@endsection