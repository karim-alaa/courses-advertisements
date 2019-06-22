<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{

	public function Phones()
	{
		return $this->hasMany('App\Phone','ref_id');
	}

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
}
