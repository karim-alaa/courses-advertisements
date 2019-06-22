<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Validator;
use Illuminate\Support\Facades\Input;
use Image;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsor.index')->with('sponsors', $sponsors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsor.create');
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
             'name' =>  'required|max:50|min:2',
             'url_link' => 'url',
             'image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{


        $sponsor = new Sponsor();

        $sponsor->name = $request->input('name');
        $sponsor->url_link = $request->input('url_link');
        $sponsor->image = $request->input('image');
        

       

     
        $image = Input::file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/sponsors/';
        $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
        $final_image = $path.$filename;
        
        $sponsor->image = $final_image;
        

        $sponsor->save();



        return redirect('admin/sponsors')->withErrors(array('done'=>'Sponsor Added Successfully'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        $sponsor = Sponsor::findOrFail($sponsor->id);
        return $sponsor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
         $sponsor = Sponsor::findOrFail($sponsor->id);
        return view('admin.sponsor.edit')->with('sponsor', $sponsor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
         $validator = Validator::make($request->all(),[
             'name' =>  'required|max:50|min:5',
             'url_link' => 'url',
             'image' => 'image|mimes:jpeg,bmp,png|size:2000',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        
        $sponsor->name = $request->input('name');
        $sponsor->url_link = $request->input('url_link');
     
        $image = Input::file('image');
        if(isset($image)){
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/sponsors/';
        $img =  Image::make($image->getRealPath())->resize(300, 300)->save($path.$filename);
        $final_image = $path.$filename;
            $sponsor->image = $final_image;
        }

        $sponsor->save();


        return redirect('admin/sponsors')->withErrors(array('done'=>'Sponsor Edited Successfully'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        
        $sponsor->delete();
        return redirect()->back()->withErrors(array('done'=>'Sponsor Deleted Successfully'));
    }
}
