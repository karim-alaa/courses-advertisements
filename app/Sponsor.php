<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
}
