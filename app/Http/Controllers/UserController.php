<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    //Show Register/Create form
    public function create()
    {
        return view('users.register');
    }

    //Store/Create a new user
    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        //Hash Password
        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        //Create profile for the user
        Profile::create([
            'user_id' => $user->id
        ]);

        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and Logged in successfully');
    }


    // Logout user
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('message', 'You have been logged out');
    }

    //Show Login form

    public function login()
    {
        return view('users.login');
    }

    // Authenticate the user
    public function authenticate()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            request()->session()->regenerate();

            return redirect('/')->with('message', 'You are logged in');
        }

        return back()->withErrors(['email' => 'invalid Credentials'])->onlyInput('email');
    }
}
