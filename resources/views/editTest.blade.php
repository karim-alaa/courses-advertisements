<!doctype html>

<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
       <!--

            <strong>



            <form method="POST" action= "{{route('doctors.destroy', [1])}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">

                <input type="submit" class="btn btn-primary" value="delete1">
            </form>



            </strong>

            <div class="content">

            <form action="/doctors/2" method="POST">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-primary" value="delete2">
            </form>




            -->



            <form method="POST" action= "{{route('events.update', [$event->id])}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="PUT">
                <br>

                <input type="text" placeholder="name" name="name" class="form-control" value="{{ $event->name }}">

                <input type="text" placeholder="price" name="price" class="form-control" value="{{ $event->price }}">

                <input type="text" placeholder="capacity" name="capacity" class="form-control" value="{{ $event->capacity }}">
               
            <br>
                <input type="text" placeholder="address details" name="address_details" class="form-control" value="{{ $event->address_details}}">
<br>
                <input type="text" placeholder="short disc" name="short_disc" class="form-control" value="{{ $event->short_disc}}">
             
               

                 <input name="slide_visible" id="slide_visible" type="checkbox" value="slide_visible" @if ($event->slide_visible == 1) checked @endif >
        <label for="slide_visible" style="padding-left: 15px!important;">slider visible</label>
<br>


         <input name="home_visible" id="home_visible" type="checkbox" value="home_visible" @if ($event->home_visible == 1) checked @endif>
        <label for="home_visible" style="padding-left: 15px!important;">home visible</label>
          <br>
          <br>
               
                <select name="doctor" class="form-control">
                    @if ($doctors)
                        @foreach ($doctors as $doctor)
                             @if($event->doctor_id == $doctor->id)
                            <option selected value="{{$doctor->id}}">{{$doctor->user['name']}}</option>
                            @else
                            <option value="{{$doctor->id}}">{{$doctor->user['name']}}</option>
                            @endif
                        @endforeach
                           
        
                    @endif
                </select>
                
                <br>

                <select name="course" class="form-control">
                    @if ($courses)

                        @foreach ($courses as $course)
                            @if($event->course_id == $course->id)
                            <option selected value="{{$course->id}}">{{$course->name}}</option>
                            @else
                            <option value="{{$course->id}}">{{$course->name}}</option>
                            @endif
                        @endforeach
           
        
                    @endif
                    
                </select>

               <br>

                <select name="address" class="form-control">
                    @if ($addresses)

                        @foreach ($addresses as $address)
                            @if($event->address_id == $address->id)
                                <option selected value="{{$address->id}}">{{$address->name}}</option>
                            @else
                                <option value="{{$address->id}}">{{$address->name}}</option>
                             @endif
                        @endforeach
           
        
                    @endif
                    
                </select>



                {{ Html::image($event->small_image,$event->small_image,array('width' => '100','height'=>'100','class'=>'img-circle')) }}
                {{ Html::image($event->big_image,$event->big_image,array('width' => '100','height'=>'100','class'=>'img-circle')) }}

                 <input type="file" name="small_image" id="fileToUpload">
                 <input type="file" name="big_image" id="fileToUpload">

<br>
                
                <input type="submit" class="btn btn-primary" value="store">
            </form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                       
            </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
