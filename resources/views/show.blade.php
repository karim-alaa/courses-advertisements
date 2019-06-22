

@if ($attendees)
    <div class="alert alert-danger">
        <ul>
            @foreach ($attendees as $attendee)
    
                <li>{{$attendee->name}}</li>
                <li>{{$attendee->email}}</li>
                
                <li>{{$attendee->address['name']}}</li>
                <li>{{$attendee->event['name']}}</li>
                 <li>{{$attendee->phone}}</li>

                <li>confirmed : {{$attendee->confirmed}}</li>
                <br><br><br>
            @endforeach
        </ul>
    </div>
@endif



  <form action="/attendees/2" method="POST">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-primary" value="delete a record">
            </form>