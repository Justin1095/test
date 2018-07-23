<?php

namespace App\Http\Controllers;

use App\Http\ Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
    	return view('registration.create');
    }

    public function store(RegistrationForm $form) //goes to rules in registrationRequest.php
    {
        $form->persist();
        /*
        // Validate the form. 
        $this->Validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

    	// Create and save the user.
    	$user = User::create([ 
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

    	// Sign them in.
    	// or use \Request::input
    	auth()->login($user);

        // or \Mail
        Mail::to($user)->send(new Welcome($user));
        */

        session()->flash('message', 'thanks man!');

    	// Redirect to the home page.
    	return redirect()->home();
    }
}
