
@component('mail::layout')

    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            MDS
        @endcomponent
    @endslot
  
  
# {{$event->name}} Event

We are very sorry to infrom your that the event "{{$event->name}}" you have applied on it in masterkeydent.com has been canceled today


#More Info
for more information please contact us

@component('mail::button', ['url' => url('/contact/')])
Contact Us
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


