<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Password;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


/*
    public function resetPasswordChecker(Request $request){
        return $request->email;
    }
*/


    public function sendResetLinkEmail(Request $request)
    {
        //$this->validate( ['email' => 'required|email']);
        //$this->validate($request,['email' => 'required|email']);
        $user_check = User::where('email', $request->email)->first();

        if (!$user_check->active) {
            return back()->withErrors(['email' => 'Your account is not activated. Please activate it first.']);
        } else {
            if($user_check->role['name'] != 'doctor'){
                $response = $this->broker()->sendResetLink(
                    $request->only('email')
                );

                if ($response === Password::RESET_LINK_SENT) {
                    return back()->with('status', trans($response));
                }

                return back()->withErrors(
                    ['email' => trans($response)]
                );
            }else{
                return back()->withErrors(['email' => 'You have no permisson to reset your password.']);
            }
        }
    } 

    



}
