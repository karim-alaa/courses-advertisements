<?php

namespace App\Http\Controllers;

use App\Event;
use App\Course;
use App\Config;
use App\EventAttendees;
use DB;
use App\Home;
use Validator;
use App\Sponsor;
use App\About;
use App\Doctor;
use App\Team;
use App\EventImages;
use App\Testimonial;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events_slide = Event::where('slide_visible',true)->get();
        $courses_slide = Course::where('slide_visible',true)->get();

        $events_home = Event::where('home_visible',true)->get();
        $courses_home = Course::where('home_visible',true)->get();

        $courses = Course::all();
        $events = Event::all();
        $team = Team::all();

        $courses_count = sizeof($courses);
        $events_count = sizeof($events);


        $students_count = EventAttendees::count();

        $sponsors = Sponsor::all();

        $randomImages =  EventImages::inRandomOrder()->take(10)->get();

        $randomTestimonials =  Testimonial::inRandomOrder()->take(6)->get();

        $about = About::first();

        $doctors = Doctor::all();

        $config = Config::first();


        return view('welcome')->with('events_slide',$events_slide)
                              ->with('courses_slide',$courses_slide)
                              ->with('events_home',$events_home)
                              ->with('courses_home',$courses_home)
                              ->with('courses',$courses)
                              ->with('events',$events)
                              ->with('courses_count',$courses_count)
                              ->with('events_count',$events_count)
                              ->with('students_count',$students_count)
                              ->with('sponsors',$sponsors)
                              ->with('randomImages',$randomImages)
                              ->with('randomTestimonials',$randomTestimonials)
                              ->with('about',$about)
                              ->with('doctors',$doctors)
                              ->with('team',$team)
                              ->with('config',$config);
    }

    public function search(Request $request){
         $validator = Validator::make($request->all(),[
             'keyword' =>  'required',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        $keyword = $request->keyword;

        $home = new Home();
        $courses = $home->getCourses($keyword);
        $events = $home->getEvents($keyword);


    
        

        $latest_courses = Course::take(2)->orderBy('created_at','desc')->get();
        $latest_events = Event::take(2)->orderBy('created_at','desc')->get();

        return view('search.index')->with('courses',$courses)->with('events',$events)->with('search_keyword',$keyword)->with('latest_courses',$latest_courses)->with('latest_events',$latest_events);
        
       }

    }


    
}
