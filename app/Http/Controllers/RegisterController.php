<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'avatar' => 'image',
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:7']
        ]);

        // Store User's Avatar and Update the attributes variable
        $attributes['avatar'] = request()->file('avatar')->store('avatars');

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
