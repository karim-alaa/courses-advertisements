<?php

namespace App\Http\Controllers;

use App\Team;
use App\Address;
use Validator;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::all();
        return view('admin.team.index')->with('team', $team);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $addresses = Address::all();
        return view('admin.team.create')->with('addresses',$addresses);
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
             'job_title' => 'required',
             'image' => 'required|image|mimes:jpeg,bmp,png|max:5000',
          ]);



        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

               
        $team = new Team();

     


        $team->name = $request->input('name');
        $team->address_id = $request->input('address');
        $team->email = $request->input('email');
        $team->job_title = $request->input('job_title');




        $image = Input::file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/users/';
        $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
        $team->image = $path.$filename;


        $team->save();


        
        return redirect('admin/team')->withErrors(array('done'=>'Member Added Successfully'));
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $member = Team::findOrFail($team->id);
        $addresses = Address::all();
        return view('admin.team.edit')->with('member', $member)
                               ->with('addresses', $addresses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
         $validator = Validator::make($request->all(),[
             'name' =>  'required|max:50|min:5',
             'job_title' => 'required',
             'address' => 'required',
             'image' => 'mimes:jpeg,bmp,png|max:5000',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{


       
        
        $team->name = $request->input('name');
        $team->job_title = $request->input('job_title');
        $team->address_id = $request->input('address');



       

     
        $image = Input::file('image');
        if(isset($image)){
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/users/';
        $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
        $final_image = $path.$filename;
            $team->image = $final_image;
        }

        $team->save();



      
        
        $team->save();


        return redirect('admin/team')->withErrors(array('done'=>'Member Edited Successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->back()->withErrors(array('done'=>'Member Deleted Successfully'));
    }
}
