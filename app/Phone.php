<?php

namespace App;

use App\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = ['phone', 'ref_id', 'active','created_at','updated_at','deleted_at','id'];

    public function Config()
    {
        return $this->belongsTo('App\Config','ref_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);

    }
}
