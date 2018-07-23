<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']); // like a fliter, guest fliter - only guest can go through this fliter
	}

	//if a user, then you dont get to access these //////////////////////
    public function create()
    {
    	return view('sessions.create');
    }

    public function store()
    {
    	// Atempt to authenticate the user.
    	// attempt() compares info to the database, if it matches the it will sign in 
    	// If not, redirect back.
    	// If so, sign them in.
    	if(! auth()->attempt(request(['email', 'password']))) {
    		return back()->withErrors([
    			'message' => 'Please check your credentials and try again'
    		]);
    	}

    	//Redirect to the home page.
    	return redirect()->home();
    }
    //////////////////////////////////////////////////////////

    public function destroy()
    {
    	auth()->logout();

    	return redirect()->home();
    }
}
