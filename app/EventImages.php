<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class EventImages extends Model
{
    public function Event()
    {
        return $this->belongsTo('App\Event');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
}
