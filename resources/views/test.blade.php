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

            <form method="POST" action= "{{route('admins.store')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="POST">

              

              
            <br>
                <input type="text" placeholder="name" name="name" class="form-control" value="{{old('name')}}">
                <input type="text" placeholder="email" name="email" class="form-control" value="{{old('email')}}">
                <input type="password" placeholder="password" name="password" class="form-control" value="{{old('password')}}">
                <input type="password" placeholder="confirm password" name="confirm_password" class="form-control" value="{{old('confirm_password')}}">

               <br>

              

<!--
                 <input name="slide_visible" id="slide_visible" type="checkbox" value="slide_visible">
        <label for="slide_visible" style="padding-left: 15px!important;">slider visible</label>
<br>
         <input name="home_visible" id="home_visible" type="checkbox" value="home_visible">
        <label for="home_visible" style="padding-left: 15px!important;">home visible</label>
          <br>
      -->
               <!--
                
                <select name="address" class="form-control">
                    <option value="Alexandria">Alexandria</option>
                    <option value="Aswan">Aswan</option>
                    <option value="Asyut">Asyut</option>
                    <option value="Beheira">Beheira</option>
                    <option value="Beni Suef">Beni Suef</option>
                    <option value="Cairo">Cairo</option>
                    <option value="Dakahlia">Dakahlia</option>
                    <option value="Damietta">Damietta</option>
                    <option value="Faiyum">Faiyum</option>
                    <option value="Gharbia">Gharbia</option>
                    <option value="Giza">Giza</option>
                    <option value="Ismailia">Ismailia</option>
                    <option value="Kafr El Sheikh">Kafr El Sheikh</option>
                    <option value="Luxor">Luxor</option>
                    <option value="Matruh">Matruh</option>
                    <option value="Minya">Minya</option>
                    <option value="Monufia">Monufia</option>
                    <option value="New Valley">New Valley</option>
                    <option value="North Sinai">North Sinai</option>
                    <option value="Port Said">Port Said</option>
                    <option value="Qalyubia">Qalyubia</option>
                    <option value="Qena">Qena</option>
                    <option value="Red Sea">Red Sea</option>
                    <option value="Sharqia">Sharqia</option>
                    <option value="Sohag">Sohag</option>
                    <option value="South Sinai">South Sinai</option>
                    <option value="Suez">Suez</option>
                </select>

-->






  

                
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
