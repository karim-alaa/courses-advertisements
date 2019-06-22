<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
}
