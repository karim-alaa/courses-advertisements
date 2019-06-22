<?php

namespace App\Observers;

use Mail;
use App\Subscribe;
use App\Event;
use App\EventAttendees;
use App\Mail\EventCreated;
use App\Mail\EventDeleted;

class EventObserver
{
    /**
     * Listen to the Event created event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        $subscribes = Subscribe::where('notifiable',true)->get();
        try{
            $all_mails = array();
            $counter = 0;
            foreach ($subscribes as $subscribe) {
                if($counter >= 50){
                    Mail::to($all_mails)->queue(new EventCreated($event));
                    $all_mails = array();
                    $counter = 0;
                }else{
                    array_push($all_mails,$subscribe->email);
                    $counter += 1;
                }
                
            }
            Mail::to($all_mails)->queue(new EventCreated($event));
        }catch(Exception $ex){
            // return 0;
        }
        
    }

    /**
     * Listen to the Event deleting event.
     *
     * @param  \App\Event  $event
     * @return void
     */
    public function deleting(Event $event)
    {
        $subscribes = EventAttendees::where('event_id',$event->id);
        try{
            $all_mails = array();
            $counter = 0;
            foreach ($subscribes as $subscribe) {
                if($counter >= 50){
                    Mail::to($all_mails)->queue(new EventDeleted($event));
                    $all_mails = array();
                    $counter = 0;
                }else{
                    array_push($all_mails,$subscribe->email);
                    $counter += 1;
                }
            }
            Mail::to($all_mails)->queue(new EventDeleted($event));
        }catch(Exception $ex){
            // return 0;
        }
    }
}