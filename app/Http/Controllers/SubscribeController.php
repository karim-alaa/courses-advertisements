<?php

namespace App\Http\Controllers;

use App\Subscribe;
use Validator;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribes = Subscribe::paginate(15);
        return view('admin.subscribe.index')->with('subscribes',$subscribes);
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
         $validator = Validator::make($request->all(),[
             'email' => 'required|email',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

            $dummy_subscribe = Subscribe::where('email',$request->email)->first();
            if($dummy_subscribe !== null){
                return redirect()->back()->withErrors(array('done' =>'Your Are Already Subscribed'));
            }
            else{
                $subscribe = new Subscribe();
                $subscribe->email = $request->email;
                $subscribe->save();
                return redirect()->back()->withErrors(array('done' =>'Your Are Subscribed Now'));
            }
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscribe  $subscribe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
        return redirect()->back();
    }


    public function notify($id)
    {
       try {
             $subscribe = Subscribe::findOrFail($id);
             $subscribe->notifiable = true;
             $subscribe->save();
        } catch (ModelNotFoundException $e) {
            return redirect('error')->with('message','Cannot Find The Subscriber');
        }
      
       return redirect()->back();
    }


    public function ignore($id)
    {
        try {
             $subscribe = Subscribe::findOrFail($id);
             $subscribe->notifiable = false;
             $subscribe->save();
        } catch (ModelNotFoundException $e) {
            return redirect('error')->with('message','Cannot Find The Subscriber');
        }
      
      
       return redirect()->back();
    }
}
