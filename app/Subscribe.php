<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;

class Subscribe extends Model
{
    use Notifiable;


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
}
