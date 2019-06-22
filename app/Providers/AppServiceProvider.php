<?php

namespace App\Providers;
use App\Course;
use App\Event;
use App\Config;
use App\About;

use App\Observers\EventObserver;
use App\Observers\CourseObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Event::observe(EventObserver::class);
        Course::observe(CourseObserver::class);


        try {
            $about = About::first();
            $events_4 = Event::take(4)->latest('id')->get();
            $courses_4 = Course::take(4)->latest('id')->get();
            $all_courses = Course::all();
            $all_events = Event::all();
            $config = Config::first();

            View::share(['courses_list'=>$all_courses,'config'=>$config,'all_events'=>$all_events,'events_4'=>$events_4,'courses_4'=>$courses_4,'about'=>$about]);
        } catch (Exception $e) {
            
        }
       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
