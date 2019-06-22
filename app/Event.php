<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

	public function EventImages()
	{
		return $this->hasMany('App\EventImages');
	}

	public function EventAttendees()
	{
		return $this->hasMany('App\EventAttendees');
	}

    public function Course()
    {
        return $this->belongsTo('App\Course');
    }

    public function Doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function Address()
    {
        return $this->belongsTo('App\Address');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);

        static::deleting(function($event) { // before delete() method call this
            
             foreach ($event->eventImages as $image) {
                 $image->delete();
             }
              foreach ($event->eventAttendees as $attendee) {
                 $attendee->delete();
             }
            
             // do the rest of the cleanup...
        });
    }
}
