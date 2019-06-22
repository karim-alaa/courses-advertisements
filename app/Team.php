<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function Address()
    {
        return $this->belongsTo('App\Address');
    }
}
