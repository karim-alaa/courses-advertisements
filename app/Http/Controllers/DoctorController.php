<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\User;
use App\Role;
use App\Address;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Http\Request;
use Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.view')->with('doctors', $doctors);
        //return $doctors;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses = Address::all();
        return view('admin.doctor.create')->with('addresses',$addresses);
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
             'name' =>  'required|max:50|min:5',
             'address' => 'required',
             'email' => 'required|email|unique:users',
             'phone' => 'numeric|digits:11',
             'job_title' => 'required',
             'doctor_text' => 'required',
             'twitter_link' => 'url',
             'facebook_link' => 'url',
             'googleplus_link' => 'url',
             'linkedin_link' => 'url',
             'image' => 'required|image|mimes:jpeg,bmp,png|max:5000',
          ]);



        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

       
        $role = Role::all()->where('name','==','doctor')->first();
        
        $user = new User();

     


        $user->name = $request->input('name');
        $user->role_id = $role->id;
        $user->address_id = $request->input('address');
        $user->email = $request->input('email');
        $user->job_title = $request->input('job_title');
        $user->phone = $request->input('phone');




        $image = Input::file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/users/';
        $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
        $user->image = $path.$filename;


        $user->save();


        $doctor = new Doctor();
        $doctor->doctor_text = $request->input('doctor_text');
        $doctor->twitter_link = $request->input('twitter_link');
        $doctor->facebook_link = $request->input('facebook_link');
        $doctor->googleplus_link = $request->input('googleplus_link');
        $doctor->linkedin_link = $request->input('linkedin_link');
        
        $doctor->user_id = $user->id;
        $doctor->save();
        //$doctor->user()->save($user);

        return redirect('admin/doctors')->withErrors(array('done'=>'Doctor Added Successfully'));
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        $doctor = Doctor::findOrFail($doctor->id);
        return $doctor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $doctor = Doctor::findOrFail($doctor->id);
        $addresses = Address::all();
        return view('admin.doctor.edit')->with('doctor', $doctor)
                               ->with('addresses', $addresses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        
         $validator = Validator::make($request->all(),[
             'name' =>  'required|max:50|min:5',
             'phone' => 'numeric|digits:11',
             'job_title' => 'required',
             'address' => 'required',
             'doctor_text' => 'required',
             'twitter_link' => 'url',
             'facebook_link' => 'url',
             'googleplus_link' => 'url',
             'linkedin_link' => 'url',
             'image' => 'mimes:jpeg,bmp,png|max:5000',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{


       
        
        $doctor->user->name = $request->input('name');
        $doctor->user->job_title = $request->input('job_title');
        $doctor->user->phone = $request->input('phone');
        $doctor->user->address_id = $request->input('address');



       

     
        $image = Input::file('image');
        if(isset($image)){
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/users/';
        $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
        $final_image = $path.$filename;
            $doctor->user->image = $final_image;
        }

        $doctor->user->save();



        $doctor->doctor_text = $request->input('doctor_text');
        $doctor->twitter_link = $request->input('twitter_link');
        $doctor->facebook_link = $request->input('facebook_link');
        $doctor->googleplus_link = $request->input('googleplus_link');
        $doctor->linkedin_link = $request->input('linkedin_link');
        
        $doctor->save();


        return redirect('admin/doctors')->withErrors(array('done'=>'Doctor Edited Successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->back()->withErrors(array('done'=>'Doctor Deleted Successfully'));
    }
}
