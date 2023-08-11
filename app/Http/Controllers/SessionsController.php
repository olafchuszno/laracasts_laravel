<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        
        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (! auth()->attempt($attributes)) {
            // authentication failed
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified'
            ]);
        }

        // User authenticated
        // regenerate the session's id
        session()->regenerate();

        // redirect the user with a flash success message
        return redirect('/')->with('success', 'Welcome Back!');


        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credentials could not be verified']);
        
    }
}
