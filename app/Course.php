<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function Events()
	{
		return $this->hasMany('App\Event');
	}

    public function Doctors()
    {
        return $this->hasMany('App\Doctor');
    }

	protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);

        static::deleting(function($course) { // before delete() method call this
            foreach ($course->events as $event) {
                foreach ($event->eventImages as $image) {
                    $image->delete();
                }

                foreach ($event->eventAttendees as $attendee) {
                    $attendee->delete();
                }
                $event->delete();
            }
             // do the rest of the cleanup...
        });
    }
}
