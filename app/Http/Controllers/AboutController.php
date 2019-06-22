<?php

namespace App\Http\Controllers;

use App\About;
use App\Sponsor;
use App\Doctor;
use App\Event;
use App\EventAttendees;
use App\Course;
use App\Testimonial;
use Validator;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        return view('admin.about.index')->with('about', $about);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
             'short_disc' =>  'required|max:500|min:5',
             'full_disc' => 'required|min:50',
             'video' => 'required',
             'image' => 'required|image|mimes:jpeg,bmp,png|max:10240',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

        $about = new About();

        $about->short_disc = nl2br($request->input('short_disc'));
        $about->full_disc =  nl2br($request->input('full_disc'));
        
        $about->video = $request->input('video');

        $image = Input::file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/about/';
        $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
        $about->image = $path.$filename;

        $about->save();

        return "True";
       }
    }


     /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       

        $about = About::first();
        
        $sponsors = Sponsor::all();
        $doctors = Doctor::all();


        $courses = Course::all();
        $events = Event::all();

        $courses_count = sizeof($courses);
        $events_count = sizeof($events);


        $students_count = EventAttendees::count();

        $randomTestimonials =  Testimonial::inRandomOrder()->take(3)->get();
        
        return view('about.index')->with('about',$about)
                                  ->with('sponsors',$sponsors)
                                  ->with('doctors',$doctors)
                                  ->with('courses_count',$courses_count)
                                  ->with('events_count',$events_count)
                                  ->with('students_count',$students_count)
                                  ->with('randomTestimonials',$randomTestimonials);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $about = About::findOrFail($about->id);
        return view('editTest')->with('about', $about);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
          $validator = Validator::make($request->all(),[
             'short_disc' =>  'required|max:500|min:5',
             'full_disc' => 'required|min:50',
             'video' => 'required',
             'image' => 'image|mimes:jpeg,bmp,png|max:2000',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{


       
      

        $about->short_disc = nl2br($request->input('short_disc'));
        $about->full_disc =  nl2br($request->input('full_disc'));
        
        $about->video = $request->input('video');

       

     
        $image = Input::file('image');
        if(isset($image)){
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/about/';
        $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
        $final_image = $path.$filename;
            $about->image = $final_image;
        }

        $about->save();


        return redirect()->back()->withErrors(array('done'=>'Data Edited Successfully' ));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        $about = About::findOrFail($about->id);
        $about->delete();
        return redirect()->back();
    }

}
