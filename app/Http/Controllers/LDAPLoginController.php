<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LDAPLoginController extends Controller
{

	/* Show the login screen view */
    public function loginScreen(Request $request)
    {
        return view('login');
    }

    /* This gets executed on processing the login */
    public function handle(Request $request)
    {
    	/* Attemp to auth the user with the credentials provided */
        if(!Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')]))
            return view('login', ['error' => 'Failed to authenticate user '. $request->input('username')]);

        /* If successful return the welcome view with a username param */
        return view('welcome', ['title' => 'Welcome ' . $request->input('username') . '!']);
    }
}
