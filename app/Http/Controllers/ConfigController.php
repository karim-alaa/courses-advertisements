<?php

namespace App\Http\Controllers;

use App\Config;
use Validator;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $config = Config::first();
        $phones_str = "";

        foreach ($config->phones as $phone) {
             $phones_str .= $phone->phone.',';
        }
        $phones_str = substr($phones_str, 0, -1);
        
        return view('admin.config.index')->with('config', $config)
                                         ->with('phones',$phones_str);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        $validator = Validator::make($request->all(),[
             //'email' =>  'email|max:30|min:2',
             //'intro_video' => 'max:30|min:2',
             //'courses_number' => 'numeric',
             //'events_number' => 'numeric',
             //'student_number' => 'numeric',
             //'satisfied_students' => 'numeric',
             //'location' => 'required',
             //'youtube' => 'url',
             //'facebook' => 'url',
             //'insta' => 'url',
             //'linked' => 'url',
             //'twitter' => 'url',
             //'phones' => 'required',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

        $config =  Config::first();



        if(null !== $request->email)
            $config->email = $request->email;
        if(null !== $request->intro_video)
            $config->intro_video =  $request->intro_video;
        if(null !== $request->courses_number)
            $config->courses_number =  $request->courses_number;
        else 
            $config->courses_number = 0;
        if(null !== $request->events_number)
            $config->events_number =  $request->events_number;
        else 
            $config->events_number = 0;
        if(null !== $request->students_number)
            $config->students_number =  $request->students_number;
        else 
            $config->students_number = 0;
        if(null !== $request->satisfied_students)
            $config->satisfied_students =  $request->satisfied_students;
        else 
            $config->satisfied_students = 0;
        if(null !== $request->location)
            $config->location =  $request->location;
        if(null !== $request->youtube)
            $config->youtube =  $request->youtube;
        if(null !== $request->facebook)
            $config->face =  $request->facebook;
        if(null !== $request->insta)
            $config->insta =  $request->insta;
        if(null !== $request->linked)
            $config->linked =  $request->linked;
        if(null !== $request->twitter)
            $config->twitter =  $request->twitter;
        if(null !== $request->phones){
            $phones = explode(",", $request->phones[0]);
            $final_phones =array();
            foreach ($phones as $phone) {
                array_push($final_phones,array('phone'=>$phone));
            }
            $config->phones()->createMany($final_phones);
        }

        

        $config->save();
        return redirect('admin/configs')->withErrors(array('done'=>'Data Edited Successfully' ));

       }
    }

}
