<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('users.dashboard.profile', [
            'profile' => auth()->user()->profile
        ]);
    }

    public function edit(Profile $profile)
    {
        return view('users.dashboard.profileEdit', [
            'profile' => $profile
        ]);
    }

    public function update(Profile $profile)
    {
        //Make sure auth id is owner of the listing
        if ($profile->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $attributes = request()->all();

        if (request()->hasFile('image')) {
            $attributes['image'] = request()->file('image')->store('profilePics', 'public');
        }

        $profile->update($attributes);

        return redirect('/profile')->with('message', 'Profile updated successfully');
    }
}
