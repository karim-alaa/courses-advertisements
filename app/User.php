<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ActiveScope;

class User extends Authenticatable
{


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','job_title','phone','address_id','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

/*
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope);
    }
*/

    public function Role()
    {
        return $this->belongsTo('App\Role');
    }

    public function Address()
    {
        return $this->belongsTo('App\Address');
    }

    public function EventAttendees(){
        return $this->hasMany('App\EventAttendees');
    }

    

    protected static function boot()
    {
        parent::boot();

        //static::addGlobalScope(new ActiveScope);

         static::deleting(function($user) { // before delete() method call this
            if($user->role['name'] == 'user'){
                foreach ($user->EventAttendees as $attendee) {
                $attendee->delete();
                }
                //$user->doctor->delete();
            }
            
             // do the rest of the cleanup...
        });
    }
}
