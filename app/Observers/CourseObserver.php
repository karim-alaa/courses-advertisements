<?php

namespace App\Observers;

use Mail;
use App\Subscribe;
use App\Course;
use App\Mail\CourseCreated;

class CourseObserver
{
    /**
     * Listen to the Course created course.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function created(Course $course)
    {
        $subscribes = Subscribe::where('notifiable',true)->get();
        try{
            $all_mails = array();
            $counter = 0;
            foreach ($subscribes as $subscribe) {
                if($counter >= 50){
                    Mail::to($all_mails)->queue(new CourseCreated($course));
                    $all_mails = array();
                    $counter = 0;
                }else{
                    array_push($all_mails,$subscribe->email);
                    $counter += 1;
                }    
            }
            Mail::to($all_mails)->queue(new CourseCreated($course));
        }catch(Exception $ex){
            // return 0;
        }
    }

    /**
     * Listen to the Course deleting course.
     *
     * @param  \App\Course  $course
     * @return void
     */
    public function deleting(Course $course)
    {
        //do no thing
    }
}