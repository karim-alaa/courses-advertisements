@extends('layouts.admin')

          
@section('content')


<div class="row top_tiles">
  <a href="{{url('/admin/courses')}}">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-book"></i>
                </div>
                <div class="count">{{$courses_count}}</div>

                <h3>Topics</h3>

              </div>
            </div>
          </a>
          <a href="{{url('/admin/events')}}">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i>
                </div>
                <div class="count">{{$events_count}}</div>

                <h3>Courses</h3>
          
              </div>
            </div>
          </a>
          <a href="{{url('/admin/events')}}">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i>
                </div>
                <div class="count">{{$attendee_count}}</div>

                <h3>All Students</h3>
              </div>
            </div>
          </a>

          <a href="{{url('/admin/events')}}">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i>
                </div>
                <div class="count">{{$confirmed_attendee_count}}</div>

               <h3>Confirmed Students</h3>
              </div>
            </div>
          </div>

</a>
<br>
<div class="x_panel">
                <div class="x_title">
                  <h2>Statistics About Courses<small><a href="{{url('/admin/courses/')}}">check all courses here</a></small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Course</th>
                        <th>Events Number</th>
                        <th>Doctors Number</th>
                        <th>Confirmed Students</th>
                        <th>Images Number</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 0; ?>
                    @foreach($courses as $course)
                    <?php $i++; ?>
                      <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$course->name}}</td>
                        <td>{{$course->events_number}}</td>
                        <td>{{$course->doctors_number}}</td>
                        <td class="project_progress"><div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$course->avarage}}" aria-valuenow="100" style="width: {{$course->avarage}}%;"></div>
                          </div>
                          <small>{{$course->avarage}}% Complete</small></td>
                        <td>{{$course->images_number}}</td>
                      </tr>
                      @endForeach
                    </tbody>
                  </table>

                </div>
              </div>

                          
                        

@stop