<?php

namespace App\Http\Controllers;

use App\EventImages;
use App\Event;
use App\Course;
use Validator;
use Image;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;

class EventImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::inRandomOrder()
        ->take(4)
        ->with(['events' => function($query) {$query->take(2)->inRandomOrder()
        ->with(['EventImages' => function($query) {$query->take(5)->inRandomOrder();}])
        ;}])
        ->get();

        foreach ($courses as $course) {
            $images = array();
            foreach ($course->events as $event) {
                foreach ($event->eventImages as $image) {
                    $image['event_id'] = $event->id;
                    $image['event_name'] = $event->name;
                    $image['url'] = $image->image;
                    array_push($images, $image);
                }
            }
            $course['images'] = $images;
        }
    
        return view('gallery.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('admin.event.createImage')->with('events',$events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        
        $eventImages = new EventImages();

        $event_id = $request->input('event');
        try{
            $event = Event::where('id',$event_id)->firstOrFail();
        }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find Event Data');
        }
        $images_urls = array();
        foreach (Input::file('images') as $image) {
            //$image = "the real image here"; //Input::file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
            $path = 'images/events/albums/';
            $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
            $final_image = $path.$filename;
            array_push($images_urls,$final_image);
        }

        $eventImagesArray = array();
        foreach ($images_urls as $image_url) {
            $eventImage = new EventImages();
            $eventImage->image = $image_url;
            //$eventImage->event_id = $event_id;
            array_push($eventImagesArray, $eventImage);
        }

        $event->eventImages()->saveMany($eventImagesArray);

        return redirect()->back()->withErrors(array('done'=>'Images Added Successfully'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventImages  $eventImages
     * @return \Illuminate\Http\Response
     */
    public function destroy($eventImagesId)
    {   
        try{
        $eventImages = EventImages::where('id',$eventImagesId)->firstOrFail();
        }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find Event Data');
        }
        $eventImages->delete();
        return redirect()->back()->withErrors(array('done'=>'Images Deleted Successfully'));
    }
}
