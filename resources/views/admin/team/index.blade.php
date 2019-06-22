  @extends('layouts.admin') 
  @section('header')   
<h3  style="display: inline-block;">Team &nbsp</h3><a href="{{url('admin/team/create')}}"  class="btn btn-round btn-default"> New</a>
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


@if(sizeof($team) >= 1)
    @foreach($team as $member)
                    <div class="col-md-4 col-sm-4 col-xs-12 animated fadeInDown">
                      <div class="well profile_view">
                        <div class="col-sm-12">
                          <h4 class="brief"><i>{{$member->job_title}}</i></h4>
                          <div class="left col-xs-7">
                            <h2>{{$member->name}}</h2>
                            <ul class="list-unstyled">
                              
                              <li><i class="fa  fa-map-marker"></i> <strong>Address:</strong> {{$member->address['name']}} </li>
                              

                            </ul>
                          </div>
                          <div class="right col-xs-5 text-center">

                            <img src="{{ asset($member->image) }}" alt="" class="img-circle img-responsive">
                          </div>
                        </div>
                              <div class="col-xs-12 bottom text-center">
          <div class="clearfix"></div>

                          <div class="col-xs-12  emphasis">
                            <a href="{{url('admin/team/'.$member->id.'/edit')}}">
                            <button type="button" class="btn btn-primary btn-xs"> <i class="fa fa-edit" style="display: inline-block;">
                            </i> Edit </button></a>


                            {{Form::open(['url'=>'/admin/team/'.$member->id ,'method'=>'delete', 'style'=>'display:inline-block;'])}}
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