<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Validator;
use Illuminate\Support\Facades\Input;
use Image;
use App\Address;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::paginate(15);
        return view('admin.testimonial.index')->with('testimonials',$testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $addresses = Address::all();
        return view('admin.testimonial.create')->with('addresses',$addresses);
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
             'title' => 'required|max:500|min:5',
             'testimonial' => 'required|min:5',
             'address' => 'required',
             'image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{

        $testimonial = new Testimonial();
        $testimonial->address_id = $request->input('address');
        $testimonial->name = $request->input('name');
        $testimonial->title =  $request->input('title');
        $testimonial->testimonial = $request->input('testimonial');

        $image = Input::file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/testimonials/';
        $img =  Image::make($image->getRealPath())->resize(82, 82)->save($path.$filename);
        $testimonial->image = $path.$filename;

        $testimonial->save();

        return redirect('admin/testimonials')->withErrors(array('done'=>'User Testimonial Added Successfully'));
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        try {
             $testimonial = Testimonial::findOrFail($testimonial->id);
        
        
         } catch (ModelNotFoundException $e) {
            return view('error')->with('message','Cannot Find The Testimonial User');
        }
        $addresses = Address::all();
        return view('admin.testimonial.edit')->with('testimonial', $testimonial)
                                             ->with('addresses',$addresses);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
           $validator = Validator::make($request->all(),[
             'name' =>  'required|max:50|min:5',
             'title' => 'required|max:500|min:5',
             'testimonial' => 'required|min:5',
             'address' => 'required',
             'image' => 'image|mimes:jpeg,bmp,png|max:2000',
          ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
       else{


        $testimonial->name = $request->input('name');
        $testimonial->title =  $request->input('title');
        $testimonial->testimonial = $request->input('testimonial');
        $testimonial->address_id = $request->input('address');
       

     
        $image = Input::file('image');
        if(isset($image)){
        $extension = $image->getClientOriginalExtension();
        $filename = rand (1000000,9000000).date("Y-m-d") .'-' .$request->input('name').'.'.$extension;
        $path = 'images/testimonials/';
        $img =  Image::make($image->getRealPath())->resize(82, 82)->save($path.$filename);
        $final_image = $path.$filename;
            $testimonial->image = $final_image;
        }

        $testimonial->save();


        return redirect('admin/testimonials')->withErrors(array('done'=>'User Testimonial Edited Successfully')); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->back()->withErrors(array('done'=>'User Testimonial Deleted Successfully'));
    }
}
