<?php

namespace App\Http\Controllers;

use App\Demo;
use Validator;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demos = Demo::paginate(4);
        return view('admin.demo.index')->with('demos',$demos);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.demo.create');
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
             'video_link' => 'required',
             'title' => 'required|max:500',

          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        $demo = new Demo();
        $demo->video_link = $request->input('video_link');
        $demo->title = $request->input('title');
        $demo->save();
        return redirect('admin/freeVideos')->withErrors(array('done'=>'Demo Added Successfully'));
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demo  $demo
     * @return \Illuminate\Http\Response
     */
    public function destroy($video_id)
    {
        try{
            $demo = Demo::where('id',$video_id)->firstOrFail();
        }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find The Video');
        }
        $demo->delete();
        return redirect()->back()->withErrors(array('done'=>'Video Deleted Successfully'));
    }


    
    public function getVideos()
    {
        $demos = Demo::all();
        return view('demo.index')->with('demos',$demos);
    }
}
