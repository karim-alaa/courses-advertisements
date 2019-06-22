
@component('mail::layout')

    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            MDS
        @endcomponent
    @endslot
  
  
# {{$event->name}} Event
related to {{$event->course->name}} Course

 {{ Html::image($event->small_image,$event->small_image,array('width' => '100','height'=>'100','class'=>'img-circle')) }}


#Description
{{$event->short_desc}}


{{$event->name}} Event Has Been Created!

@component('mail::button', ['url' => url('/events/'.$event->id.'#apply_event')])
Apply Now In The {{$event->name}} Event
@endcomponent

Thanks,<br>
MDS


{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} MDS. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
