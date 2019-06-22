<?php

namespace App\Http\Controllers;

use App\Course;
use App\Home;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Http\Request;
use Validator;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
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
             'name' =>  'required|max:50|min:5',
             'video' => 'required',
             'short_disc' =>  'required|max:500|min:5',
             'full_disc' => 'required|min:50',
             'small_image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
             'big_image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
             'page_link' => 'required|url|max:300'
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

        $course = new Course();

        $course->name = $request->input('name');
        $course->short_disc = nl2br($request->input('short_disc'));
        $course->full_disc = nl2br($request->input('full_disc'));
        $course->video = $request->input('video');
        $course->page_link = $request->input('page_link');

        /**
        *  handle small image
        **/
        $small_image = Input::file('small_image');
        $extension = $small_image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/courses/';
        $img =  Image::make($small_image->getRealPath())->resize(300, 300)->save($path.$filename);
        $course->small_image = $path.$filename;

        /**
        *  handle big image
        **/
        $big_image = Input::file('big_image');
        $extension = $big_image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/courses/';
        $img =  Image::make($big_image->getRealPath())->resize(1366, 402)->save($path.$filename);
        $course->big_image = $path.$filename;


        /**
        *  handle slider visibility
        **/
        if ($request->has('slide_visible')){
            $course->slide_visible = true;
        }else{
            $course->slide_visible = false;
        }

        /**
        *  handle home visibility
        **/
        if ($request->has('home_visible')){
            $course->home_visible = true;
        }else{
            $course->home_visible = false;
        }


        $course->save();

        return redirect('admin/courses')->withErrors(array('done'=>'Course Added Successfully'));
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        try {
        $course = Course::where('id',$id)->firstOrFail();
        $doctors = DB::table('doctors')
                ->select('doctors.*','users.*')
                ->join('users', 'users.id', '=', 'doctors.user_id')
                ->join('events', 'doctors.id', '=', 'events.doctor_id')
                ->where('events.course_id','=',$id)->distinct()
                ->get();



        } catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Add The Course');
        }
        
        return view('course.index')->with('course',$course)->with('doctors',$doctors);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

        try{

        $course = Course::findOrFail($course->id);
        $course->short_disc = str_replace("<br />","",$course->short_disc);
        $course->full_disc = str_replace("<br />","",$course->full_disc);
         }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find The Course');
        }
        return view('admin.course.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
           
         $validator = Validator::make($request->all(),[
             'name' =>  'required|max:50|min:5',
             'short_disc' =>  'required|max:500|min:5',
             'video' => 'required',
             'full_disc' => 'required|min:50',
             'small_image' => 'image|mimes:jpeg,bmp,png|max:2000',
             'big_image' => 'image|mimes:jpeg,bmp,png|max:2000',
             'page_link' => 'required|url|max:300'

          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{


       
        
        $course->name = $request->input('name');
        $course->short_disc = nl2br($request->input('short_disc'));
        $course->full_disc = nl2br($request->input('full_disc'));
        $course->video = $request->input('video');
        $course->page_link = $request->input('page_link');


       

     
        $small_image = Input::file('small_image');
        if(isset($small_image)){
        $extension = $small_image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/courses/';
        $img =  Image::make($small_image->getRealPath())->resize(300, 300)->save($path.$filename);
        $final_image = $path.$filename;
            $course->small_image = $final_image;
        }


        $big_image = Input::file('big_image');
        if(isset($big_image)){
        $extension = $big_image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/courses/';
        $img =  Image::make($big_image->getRealPath())->resize(1366, 402)->save($path.$filename);
        $final_image = $path.$filename;
            $course->big_image = $final_image;
        }

   



  
        /**
        *  handle slider visibility
        **/
        if ($request->has('slide_visible')){
            $course->slide_visible = true;
        }else{
            $course->slide_visible = false;
        }

        /**
        *  handle home visibility
        **/
        if ($request->has('home_visible')){
            $course->home_visible = true;
        }else{
            $course->home_visible = false;
        }
        
        $course->save();


        return redirect('admin/courses')->withErrors(array('done'=>'Course Edited Successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back()->withErrors(array('done'=>'Course Deleted Successfully'));
    }
}
