<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $role = Role::where('name','admin')->get()->first();
         if (!Auth::guest() && Auth::user()->role_id == $role->id) {
            return $next($request);
        }
         return redirect('/');
    }
}
