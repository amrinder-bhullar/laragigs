<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('users.dashboard.applications', [
            'applications' => auth()->user()->applications
        ]);
    }

    public function store(Listing $listing, Application $application)
    {
        request()->validate([
            'listing_id' => 'required'
        ]);

        if (Application::where('user_id', auth()->id())->where('listing_id', $listing->id)->doesntExist()) {
            $application->create([
                'listing_id' => $listing->id,
                'user_id' => auth()->id()
            ]);

            return back()->with('message', 'We have sent your job application to the employer');
        }

        return back()->with('message', 'You have already applied for this job');
    }
}
