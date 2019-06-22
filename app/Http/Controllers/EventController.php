<?php

namespace App\Http\Controllers;

use App\Event;
use App\Course;
use App\Doctor;
use App\Address;
use App\Home;
use App\EventAttendees;
use App\EventImages;
use Illuminate\Support\Facades\Input;
use Image;
use Validator;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        
        foreach ($events as $event) {
            $count = EventAttendees::where('confirmed',true)->where('event_id',$event->id)->count();
            $event['confirmed'] = $count;
        }

       
        return view('admin.event.index')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $doctors = Doctor::all();
        $addresses = Address::all();
        return view('admin.event.create')->with('courses',$courses)
                           ->with('doctors',$doctors)
                           ->with('addresses',$addresses);
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
             'short_disc' =>  'required|max:500|min:5',
             'address' =>  'required',
             'address_details' => 'required',
             //'price' => 'required',
             'capacity' => 'required|numeric',
             'course' => 'required',
             'doctor' => 'required',
             'date' => 'required|date',
             'small_image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
             'big_image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
             'page_link' => 'required|url|max:300',
          ]);

         
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{


        $address = Address::all()->where('name','==',strtolower($request->input('address')))->first();

        $event = new Event();

        $event->name = $request->input('name');
        $event->short_disc = nl2br($request->input('short_disc'));
        $event->address_details = $request->input('address_details');
        $event->page_link = $request->input('page_link');

        if(null == $request->input('price'))
            $event->price = 0;
        else{
            $event->price = $request->input('price');
        }

        $event->capacity = $request->input('capacity');
        $event->date = $request->input('date');
        $event->course_id = $request->input('course');
        $event->doctor_id = $request->input('doctor');
        $event->address_id = $request->input('address');


        /**
        *  handle small image
        **/
        $small_image = Input::file('small_image');
        $extension = $small_image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/events/';
        $img =  Image::make($small_image->getRealPath())->resize(300, 300)->save($path.$filename);
        $event->small_image = $path.$filename;

        /**
        *  handle big image
        **/
        $big_image = Input::file('big_image');
        $extension = $big_image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/events/';
        $img =  Image::make($big_image->getRealPath())->resize(1366, 402)->save($path.$filename);
        $event->big_image = $path.$filename;


        /**
        *  handle slider visibility
        
        if ($request->has('slide_visible')){
            $event->slide_visible = true;
        }else{
            $event->slide_visible = false;
        }
        **/

        /**
        *  handle home visibility
        **/
        if ($request->has('home_visible')){
            $event->home_visible = true;
        }else{
            $event->home_visible = false;
        }

        if ($request->has('is_online')){
            $event->is_online = true;
        }else{
            $event->is_online = false;
        }


        $event->save();

        return redirect('admin/events')->withErrors(array('done'=>'Event Added Successfully'));
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       try {
        $event = Event::where('id',$id)->firstOrFail();
        $addresses = Address::all();
        $eventAttendees = EventAttendees::where('confirmed',true)->where('event_id',$id)->count();
        //$event->short_disc = str_replace("<br />", "\r\n",$event->short_disc);
        //return $event->short_disc;
            
        } catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Add The Event');
        }
        
        return view('event.index')->with('event',$event)->with('addresses',$addresses)->with('eventAttendees',$eventAttendees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $event = Event::findOrFail($event->id);
        $courses = Course::all();
        $doctors = Doctor::all();
        $addresses = Address::all();



        //return $event->short_disc;
        $event->short_disc = str_replace("<br />","",$event->short_disc);
        //return $event->short_disc;
        //return var_dump($event->short_disc);
        //$event->short_disc = Home::br2nlta($event->short_disc);
        //return $event->short_disc;

        return view('admin.event.edit')->with('event', $event)
                                       ->with('courses',$courses)
                                       ->with('doctors',$doctors)
                                       ->with('addresses',$addresses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {

         $validator = Validator::make($request->all(),[
             'name' =>  'required|max:50|min:5',
             'short_disc' =>  'required|max:500|min:5',
             'address_details' => 'required',
             //'price' => 'required',
             'capacity' => 'required|numeric',
             'small_image' => 'image|mimes:jpeg,bmp,png|max:2000',
             'big_image' => 'image|mimes:jpeg,bmp,png|max:2000',
             'doctor' => 'required',
             'course' => 'required',
             'date' => 'required|date',
             'page_link' => 'required|url|max:300',

          ]);


        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

        $address = Address::all()->where('name','==',strtolower($request->input('address')))->first();

        

        $event->name = $request->input('name');

        $event->short_disc = nl2br($request->input('short_disc'));
        $event->address_details = $request->input('address_details');
        $event->price = $request->input('price');
        $event->capacity = $request->input('capacity');
        $event->course_id = $request->input('course');
        $event->doctor_id = $request->input('doctor');
        $event->address_id = $request->input('address');
        $event->page_link = $request->input('page_link');


        $event->date = $request->input('date');

        
        $small_image = Input::file('small_image');
        if(isset($small_image)){
        $extension = $small_image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/courses/';
        $img =  Image::make($small_image->getRealPath())->resize(300, 300)->save($path.$filename);
        $final_image = $path.$filename;
            $event->small_image = $final_image;
        }


        $big_image = Input::file('big_image');
        if(isset($big_image)){
        $extension = $big_image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/courses/';
        $img =  Image::make($big_image->getRealPath())->resize(1366, 402)->save($path.$filename);
        $final_image = $path.$filename;
            $event->big_image = $final_image;
        }



        /**
        *  handle slider visibility
        **/
        if ($request->has('slide_visible')){
            $event->slide_visible = true;
        }else{
            $event->slide_visible = false;
        }

        /**
        *  handle home visibility
        **/
        if ($request->has('home_visible')){
            $event->home_visible = true;
        }else{
            $event->home_visible = false;
        }


        if ($request->has('is_online')){
            $event->is_online = true;
        }else{
            $event->is_online = false;
        }

        $event->save();

        return redirect('admin\events')->withErrors(array('done'=>'Event Edited Successfully'));
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->withErrors(array('done'=>'Event Deleted Successfully'));
    }


     public function images($id)
    {
        $images = EventImages::where('event_id',$id)->paginate(10);
        
        return view('admin.event.images')->with('eventImages',$images)
                                         ->with('event_id',$id);
    }

     public function attendees($id)
    {
        $attendees = EventAttendees::where('event_id',$id)->paginate(15);
        
        return view('admin.event.attendees')->with('attendees',$attendees);
    }


    public function search(Request $request){
        
        $keyword = $request->keyword;
        if($keyword == '')
            return redirect('admin/events');
        else{
        $home = new Home();
        $events = $home->getEvents($keyword);
     
        return view('admin.event.index')->with('events',$events);
        }
       

    }


}
