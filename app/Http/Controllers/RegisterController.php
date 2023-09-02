<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // Store validate the input as attributes
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'avatar' => 'image',
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:7']
        ]);

        // Check whether the avatar was uploaded
        if (isset($attributes['avatar'])) {

            // Store User's Avatar and Update the attributes variable
            $attributes['avatar'] = request()->file('avatar')->store('avatars');

        } else {
            // The avatar wasn't uploaded

            // Assign a random number
            $randomNumber = rand(1, 1000);

            // Assign a random avatar 
            $path = "https://i.pravatar.cc/60?id={$randomNumber}";

            // Store the generated avatar
            Storage::disk('public')->put("avatars/randomAvatarNumber{$randomNumber}.png", file_get_contents($path));

            // Update the attributes variable
            $attributes['avatar'] = "avatars/randomAvatarNumber{$randomNumber}.png";
        }

        // Create new account
        $user = User::create($attributes);

        // Log the user in
        auth()->login($user);

        // Redirect to the home page with a message
        return redirect('/')->with('success', 'Your account has been created');
    }
}
