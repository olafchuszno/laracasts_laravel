<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => User::find([
                'id' => auth()->id()
            ])[0]
        ]);
    }

    public function update()
    {
        // Find the user
        $user = User::find(['id' => auth()->id()]);

        // Check whether the user exists
        if (count($user) != 1) {
            back()->with('failure', 'Account not Found');
        }

        // User was found, assign the first user from the Collection
        $user = $user[0];

        // Validate the input
        $attributes = request()->validate([
            'name' => 'required',
            'avatar' => 'image'
        ]);

        // Check whether the avatar was uploaded
        if (isset($attributes['avatar'])) {

            // Store User's Avatar and Update the attributes variable
            $attributes['avatar'] = request()->file('avatar')->store('avatars');
        }

        // Update the user's profile
        $user->update($attributes);

        // redirect to the homepage
        return back()->with('success', 'Your name was Updated');

    }
}
