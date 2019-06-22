<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\Role;
use App\Course;
use App\Event;
use Mail;
use App\Mail\NormalMail;
use DB;
use App\EventAttendees;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
//manual login and logout
/**
    public function login(Request $request){
      $validator = Validator::make($request->all(),[
         'email' =>  'required|email',
         'password' =>  'required',
      ]);

      if ($validator->fails()) {
          return redirect()->back()
                           ->withErrors($validator)
                          ->withInput();
        }
      else{
        $email = $request->input('email');
        $password = $request->input('password');

        $admin = User::where('email',$email)->where('password',$password)->get()->first();
        if($admin){
            session(['user' => $admin]);
        }else {
          return redirect()->back()->with('message','Your data did not Match our records');
        }
      }

    }


    public function logout(){
        session(['user' => bull]);
        return redirect()->back();
    }

**/



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        $admin_role_id = Role::where('name','admin')->firstOrFail();
            
        } catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find An Admin User');
        }
        $admins = User::where('role_id',$admin_role_id->id)->get();

        return view('admin.admins.index')->with('admins',$admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $validator = Validator::make($request->all(),[
             'name' =>  'required|max:25|min:2',
             'email' => 'required|email|unique:users',
             'password' => 'required|min:6',
             'confirm_password' => 'required|same:password',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        try {
        $role = Role::where('name','admin')->firstOrFail();
            
        } catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Add An Admin User');
        }
         $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $role->id,
        ]);

        return redirect('admin/admins')->withErrors(array('done'=>'Admin Added Successfully' ));

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            
        
        $admin  = User::where('id',$id)->firstOrFail();
        $admin->delete();
        }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot delete this user');
        }
        return redirect()->back()->withErrors(array('done'=>'Admin Deleted Successfully'));
    }


    public function dash(){

        $courses_count = Course::count();
        $event_count = Event::count();
        $confirmed_attendee_count = EventAttendees::where('confirmed',true)->count();
        $attendee_count = EventAttendees::count();


        $courses = Course::all();


        foreach ($courses as $course) {
            $events_number = 0;
            $images_number = 0;
            $all_students_number = 0;

            $confirmed_students_number = DB::table('event_attendees')
                                        ->join('events','events.id','=','event_attendees.event_id')
                                        ->where('event_attendees.confirmed','=',1)
                                        ->where('events.course_id','=',$course->id)
                                        ->count();

            $doctors_number = DB::table('doctors')
               ->select('doctors.*','users.*')
               ->join('users', 'users.id', '=', 'doctors.user_id')
               ->join('events', 'doctors.id', '=', 'events.doctor_id')
               ->where('events.course_id','=',$course->id)
               ->distinct()
               ->count();

            foreach ($course->events as $event) {
                $events_number++;
                $images_number += sizeof($event->eventImages);
                $all_students_number += sizeof($event->EventAttendees);
            }
            $course['events_number'] = $events_number;
            $course['images_number'] = $images_number;
            $course['all_students_number'] = $all_students_number;
            $course['confirmed_students_number'] = $confirmed_students_number;
            $course['doctors_number'] = $doctors_number;
            if($all_students_number > 0)
            $course['avarage'] = round(($confirmed_students_number * 100) / ($all_students_number));
            else{
                $course['avarage'] =0;
            }
        }

        

        return view('admin.dash')->with('courses_count',$courses_count)
                                 ->with('events_count',$event_count)
                                 ->with('confirmed_attendee_count',$confirmed_attendee_count)
                                 ->with('attendee_count',$attendee_count)
                                 ->with('courses',$courses);
    }



    public function activeAdmin(User $user){
        $user->active = true;
        $user->save();
        return redirect()->back();
    }

    public function deactivateAdmin(User $user){
        $user->active = false;
        $user->save();
        return redirect()->back();
    }


    public function sendMessageToAll(Request $request,$active){

         $validator = Validator::make($request->all(),[
             'message' =>  'required',
             'subject' => 'required',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $role_id = Role::where('name','user')->firstOrFail()->id;

            $users = User::where('active',$active)->where('role_id',$role_id)->where('notifiable',true)->get();
            try{
                $all_mails = array();
                $counter = 0;
                foreach ($users as $user) {
                    if($counter >= 50){
                        Mail::to($all_mails)->queue(new NormalMail($request->input('message'),$request->input('subject')));
                        $all_mails = array();
                        $counter = 0;
                    }else{
                        array_push($all_mails,$user->email);
                        $counter += 1;
                    }
                    
                }
                Mail::to($all_mails)->queue(new NormalMail($request->input('message'),$request->input('subject')));
                //$all_mails = array_map(create_function('$o', 'return $o->email;'), $users);
                //return $all_mails;
                
                return redirect()->back();
            }catch(Exception $ex){
                return redirect()->withErrors(['error'=>'cannot send messages']);
            }
        }

    }



}
