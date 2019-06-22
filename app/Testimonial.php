<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

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
