<?php

namespace App\Http\Controllers;

use App\FQ;
use Validator;
use Illuminate\Http\Request;

class FQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fqs = FQ::all();
        return view('admin.fq.index')->with('fqs',$fqs);
    }


    public function getAllFQs()
    {

        $fqs = FQ::all();
        return view('fq.index')->with('fqs',$fqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.fq.create');

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
             'question' => 'required|max:1000',
             'answer' => 'required|max:1000',

          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        $fq = new FQ();
        $fq->question = $request->input('question');
        $fq->answer = $request->input('answer');
        $fq->save();
        return redirect('admin/fq')->withErrors(array('done'=>'The Process Done Successfully' ));
       }
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FQ  $fQ
     * @return \Illuminate\Http\Response
     */
    public function edit($fq_id)
    {

        
        try{

        $fq = FQ::where('id',$fq_id)->firstOrFail();
         }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find The Question');
        }
        return view('admin.fq.edit')->with('fq', $fq);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FQ  $fQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$fq_id)
    {
        $validator = Validator::make($request->all(),[
             'question' => 'required|max:1000',
             'answer' => 'required|max:1000',

          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{
        try{
            $fq = FQ::where('id',$fq_id)->firstOrFail();
            $fq->question = $request->input('question');
            $fq->answer = $request->input('answer');
            $fq->save();
        }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find The Question');
        }
       
        return redirect('admin/fq')->withErrors(array('done'=>'The Process Done Successfully' ));
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FQ  $fQ
     * @return \Illuminate\Http\Response
     */
    public function destroy($fq_id)
    {
        try{
        $fQ = FQ::where('id',$fq_id)->firstOrFail();
        }
         catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find The Question');
        }
        $fQ->delete();
        return redirect()->back()->withErrors(array('done'=>'question Deleted Successfully'));

    }
}
