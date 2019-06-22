
@component('mail::layout')

    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            MDS
        @endcomponent
    @endslot
  

# {{$course->name}} Course

 {{ Html::image($course->small_image,$course->small_image,array('width' => '100','height'=>'100','class'=>'img-circle')) }}


#Description
{{$course->short_desc}}


{{$course->name}} Course Has Been Created!

@component('mail::button', ['url' => url('/courses/'.$course->id)])
Apply Now In The {{$course->name}} Course
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

