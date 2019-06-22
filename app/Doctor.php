<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
	//use SoftDeletes;

	//protected $dates = ['deleted_at'];


    public function User()
    {
        return $this->belongsTo('App\User');
    }


    public function Events()
    {
        return $this->hasMany('App\Event');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);

        static::deleting(function($doctor) { // before delete() method call this
             $doctor->user()->delete();
             foreach ($doctor->events as $event) {
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
