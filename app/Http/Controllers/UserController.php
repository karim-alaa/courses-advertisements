<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use App\Role;
use Mail;
use App\Mail\EventCreated;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Event::first();
        Mail::to('karimalaa200@gmail.com')->send(new EventCreated($course));
    }

    public function allUsers(){
        try {
            $role_id = Role::where('name','user')->firstOrFail()->id;
            $users = User::where('role_id',$role_id)->paginate(15);
        
        } catch (Exception $e) {
            return view('error')->with('message','Cannot Find Users, Some Thing Went Wrong');

        }       
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function activeUser(User $user){
        $user->active = true;
        $user->save();
        return redirect()->back();
    }

    public function deactivateUser(User $user){
        $user->active = false;
        $user->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       //return $user;
       $user->delete();
       return redirect()->back();
    }


    public function notify($id)
    {
       try {
             $user = User::findOrFail($id);
             $user->notifiable = true;
             $user->save();
        } catch (ModelNotFoundException $e) {
            return redirect('error')->with('message','Cannot Find The User');
        }
      
       return redirect()->back();
    }


    public function ignore($id)
    {
        try {
             $user = User::findOrFail($id);
             $user->notifiable = false;
             $user->save();
        } catch (ModelNotFoundException $e) {
            return redirect('error')->with('message','Cannot Find The User');
        }
      
      
       return redirect()->back();
    }
}
