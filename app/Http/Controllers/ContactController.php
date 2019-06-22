<?php

namespace App\Http\Controllers;

use App\Contact;
use Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(15);
        return view('admin.contact.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.index');
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
             'first_name' =>  'required|max:25|min:2',
             'last_name' => 'required|max:25|min:2',
             'email' => 'required|email',
             'company' => 'required',
             'job_title' => 'required',
             'phone_number' => 'numeric|digits:11',
             'message' => 'required',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{


        $contact = new Contact();

        $contact->fname = $request->input('first_name');
        $contact->lname = $request->input('last_name');
        $contact->email = $request->input('email');
        $contact->company = $request->input('company');
        $contact->phone = $request->input('phone_number');
        $contact->message = $request->input('message');
        $contact->job_title = $request->input('job_title');
        


        

        $contact->save();



        return redirect('/')->withErrors(array('done'=>'Your Data Has Been Saved, We Will Contact You Back A Soon As Possible'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->back()->withErrors(array('done'=>'Data Deleted Successfully'));
    }
}
