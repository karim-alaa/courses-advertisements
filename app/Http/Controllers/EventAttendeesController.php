<?php

namespace App\Http\Controllers;

use App\EventAttendees;
use App\Address;
use Validator;
use App\Event;
use Auth;
use Illuminate\Http\Request;

class EventAttendeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendees = EventAttendees::all();
        return view('show')->with('attendees',$attendees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event_id)
    {
        try {
            $event = Event::where('id', $event_id)->firstOrFail();
        }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find This Event');
        }

        return view('test')->with('event',$event);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {

         $user_id = Auth::user()->id;

         $eventAttendee = new EventAttendees();
         $eventAttendee->event_id = $event_id;
         $eventAttendee->user_id = $user_id;
         $eventAttendee->save();
        

        return redirect()->back()->withErrors(array('done'=>'The Process Done Successfully' ));
       
    }

    public function confirm($eventAttendee_id)
    {
        try{
        $eventAttendee = EventAttendees::where('id',$eventAttendee_id)->firstOrFail();
         }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find User Data');
        }
        $eventAttendee->confirmed = true;
        $eventAttendee->save();
        return redirect()->back()->withErrors(array('done'=>'Attendee Become Confirmed Successfully'));
    }

    public function unconfirm($eventAttendee_id)
    {
        try{
        $eventAttendee = EventAttendees::where('id',$eventAttendee_id)->firstOrFail();
         }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find User Data');
        }
        $eventAttendee->confirmed = false;
        $eventAttendee->save();
        return redirect()->back()->withErrors(array('done'=>'Attendee Become Unconfirmed Successfully'));
    }

    public function getConfirmed()
    {
        $eventAttendees = EventAttendees::where('confirmed',true)->get();
        return $eventAttendees;
    }

    public function getUnconfirmed()
    {
        $eventAttendees = EventAttendees::where('confirmed',false)->get();
        return $eventAttendees;
    }

    public function destroy($eventAttendee_id)
    {
        try{
        $eventAttendee = EventAttendees::where('id',$eventAttendee_id)->firstOrFail();
         }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find Important Data');
        }
        $eventAttendee->delete();
        return redirect()->back()->withErrors(array('done'=>'Attendee Deleted Successfully'));
    }
}
