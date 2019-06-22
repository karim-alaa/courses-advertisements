<?php

namespace App;
use DB;
use App\Event;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public function getCourses($keyword){
        $courses = Course::all();
        $courses_array = array();
        $keyword = strtolower($keyword);
        
        foreach ($courses as $course) {
            $course_name = strtolower($course->name);
            $short_disc = strtolower($course->short_disc);
            $full_disc = strtolower($course->full_disc);
            if(similar_text($keyword,$course_name) >= 5 ||
              (stripos($short_disc, $keyword) !== false) ||
              (stripos($full_disc, $keyword) !== false)
              )
                array_push($courses_array, $course);
        }
        
        return $courses_array;
    }

    public function getEvents($keyword){
       /* $events = DB::table('events')
                ->select('*')
                ->where('active',true)
                ->get();
                */
        $events = Event::all();
        
        $events_array = array();
        $keyword = strtolower($keyword);
        
        foreach ($events as $event) {
            $short_disc = strtolower($event->short_disc);
            $event_name = strtolower($event->name);
            if(similar_text($keyword,$event_name) >= 5 ||
              (strpos($event->short_disc, $keyword) !== false )
              )
                array_push($events_array, $event);
        }
        return $events_array;
    }

   static function br2nl($str) {
      $str = preg_replace("/(\r\n|\n|\r)/", "", $str);
      return preg_replace("=&lt;br */?&gt;=i", "\n", $str);
    } 

    static function br2nlta($str) {
      $str = preg_replace( "/\r|\n/", "&#13;&#10;", $str );
        return $str;
    } 
}
