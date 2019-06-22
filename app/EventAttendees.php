<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class EventAttendees extends Model
{
    public function Event()
    {
        return $this->belongsTo('App\Event');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Address()
    {
        return $this->belongsTo('App\Address');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
}
